@props(['color', 'comment'])


<div class="border-l-8 border-black p-5 shadow-md rounded-sm">
    <div class="flex gap-2 items-center">
        <img src="https://cdn.pixabay.com/photo/2024/02/28/07/42/european-shorthair-8601492_640.jpg" alt="" class="w-5 h-5 rounded-full">
        <h4 class="h4">{{"@" . $comment->author->name}}</h4>
    </div>
    <h2 class="h2 font-bold text-2xl">{{$comment->title}}</h2>
    <p class="p">{{$comment->content}}</p>

    <div class="flex justify-between w-full gap-4">
        <div class="flex gap-4 ">
            <button class="flex gap-2">
                <span>up</span>
                <span>0</span>
            </button>
            <button class="flex gap-2">
                <span>down</span>
                <span>0</span>
            </button>
        </div>
        <div class="flex gap-4">
            <a class="text-blue">Hide all replies (0)</a>
            <a>reply</a>
        </div>
    </div>
</div>
