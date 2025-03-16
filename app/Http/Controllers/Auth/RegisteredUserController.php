<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        // dd($request->all());
        $request->validate([
            'username'     => ['required', 'string', 'max:255', 'unique:users,username'],
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'phone_number' => ['required', 'string', 'max:20'],
            'address'      => ['required', 'string', 'max:500'],
            'password'     => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username'     => $request->username,
            'role_id'      => 2,
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'address'      => $request->address,
            'password'     => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
