<x-layout>
    <x-slot:heading>
        Create Post
    </x-slot:heading>

    <form method="post" action="/posts" enctype="multipart/form-data">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="title" name="title" placeholder="Attack on Titan" />

                            <x-form-error name="title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="body">Body</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="textarea" id="body" name="body" placeholder="Attack on Titan is a Japanese manga series written and illustrated by Hajime Isayama." />

                            <x-form-error name="body" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="image">Image</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="file" id="image" name="image" />

                            <x-form-error name="image" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>

