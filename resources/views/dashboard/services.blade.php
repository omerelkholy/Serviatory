<x-app-layout>
    <div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
        <x-side-bar></x-side-bar>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Service Management</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage Services</p>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end mb-6 space-y-3 sm:space-y-0">
                <a href="{{ route('services.create') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Create Service
                    <svg class="rtl:rotate-180 w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>


            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800 uppercase">
                    <tr>
                        <th scope="col" class="px-4 py-3">Service name</th>
                        <th scope="col" class="px-4 py-3 text-center">Description</th>
                        <th scope="col" class="px-4 py-3 text-center">Price</th>
                        <th scope="col" class="px-4 py-3 text-center">availability</th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- User 1 -->
                    @foreach($services as $service)
                        <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-3">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900 dark:text-white">{{$service->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-300 text-center">{{$service->description}}</td>
                            <td class="px-4 py-3 text-center">
                                    {{$service->price}} EGP
                            </td>

                            <td class="px-4 py-3 text-center">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $service->availability === 'available'
                                ? 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100'
                                : 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100' }}">
                                    {{$service->availability}}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('services.edit', $service) }}"
                                       class="font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                                        Edit
                                    </a>
                                    <form method="POST"
                                          action="{{ route('services.destroy', $service) }}"
                                          onsubmit="return confirm('Are you sure?');">
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
