<x-layouts.app>
    <div class="border-black border p-8 my-10">
        {{-- TODO:  --}}
        <form action="" method="post" class="flex flex-col gap-2">
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Select a category</label>
                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary1 focus:border-primary1 block w-full p-2.5">
                    <option selected>Choose a category</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                </select>
            </div>
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Forum Post Title</label>
                <input type="number" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary1 focus:border-primary1 block w-full p-2.5" placeholder="Write your title here..." required />
            </div>
            <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
            <div class="mb-6">
                <textarea id="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary1 focus:border-primary1" placeholder="Write your thoughts here..."></textarea>
            </div>
            <button type="submit" class="text-primary1 font-bold bg-primary2 focus:ring-4 focus:outline-none focus:ring-primary1 rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Publish</button>
        </form>

    </div>
</x-layouts.app>
