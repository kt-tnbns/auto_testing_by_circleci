<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <h1 class="text-center md:text-left px-6 text-xl text-gray-600">Dashboard</h1>
                <div class="px-6 mt-4">
                    <p class="text-center md:text-left text-md text-green-700 text-md">Welcome {{Auth::user()->name}}!</p>
                </div>
                <div class="p-6 mt-6 grid grid-cols-1 md:grid-cols-2 gap-10 md:grid-60 text-gray-700 uppercase">
                    <a href="{{route('tasks.index')}}">
                        <div class="bg-gray-200 hover:bg-gray-400 hover:text-gray-200 h-24 md:h-48 flex transition duration-500 ease-in-out transform hover:scale-110">
                            <p class="m-auto">Tasks</p>
                        </div>
                    </a>
                    <a href="{{route('user.index')}}">
                        <div class="bg-gray-400 hover:bg-gray-200 text-gray-200 hover:text-gray-700 h-24 md:h-48 flex transition ease-in-out duration-500 transform hover:scale-110">
                            <p class="m-auto">Profile</p>
                        </div>
                    </a>
                    @can('manage-users')
                    <a href="{{route('admin.users.index')}}">
                        <div class="bg-gray-400 hover:bg-gray-200 text-gray-200 hover:text-gray-700 h-24 md:h-48 flex transition ease-in-out duration-500 transform hover:scale-110">
                            <p class="m-auto">Users</p>
                        </div>
                    </a>
                    @endcan
                    @can('view-subscriptions')
                    <a href="{{route('subscriptions')}}">
                        <div class="bg-gray-200 hover:bg-gray-400 hover:text-gray-200 h-24 md:h-48 flex transition duration-500 ease-in-out transform hover:scale-110">
                            <p class="m-auto">Subscriptions</p>
                        </div>
                    </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
