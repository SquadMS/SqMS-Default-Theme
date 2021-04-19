@props(['active' => false, 'disabled' => false, 'link' => '#', 'title'])

<li {{ $attributes->merge(['class' => 'nav-item' . ($active ? ' active' : '')]) }}>
    <a class="nav-link{{ $disabled ? ' disabled' : '' }}" href="{{ $link }}">{{ $title }}</a>
</li>