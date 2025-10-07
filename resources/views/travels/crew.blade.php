<x-layout_header>
    <x-slot:bg>
        bg_crew
    </x-slot:bg>
    <main class="flex-1 ">
        <h3 class=" text-[16px] leading-[19px] tracking-[2.7px] md:text[20px] md:leading-[23px] 
        md:tracking-[3.38px] lg:text[28px] lg:leading-[33px] lg:tracking-[4.72]
        text-[var(--white-25)] font-barlow uppercase text-center md:text-start  lg:w-[50vh] m-16">
            <span>02</span> Rencontrez l'équipage
        </h3>
        <section class="text-center lg:text-start
        flex flex-col justify-center items-center 
        md:flex-col-reverse lg:flex-row-reverse lg:justify-between px-4 lg:ml-12">
            <section class="max-w-xl w-full ">
                <div class="   
                max-w-xl w-full flex items-center justify-center">
                    <img class="w-[159.69px] h-[222px] md:w-[411.45px] md:h-[572px] lg:w-[512.15px] lg:h-[712px] 
                    lg:-mt-24"
                        src="{{ asset('build/images/commander.png') }}" alt="Le commandant Douglas Hurley">
                </div>
                <div class="flex items-center md:hidden">
                    <!-- Ligne flexible sur la taille du parent -->
                    <div class="h-px 
                    bg-line 
                    flex flex-1 z-10"></div>
                </div>
            </section>
            <section class="max-w-xl w-full 
            md:flex md:flex-col-reverse  lg:items-start lg:justify-start">
                <div class="w-[337px] h-[54px] max-w-xl w-full 
                flex items-center justify-center lg:justify-start  m-5">
                    <ul class="text-[14px] leading-[16px] tracking-[2.36px] md:text[16px] md:leading-[19px] md:tracking-[2.7px] 
                    text-[var(--white-25)] uppercase whitespace-nowrap 
                    flex gap-6">
                        <x-list_crew />
                    </ul>
                </div>
                <div class="">
                    <h1 class="text-[16px] leading-[19px] tracking-[2.7px] md:text-[24px] md:leading-[27px] lg:text-[32px] lg:leading-[36px] 
                    font-bellefair  uppercase text-[var(--gray-25)] mb-3 ">COMMANDANT</h1>
                    <h2 class="text-[56px] md:text-8xl leading-[64px] md:text[80px] md:leading-[91px] lg:text[100px] lg:leading-[114px] 
                    font-bellefair text-[var(--white-25)] whitespace-nowrap mb-6">
                        Douglas Hurley
                    </h2>
                    <p class="text-[var(--purple-25)] font-barlow text-[15px] leading-[25px] md:text[16px] 
                        md:leading-[28px] lg:text[18px] lg:leading-[32px] whitespace-normal">
                        Douglas Gerald Hurley est un ingénieur américain, un ancien pilote du Coprs des Marines
                        et un ancien astronaute de la NASA. Il s'est lancé dans l'espace pour la troisième fois
                        en tant que commandant du vaissaux Crew Dragon Demo-2.
                    </p>
                </div>
            </section>
        </section>
</x-layout_header>