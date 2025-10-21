<a
    role="button"
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-2 py-1 rounded-md font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150 focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 ' .
    ($attributes->get('color') ?: '') .
    ($attributes->get('delete-cursor') ? ' cursor-not-allowed' : '')
    ]) }}
>{{ $slot }}</a>