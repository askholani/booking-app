<?php
namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    public function user()
    {

        $data = User::whereHas('role', function ($query) {
            $query->where('name', 'admin');
        })->with('role')->paginate(10);

        $breadcrumbs = [
            ['name' => 'Admin', 'url' => route('admin.booking.index')],
            ['name' => 'User-Management'],
        ];

        return view('user.index', compact('breadcrumbs', 'data'));
    }
}
