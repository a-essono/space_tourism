<li> <!-- Definir la bonne route à la place de celle là href="{{ route('equipage') }} -->
    <a href="{{ route('technologie') }}"
        class="flex items-center justify-center rounded-full 
        w-[40px] h-[40px] md:w-[60px] md:h-[60px] lg:w-[80px] lg:h-[80px] text-center align-middle
        hover:text-black border-1 m-7 md:m-5 lg:m-20 
    {{ Route::currentRouteName() === 'technologie' ? 'text-black bg-white-25' : 
    'text-white-25 border-gray-25 hover:bg-white-25' }}">1</a>
</li>
<li> <!-- Definir la bonne route à la place de celle là href="{{ route('equipage') }} -->
    <a href="{{ route('technologie') }}"
        class="flex items-center justify-center rounded-full 
        w-[40px] h-[40px] md:w-[60px] md:h-[60px] lg:w-[80px] lg:h-[80px] text-center align-middle
        hover:text-black border-1 m-7 md:m-5 lg:m-20 
        {{ Route::currentRouteName() === '' ? 'text-black bg-white-25' : 
        'text-white-25 border-gray-25 hover:bg-white-25' }}">2</a>
</li>
<li> <!-- Definir la bonne route à la place de celle là href="{{ route('equipage') }} -->
    <a href="{{ route('technologie') }}"
        class="flex items-center justify-center rounded-full 
        w-[40px] h-[40px] md:w-[60px] md:h-[60px] lg:w-[80px] lg:h-[80px] text-center align-middle
        hover:text-black border-1 m-7 md:m-5 lg:m-20 
        {{ Route::currentRouteName() === '' ? 'text-black bg-white-25' : 
        'text-white-25 border-gray-25 hover:bg-white-25' }}">3</a>
</li>