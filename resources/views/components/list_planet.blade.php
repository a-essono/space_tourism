<li>
    <a href="{{ route('planete', ['locale' => app()->getLocale()] ) }}"
        class="pb-1 border-b-2 border-transparent transition
        {{ Route::currentRouteName() === 'planete' ? 'border-white' : 'hover:border-white' }} ">
        LUNE
    </a>
</li>
<li> <!-- Definir la bonne route à la place de celle là href="{{ route('equipage', ['locale' => app()->getLocale()]) }} -->
    <a href="{{ route('planete', ['locale' => app()->getLocale()]) }}" class="pb-1 border-b-2 border-transparent transition
        {{ Route::currentRouteName() === '' ? 'border-white' : 'hover:border-white' }} ">
        EUROPA
    </a>
</li>
<li> <!-- Definir la bonne route à la place de celle là href="{{ route('equipage', ['locale' => app()->getLocale()]) }} -->
    <a href="{{ route('planete', ['locale' => app()->getLocale()]) }}"
        class="pb-1 border-b-2 border-transparent transition
        {{ Route::currentRouteName() === 'border-white' ? 'hover:border-white' : 'hover:border-white' }} ">
        MARS
    </a>
</li>
<li> <!-- Definir la bonne route à la place de celle là href="{{ route('equipage', ['locale' => app()->getLocale()]) }} -->
    <a href="{{ route('planete', ['locale' => app()->getLocale()]) }}"
        class="pb-1 border-b-2 border-transparent transition
        {{ Route::currentRouteName() === 'border-white' ? 'hover:border-white' : 'hover:border-white' }} ">
        TITAN
    </a>
</li>