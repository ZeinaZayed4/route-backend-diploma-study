<x-layout>
    <x-slot:heading>
        Posts
    </x-slot:heading>

    <div class="flex justify-center items-center mt-20">
        <div class="w-4/6 max-w-4xl">
            <x-success />

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="table-fixed w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Body
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200 text-center">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $post->title }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $post->body }}
                                </td>
                                <td class="px-4 py-4">
                                    <img src="{{ asset("storage/$post->image") }}" alt="{{ $post->title }}" class="w-10/12 h-20">
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex mx-5">
                                        <x-button href="posts/{{ $post->id }}" class="mx-2">Show</x-button>

                                        <form method="post" action="/posts/{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <x-form-button class="bg-red-600 hover:bg-red-500 focus-visible:outline-red-600">Delete</x-form-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-layout>
