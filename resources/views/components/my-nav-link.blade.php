@props(['href', 'active' => false])

@php
$aria = null;
if ($active) {
    $classes = 'rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white';
    $aria = 'page';
} else {
    $classes = 'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white';
}
@endphp
<a href="{{ $href }}" {{ $attributes -> merge(['class' => $classes, 'aria-current' => $aria]) }}>{{ $slot }}</a>
