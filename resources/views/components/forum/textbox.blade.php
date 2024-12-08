@props(['post_id'])

<form action="{{route('comment.store')}}" method="post">
    @csrf
    <input type="hidden" name="forum_post_id" value={{$post_id}}>
    <div class="flex flex-col  items-end">
        <div class="mb-3 w-full">
            <textarea name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary1 focus:border-primary1" placeholder="Write your thoughts here..."></textarea>
        </div>
        <button type="submit" class="text-primary1 font-bold bg-primary2 focus:ring-4 focus:outline-none focus:ring-primary1 rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Comment</button>
    </div>
</form>
