<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="serviatory-dark rounded-lg shadow-md p-6 border border-gray-700">
            <h1 class="text-3xl font-bold text-center text-primary-light mb-8 font-['Montserrat_Alternates']">
                Reservation Details
            </h1>

            <div class="space-y-6">
                <div class="bg-gray-900 p-5 rounded-lg">
                    <h2 class="text-lg font-semibold serviatory-accent mb-2">Service</h2>
                    <p class="text-gray-300 font-['Lexend_Deca']">{{ $reservation->service->name }}</p>
                </div>

                @if($user->role === 'admin')
                    <div class="bg-gray-900 p-5 rounded-lg">
                        <h2 class="text-lg font-semibold serviatory-accent mb-2">Reserved By</h2>
                        <p class="text-gray-300 font-['Lexend_Deca']">{{ $reservation->user->name }}</p>
                    </div>
                @endif

                <div class="flex gap-6">
                    <div class="bg-gray-900 p-5 rounded-lg flex-1">
                        <h2 class="text-lg font-semibold serviatory-accent mb-2">Date</h2>
                        <p class="text-gray-300 font-['Lexend_Deca']">{{ $reservation->reservation_date }}</p>
                    </div>

                    <div class="bg-gray-900 p-5 rounded-lg flex-1">
                        <h2 class="text-lg font-semibold serviatory-accent mb-2">Time</h2>
                        <p class="text-gray-300 font-['Lexend_Deca']">{{ $reservation->reservation_time }}</p>
                    </div>
                </div>

                <div class="bg-gray-900 p-5 rounded-lg">
                    <h2 class="text-lg font-semibold serviatory-accent mb-2">Status</h2>
                    @php
                        $status = $reservation->status;
                        $statusClasses = [
                            'pending' => 'bg-yellow-900 text-yellow-200 border border-yellow-600',
                            'confirmed' => 'bg-blue-900 text-blue-200 border border-blue-500',
                            'rejected' => 'bg-red-900 text-red-200 border border-red-500',
                            'cancelled' => 'bg-gray-800 text-gray-300 border border-gray-600',
                        ];
                    @endphp
                    <span class="inline-block px-4 py-2 text-sm font-semibold rounded-full {{ $statusClasses[$status] ?? 'bg-gray-800 text-gray-300 border border-gray-600' }}">
                        {{ ucfirst($status) }}
                    </span>
                </div>
            </div>

            <div class="mt-10 flex justify-between">
                <a href="{{ route('reservations.index') }}"
                   class="inline-flex items-center px-5 py-2.5 bg-gray-800 hover:bg-gray-700 text-white rounded-md transition duration-300 border border-gray-600 focus:ring-2 focus:ring-gray-500">
                    ← Back to Reservations
                </a>

                @if($user->role === 'admin')
                    <a href="{{ route('reservations.edit', ["reservation" => $reservation->id , "service_id" => $service->id]) }}"
                       class="inline-flex items-center px-5 py-2.5 bg-blue-700 hover:bg-blue-600 text-white rounded-md transition duration-300 border border-blue-500 focus:ring-2 focus:ring-blue-500">
                        Edit Reservation
                    </a>
                @endif
                @if($user->role === 'user' && $reservation->status === "pending")
                    <a href="{{ route('reservations.edit', ["reservation" => $reservation->id , "service_id" => $service->id]) }}"
                       class="inline-flex items-center px-5 py-2.5 bg-blue-700 hover:bg-blue-600 text-white rounded-md transition duration-300 border border-blue-500 focus:ring-2 focus:ring-blue-500">
                        Edit Reservation
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
