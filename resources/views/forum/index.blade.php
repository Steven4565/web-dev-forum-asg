<x-app-layout>
    <div class="flex justify-between items-center mb-5">
        <div class="flex gap-2 justify-center h-full">
            <span class="rounded-full bg-primary2 text-primary1 px-3 py-1 text-xs">New</span>
            <span class="rounded-full bg-primary2 text-primary1 px-3 py-1 text-xs">Top</span>
            <span class="rounded-full bg-primary2 text-primary1 px-3 py-1 text-xs">Hot</span>
            <span class="rounded-full bg-primary2 text-primary1 px-3 py-1 text-xs">Closed</span>
        </div>
        @auth
            <x-button-fill text="Add Post" url="/forum/create" class="px-10 rounded-md grow-0 self-center text-xs"/>
        @endauth
    </div>

    <div class="flex gap-16">
        <div class="flex-1 flex flex-col gap-5">
            @foreach ($posts as $post)
                <x-forum.post-card :post="$post"/>
            @endforeach
            {{ $posts->links() }}

        </div>

        <div class="w-[300px]">
            <div class="shadow-md p-5">
                <div class="flex gap-2 py-4">
                    {{-- TODO: icon here --}}
                    <h3 class="h3 font-bold">Must-read posts</h3>
                </div>
                <div class="flex flex-col gap-3">
                    <a href="#" class="a underline text-primary1">Please read rules before you start working on a platform</a>
                    <a href="#" class="a underline text-primary1">Please read rules before you start working on a platform</a>
                    <a href="#" class="a underline text-primary1">Please read rules before you start working on a platform</a>
                    <a href="#" class="a underline text-primary1">Please read rules before you start working on a platform</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


