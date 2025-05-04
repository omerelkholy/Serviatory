<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-900 shadow-lg rounded-xl my-10">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Add New Service</h2>

        <form action="{{ route('services.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
                <input type="text" name="name" id="name" required
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                <input type="text" name="description" id="description" required
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price</label>
                    <input type="number" name="price" id="price" required
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <div>
                    <label for="availability" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Availability</label>
                    <select name="availability" id="availability" required
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:outline-none">
                        <option disabled selected>Choose the availability</option>
                        <option value="available">Available</option>
                        <option value="not_available">Not Available</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col justify-between sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0">
                <a href="{{ url()->previous() }}"
                   class="bg-gray-700 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-green-400">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
