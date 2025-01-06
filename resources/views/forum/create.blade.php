<x-app-layout>
    <div class="border-black border p-8 my-10">
        <form action="{{route('forum.store')}}" method="post" class="flex flex-col gap-2">
            @csrf
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Select a category</label>
                <input name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary1 focus:border-primary1 block w-full p-2.5" placeholder="Write your category here..." required >
            </div>
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Forum Post Title</label>
                <input name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary1 focus:border-primary1 block w-full p-2.5" placeholder="Write your title here..." required />
            </div>
            <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
            <div class="mb-6">
                <textarea name="content" id="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary1 focus:border-primary1" placeholder="Write your thoughts here..."></textarea>
            </div>
            <button type="submit" class="text-primary1 font-bold bg-primary2 focus:ring-4 focus:outline-none focus:ring-primary1 rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Publish</button>
        </form>

    </div>
</x-app-layout>
