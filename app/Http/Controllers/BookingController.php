<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Admin'],

        ];

        $query = Booking::with(['user', 'payment', 'playstation']);

        $status    = $request->input('status');
        $sortOrder = $request->input('sortOrder', 'desc');

        if ($status) {
            $query->where('status', $status);
        }

        $query->orderBy('date', $sortOrder);

        $bookings = $query->paginate(3);

        $bookings->getCollection()->transform(function ($item) {
            $item->setAttribute('total_price', 'Rp ' . number_format($item->total_price, 2, ',', '.'));
            $item->setAttribute('date', date('d F Y', strtotime($item->date)));
            return $item;
        });

        $statuses = Booking::select('status')->distinct()->pluck('status');

        return view('booking.index', compact('breadcrumbs', 'bookings', 'statuses', 'status', 'sortOrder'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'user_id'        => 'required|exists:users,id',
            'playstation_id' => 'required|exists:playstations,id',
            'payment_id'     => 'nullable|exists:payments,id',
            'date'           => 'required|date',
        ]);

        $playstation = \App\Models\Playstation::find($request->playstation_id);
        $isWeekend   = in_array(date('N', strtotime($request->date)), [6, 7]);

        if ($isWeekend) {
            $total_price = $playstation->price + 50000;
        } else {
            $total_price = $playstation->price;
        }

        $booking = Booking::create([
            'user_id'        => $request->user_id,
            'playstation_id' => $request->playstation_id,
            'payment_id'     => $request->payment_id,
            'date'           => $request->date,
            'total_price'    => $total_price,

            'status'         => "pending",
        ]);

        Alert::success('Success', 'Booking created successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {

        $booking->update([
            'status' => 'canceled',
        ]);
        Alert::success('Success', 'Booking deleted successfully');
        return redirect()->back();
    }
}
