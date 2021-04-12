<x-app-layout>
    <div style="width: 500px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <h1 class="text-xl uppercase text-gray-500 mb-4">Your Account Info:</h1>
        <table class="table-auto min-w-max w-full md:table-fixed">
            <thead>
                <tr class="text-left bg-gray-600 text-white uppercase text-base">
                    <th class="px-2 py-2">Name</td>
                    <th class="px-2 py-2">Email</td>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-gray-200 hover:bg-gray-100">
                    <td class="px-2 py-4">{{$user->name}}</td>
                    <td class="px-2 py-4">{{$user->email}}</td>
                </tr>
            </tbody>
        </table>
        <div class="mt-10 md:flex md:justify-between md:items-center">
            <div class="mb-6 md:mb-0">
                <a href="{{route('user.edit')}}" class="flex items-center bg-gray-200 text-gray-500 hover:text-white px-2 py-1 rounded hover:bg-gray-600 border-b-4 border-gray-400">
                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Update Account Info</span>
                </a>
            </div>
            <div>
                <a href="{{route('user.passwordEdit')}}" class="flex items-center bg-gray-200 text-gray-500 hover:text-white px-2 py-1 rounded hover:bg-gray-600 border-b-4 border-gray-400">
                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Update Your Password</span>
                </a>
            </div>
        </div>
        <div class="mt-8 text-center">
            <a href="{{route('dashboard')}}">
                <svg class="w-8 inline hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</x-app-layout>