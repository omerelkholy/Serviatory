<x-app-layout>
    <div class="serviatory-dark text-white min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form class="max-w-md mx-auto bg-gray-800 p-6 rounded-lg shadow-md" action="{{ route('dashboard.userUpdate', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-6">
                    <label for="role" class="block mb-2 text-sm font-medium serviatory-light">User Role</label>
                    <select name="role" id="role"
                            class="block w-full px-4 py-2 text-sm bg-gray-900 text-white border border-gray-700 rounded-lg focus:ring-2 focus:ring-accent-color focus:outline-none">
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0">
                    <button type="submit"
                            class="bg-[var(--accent-color)] hover:brightness-110 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Submit
                    </button>

                    <a href="{{ route('dashboard.users') }}"
                       class="bg-gray-700 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
