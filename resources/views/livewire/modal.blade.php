<div>
    @if ($isOpen)
        <!-- Modal Overlay -->
        <div class="fixed inset-0 z-40 bg-black bg-opacity-50"></div>

        <!-- Modal Content -->
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <!-- Modal Header -->
                <div class="flex justify-end">
                    <button wire:click="closeModal" 
                            class="text-gray-400 hover:text-gray-900 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="text-center">
                    <img src="{{ $imageSrc }}" alt="Modal Image" class="w-full h-auto rounded-lg mb-4">
                    <p class="text-gray-700">{{ $description }}</p>
                </div>
            </div>
        </div>
    @endif
</div>
