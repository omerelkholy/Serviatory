<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @if (session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-100 border border-green-200 text-sm text-green-800 dark:bg-green-900 dark:border-green-700 dark:text-green-100 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        @if($reservations->isEmpty())
            <div class="text-center mx-auto mt-20 text-gray-600 dark:text-gray-300">
                @if($user->role === "admin")
                    <p class="text-xl font-medium">We don't have reservations yet to check!</p>
                @else
                    <p class="text-xl font-medium">You haven't made any reservations yet!</p>
                @endif
            </div>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($reservations as $reservation)
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 p-6 flex flex-col justify-between">
                        <div>
                            <a href="{{ route('reservations.show', $reservation) }}">
                                <h5 class="mb-4 text-xl font-semibold text-center text-gray-900 dark:text-white hover:text-[#10b981] transition duration-200">
                                    {{ $reservation->service->name }}
                                </h5>
                            </a>

                            <p class="text-sm text-center text-gray-700 dark:text-gray-200 mb-2">
                                <span class="font-medium">Date:</span> {{ $reservation->reservation_date }}
                            </p>
                            <p class="text-sm text-center text-gray-700 dark:text-gray-200 mb-4">
                                <span class="font-medium">Time:</span> {{ $reservation->reservation_time }}
                            </p>

                            <div class="flex justify-center mb-4">
                                @php
                                    $status = $reservation->status;
                                    $statusClasses = [
                                        'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-600 dark:text-yellow-100',
                                        'confirmed' => 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100',
                                        'rejected' => 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100',
                                        'cancelled' => 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-100',
                                    ];
                                @endphp
                                <span class="px-4 py-1 rounded-full text-sm font-semibold {{ $statusClasses[$status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </div>
                        </div>

                        @if($user->role === "user" && $reservation->status === "pending")
                            <form method="POST" action="{{ route('reservations.cancel', $reservation->id) }}" onsubmit="return confirm('Are you sure you want to cancel the reservation?');" class="mt-4">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-900 transition duration-150">
                                    Cancel Reservation
                                </button>
                            </form>
                        @endif

                        @if($user->role === "admin")
                            <p class="mt-6 text-sm text-right text-gray-500 dark:text-gray-400 italic">
                                Reserved by: {{ $reservation->user->name }}
                            </p>
                        @endif
                        @if($user->role === "admin" && $reservation->status === "pending")
                            <form method="POST" action="{{ route('reservations.confirm', $reservation->id) }}" onsubmit="return confirm('Are you sure you want to confirm the reservation?');" class="mt-4">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-700 dark:hover:bg-green-800 dark:focus:ring-green-900 transition duration-150">
                                    Confirm Reservation
                                </button>
                            </form>
                        <form method="POST" action="{{ route('reservations.reject', $reservation->id) }}" onsubmit="return confirm('Are you sure you want to reject the reservation?');" class="mt-4">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-900 transition duration-150">
                                    Reject Reservation
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
