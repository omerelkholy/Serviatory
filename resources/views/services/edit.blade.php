<x-app-layout>
    <div class="max-w-3xl mx-auto my-10 px-6 py-12 bg-white dark:bg-gray-900 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-8 text-center">Edit Service</h2>

        <form action="{{ route('services.update', $service) }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" name="name" id="name" value="{{ $service->name }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       required>
            </div>

            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                <input type="text" name="description" id="description" value="{{ $service->description }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       required>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                    <input type="number" name="price" id="price" value="{{ $service->price }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label for="availability" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Availability</label>
                    <select name="availability" id="availability"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="available" {{ $service->availability === 'available' ? 'selected' : '' }}>Available</option>
                        <option value="not_available" {{ $service->availability === 'not_available' ? 'selected' : '' }}>Not Available</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <a href="{{ url()->previous() }}"
                   class="text-white bg-gray-700 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-6 py-2.5 text-center transition duration-200">
                    Cancel
                </a>

                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center transition duration-200 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
