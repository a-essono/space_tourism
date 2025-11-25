<?php

namespace App\Support;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Models\Planet;
use App\Models\Technology;
use App\Models\Crew;

class AppHelpers
{
    /**
     * Enregistre toutes les directives Blade et variables globales
     */
    public static function boot()
    {
        // 1. Directive Blade pour uc(upper case) first(première lettre) avec accents Illuminate..Blade
        Blade::directive('ucfirstLang', function ($expression) {
            return "<?php echo mb_strtoupper(mb_substr($expression, 0, 1)) . mb_strtolower(mb_substr($expression, 1)); ?>";
        });

        // 2. Variable globales pour toutes les vues Illuminate...View
        View::composer('*', function ($view) {
            $view->with('userAccess', self::analyzeUserAccess());
        });

        // Partage les éléments par défaut pour toutes les vues
        View::composer('*', function ($view) {
            $defaultPlanet = cache()->remember('defaultPlanet', 60, fn() => Planet::first());
            $defaultCrew = cache()->remember('defaultCrew', 60, fn() => Crew::first());
            $defaultTech = cache()->remember('defaultTech', 60, fn() => Technology::first());

            $view->with([
                'defaultPlanet' => $defaultPlanet,
                'defaultCrew' => $defaultCrew,
                'defaultTech' => $defaultTech,
            ]);
        });
    }

    /**
     * Helper global pour analyser les rôles / permissions
     */
    public static function analyzeUserAccess()
    {
        $user = auth()->user();
        if (!$user) {
            return [
                'role_suffixes' => collect(),
                'types' => collect(),
                'multiple_types' => false,
            ];
        }

        // RÔLES (suffixes)
        $roleSuffixes = $user->getRoleNames()
            ->map(function ($role) {
                return strpos($role, '_') !== false ? explode('_', $role)[1] : $role;
            })
            ->unique();

        // PERMISSIONS (ex: "planet.view" → "planet")
        $types = $user->getAllPermissions()
            ->map(function ($permission) {
                return explode('.', $permission->name)[0];
            })
            ->unique();

        return [
            'role_suffixes' => $roleSuffixes,
            'types' => $types,
            'multiple_types' => $types->count() > 1,
        ];
    }

}
