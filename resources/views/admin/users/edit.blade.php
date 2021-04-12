<x-app-layout>
    <div style="width: 768px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <h1 class="text-xl uppercase text-gray-500 mb-4">Edit {{$user->name}}'s Role(s)</h1>
        <form action="{{route('admin.users.update', $user)}}" method="POST">
            @csrf
            @method('PUT')
            @foreach($roles as $role)
                <div class="mb-2">
                    <input type="checkbox" name="roles[]" value="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                    <label>{{$role->name}}</label>
                </div>
            @endforeach
            <div class="flex gap-4">
                <button class="block bg-gray-400 py-2 px-4 rounded-lg text-gray-100 hover:text-gray-500 focus:outline-none">Update</button>
                <a href="{{route('admin.users.index')}}" class="block bg-red-500 py-2 px-4 rounded-lg text-gray-100 hover:bg-red-400 focus:outline-none">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
