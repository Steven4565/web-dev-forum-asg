<x-app-layout>
    <div class="flex gap-5 justify-between my-5">
        <form action="" method="post" class="flex flex-col gap-2 grow-1">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary1 focus:border-primary1" placeholder="Search" required />
            </div>
        </form>
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
