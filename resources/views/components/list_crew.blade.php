@foreach ($crews as $c)
<li>
    <a href="{{ route(app()->getLocale().'.equipage', [$c->id]) }}" class="w-[10px] h-[10px] md:h-[10.09px] lg:w-[15px] lg:h-[15px] 
        bg-gray-25 
        block rounded-full 
        {{ Route::currentRouteName() === app()->getLocale() . '.equipage' && request()->route('crew')->id == $c->id ? 'bg-white-25' : 'hover:bg-white-25' }}">
    </a>
</li>
@endforeach

