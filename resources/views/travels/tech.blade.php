<x-layout_header>
    <x-slot:bg>
        bg_tech
    </x-slot:bg>
    <main class="flex-1">
        <h2 class="text-(length:--titre5-mobile) leading-[19px] tracking-1 md:text-(length:--titre5-tablet) md:leading-[23px] md:tracking-3 
        lg:text-(length:--titre5-desktop) lg:leading-[33px] lg:tracking-4 
        text-[var(--white-25)] font-barlow uppercase 
        text-center lg:text-start mb-6 m-16">
            <span class="opacity-25 font-bold">03</span> {{ __('messages.h2_tech') }}
        </h2>
        <section class="text-center 
        flex flex-col justify-center items-center lg:flex-row-reverse lg:justify-around ">
            <section class="w-full lg:w-auto">
                <div class=" w-full 
                    h-[45vw] max-h-[170px]    
                    sm:h-[40vw] sm:max-h-[310px]  
                    lg:w-[35vw] lg:h-[40vw] lg:max-h-[527px]">
                    <img src="{{ $technology->image_url }}" alt="{{ $technology->{'nom_' . app()->getLocale()} }}"
                        class=" inset-0 w-full h-full object-cover
                            object-[center_80%]
                            sm:object-[center_65%]
                            lg:object-center">
                </div>
            </section>
            <section class=" lg:text-start 
            lg:flex lg:flex-row lg:items-start lg:w-full">
                <div class="max-w-xl w-full lg:w-[70px] h-[54px] 
                flex items-center lg:flex-shrink=0 lg:items-start justify-center 
                mt-5 mb-5 md:mt-15 md:mb-15 lg:left-0 lg:top-0 lg:pl-20">
                    <ul class="text-(length:--titre4-mobile) leading-[16px] tracking-2 md:text-(length:--titre4-tablet) md:leading-[19px] md:tracking-1 lg:text-(length:--titre4-desktop)
                    text-[var(--white-25)] uppercase whitespace-nowrap 
                    flex lg:block lg:-mt-22">
                        <x-list_tech :technologies="$technologies" />
                    </ul>
                </div>
                <div class="w-full  
                lg:pl-20 mr-5">
                    <h3 class="text-(length:--subtitle3-mobile) leading-[16px] tracking-2 md:text-(length:--subtitle2-tablet) md:leading-[19px] md:tracking-1 
                    text-[var(--purple-25)] font-barlow uppercase whitespace-nowrap 
                    mt-10 mb-5 md:mt-20 md:mb-10">
                        {{ __('messages.h3_tech') }}
                    </h3>
                    <h1 class="text-(length:--titre3-mobile) leading-[27px] md:text-(length:--titre3-tablet) md-leading-[45px] lg:text-(length:--titre3-desktop) lg:leading-[64px] 
                    text-[var(--white-25)] font-bellefair uppercase whitespace-nowrap 
                    mb-6">
                    <span class="font-bold opacity-25">{{ str_pad($indexCount, 2, '0', STR_PAD_LEFT) }}</span>
                        {{ $technology->{'nom_' . app()->getLocale()} }}
                    </h1>
                    <p class="text-(length:--text-mobile) leading-[25px] md:text-(length:--text-tablet) md:leading-[28px] lg:text-(length:--text-desktop) lg:leading-[32px] 
                    text-[var(--purple-25)] font-barlow whitespace-normal 
                    lg:max-w-[clamp(300px,50vw,700px)] max-w-xl">
                        {{ $technology->{'description_' . app()->getLocale()} }}
                    </p>
                </div>
            </section>

        </section>
        <!-- <div class="w-full flex justify-end p-5"> -->
        <x-switch_lang />
        <!-- </div> -->

</x-layout_header>