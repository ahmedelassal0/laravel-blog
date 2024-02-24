@props(['active'])
@php
    $classes = "block p-2 text-sm hover:text-white hover:bg-blue-500";
    if($active?? '') {
        $classes .= $classes = 'text-white bg-blue-500';
    }
@endphp

<a
{{ $attributes(['class' => $classes]) }}"
>
{{ $slot }}
</a>
