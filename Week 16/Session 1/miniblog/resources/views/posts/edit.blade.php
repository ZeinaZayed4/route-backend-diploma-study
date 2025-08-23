<x-layout>
    <x-slot:heading>
        Edit Post: {{ $post->title }}
    </x-slot:heading>

    <form method="post" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="title" name="title" value="{{ $post->title }}" />

                            <x-form-error name="title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="body">Body</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="textarea" id="body" name="body">{{ $post->body }}</x-form-input>

                            <x-form-error name="body" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="image">New Image</x-form-label>
                        <div class="mt-2 flex items-start gap-4">
                            <div class="flex-1">
                                <x-form-input type="file" id="image" name="image" />

                                <x-form-error name="image" />
                            </div>

                            <div class="flex-shrink-0">
                                <img src="{{ asset("storage/$post->image") }}"
                                     alt="Current image"
                                     class="w-20 h-20 object-cover rounded border border-gray-300">
                            </div>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-form-button>Update</x-form-button>
        </div>
    </form>
</x-layout>

