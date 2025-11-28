<x-layout_header>
    <x-slot:bg>
        bg_space
    </x-slot:bg>
    <main class="pt-[10vh] flex1">
        <section class="flex flex-col justify-center items-center px-4 text-center lg:text-start lg:flex-row lg:justify-around lg:ml-30px">
            <div class="max-w-xl w-full">
                <h3 class="text-(length:--titre5-mobile) leading-[19px] tracking-2.7 md:text-(length:--titre5-tablet) md:leading-[23px] md:tracking-4.72 
        lg:text-(length:--titre5-desktop) lg:leading-[33px] lg:tracking-4.72 
        text-[var(--white-25)] font-barlow  uppercase whitespace-nowrap 
        mb-6 m-16 lg:mb-0 lg:m-0">
                    {{ __('messages.h3_home') }}
                </h3>

                <h1 class="text-(length:--titre1-mobile) md:text-(length:--titre1-tablet) leading-[95px] md:leading-[120px] lg:text-(length:--titre1-desktop) lg:leading-[171px] 
        font-bellefair text-[var(--white-25)] uppercase
        mb-6">
                    {{ __('messages.h1_home') }}
                </h1>

                <p class="text-(length:--text-mobile) md:text-(length:--text-tablet) md:leading-[28px] leading-[25px] lg:text-(length:--text-desktop) lg:leading-[32px] 
        text-[var(--purple-25)] font-barlow whitespace-normal 
        mt-10 mb-10">
                    {{ __('messages.p_home') }}
                </p>
            </div>

            <div class="mt-20 mb-20">
                <button class="text-(length:--explorer-mobile) leading-[22px] md:text-(length:--explorer-desktop) md:leading-[36px] 
        flex items-center justify-center rounded-full w-[274px] h-[274px]
            text-black bg-white font-bellefair whitespace-nowrap 
            shadow-none hover:shadow-[0_0_0_40px_rgba(255,255,255,0.1)] transition-all duration-300">
                    <a class="w-[274px] h-[274px] 
            flex items-center justify-center rounded-full" href="{{ route(app()->getLocale() . '.planete', [$defaultPlanet->id]) }}"
                        alt="Explorer">{{ __('messages.btn_explore') }}</a>
                </button>
            </div>
        </section>
        <x-switch_lang />
    </main>
</x-layout_header>