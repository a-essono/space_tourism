@foreach ($technologies as $t)
<li>
    <a href="{{ route(app()->getLocale().'.technologie', [$t->id]) }}"
        class="flex items-center justify-center rounded-full 
        w-[40px] h-[40px] md:w-[60px] md:h-[60px] lg:w-[80px] lg:h-[80px] text-center align-middle
        hover:text-black border-1 m-7 md:m-5 lg:m-20 
    {{ Route::currentRouteName() === app()->getLocale() . '.technologie' && request()->route('technology')->id == $t->id ? 'text-black bg-white-25' : 
    'text-white-25 border-gray-25 hover:bg-white-25' }}">{{ $loop->iteration }} 
    {{-- Laravel met automatiquement à disposition une variable spéciale $loop (index, remaining, count, first, last) --}}
</a>
</li>
@endforeach
