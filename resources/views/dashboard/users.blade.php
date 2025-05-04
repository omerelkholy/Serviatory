<x-app-layout>
    <div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
        <x-side-bar></x-side-bar>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">User Management</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage user roles and permissions</p>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end mb-6 space-y-3 sm:space-y-0">
                <label for="role" class="text-gray-900 dark:text-white text-sm font-medium mb-2 sm:mb-0 sm:mr-4">Filter by Role</label>
                <form method="GET" action="{{ route('dashboard.users') }}" class="flex sm:flex-row sm:items-center">
                    <select name="role" id="role" onchange="this.form.submit()"
                            class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-lg p-2">
                        <option value="">All Roles</option>
                        <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </form>
            </div>



            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800 uppercase">
                    <tr>
                        <th scope="col" class="px-4 py-3">User name</th>
                        <th scope="col" class="px-4 py-3 text-center">Email</th>
                        <th scope="col" class="px-4 py-3 text-center">Role</th>
                        <th scope="col" class="px-4 py-3 text-center">Joined</th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- User 1 -->
                        @foreach($users as $user)
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                    {{ collect(explode(' ', $user->name))->map(fn($part) => strtoupper($part[0]))->join('') }}
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900 dark:text-white">{{$user->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-gray-600 dark:text-gray-300 text-center">{{$user->email}}</td>
                        <td class="px-4 py-3 text-center">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                    {{$user->role}}
                                </span>
                        </td>
                        <td class="px-4 py-3 text-gray-600 dark:text-gray-300 text-center">{{$user->created_at->format("Y-m-d")}}</td>
                        <td class="px-4 py-3">
                            @if(auth()->check() && auth()->id() !== $user->id)
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('dashboard.userEdit', ['id' => $user->id]) }}" class="font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('dashboard.userDestroy', ['id' => $user->id]) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</x-app-layout>
