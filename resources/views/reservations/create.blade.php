<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8 text-center">
            <h2 class="text-2xl font-bold text-white">Create New Reservation</h2>
            <p class="text-gray-400 mt-2">Schedule your appointment for {{ $service->name ?? 'the selected service' }}</p>
        </div>

        @if (session('error'))
            <div class="mb-6 text-sm bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md shadow-sm dark:bg-red-900 dark:text-red-300 dark:border-red-700">
                <p class="font-medium">{{ session('error') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 text-sm bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md shadow-sm dark:bg-red-900 dark:text-red-300 dark:border-red-700">
                <p class="font-medium mb-2">Please correct the following errors:</p>
                <ul class="list-disc list-inside pl-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-gray-800 rounded-lg shadow-lg p-6 border border-gray-700 max-w-md mx-auto">
            <form action="{{route("reservations.store")}}" method="POST">
                @csrf
                <input type="hidden" name="service_id" value="{{$service->id}}">

                <div class="mb-6">
                    <label for="reservation_date" class="block text-sm font-medium text-gray-300 mb-2">
                        Reservation Date
                    </label>
                    <div class="relative">
                        <input type="date"
                               name="reservation_date"
                               id="reservation_date"
                               class="block w-full px-4 py-3 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('reservation_date') }}"
                               required />
                    </div>
                    @error('reservation_date')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="reservation_time" class="block text-sm font-medium text-gray-300 mb-2">
                        Reservation Time
                    </label>
                    <div class="relative">
                        <input type="time"
                               name="reservation_time"
                               id="reservation_time"
                               class="block w-full px-4 py-3 text-gray-300 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('reservation_time') }}"
                               required />
                    </div>
                    @error('reservation_time')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-8">
                    <a href="{{ url()->previous() }}" class="mr-4 px-4 py-2 text-sm font-medium text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-blue-500 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Create Reservation
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
