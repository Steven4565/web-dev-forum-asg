<x-app-layout>
    <div class="border-black border p-8 my-10">
        <form action="{{route('explore.store')}}" method="post" enctype="multipart/form-data" class="flex flex-col gap-2">
            @csrf
            <div>
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Post Image</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Post Title</label>
                <input id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary1 focus:border-primary1 block w-full p-2.5" placeholder="Write your title here..." required />
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary1 focus:border-primary1" placeholder="Write your thoughts here..."></textarea>
            </div>
            <button type="submit" class="text-primary1 font-bold bg-primary2 focus:ring-4 focus:outline-none focus:ring-primary1 rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Publish</button>
        </form>

    </div>
</x-app-layout>
