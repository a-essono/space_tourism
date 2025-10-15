<?php
    use Illuminate\Support\Facades\App;

if (!function_exists('localizedUrlInline')){
    

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
}
     
