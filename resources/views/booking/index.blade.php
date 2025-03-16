<x-app-layout>
    {{-- @php

      dd($bookings);
  @endphp --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-14 space-y-8">
            <x-breadcrumb :links="$breadcrumbs" />
            <div class="grid grid-cols-12 gap-x-8">
                <div class="relative overflow-x-auto sm:rounded-lg col-span-12">


                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('admin.booking.index') }}" class="mb-4 flex space-x-4 max-w-sm ">
                        <!-- Status Filter -->

                        <select name="status" onchange="this.form.submit()"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Status</option>
                            @foreach ($statuses as $s)
                                <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>
                                    {{ ucfirst($s) }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Hidden sorting input -->
                        <input type="hidden" name="sortOrder" value="{{ request('sortOrder', 'desc') }}">
                    </form>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-3">No.</th>
                                <th scope="col">Status</th>
                                {{-- <th scope="col">Order ID</th> --}}
                                <th scope="col">
                                    <a
                                        href="{{ route('admin.booking.index', [
                                            'status' => request('status'),
                                            'sortOrder' => request('sortOrder') == 'asc' ? 'desc' : 'asc',
                                        ]) }}">
                                        Date
                                        @if (request('sortOrder') == 'asc')
                                            🔼
                                        @else
                                            🔽
                                        @endif
                                    </a>
                                </th>
                                <th scope="col">User</th>
                                <th scope="col">Playstation</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Payment Date</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $index => $booking)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $index + 1 }}
                                    </th>
                                    <td class="capitalize">{{ $booking->status }}</td>
                                    {{-- <td>{{ $booking->order_id }}</td> --}}
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->playstation->name }}</td>
                                    <td>{{ $booking->payment->status ?? 'Booking' }}</td>
                                    <td>{{ $booking->payment && $booking->payment->payment_date ? 'Paid' : 'Unpaid' }}
                                    </td>
                                    <td>{{ $booking->total_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination my-5">
                        {{ $bookings->links() }}
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
