<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block bg-gray-500 py-2 px-4 rounded-lg text-gray-100 hover:bg-gray-400 focus:outline-none transition ease-in-out duration-200']) }}>
    {{ $slot }}
</button>


