<x-layout>
    <x-slot:heading>
        Edit Post: {{ $post->title }}
    </x-slot:heading>

    <form method="post" action="/posts/{{ $post->id }}">
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
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-form-button>Update</x-form-button>
        </div>
    </form>
</x-layout>

