<x-layout_header>
    <x-slot:bg>
        bg_tech
    </x-slot:bg>
    <main class="flex-1">
        <h2 class="text-[16px] leading-[19px] tracking-[2.7px] md:text-[20px] md:leading-[23px] md:tracking-[3.38px] 
        lg:text-[28px] lg:leading-[33px] lg:tracking-[4.72] 
        text-[var(--white-25)] font-barlow uppercase 
        text-center lg:text-start mb-6 m-16">
            <span class="opacity-25">03</span> {{ __('messages.h2_tech') }}
        </h2>
        
        <section class="text-center 
        flex flex-col  justify-center items-center lg:flex-row-reverse lg:justify-around ">
            <section>
                <div class="w-screen h-[300px] lg:w-[515px] lg:h-[527px] 
                overflow-hidden">
                    <img src="{{ $technology->image }}" alt="{{$technology->{'nom_' . app()->getLocale()} }}"
                        class="w-full h-full 
                        object-cover object-[center_80%] lg:object-[center]" />
                </div>
            </section>
            <section class=" lg:text-start 
            lg:flex lg:flex-row lg:items-start lg:w-full">
                <div class="max-w-xl w-full lg:w-[70px] h-[54px] 
                flex items-center lg:flex-shrink=0 lg:items-start justify-center 
                mt-5 mb-5 md:mt-15 md:mb-15 lg:left-0 lg:top-0 lg:pl-20">
                    <ul class="text-[14px] leading-[16px] tracking-[2.36px] md:text[16px] md:leading-[19px] md:tracking-[2.7px] 
                    text-[var(--white-25)] uppercase whitespace-nowrap 
                    flex lg:block lg:-mt-22">
                        <x-list_tech :technologies="$technologies"/>
                    </ul>
                </div>
                <div class="w-full  
                lg:pl-20 mr-5">
                    <h3 class="text-[14px] leading-[16px] tracking-[2.36px] md:text[16px] md:leading-[19px] md:tracking-[2.7px] 
                    text-[var(--purple-25)] font-barlow uppercase whitespace-nowrap 
                    mt-10 mb-5 md:mt-20 md:mb-10">
                        {{ __('messages.h3_tech') }}
                    </h3>
                    <h1 class="text-[56px] md:text-[40px] leading-[64px] lg:text-[100px] lg:leading-[114px] 
                    text-[var(--white-25)] font-bellefair uppercase whitespace-nowrap 
                    mb-6">
                        {{ $technology->{'nom_' . app()->getLocale()} }}
                    </h1>
                    <p class="text-[15px] leading-[25px] md:text-[16px] md:leading-[28px] lg:text-[18px] lg:leading-[32px] 
                    text-[var(--purple-25)] font-barlow whitespace-normal 
                    lg:max-w-[clamp(300px,50vw,700px)] max-w-xl">
                        {{ $technology->{'description_' . app()->getLocale()} }}
                    </p>
                </div>
            </section>
            
        </section>
        <!-- <div class="w-full flex justify-end p-5"> -->
            <x-switch_lang/>
        <!-- </div> -->
       
</x-layout_header>