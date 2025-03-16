<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex items-center justify-center min-h-[100vh] w-full">
        <div class="bg-white w-[90%] lg:w-[50%] xl:w-[30%] mx-2 p-4 rounded-md shadow-md">
            <h1
                class="text-lg font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-white mb-4">
                Login <span
                    class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Form</span>
            </h1>

            <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf
                <!-- Email Input -->
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="username" id="username" value="{{ old('username') }}" required autofocus
                        autocomplete="username"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="username"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Username
                    </label>
                    @if ($errors->has('username'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $errors->first('username') }}</p>
                    @endif
                </div>

                <!-- Password Input -->
                <div class="relative z-0 w-full mb-5 group">
                    <input type="password" name="password" id="password" required autocomplete="current-password"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="password"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Password
                    </label>
                    @if ($errors->has('password'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $errors->first('password') }}</p>
                    @endif
                </div>


                <!-- Actions -->
                <div class="flex items-center justify-between my-6">
                    {{-- @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline dark:text-blue-400"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif --}}
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">
                        {{ __('Log in') }}
                    </button>
                </div>
                <div class="flex justify-end">
                    <p class="mb-3 text-gray-500 dark:text-gray-400">Don't have an account? <a
                            href="{{ route('register') }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-sm">Register</a>
                    </p>
                </div>


            </form>
        </div>

    </div>



</x-guest-layout>
