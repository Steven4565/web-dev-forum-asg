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
                Introduce Your Product Quickly & Effectively
            </h1>
            <p class="text-primary-1 mb-4">Lorem ipsum</p>
            <x-button-fill text="Explore Now" url="/login" class="px-10" />
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
        <div class="px-10 text-right mt-[50%]">
            <h1 class="text-primary1 font-medium text-[50px] leading-[66px] tracking-[1px] mb-2 max-w-[600px] ml-auto">
                Introduce Your Product Quickly & Effectively
            </h1>
            <p class="text-primary-1 mb-4 max-w-[600px] ml-auto">Lorem ipsum</p>
            <x-button-fill text="Purchase UI Kit" url="/login" class="px-10" />
        </div>
    </div>
</x-app-layout>