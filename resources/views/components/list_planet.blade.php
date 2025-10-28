@foreach ($planets as $p)
    <li>
        <a href="{{ route(app()->getLocale() . '.planete', [$p->id]) }}" class="pb-1 border-b-2 border-transparent transition
            {{ Route::currentRouteName() === app()->getLocale() . '.planete' && request()->route('planet')->id == $p->id ? 'border-white' : 'hover:border-white' }} ">
            {{ $p->{'nom_' . app()->getLocale()} }}
        </a>
    </li>
@endforeach

