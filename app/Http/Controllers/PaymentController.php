<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{

    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Admin', 'url' => route('admin.booking.index')],
            ['name' => 'Payment'],
        ];

        $query = Payment::with('user');

        // Get filter and sort parameters
        $status    = $request->input('status');
        $sortOrder = $request->input('sortOrder', 'desc'); // Default sorting is descending

        // Apply status filter if selected
        if ($status) {
            $query->where('status', $status);
        }

        // Only allow sorting by payment_date
        $query->orderBy('payment_date', $sortOrder);

        $data = $query->paginate(10);

        // Add formatted total_payment
        // $data->getCollection()->transform(fn($item) =>
        //     $item->setAttribute('total_payment', 'Rp ' . number_format($item->amount, 2, ',', '.'))
        // );
        $data->getCollection()->transform(function ($item) {
            $item->setAttribute('total_payment', 'Rp ' . number_format($item->amount, 2, ',', '.'));
            $item->setAttribute('payment_date', date('d F Y', strtotime($item->payment_date)));
            return $item;
        });

        // Get unique status values for filtering
        $statuses = Payment::select('status')->distinct()->pluck('status');

        return view('payment.index', compact('data', 'breadcrumbs', 'statuses', 'status', 'sortOrder'));
    }

    public function create(Booking $booking)
    {

        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;

        if ($booking->payment()->exists()) {
            return response()->json(['snapToken' => $booking->payment->order_id]);
        }

        $orderId = 'BOOKING-' . $booking->id . '-' . Str::random(4);

        Payment::created([
            'user_id'      => $booking->user_id,
            'amount'       => $booking->total_price,
            'status'       => 'pending',
            'order_id'     => $orderId,
            'payment_type' => null,
        ]);

        $transactionDetails = [
            'order_id'     => $orderId,
            'gross_amount' => $booking->total_price,
        ];

        $customerDetails = [
            'first_name' => $booking->user->name,
            'email'      => $booking->user->email,
        ];

        $payload = [
            'transaction_details' => $transactionDetails,
            'customer_details'    => $customerDetails,
        ];

        try {
            $snapToken = Snap::getSnapToken($payload);
            return response()->json(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function callback(Request $request)
    {
        $serverKey    = config('midtrans.server_key');
        $input        = $request->all();
        $signatureKey = hash('sha512', $input['order_id'] . $input['status_code'] . $input['gross_amount'] . $serverKey);

        if ($signatureKey !== $input['signature_key']) {
            return response()->json(['error' => 'Invalid signature key'], 400);
        }

        $payment = Payment::where('order_id', $input['order_id'])->first();

        if (! $payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        $payment->update([
            'status'        => $this->mapMidtransStatus($input['transaction_status']),
            'payment_type'  => $input['payment_type'] ?? $payment->payment_type,
            'response_data' => json_encode($input),
            'payment_date'  => now(),
        ]);

        return response()->json(['status' => 'ok', 'payment' => $payment]);
    }

    /**
     * Map Midtrans transaction status to Payment model status.
     */
    private function mapMidtransStatus($midtransStatus)
    {
        return match ($midtransStatus) {
            'settlement' => 'paid',
            'capture', 'pending' => 'pending',
            'deny', 'expire', 'cancel' => 'failed',
            default              => 'unknown',
        };
    }

}
