<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-6 p-4 rounded-lg text-sm text-green-800 bg-green-100 dark:bg-green-900 dark:text-green-100 border border-green-200 dark:border-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if($user->role === "admin")
            <div class="flex justify-end mb-6">
                <a href="{{ route('services.create') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-150">
                    Create Service
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        @endif

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($services as $service)
                <div class="bg-white/80 dark:bg-gray-800/70 backdrop-blur-md rounded-2xl shadow-md border border-gray-200 dark:border-gray-700 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <div class="p-5 space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Service</p>
                                <a href="{{route("services.show", $service)}}" class="text-lg font-semibold text-gray-900 dark:text-white">{{ $service->name }}</a>
                            </div>
                        </div>

                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $service->description }}</p>

                        <div class="flex items-center justify-between">
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                {{ $service->availability === 'available'
                                    ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100'
                                    : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-100' }}">
                                {{ ucfirst($service->availability) }}
                            </span>

                            <span class="text-md font-bold text-gray-900 dark:text-white">
                                {{ $service->price }} EGP
                            </span>
                        </div>

                        @if($user->role === "user" && $service->availability === "available")
                            <a href="{{ route('reservations.create', ['service_id' => $service->id]) }}"
                               class="mt-4 inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition">
                                Reserve Service
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </a>
                        @endif

                        @if($user->role === "admin")
                            <div class="flex gap-2 mt-4">
                                <a href="{{ route('services.edit', $service) }}"
                                   class="flex-1 inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('services.destroy', $service) }}"
                                      class="flex-1" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-full inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center mx-auto mt-10 text-gray-600 dark:text-gray-300 col-span-full">
                    <p class="text-lg">We have no services for now. Please check back later!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
