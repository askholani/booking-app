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
            // ['name' => 'Booking'],
        ];

        $query = Booking::with(['user', 'payment', 'playstation']);

        // Get filter and sorting inputs
        $status    = $request->input('status');
        $sortOrder = $request->input('sortOrder', 'desc'); // Default sorting is descending

        // Apply status filter if selected
        if ($status) {
            $query->where('status', $status);
        }

        // Apply sorting by date
        $query->orderBy('date', $sortOrder);

        // Paginate results
        $bookings = $query->paginate(3);

        // Format data
        $bookings->getCollection()->transform(function ($item) {
            $item->setAttribute('total_price', 'Rp ' . number_format($item->total_price, 2, ',', '.'));
            $item->setAttribute('date', date('d F Y', strtotime($item->date)));
            return $item;
        });

        // Get unique status values for filtering
        $statuses = Booking::select('status')->distinct()->pluck('status');

        return view('booking.index', compact('breadcrumbs', 'bookings', 'statuses', 'status', 'sortOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd("hai");
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
            // 'status'         => $request->status,
            'status'         => "pending",
        ]);

        Alert::success('Success', 'Booking created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        // dd($booking);
        // $booking->delete();
        $booking->update([
            'status' => 'canceled',
        ]);
        Alert::success('Success', 'Booking deleted successfully');
        return redirect()->back();
    }
}
