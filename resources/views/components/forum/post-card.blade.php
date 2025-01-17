@props(['post'])

<a href="{{"/forum/" . $post->id . "?view=true"}}">
    <div class="flex flex-col gap-3 shadow-md p-5">
        <div class="flex gap-2 items-center">
            <img src="https://cdn.pixabay.com/photo/2024/02/28/07/42/european-shorthair-8601492_640.jpg" alt="" class="w-5 h-5 rounded-full">
            <h4 class="h4">{{"@" . $post->user_name}}</h4>
        </div>
        <h2 class="h2 font-bold">{{$post->title}}</h2>
        <p class="p line-clamp-2">{{$post->content}}</p>

        <div class="flex gap-3">
            <div>
                <span>Views {{$post->views}}</span>
            </div>
            <div>
                <span>Votes {{$post->votes}}</span>
            </div>
            <div>
                <span>Comments {{$post->comment_count}}</span>
            </div>
        </div>
    </div>
</a>
