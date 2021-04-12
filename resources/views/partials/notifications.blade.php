@if(session('msg') !== null)
    <p class="text-green-600 p-2 bg-gray-300 rounded mt-2">{{session('msg')}}</p>
@endif
@if(session('deleted') !== null)
    <p class="text-red-500 p-2 bg-gray-300 rounded mt-2">{{session('deleted')}}</p>
@endif
@if(session('success') !== null)
    <p class="text-green-600 p-2 bg-gray-300 rounded mt-2">{{session('success')}}</p>
@endif
@if(session('error') !== null)
    <p class="text-green-600 p-2 bg-gray-300 rounded mt-2">{{session('error')}}</p>
@endif