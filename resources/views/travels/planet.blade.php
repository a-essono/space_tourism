<x-layout_header>
    <x-slot:bg>
        bg_planet
    </x-slot:bg>

    <main class="pt-[5vh] flex-1">
        <section class="text-center 
    flex-1 flex flex-col justify-center items-center lg:flex-row px-4">
            <section class="relative w-full max-w-4xl">
                <h2 class="text-(length:--titre5-mobile) leading-[19px] tracking-1 md:text-(length:--titre5-tablet) md:leading-[23px] md:tracking-3 
            lg:text-(length:--titre5-desktop) lg:leading-[33px] lg:tracking-4 text-[var(--white-25)] 
            uppercase font-barlow 
            md:text-start mb-6 mt-24 m-16">
                    <span class="opacity-25">01</span> {{ __('messages.h2_planet') }}
                </h2>
                <div class="relative mx-auto w-[170px] h-[170px] md:w-[300px] md:h-[300px] lg:w-[445px] lg:h-[445px] rounded-full overflow-hidden">
                    <!-- Planètes -->
                    <div class="absolute -left-[2.87px] -top-[2.87px] w-[175.73px] h-[175.73px]
                md:-left-[5px] md:-top-[5px] md:w-[310px] md:h-[310px]
                lg:-left-[7.5px] lg:-top-[7.5px] lg:w-[460px] lg:h-[460px] z-10">
                        <img src="{{ $planet->image_url }}" alt="{{ $planet->{'nom_' . app()->getLocale()} }}"
                            class="w-full h-full object-cover rounded-full">
                    </div>
                    <!-- Ombre floue -->
                    <div class="absolute left-[15.28px] top-[26.74px] w-[290.72px] h-[290.72px]
                md:left-[27px] md:top-[47px] md:w-[513px] md:h-[513px]
                lg:left-[40px] lg:top-[70px] lg:w-[761px] lg:h-[761px]
                bg-[#0b0d17] rounded-full filter blur-[25px] z-10 pointer-events-none">
                    </div>
                </div>
            </section>
            <section>
                <section>
                    <div class="max-w-xl w-full w-[337px] h-[54px] 
                flex items-center justify-center m-5">
                        <ul class="text-(length:--subtitle3-mobile) leading-[16px] tracking-2 md:text-(length:--subtitle2-tablet)] md:leading-[19px] md:tracking-1 
                    text-[var(--white-25)] uppercase whitespace-nowrap 
                    flex gap-6 mt-20">
                            <x-list_planet :planets="$planets" />
                            <!-- @include('components.list_planet', ['planets' => $planets]) -->
                        </ul>
                    </div>
                    <div class="max-w-xl w-full">
                        <h1 class="text-(length:--titre2-mobile) leading-[64px] md:text-(length:--titre2-tablet) md:leading-[91px] lg:text-(length:--titre2-desktop)lg:leading-[114px] 
                    font-bellefair text-[var(--white-25)] uppercase  
                    mt-10 mb-10">
                            {{ $planet->{'nom_' . app()->getLocale()}  }}
                        </h1>
                        <p class="text-(length:--text-mobile) leading-[25px] md:text-(length:--text-tablet) md:leading-[28px] lg:text-(length:--text-desktop) lg:leading-[32px] 
                    text-[var(--purple-25)] font-barlow whitespace-normal">
                            {{ $planet->{'description_' . app()->getLocale()} }}
                        </p>

                        <div class="flex items-center">
                            <!-- Ligne flexible sur la taille du parent -->
                            <div class="h-px 
                        bg-line 
                        flex flex-1 my-10 z-10"></div>
                        </div>
                    </div>
                </section>
                <section class="md:flex md:flex-row md:justify-around">
                    <div class="max-w-xl md:w-[300px] 
                mt-12 mb-12">
                        <p class="text-(length:--subtitle3-mobile) leading-[16px] tracking-2 
                    text-[var(--purple-25)] uppercase font-barlow">
                            {{ __('messages.distance') }}
                        </p>
                        <h2 class="text-(length:--subtitle1-desktop) leading-[32px] 
                        text-[var(--white-25)] uppercase font-bellefair whitespace-nowrap">
                            {{ $planet->{'distance_' . app()->getLocale()} }}
                        </h2>
                    </div>
                    <div class="max-w-xl md:w-[300px] 
                mt-12 mb-12 ">
                        <p
                            class="uppercase text-[var(--purple-25)] text-(length:--subtitle3-mobile) leading-[16px] tracking-2 font-barlow">
                            {{ __('messages.duration') }}
                        </p>
                        <h3
                            class="uppercase text-[var(--white-25)] text-(length:--subtitle1-desktop) leading-[32px] font-bellefair whitespace-nowrap">
                            {{ $planet->{'duree_' . app()->getLocale()} }}
                        </h3>
                    </div>
                </section>
            </section>
        </section>
        <x-switch_lang />
    </main>
</x-layout_header>