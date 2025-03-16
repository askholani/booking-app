<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
            <x-breadcrumb :links="$breadcrumbs" />
            <div class="grid grid-cols-12 gap-x-8">
                <div class="relative overflow-x-auto sm:rounded-lg col-span-12">


                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('admin.payment.index') }}" class="mb-4 flex space-x-4 max-w-sm ">
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
                                <th scope="col">Order ID</th>
                                <th scope="col">
                                    <a
                                        href="{{ route('admin.payment.index', [
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
                                <th scope="col">Type</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $d)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $index + 1 }}
                                    </th>
                                    <td>{{ $d->status }}</td>
                                    <td>{{ $d->order_id }}</td>
                                    <td>{{ $d->payment_date }}</td>
                                    <td>{{ $d->user->name }}</td>
                                    <td>{{ $d->payment_type }}</td>
                                    <td>{{ $d->total_payment }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination my-5">
                        {{ $data->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
