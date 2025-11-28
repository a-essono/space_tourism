<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Tourism</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- <link href="https://fonts.googleapis.com/css2?family=Bellefair&display=swap" rel="stylesheet"> -->
</head>

<body class="{{ $bg }} min-w-[349px] overflow-x-auto 
font-normal">
    <header class="header 
    h-[10vh] px-5 xs:mr-5 
    flex items-center justify-between">
        <div class="m-5 lg:mt-24 lg:pl-1.5">
            <img src="{{ asset('build/images/logo.png') }}" alt="logo" class="logo min-w-[48px] min-h-[48px]">
        </div>
        <!-- fixed à la place de flex flex1 qui prend toute la taille que lui laisse les autres éléments mais peu mobile -->
        <div class="h-px 
            bg-line 
            hidden lg:block flex-1 z-10 my-4 -mb-15"></div>


        <div class="hamburger md:w-[500px] lg:w-[700px] md:h-[96px]
        shrink-0 
        md:flex p-5 lg:p-15 lg:mt-8 lg:pr-28">
            <button class="h-10 w-10 
            text-[var(--white-25)] md:hidden 
            bg-[url(http://space_tourism.test/public/build/images/hamburger.svg)] 
            bg-no-repeat bg-center bg-contain" id="svgbtn">
            </button>
            <nav class="nav md:w-[500px] lg:w-[830px] md:h-[96px] 
            top-0 right-0 absolute md:bg-white/5 md:backdrop-blur-[15px]             
            flex justify-end items-center p-5 lg:p-15 lg:mt-8 lg:pr-28">
                <ul class="text-[14px] leading-[16px] lg:text-[16px] lg:leading-[19px] tracking-[2.36px] lg:tracking-[2.7px] 
                text-[var(--white-25)] font-barlow uppercase whitespace-nowrap
                md:flex list-none hidden gap-4">
                    
                    <li
                        class="pb-7.5 border-b-3 transition mt-10 
                    {{ Route::currentRouteName() === 'accueil' ? 'border-white' : 'border-transparent hover:border-white' }}">
                        <a href="{{ route(app()->getLocale() . '.accueil') }}" alt="Accueil">
                            <span class="hidden opacity-25 lg:inline font-bold">00</span> {{ __('messages.home') }}
                        </a>
                    </li>

                    <li
                        class="pb-7.5 border-b-3 transition mt-10 
                    {{ Route::currentRouteName() === 'planete' ? 'border-white' : 'border-transparent hover:border-white' }}">
                        <a href="{{ route(app()->getLocale() . '.planete', [$defaultPlanet->id]) }}" alt="Destination">
                            <span class="hidden opacity-25 lg:inline font-bold">01</span> {{ __('messages.destination') }}
                        </a>
                    </li>
                    <li
                        class="pb-7.5 border-b-3 transition mt-10 
                    {{ Route::currentRouteName() === 'equipage' ? 'border-white' : 'border-transparent hover:border-white' }}">
                        <a href="{{ route(app()->getLocale() . '.equipage', [$defaultCrew->id]) }}" alt="Equipage">
                            <span class="hidden opacity-25 lg:inline font-bold">02</span> {{ __('messages.crew') }}
                        </a>
                    </li>
                    <li
                        class="pb-7.5 border-b-3 transition mt-10 
                    {{ Route::currentRouteName() === 'technologie' ? 'border-white' : 'border-transparent hover:border-white' }}">
                        <a href="{{ route(app()->getLocale() . '.technologie', [$defaultTech->id]) }}"
                            alt="Technologie">
                            <span class="hidden opacity-25 lg:inline font-bold">03</span> {{ __('messages.technology') }}
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    {{ $slot }}
</body>

</html>