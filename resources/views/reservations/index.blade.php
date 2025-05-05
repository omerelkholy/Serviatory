<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Title -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-white text-center font-mono">
                {{ $user->role === "admin" ? 'Reservation Management' : 'My Reservations' }}
            </h2>
            <div class="w-24 h-1 bg-blue-500 mx-auto mt-2"></div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-100 border-l-4 border-green-500 text-sm text-green-800 dark:bg-green-900/40 dark:border-green-600 dark:text-green-100 shadow-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Empty State -->
        @if($reservations->isEmpty())
            <div class="text-center mx-auto mt-20 mb-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 dark:text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                @if($user->role === "admin")
                    <p class="text-xl font-medium text-gray-400 dark:text-gray-300 font-mono">No reservations available to manage</p>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Reservations will appear here when users book services</p>
                @else
                    <p class="text-xl font-medium text-gray-400 dark:text-gray-300 font-mono">You haven't made any reservations yet</p>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Browse our services and book your first appointment</p>
                    <a href="{{ route('services.index') }}" class="mt-6 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-200">
                        Browse Services
                    </a>
                @endif
            </div>
        @else
            <!-- Reservations Grid -->
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($reservations as $reservation)
                    <div class="bg-gray-800/60 border border-gray-700 hover:border-blue-500/50 rounded-2xl shadow-md hover:shadow-blue-900/20 transition-all duration-300 overflow-hidden flex flex-col h-full">
                        <!-- Card Header -->
                        <div class="bg-gray-900/70 p-4 border-b border-gray-700">
                            <a href="{{ route('reservations.show', $reservation) }}" class="block">
                                <h5 class="text-xl font-semibold text-center text-white hover:text-blue-400 transition duration-200 font-mono">
                                    {{ $reservation->service->name }}
                                </h5>
                            </a>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex-1 flex flex-col">
                            <!-- Date and Time Info -->
                            <div class="flex justify-between items-center mb-4 bg-gray-900/30 rounded-lg p-3 border border-gray-700/50">
                                <div class="text-sm">
                                    <p class="text-gray-300 font-mono">
                                        <span class="text-gray-400">Date:</span> {{ $reservation->reservation_date }}
                                    </p>
                                    <p class="text-gray-300 font-mono mt-1">
                                        <span class="text-gray-400">Time:</span> {{ $reservation->reservation_time }}
                                    </p>
                                </div>

                                <!-- Status Badge -->
                                @php
                                    $status = $reservation->status;
                                    $statusClasses = [
                                        'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/70 dark:text-yellow-200 border border-yellow-700',
                                        'confirmed' => 'bg-green-100 text-green-800 dark:bg-green-900/70 dark:text-green-200 border border-green-700',
                                        'rejected' => 'bg-red-100 text-red-800 dark:bg-red-900/70 dark:text-red-200 border border-red-700',
                                        'cancelled' => 'bg-gray-200 text-gray-800 dark:bg-gray-700/70 dark:text-gray-300 border border-gray-600',
                                    ];
                                    $statusIcons = [
                                        'pending' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
                                        'confirmed' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>',
                                        'rejected' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>',
                                        'cancelled' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>',
                                    ];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-sm font-mono inline-flex items-center {{ $statusClasses[$status] ?? 'bg-gray-700 text-gray-200' }}">
                                    {!! $statusIcons[$status] ?? '' !!}
                                    {{ ucfirst($status) }}
                                </span>
                            </div>

                            <!-- Spacer to push buttons to bottom -->
                            <div class="flex-grow"></div>

                            <!-- Admin Section -->
                            @if($user->role === "admin")
                                <div class="mt-4 pt-4 border-t border-gray-700">
                                    <p class="text-sm text-gray-400 font-mono mb-3 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Reserved by: <span class="text-white ml-1">{{ $reservation->user->name }}</span>
                                    </p>

                                    @if($reservation->status === "pending")
                                        <div class="flex space-x-2">
                                            <form method="POST" action="{{ route('reservations.confirm', $reservation->id) }}" onsubmit="return confirm('Are you sure you want to confirm this reservation?');" class="flex-1">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="w-full flex justify-center items-center text-white bg-green-600 hover:bg-green-700 focus:ring-2 focus:outline-none focus:ring-green-800 font-medium rounded-lg text-sm px-3 py-2 transition duration-150">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Confirm
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ route('reservations.reject', $reservation->id) }}" onsubmit="return confirm('Are you sure you want to reject this reservation?');" class="flex-1">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="w-full flex justify-center items-center text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2 transition duration-150">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Reject
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- User Actions -->
                            @if($user->role === "user" && $reservation->status === "pending")
                                <form method="POST" action="{{ route('reservations.cancel', $reservation->id) }}" onsubmit="return confirm('Are you sure you want to cancel this reservation?');" class="mt-4 pt-4 border-t border-gray-700">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="w-full flex justify-center items-center text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Cancel Reservation
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
