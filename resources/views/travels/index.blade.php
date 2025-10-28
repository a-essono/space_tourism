<x-layout_header>
    <x-slot:bg>
        bg_space
    </x-slot:bg>
    <main class="flex1">
        <section class="flex flex-col justify-center items-center px-4 text-center">
            <div class="max-w-xl w-full">
                <h3 class="text-[16px] leading-[19px] tracking-[2.7px] md:text-[20px] md:leading-[23px] md:tracking-[4.72px] 
        lg:text-[28px] lg:leading-[33px] lg:tracking-[4.72px] 
        text-[var(--white-25)] font-barlow  uppercase whitespace-nowrap 
        mb-6 m-16">
                    {{ __('messages.h3_home') }}
                </h3>

                <h1 class="text-[76px] md:text-[105px] leading-[95px] md:leading-[120px] lg:text-[150px] lg:leading-[171px] 
        font-bellefair text-[var(--white-25)] 
        mb-6">
                    {{ __('messages.h1_home') }}
                </h1>

                <p class="text-[15px] md:text-[16px] md:leading-[28px] leading-[25px] lg:text-[18px] lg:leading-[32px] 
        text-[var(--purple-25)] font-barlow whitespace-normal 
        mt-10 mb-10">
                    {{ __('messages.p_home') }}
                </p>
            </div>

            <div class="mt-20 mb-20">
                <button class="text-[20px] leading-[22px] tracking-[1.25px] md:text[32px] md:leading-[36px] 
        flex items-center justify-center rounded-full w-40 h-40 
            text-black bg-white font-bellefair whitespace-nowrap 
            shadow-none hover:shadow-[0_0_0_40px_rgba(255,255,255,0.1)] transition-all duration-300">
                    @php
                        $defaultPlanet = \App\Models\Planet::first();
                    @endphp
                    <a class="w-40 h-40 
            flex items-center justify-center rounded-full" href="{{ route(app()->getLocale() . '.planete', [$defaultPlanet->id]) }}"
                        alt="Explorer">{{ __('messages.btn_explore') }}</a>
                </button>
            </div>
        </section>
        <x-switch_lang />
    </main>
</x-layout_header>