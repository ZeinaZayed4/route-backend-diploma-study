<x-layout>
    <x-slot:heading>
        Post
    </x-slot:heading>

    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="container mb-2 rounded border-2">
            <img src="{{ asset("storage/$post->image") }}" alt="{{ $post->title }}" class="w-100 h-100">
        </div>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p>
    </div>

    <p class="mt-6">
        <x-button href="{{ $post->id }}/edit">Edit Post</x-button>
    </p>
</x-layout>
