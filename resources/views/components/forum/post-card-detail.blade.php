@props(['post'])

<div class="flex w-full">
    <div class="w-full">
        <div class="flex flex-col gap-3 shadow-md p-10 items-baseline">
            <div class="flex gap-2 items-center">
                <img src="https://cdn.pixabay.com/photo/2024/02/28/07/42/european-shorthair-8601492_640.jpg" alt="" class="w-5 h-5 rounded-full">
                <h4 class="h4">{{"@" . $post->user_name}}</h4>
            </div>
            <h2 class="h2 font-bold text-2xl">{{$post->title}}</h2>
            <p class="p">{{$post->content}}</p>

            <div class="flex justify-end w-full">
                <x-forum.vote-button text="Vote" class="px-10 "/>
            </div>

        </div>
    </div>

    <div class="flex flex-col justify-center w-[300px] items-center">
        <img src="https://cdn.pixabay.com/photo/2024/02/28/07/42/european-shorthair-8601492_640.jpg" alt="" class="w-[200px] h-[200px] rounded-full">
        <h4 class="h4 font-bold">{{"@" . $post->user_name}}</h4>
    </div>
</div>

