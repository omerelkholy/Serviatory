<x-app-layout>
    <div class="max-w-3xl mx-auto my-10 p-6 serviatory-dark rounded-lg shadow-md border border-gray-700">
        <h1 class="text-3xl font-bold text-center text-primary-light mb-8 font-['Montserrat_Alternates']">
            {{ $service->name }}
        </h1>

        <div class="mb-6 bg-gray-900 p-5 rounded-lg">
            <p class="text-gray-300 text-lg">
                <span class="font-semibold serviatory-accent">Description:</span> {{ $service->description }}
            </p>
        </div>

        <div class="mb-6 text-center bg-gray-900 p-4 rounded-lg">
            <p class="text-gray-300 text-xl">
                <span class="font-semibold serviatory-accent">Price:</span> <span class="font-['Lexend_Deca']">{{ $service->price }} EGP</span>
            </p>
        </div>

        <div class="mb-8 text-center">
            <span class="inline-block text-center px-4 py-2 text-sm font-semibold rounded-full
                {{ $service->availability === 'available'
                    ? 'bg-blue-900 text-blue-200 border border-blue-500'
                    : 'bg-red-900 text-red-200 border border-red-500' }}">
                {{ $service->availability === 'available' ? 'Available' : 'Not Available' }}
            </span>
        </div>

        <div class="flex justify-center gap-4 mt-10">
            <a href="{{ route('services.index') }}"
               class="px-5 py-2.5 text-sm font-medium text-white bg-gray-800 rounded-md hover:bg-gray-700 transition duration-300 border border-gray-600 focus:ring-2 focus:ring-gray-500">
                Back to Services
            </a>

            @if($user->role === 'user' && $service->availability === "available")
                <a href="{{route("reservations.create", ["service_id" => $service->id])}}"
                   class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-md hover:bg-blue-600 transition duration-300 border border-blue-500 focus:ring-2 focus:ring-blue-500">
                    Reserve the Service
                </a>
            @elseif($user->role === 'admin')
                <a href="{{ route('services.edit', $service) }}"
                   class="px-5 py-2.5 text-sm font-medium text-white bg-green-800 rounded-md hover:bg-green-700 transition duration-300 border border-green-600 focus:ring-2 focus:ring-green-500">
                    Edit
                </a>
                <form action="{{ route('services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-5 py-2.5 text-sm font-medium text-white bg-red-800 rounded-md hover:bg-red-700 transition duration-300 border border-red-600 focus:ring-2 focus:ring-red-500">
                        Delete
                    </button>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
