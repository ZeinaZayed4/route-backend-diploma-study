@if (session('success'))
    <div class="bg-green-100 border border-green-800 text-green-800 px-4 py-3 rounded relative mb-7" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
