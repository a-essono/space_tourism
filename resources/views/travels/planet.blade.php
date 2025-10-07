<x-layout_header>
    <x-slot:bg>
        bg_planet
    </x-slot:bg>
    <main class="text-center 
    flex-1 flex flex-col justify-center items-center lg:flex-row px-4">
        <section class="w-full max-w-4xl">
            <h3 class="text-[16px] leading-[19px] tracking-[2.7px] md:text-[20px] md:leading-[23px] md:tracking-[3.38px] 
            lg:text[28px] lg:leading-[33px] lg:tracking-[4.72] text-[var(--white-25)] 
            uppercase font-barlow 
            md:text-start mb-6 m-16">
                <span>01</span> Choisissez votre destination
            </h3>
            <div class="mx-auto w-[170px] h-[170px] md:w-[300px] md:h-[300px] lg:w-[515px] lg:h-[527px] 
            flex items-center justify-center">
                <img src="{{ asset('build/images/moon.png') }}" alt="La lune" class="w-full h-full object-contain">
            </div>
        </section>
        <section>
            <section>
                <div class="max-w-xl w-full w-[337px] h-[54px] 
                flex items-center justify-center m-5">
                    <ul class="text-[14px] leading-[16px] tracking-[2.36px] md:text[16px] md:leading-[19px] md:tracking-[2.7px] 
                    text-[var(--white-25)] uppercase whitespace-nowrap 
                    flex gap-6 ">
                        <x-list_planet/>
                    </ul>
                </div>
                <div class="max-w-xl w-full">
                    <h1 class="text-[56px] leading-[64px] md:text[80px] md:leading-[91px] lg:text[100px] lg:leading-[114px] 
                    font-bellefair text-[var(--white-25)] 
                    mb-6">
                        Lune
                    </h1>
                    <p class="text-[15px] leading-[25px] md:text[16px] md:leading-[28px] lg:text[18px] lg:leading-[32px] 
                    text-[var(--purple-25)] font-barlow whitespace-normal">
                        Voyez notre planète comme vous ne l'avez jamais vue auparavant.
                        Un parfait voayage de détente pour vous aider à prendre du recul et revenir requinquer.
                        Pendant que vous y êtes, plangez-vous dans l'histoire en visitant les sites d'atterrissage de
                        Luna 2
                        et Apollo 11.
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
                    <p class="text-[14px] leading-[16px] tracking-[2.36] 
                    text-[var(--purple-25)] uppercase font-barlow">
                        DISTANCE</p>
                    <h2
                        class="text-[28px] leading-[32px] 
                        text-[var(--white-25)] uppercase font-bellefair whitespace-nowrap">
                        384 000 km</h2>
                </div>
                <div class="max-w-xl md:w-[300px] 
                mt-12 mb-12 ">
                    <p class="uppercase text-[var(--purple-25)] text-[14px] leading-[16px] tracking-[2.36] font-barlow">
                        Durée</p>
                    <h2
                        class="uppercase text-[var(--white-25)] text-[28px] leading-[32px] font-bellefair whitespace-nowrap">
                        3 jours</h2>
                </div>
            </section>
        </section>
    </main>
</x-layout_header>