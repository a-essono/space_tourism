@php
    use Illuminate\Support\Facades\App;

     $currentLocale = App::getLocale();

    function localizedUrlInline($targetLocale) {
        
        $currentLocale = App::getLocale();

        // Charge les traductions actuelles et cibles
        $currentTranslations = trans('messages', [], $currentLocale);
        $targetTranslations = trans('messages', [], $targetLocale);

        $segments = request()->segments(); // ['fr', 'voyages', 'planete']

        if (!empty($segments) && in_array($segments[0], ['en', 'fr'])) {
            $segments[0] = $targetLocale; // change le préfixe
        } else {
            array_unshift($segments, $targetLocale);
        }

        // Traduire les segments restants
        foreach ($segments as $index => $segment) {
            // Cherche la clé qui correspond à ce segment dans la locale actuelle
            $key = array_search($segment, $currentTranslations);
            if ($key && isset($targetTranslations[$key])) {
                $segments[$index] = $targetTranslations[$key];
            }
        }

        return url(implode('/', $segments));
    }
@endphp

<section class="w-full flex justify-end p-5">
    <div class="lang-selector" style="display: flex; gap: 10px; align-items: center;">
        {{-- GB / English --}}
        @if ($currentLocale !== 'en')
            <p class="text-sm md:text-base lg:text-lg text-[var(--purple-25)] font-barlow">English version</p>
            <a href="{{ localizedUrlInline('en') }}" title="English" aria-label="Switch to English">
                <svg class="w-6 sm:w-8 md:w-10 h-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 30">
                    <clipPath id="s">
                        <path d="M0,0 v30 h60 v-30 z" />
                    </clipPath>
                    <clipPath id="t">
                        <path d="M30,15 h30 v15 h-30 z M0,0 h30 v15 h-30 z" />
                    </clipPath>
                    <g clip-path="url(#s)">
                        <path d="M0,0 v30 h60 v-30 z" fill="#012169" />
                        <path d="M0,0 L60,30 M60,0 L0,30" stroke="#fff" stroke-width="6" />
                        <path d="M0,0 L60,30 M60,0 L0,30" stroke="#c8102e" stroke-width="4" clip-path="url(#t)" />
                        <path d="M30,0 v30 M0,15 h60" stroke="#fff" stroke-width="10" />
                        <path d="M30,0 v30 M0,15 h60" stroke="#c8102e" stroke-width="6" />
                    </g>
                </svg>
            </a>
        @endif

        {{-- FR / Français --}}
        @if ($currentLocale !== 'fr')
            <p class="text-sm md:text-base lg:text-lg text-[var(--purple-25)] font-barlow">Version française</p>
            <a href="{{ localizedUrlInline('fr') }}" title="Français" aria-label="Passer en français">
                <svg class="w-6 sm:w-8 md:w-10 h-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3 2">
                    <rect width="1" height="2" x="0" fill="#0055A4" />
                    <rect width="1" height="2" x="1" fill="#ffffff" />
                    <rect width="1" height="2" x="2" fill="#EF4135" />
                </svg>
            </a>
        @endif
    </div>
</section>