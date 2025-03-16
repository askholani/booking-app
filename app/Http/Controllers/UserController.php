<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user        = Auth::user();
        $breadcrumbs = [];
        $search      = $request->input('search'); // Get search input
        $query       = User::with('payments');

        if ($user->role->name === 'admin') {
            $query->whereHas('role', fn($q) => $q->where('name', 'customer'));

            if ($search) {
                $query->where('name', 'like', "%{$search}%");
            }

            $data = $query->paginate(10);

            $breadcrumbs = [
                ['name' => 'Admin', 'url' => route('admin.booking.index')],
                ['name' => 'User Management'],
            ];
        } elseif ($user->role->name === 'customer') {
            $data = $query->where('id', $user->id)->get();
        }

        // Format payments directly
        $data->each(fn($item) =>
            $item->total_payment = 'Rp ' . number_format($item->payments->sum('amount'), 2, ',', '.')
        );

        return view('user.index', compact('breadcrumbs', 'data'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function edit(User $user)
    {
        $breadcrumbs = [
            ['name' => 'Admin', 'url' => route('admin.booking.index')],
            ['name' => 'User-Management'],
        ];
        return view('user.edit', compact('user', 'breadcrumbs'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'username'     => 'required|string|max:255|unique:users,username,' . $id,
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255|unique:users,email,' . $id,
            'phone_number' => 'nullable|string|max:15',
            'address'      => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'username'     => $request->username,
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'address'      => $request->address,
        ]);

        Alert::success('Success', 'Data has been updated successfully!!');
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        Alert::success('Success', 'User has been deleted successfully!');
        return redirect()->back();
    }

    public function detail(string $id)
    {
        $user     = User::findOrFail($id);
        $payments = Payment::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $totalPayment = 'Rp ' . number_format($user->payments->sum('amount'), 0, ',', '.');

        $breadcrumbs = [
            ['name' => 'Admin', 'url' => route('admin.booking.index')],
            ['name' => 'User-Management', 'url' => route('admin.user.index')],
            ['name' => 'Detail'],
        ];
        return view('user.detail', compact('user', 'breadcrumbs', 'totalPayment', 'payments'));
    }

}
