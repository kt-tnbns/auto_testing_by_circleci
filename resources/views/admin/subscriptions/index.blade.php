<x-app-layout>
    <div style="width: 768px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <h1 class="text-xl uppercase text-gray-500 mb-4">All Subscriptions</h1>
        <table class="w-full table-auto mt-4">
            <thead>
                <tr class="text-left bg-gray-600 text-white uppercase text-base">
                    <th class="px-2 py-2">#</td>
                    <th class="px-2 py-2">Email</td>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $subscription)
                <tr class="bg-gray-200 hover:bg-gray-100">
                    <td class="px-2 py-4">{{$subscription->id}}</td>
                    <td class="px-2 py-4">{{$subscription->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-8 text-center">
            <a href="{{route('dashboard')}}">
                <svg class="w-8 inline hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</x-app-layout>
