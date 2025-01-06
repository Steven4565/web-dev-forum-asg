<x-app-layout>
    <div class="flex gap-5 justify-end my-5">
        @auth
            <x-button-fill text="Add Post" url="/explore/create" class="px-10 rounded-md grow-0 self-center"/>
        @endauth
    </div>

    <!-- Image Gallery -->
    <div>
        <div class="mason-grid">
            @foreach ($images as $image)
                <div class="grid-item-mason mb-4 w-[180px]">
                    <button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal',
                            {
                                'name': 'image-modal',
                                'modalData': {
                                    'title': '{{ $image["title"] }}',
                                    'description': '{{ $image["description"] }}',
                                    'url': '{{ $image["url"] }}'
                                }
                            })
                         "
                    >
                        <img class="h-auto max-w-full rounded-lg" src="{{ $image['url'] }}" alt="{{ $image['description'] }}">
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <x-image-modal name="image-modal" focusable />
</x-app-layout>
