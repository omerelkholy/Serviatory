<x-app-layout>
    <div class="flex min-h-screen serviatory-dark">

        <x-side-bar></x-side-bar>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-gray-900 overflow-hidden shadow-lg rounded-lg border border-gray-800">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="p-2.5 rounded-full bg-blue-500 bg-opacity-20">
                                    <svg class="h-7 w-7 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-base font-semibold text-gray-300">Total Users</h5>
                                    <div class="flex items-center">
                                        <span class="text-lg font-bold text-white">{{ $allUsersCount }}</span>
                                        <span class="ml-2 text-xs text-gray-400">({{ $adminCount }} Admins)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="bg-gray-900 overflow-hidden shadow-lg rounded-lg border border-gray-800">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="p-2.5 rounded-full bg-indigo-600 bg-opacity-20">
                                    <svg class="h-7 w-7 text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-base font-semibold text-gray-300">Services</h5>
                                    <div class="flex items-center">
                                        <span class="text-lg  font-bold text-white">{{ $serviceCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="bg-gray-900 overflow-hidden shadow-lg rounded-lg border border-gray-800">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="p-2.5 rounded-full bg-blue-500 bg-opacity-20">
                                    <svg class="h-7 w-7 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-base font-semibold text-gray-300">Reservations</h5>
                                    <div class="flex items-center">
                                        <span class="text-lg font-bold text-white">{{ $reservationCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="bg-gray-900 overflow-hidden shadow-lg rounded-lg border border-gray-800">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="p-2.5 rounded-full bg-blue-800 bg-opacity-20">
                                    <svg class="h-7 w-7 text-blue-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-base font-semibold text-gray-300">Total Activity</h5>
                                    <div class="flex items-center">
                                        <span class="text-lg font-bold text-white">{{ $userCount + $serviceCount + $reservationCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

                    <div class="bg-gray-900 overflow-hidden shadow-lg rounded-lg border border-gray-800">
                        <div class="p-6">
                            <h2 class="text-lg font-semibold text-gray-200 mb-4">Recent Reservations</h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                    <tr>
                                        <th class="px-5 py-3 border-b border-gray-700 bg-gray-800 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">User</th>
                                        <th class="px-5 py-3 border-b border-gray-700 bg-gray-800 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Service</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($reservations->take(5) as $reservation)
                                        <tr>
                                            <td class="px-5 py-3 border-b border-gray-700 bg-gray-900 text-sm">
                                                <div class="flex items-center">
                                                    <div class="ml-3">
                                                        <p class="text-gray-200 whitespace-no-wrap">{{ $reservation->user->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-3 border-b border-gray-700 bg-gray-900 text-sm">
                                                <p class="text-gray-200 whitespace-no-wrap">{{ $reservation->service->name }}</p>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-5 py-5 border-b border-gray-700 bg-gray-900 text-sm text-center">
                                                <p class="text-gray-400">No reservations found</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 text-right">
                                <a href="{{ route('reservations.index') }}" class="text-blue-300 hover:text-blue-100 text-sm font-medium">View All</a>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Services -->
                    <div class="bg-gray-900 overflow-hidden shadow-lg rounded-lg border border-gray-800">
                        <div class="p-6">
                            <h2 class="text-lg font-semibold text-gray-200 mb-4">Services</h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                    <tr>
                                        <th class="px-5 py-3 border-b border-gray-700 bg-gray-800 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Service</th>
                                        <th class="px-5 py-3 border-b border-gray-700 bg-gray-800 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">availability</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($services->take(5) as $service)
                                        <tr>
                                            <td class="px-5 py-3 border-b border-gray-700 bg-gray-900 text-sm">
                                                <div class="flex items-center">
                                                    <div class="ml-3">
                                                        <p class="text-gray-200 whitespace-no-wrap">{{ $service->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-3 border-b border-gray-700 bg-gray-900 text-sm">
                                                <p class="text-gray-200 whitespace-no-wrap">{{ $service->availability === "available" ? "Available" : "Not Available"}}</p>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-5 py-5 border-b border-gray-700 bg-gray-900 text-sm text-center">
                                                <p class="text-gray-400">No services found</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 text-right">
                                <a href="{{ route('services.index') }}" class="text-blue-300 hover:text-blue-100 text-sm font-medium">View All</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Distribution Section -->
                <div class="bg-gray-900 overflow-hidden shadow-lg rounded-lg border border-gray-800 mb-6">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-200 mb-4">User Distribution</h2>
                        <div class="flex justify-center">
                            <div class="w-full md:w-1/2">
                                <div class="relative pt-1">
                                    <div class="flex mb-2 items-center justify-between">
                                        <div>
                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-200 bg-blue-900">
                                                Regular Users
                                            </span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-xs font-semibold inline-block text-blue-200">
                                                {{ $userCount }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-900">
                                        <div style="width:{{ $userCount / ($userCount + $adminCount) * 100 }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                                    </div>
                                </div>
                                <div class="relative pt-1">
                                    <div class="flex mb-2 items-center justify-between">
                                        <div>
                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-indigo-200 bg-indigo-900">
                                                Administrators
                                            </span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-xs font-semibold inline-block text-indigo-200">
                                                {{ $adminCount }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-indigo-900">
                                        <div style="width:{{ $adminCount / ($userCount + $adminCount) * 100 }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-500"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="bg-gray-900 overflow-hidden shadow-lg rounded-lg border border-gray-800">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-200 mb-4">Quick Links</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <a href="{{ route('dashboard.users') }}" class="block p-4 bg-blue-900 bg-opacity-50 rounded-lg shadow hover:bg-blue-800 transition-colors">
                                <div class="flex items-center">
                                    <svg class="h-6 w-6 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    <span class="ml-3 text-blue-100 font-medium">Manage Users</span>
                                </div>
                            </a>
                            <a href="{{ route('dashboard.services') }}" class="block p-4 bg-indigo-900 bg-opacity-50 rounded-lg shadow hover:bg-indigo-800 transition-colors">
                                <div class="flex items-center">
                                    <svg class="h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="ml-3 text-indigo-100 font-medium">Manage Services</span>
                                </div>
                            </a>
                            <a href="{{ route('dashboard.reservations') }}" class="block p-4 bg-blue-800 bg-opacity-50 rounded-lg shadow hover:bg-blue-700 transition-colors">
                                <div class="flex items-center">
                                    <svg class="h-6 w-6 text-blue-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="ml-3 text-blue-50 font-medium">Manage Reservations</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</x-app-layout>
