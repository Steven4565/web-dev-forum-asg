<x-app-layout>
    <div class="w-full flex items-start gap-10">
        <div class="w-full">
            <x-forum.post-card-detail :post="$forum"/>

            <h2 class="h2 font-bold text-xl my-10">Comments</h2>

            <x-forum.textbox :post_id="$forum->id"/>

            <div class="flex flex-col gap-3 mt-10">
                @foreach($comments as $comment)
                    {{-- <livewire:pages.forum.comment-card :comment="$comment" :color="'#000000'" :vote_val="$comment->votes" :post_id="$forum->id" :reply_count="$comment->reply_count"/> --}}
                    <livewire:pages.forum.comment-card :comment="$comment" :color="'#000000'" :post_id="$forum->id" />
                @endforeach
            </div>
        </div>
        <div class="flex flex-col justify-center w-[300px] items-center">
            <img src="https://cdn.pixabay.com/photo/2024/02/28/07/42/european-shorthair-8601492_640.jpg" alt="" class="w-[200px] h-[200px] rounded-full">
            <h4 class="h4 font-bold">{{"@" . $forum->author->name}}</h4>
        </div>
    </div>
</x-app-layout>
