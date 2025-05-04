<aside class="w-64 bg-white dark:bg-gray-900 shadow-md">
    <div class="p-6">
        <div class="flex items-center mb-8">
            <img class="mx-auto w-auto h-12" src="{{asset('serviatory.png')}}" alt="">
        </div>
        <ul class="space-y-1">
            <li>
                <a href="{{ route('dashboard.index') }}" class="block px-4 py-3 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors {{request()->routeIs('dashboard.index') ? 'bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-white' : ''}}">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.users') }}" class="block px-4 py-3 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors {{request()->routeIs('dashboard.users') ? 'bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-white' : ''}}">
                    Users
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.reservations') }}" class="block px-4 py-3 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors {{request()->routeIs('dashboard.reservations') ? 'bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-white' : ''}}">
                    Reservations
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.services') }}" class="block px-4 py-3 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors {{request()->routeIs('dashboard.services') ? 'bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-white' : ''}}">
                    Services
                </a>
            </li>
        </ul>
    </div>
</aside>
