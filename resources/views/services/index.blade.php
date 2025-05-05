<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Title -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-white text-center font-mono">
                {{ $user->role === "admin" ? 'Service Management' : 'Available Services' }}
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

        <!-- Admin Create Button -->
        @if($user->role === "admin")
            <div class="flex justify-end mb-6">
                <a href="{{ route('services.create') }}"
                   class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-800 transition duration-150 shadow-md hover:shadow-blue-700/20">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create Service
                </a>
            </div>
        @endif

        <!-- Services Grid -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($services as $service)
                <div class="bg-gray-800/60 border border-gray-700 hover:border-blue-500/50 rounded-2xl shadow-md hover:shadow-blue-900/20 transition-all duration-300 overflow-hidden flex flex-col h-full">
                    <!-- Card Header -->
                    <div class="bg-gray-900/70 p-4 border-b border-gray-700">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-full bg-blue-900/50 border border-blue-700/30 flex items-center justify-center shadow-inner">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-mono">Service</p>
                                <a href="{{route("services.show", $service)}}" class="text-lg font-semibold text-white hover:text-blue-400 transition duration-200 font-mono">
                                    {{ $service->name }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-5 flex-1 flex flex-col">
                        <!-- Description -->
                        <div class="bg-gray-900/30 rounded-lg p-3 border border-gray-700/50 mb-4">
                            <p class="text-sm text-gray-300">{{ $service->description }}</p>
                        </div>

                        <!-- Price and Availability -->
                        <div class="flex items-center justify-between mb-4">
                            @php
                                $availabilityClasses = [
                                    'available' => 'bg-green-900/70 text-green-200 border border-green-700',
                                    'unavailable' => 'bg-red-900/70 text-red-200 border border-red-700',
                                ];
                                $availabilityIcons = [
                                    'available' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>',
                                    'unavailable' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>',
                                ];
                            @endphp
                            <span class="px-3 py-1 rounded-full text-sm font-mono inline-flex items-center {{ $availabilityClasses[$service->availability] ?? 'bg-gray-700 text-gray-200' }}">
                                {!! $availabilityIcons[$service->availability] ?? '' !!}
                                {{ ucfirst($service->availability) }}
                            </span>

                            <span class="text-md font-bold text-white bg-blue-900/30 px-3 py-1 rounded-lg border border-blue-800/30 font-mono">
                                {{ $service->price }} EGP
                            </span>
                        </div>

                        <!-- Spacer to push buttons to bottom -->
                        <div class="flex-grow"></div>

                        <!-- User Action -->
                        @if($user->role === "user" && $service->availability === "available")
                            <a href="{{ route('reservations.create', ['service_id' => $service->id]) }}" class="mt-4 flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-800 rounded-lg transition-all duration-200 shadow-md hover:shadow-blue-700/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Reserve Service
                            </a>
                        @endif

                        <!-- Admin Actions -->
                        @if($user->role === "admin")
                            <div class="flex gap-2 mt-4 pt-4 border-t border-gray-700">
                                <a href="{{ route('services.edit', $service) }}" class="flex-1 flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:ring-2 focus:outline-none focus:ring-green-800 rounded-lg transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('services.destroy', $service) }}" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-800 rounded-lg transition-all duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center mx-auto mt-20 mb-20 text-gray-600 dark:text-gray-300 col-span-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 dark:text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <p class="text-xl font-medium text-gray-400 dark:text-gray-300 font-mono">No services available yet</p>
                    @if($user->role === "admin")
                        <p class="text-gray-500 dark:text-gray-400 mt-2">Create services for users to reserve</p>
                        <a href="{{ route('services.create') }}" class="mt-6 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-200">
                            Create First Service
                        </a>
                    @else
                        <p class="text-gray-500 dark:text-gray-400 mt-2">Please check back later for available services</p>
                    @endif
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
