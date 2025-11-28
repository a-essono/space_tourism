<x-layout_header>
    <x-slot:bg>
        bg_crew
    </x-slot:bg>
    <main class="pt-[5vh] flex-1">
        <h3 class=" text-(length:--titre5-mobile) leading-[19px] tracking-1 md:text-(length:--titre5-tablet) md:leading-[23px] 
        md:tracking-3 lg:text-(length:--titre5-desktop) lg:leading-[33px] lg:tracking-4
        text-[var(--white-25)] font-barlow uppercase text-center md:text-start whitespace-nowrap lg:w-[50vh] m-16">
            <span class="font-bold opacity-25">02</span> {{ __('messages.h3_crew') }}
        </h3>
        <section class="text-center lg:text-start
        flex flex-col justify-center items-center 
        md:flex-col-reverse lg:flex-row-reverse lg:justify-between px-4 lg:ml-12">
            <section class="max-w-xl w-full ">
                <div class="relative 
                    w-full max-w-[327px] aspect-[327/223.1]
                    md:max-w-[411.45px] md:aspect-[411.45/572]
                    lg:max-w-[411.45px] lg:aspect-[411.45/572]
                    mx-auto">
                    <!-- Équipage -->
                    <img src="{{ $crew->image_url }}"
                        alt="{{ $crew->{'role_' . app()->getLocale()} . ' ' . $crew->name }}" class="absolute 
                        left-[26.9%] w-[48.8%] h-[99.5%]
                        md:left-0 md:w-full md:h-full
                        lg:left-0 lg:w-full lg:h-full
                        object-contain">
                </div>
                <div class="flex items-center md:hidden">
                    <!-- Ligne flexible sur la taille du parent -->
                    <div class="h-px 
                        bg-line 
                        flex flex-1 z-10">
                    </div>
                </div>
            </section>
            <section class="max-w-xl w-full 
                    md:flex md:flex-col-reverse  lg:items-start lg:justify-start">
                <div class="w-[337px] h-[54px] max-w-xl w-full 
                    flex items-center justify-center lg:justify-start  m-5">
                    <ul class=" whitespace-nowrap 
                        flex gap-6">
                        <x-list_crew :crews="$crews" />
                    </ul>
                </div>
                <div class="">
                    <h1 class="text-(length:--titre5-mobile) leading-[18px] md:text-(length:--titre5-tablet) md:leading-[27px] lg:text-(length:--titre5-desktop) lg:leading-[36px] 
                        font-bellefair  uppercase text-[var(--gray-25)] mb-3 ">
                        <span class="font-bold opacity-25">{{ str_pad($indexCount, 2, '0', STR_PAD_LEFT) }}</span>
                        {{ $crew->{'role_' . app()->getLocale()} }}
                    </h1>
                    <h2 class="text-(length:--titre3-mobile) leading-[27px] md:text-(length:--titre3-tablet) md:leading-[45px] lg:text-(length:--titre3-desktop) lg:leading-[64px] 
                        font-bellefair text-[var(--white-25)] uppercase whitespace-nowrap mb-6">
                        <!-- Douglas <span class="lg:hidden">Hurley</span> -->
                        {{ $crew->nom_split['prenom'] }}
                        <span class="lg:hidden">{{ $crew->nom_split['nom'] }}</span>
                    </h2>
                    <p class="text-[var(--purple-25)] font-barlow text-(length:--text-mobile) leading-[25px] md:text-(length:--text-tablet) 
                        md:leading-[28px] lg:text-(length:--text-desktop) lg:leading-[32px] whitespace-normal
                        lg:max-w-[clamp(300px,50vw,700px)] max-w-xl">
                        {{ $crew->{'description_' . app()->getLocale()} }}
                    </p>
                </div>
            </section>
        </section>
        <x-switch_lang />
</x-layout_header>