<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user        = Auth::user();
        $breadcrumbs = [
            ['name' => 'Customer', 'url' => route('customer.index')],
        ];
        $bookings = Booking::with(['user', 'payment'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        $playstations = \App\Models\Playstation::all();

        // dd($bookings);
        // dd($bookings);
        return view('cusotmer.booking', compact('breadcrumbs', 'playstations', 'user'), ['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function setting()
    {
        $user     = Auth::user();
        $payments = Payment::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $totalPayment = 'Rp ' . number_format($user->payments->sum('amount'), 0, ',', '.');

        $breadcrumbs = [
            ['name' => 'Cutomer', 'url' => route('customer.index')],
            ['name' => 'Settings'],
        ];
        return view('cusotmer.setting', compact('user', 'breadcrumbs', 'totalPayment', 'payments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'username'     => 'required|string|max:255',
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255|unique:users,email,' . $id,
            'phone_number' => 'nullable|string|max:20',
            'address'      => 'nullable|string|max:500',
            'password'     => 'nullable|min:8', // Password is optional but must be confirmed if provided
        ]);

        // Find the user
        $user = User::findOrFail($id);

        // Prepare update data
        $updateData = [
            'username'     => $request->input('username'),
            'name'         => $request->input('name'),
            'email'        => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address'      => $request->input('address'),
        ];

        // Update password only if provided
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        // Update user data
        $user->update($updateData);

        // Redirect with success message
        Alert::success('Success', 'Data has been updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
