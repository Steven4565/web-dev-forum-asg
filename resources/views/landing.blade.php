<x-app-layout>
    <div class="blob-container">
        <div class="absolute -top-[30%] right-0 -z-10 w-3/4">
            <img src="{{ asset('landingpage/Blob1.svg') }}" alt="blob-1" class="w-full">
            <div class="absolute top-[30%] right-[20%] -z-9 ">
                <img src="{{ asset('landingpage/Girl1.svg') }}" alt="girl1-1" class="w-full">
            </div>
        </div>
    </div>

    <div class="w-5/6 mx-auto">
        <div class="px-10 text-left mt-[20%]">
            <h1 class="text-primary1 font-medium text-[50px] leading-[66px] tracking-[1px] mb-2 max-w-[600px]">
                Empower Women, Empower the Future
            </h1>
            <p class="text-primary-1 mb-4">
                Join us in creating a world where every voice matters, and every opportunity is equal.
            </p>
        </div>
    </div>

    <div class="blob-container">
        <div class="absolute left-0 -z-10 w-3/4 mt-[10%]">
            <img src="{{ asset('landingpage/Blob2.svg') }}" alt="blob-1" class="w-full">
            <div class="absolute top-[30%] left-[30%] -z-9">
                <img src="{{ asset('landingpage/Girl2.svg') }}" alt="girl1-1" class="w-full">
            </div>
        </div>
    </div>

    <div class="w-5/6 mx-auto">
        <div class="px-10 text-right mt-[50%] mb-[50%]">
            <h1 class="text-primary1 font-medium text-[50px] leading-[66px] tracking-[1px] mb-2 max-w-[600px] ml-auto">
                Building Bridges for Gender Equality
            </h1>
            <p class="text-primary-1 mb-4 max-w-[600px] ml-auto">
                Supporting initiatives that inspire and empower women across the globe
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bottom-0 left-0 w-full py-8 border-t border-gray-300">
        <div class="w-5/6 mx-auto text-center">
            <nav class="flex justify-center space-x-8 mb-4 text-pink-500">
                <a href="#" class="hover:underline">Home</a>
                <a href="#" class="hover:underline">About</a>
                <a href="#" class="hover:underline">Contact</a>
            </nav>
            <p class="text-sm text-gray-500 mb-4">©2024 UwawaUwa</p>
            <div class="flex justify-center space-x-4">
                <a href="#" aria-label="Facebook" class="text-pink-500 hover:text-pink-700">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" aria-label="LinkedIn" class="text-pink-500 hover:text-pink-700">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" aria-label="Twitter" class="text-pink-500 hover:text-pink-700">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" aria-label="YouTube" class="text-pink-500 hover:text-pink-700">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="#" aria-label="Instagram" class="text-pink-500 hover:text-pink-700">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </footer>


</x-app-layout>
