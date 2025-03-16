<x-app-layout>
    {{-- @php

        dd($bookings);
    @endphp --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-14 space-y-8">
            <x-breadcrumb :links="$breadcrumbs" />
            <div class="grid grid-cols-3">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>

                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Weekday
                    </h5>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"> Enjoy our special weekday rates!
                        Book your PlayStation on weekdays and get a discounted price.
                        Perfect for gaming sessions during the week.</p>
                </div>
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>

                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Weekend +
                            Rp 50.000
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">During weekdays, the total price
                        for booking a PlayStation includes the base price and an
                        additional. Ensure to factor in these extra charges when calculating the
                        final amount.</p>
                </div>

                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>

                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Playstation
                    </h5>

                    <ul class="flex flex-col space-y-2 text-gray-500 dark:text-gray-400 w-full">
                        <li class="grid grid-cols-12 w-full">
                            <span class="col-span-2">No.</span>
                            <span class="col-span-4">Name</span>
                            <span class="col-span-3">Year</span>
                            <span class="col-span-3">Per session</span>
                        </li>
                        @foreach ($playstations as $index => $playstation)
                            <li class="grid grid-cols-12 w-full">
                                <span class="col-span-2">{{ $index + 1 }}</span>
                                <span class="col-span-4">{{ $playstation->name }}</span>
                                <span class="col-span-3">{{ $playstation->year }}</span>
                                <span
                                    class="col-span-3">{{ 'Rp ' . number_format($playstation->price, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>

                </div>

            </div>
            <div class="grid grid-cols-12 gap-x-4">
                <div class="col-span-6">
                    <div
                        class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <h1
                            class="mb-4 font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-white">
                            Booking <span
                                class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Form</span>
                        </h1>

                        <form class="w-full py-4" action="{{ route('customer.booking.store') }}" method="POST">
                            @csrf
                            <div class="relative z-0 w-full mb-5 group">
                                <div class="grid grid-cols-2 gap-x-2">
                                    <!-- Hidden Input for user_id -->
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                                    <!-- Name (Disabled) -->
                                    <input type="text" id="name" value="{{ $user->name }}"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " disabled />

                                    <label for="name"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Name
                                    </label>

                                    <!-- Date Input -->
                                    <div class="relative max-w-sm">
                                        <input type="date" id="datepicker-format" name="date"
                                            class="w-full border border-b-2 border-t-0 border-l-0 border-r-0 border-slate-300"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-x-2">
                                <!-- PlayStation Select -->
                                <div class="relative z-0 w-full mb-5 group">
                                    <select id="underline_select" name="playstation_id"
                                        onchange="playstationSelected(this.value)"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                                        required>
                                        <option value="">Select Playstation</option>
                                        @foreach ($playstations as $playstation)
                                            <option value="{{ $playstation->id }}">{{ $playstation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Price Input (readonly instead of disabled) -->
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="total_price" id="price" readonly disabled
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 peer"
                                        placeholder=" " required />

                                    <label for="price"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Price
                                    </label>
                                </div>
                            </div>

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Submit
                            </button>
                        </form>

                    </div>
                </div>

                <div class="col-span-6">
                    <div
                        class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 h-[40vh] overflow-y-scroll flex flex-col justify-between">
                        <table id="default-table" class="w-full text-left text-sm">
                            <thead>
                                <tr>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Playstation
                                    </th>
                                    <th data-type="date" data-format="YYYY/DD/MM">

                                        Date

                                    </th>
                                    <th>

                                        Price
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $index => $booking)
                                    <tr>
                                        {{-- <td>{{ $index + 1 }}</td> --}}
                                        <td class="py-1">
                                            @php
                                                $popoverId = 'popover-left-' . $index;
                                            @endphp

                                            @if ($booking->status == 'pending')
                                                <button type="button" data-popover-target="{{ $popoverId }}"
                                                    data-popover-placement="left"
                                                    class="text-white bg-yellow-300 font-medium rounded-full text-sm p-1">
                                                    <svg class="w-5 h-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                            clip-rule="evenodd" />
                                                    </svg>

                                                </button>
                                            @elseif ($booking->status == 'completed')
                                                <button type="button" data-popover-target="{{ $popoverId }}"
                                                    data-popover-placement="left"
                                                    class="text-white bg-blue-400 font-medium rounded-full text-sm p-1">
                                                    <svg class="w-5 h-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            @elseif ($booking->status == 'canceled')
                                                <button type="button" data-popover-target="{{ $popoverId }}"
                                                    data-popover-placement="left"
                                                    class="text-white bg-red-600 font-medium rounded-full text-sm p-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="size-5">
                                                        <path fill-rule="evenodd"
                                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                                            clip-rule="evenodd" />
                                                    </svg>

                                                </button>
                                            @endif


                                            <div data-popover id="{{ $popoverId }}" role="tooltip"
                                                class="absolute z-10 invisible inline-block w-48 text-sm text-gray-600 transition-opacity duration-300 bg-white border border-gray-300 rounded-sm shadow-lg opacity-0 dark:text-gray-300 dark:border-gray-700 dark:bg-gray-800">
                                                <div
                                                    class="px-2 py-1 bg-gray-100 border-b border-gray-300 rounded-t-sm dark:border-gray-700 dark:bg-gray-700">
                                                    <h3 class="text-base font-semibold text-gray-900 dark:text-white">

                                                        @if ($booking->status == 'pending')
                                                            Pending Payment
                                                        @elseif ($booking->status == 'completed')
                                                            Payment Successful
                                                        @elseif ($booking->status == 'canceled')
                                                            Booking Canceled
                                                        @endif
                                                    </h3>
                                                </div>

                                                <div class="px-2 py-1 leading-relaxed text-sm flex flex-col gap-y-2">

                                                    @if ($booking->status == 'pending')
                                                        <p>Click below to complete your payment and confirm your
                                                            booking.</p>

                                                        <div class="flex justify-end">
                                                            {{-- <form
                                                                action="{{ route('customer.payment.create', $booking->id) }}"
                                                                method="GET">
                                                                @csrf --}}
                                                            <button type="button"
                                                                onclick="payment('{{ route('customer.payment.create', $booking->id) }}')"
                                                                class="gap-x-2 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="currentColor"
                                                                    class="size-3">
                                                                    <path
                                                                        d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z"
                                                                        clip-rule="evenodd" />
                                                                </svg>

                                                                Pay
                                                            </button>
                                                            {{-- </form> --}}
                                                        </div>
                                                    @elseif ($booking->status == 'completed')
                                                        <p>Your payment has been received. Thank you for booking with
                                                            us!</p>
                                                    @elseif ($booking->status == 'canceled')
                                                        <p>Your booking has been canceled.</p>
                                                    @endif
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </td>
                                        <td>{{ $booking->playstation->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</td>
                                        <td>{{ 'Rp ' . number_format($booking->total_price, 0, ',', '.') }}</td>


                                        <td>
                                            @if ($booking->status === 'pending')
                                                <button type="button"
                                                    onclick="showSweetAlert('{{ route('customer.booking.destroy', $booking->id) }}')"
                                                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm p-2 text-center h-fit w-fit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pagination mt-5">
                            {{ $bookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showSweetAlert(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteItem(url);
                }
            });
        }

        function deleteItem(url) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(url, {
                    method: 'POST', // Laravel handles DELETE through method spoofing
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        _method: 'DELETE'
                    }) // Spoof DELETE
                })
                .then(response => {
                    if (response.ok) {
                        Swal.fire('Deleted!', 'Your record has been deleted.', 'success');
                        location.reload(); // Reload page after successful deletion
                    } else {
                        Swal.fire('Error!', 'There was an error deleting the record.', 'error');
                    }
                })
                .catch(() => {
                    Swal.fire('Error!', 'There was an error deleting the record.', 'error');
                });
        }


        const playstations = @json($playstations);
        let price = 0
        let playstation = null
        let isWeekend = false
        // console.log(playstations);
        document.addEventListener('DOMContentLoaded', function() {
            const datepickerInput = document.getElementById('datepicker-format');

            datepickerInput.addEventListener('input', function() {
                const selectedDate = new Date(datepickerInput.value);
                isWeekend = selectedDate.getDay() === 6 || selectedDate.getDay() === 0;

                console.log('playstation', playstation)
                if (playstation) {
                    if (isWeekend) {
                        // console.log('isweekend')
                        price = parseInt(playstation.price) + 50000
                        document.getElementById('price').value = 'Rp ' + new Intl.NumberFormat('id-ID')
                            .format(
                                price);
                    } else {
                        price = parseInt(playstation.price)
                        document.getElementById('price').value = 'Rp ' + new Intl.NumberFormat('id-ID')
                            .format(
                                price);
                    }
                }

            });
        });

        function playstationSelected(id) {
            playstation = playstations.find(playstation => playstation.id == id)
            if (isWeekend) {
                price = parseInt(playstation.price) + 50000
            } else {
                price = parseInt(playstation.price)
            }
            document.getElementById('price').value = 'Rp ' + new Intl.NumberFormat('id-ID').format(price);
        }

        function payment(url) {
            fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.snapToken) {
                        snap.pay(data.snapToken, {
                            onSuccess: function(result) {
                                alert('Payment Success!');
                                console.log(result);
                            },
                            onPending: function(result) {
                                alert('Payment Pending!');
                                console.log(result);
                                Swal.fire('Pending!', 'Your payment is still pending.', 'warning');
                            },
                            onError: function(result) {
                                alert('Payment Failed!');
                                console.log(result);
                                Swal.fire('Error!', 'There was an error processing your payment.', 'error');
                            }
                        });
                    } else {
                        Swal.fire('Error!', 'Failed to retrieve payment token.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'There was an error processing your request.', 'error');
                });
        }
    </script>

</x-app-layout>
