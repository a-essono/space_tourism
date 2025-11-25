<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

if (!function_exists('localizedUrlInline')) {
    function localizedUrlInline($targetLocale)
    {
        $currentRouteName = Route::currentRouteName(); // ex: fr.equipage
        $currentRouteParams = Route::current()->parameters(); // ['crew' => 1]

        // Remplacer le préfixe de langue dans le nom de route
        $targetRouteName = preg_replace('/^(fr|en)\./', $targetLocale . '.', $currentRouteName);

        // Générer l’URL via route() pour garder les paramètres dynamiques
        if (Route::has($targetRouteName)) {
            return route($targetRouteName, $currentRouteParams);
        }

        // fallback
        return url($targetLocale);
    }
}
