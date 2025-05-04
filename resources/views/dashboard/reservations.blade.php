<x-app-layout>
    <div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
        <x-side-bar></x-side-bar>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Reservation Management</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage Reservations and Requests</p>
            </div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800 uppercase">
                    <tr>
                        <th scope="col" class="px-4 py-3">Client name</th>
                        <th scope="col" class="px-4 py-3 text-center">Service Name</th>
                        <th scope="col" class="px-4 py-3 text-center">Reservation Date</th>
                        <th scope="col" class="px-4 py-3 text-center">Reservation Time</th>
                        <th scope="col" class="px-4 py-3 text-center">Reserved at</th>
                        <th scope="col" class="px-4 py-3 text-center">Status</th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- User 1 -->
                    @foreach($reservations as $reservation)
                        <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-3">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900 dark:text-white">{{$reservation->user->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-300 text-center">{{$reservation->service->name}}</td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-300 text-center">
                                    {{$reservation->reservation_date}}
                            </td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-300 text-center">
                                {{$reservation->reservation_time}}
                            </td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-300 text-center">{{$reservation->created_at->format("Y-m-d")}}</td>
                            @php
                                $status = $reservation->status;
                                $statusClasses = [
                                    'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-600 dark:text-yellow-100',
                                    'confirmed' => 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100',
                                    'rejected' => 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100',
                                    'cancelled' => 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-100',
                                ];
                            @endphp
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-300 text-center">
                                <span
                                class="inline-block px-3 py-1 text-sm font-semibold rounded-full {{ $statusClasses[$status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('reservations.edit', ["reservation" => $reservation->id , "service_id" => $reservation->service->id]) }}" class="font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('reservations.destroy', $reservation) }}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="font-medium text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</x-app-layout>
