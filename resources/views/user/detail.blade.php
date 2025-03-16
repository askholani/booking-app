<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
            <x-breadcrumb :links="$breadcrumbs" />


            <div class="grid grid-cols-12 gap-x-8">
                <div class="col-span-6 bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <div class="max-w-md mx-auto">
                        @csrf
                        <h1
                            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl  dark:text-white">
                            Detail User <span
                                class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Form</span>
                        </h1>
                        <!-- Username -->
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="username" id="username" disabled value="{{ $user->username }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="username"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                        </div>

                        <!-- Name -->
                        <div class="relative z-0 w-full mb-5 group">
                            <input value="{{ $user->name }}" disabled type="text" name="name" id="name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                                Name</label>
                        </div>

                        <!-- Email -->
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="email" name="email" disabled id="email" value={{ $user->email }}
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="email"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                            </label>
                        </div>

                        <!-- Phone Number -->
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="tel" name="phone_number" id="phone_number" disabled
                                value="{{ $user->phone_number }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="phone_number"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone
                                Number</label>
                        </div>

                        <!-- Address -->
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="address" value="{{ $user->address }}"id="address" disabled
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="address"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address
                            </label>
                        </div>


                    </div>
                </div>

                <div class="col-span-6 bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h1
                        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Payments <span
                            class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600 w-8">Data</span>
                    </h1>

                    <div class="relative overflow-x-auto w-full h-full max-h-[80vh] sm:rounded-lg">
                        <div
                            class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-end pb-4">


                            <div class="flex gap-x-4 items-center">
                                <span class="font-senibold">TOTAL : </span>
                                <span class="text-lg"> {{ $totalPayment }}</span>
                            </div>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-2">
                                        No
                                    </th>
                                    <th scope="col" class="p-2">
                                        Amount
                                    </th>
                                    <th scope="col" class="p-2">
                                        Status
                                    </th>
                                    <th scope="col" class="p-2">
                                        Payment Type
                                    </th>
                                    <th scope="col" class="p-2">
                                        Order ID
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $index => $payment)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="p-2">
                                            {{ $index + 1 }}
                                        </td>
                                        <th scope="row"
                                            class="p-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ 'Rp ' . number_format($payment->amount, 0, ',', '.') }}
                                        </th>

                                        <td class="p-2">
                                            {{ $payment->status }}
                                        </td>
                                        <td class="p-2">
                                            {{ $payment->payment_type }}
                                        </td>
                                        <td class="p-2">
                                            {{ $payment->order_id }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pagination mt-5">
                            {{ $payments->links() }}
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</x-app-layout>
