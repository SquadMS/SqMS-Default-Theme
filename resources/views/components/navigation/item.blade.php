@props(['active' => false, 'disabled' => false, 'link' => '#', 'title'])

<li {{ $attributes->merge(['class' => 'nav-item']) }}>
    <a class="nav-link {{ $disabled ? ' disabled' : '' }} {{ $active ? ' active' : '' }}" href="{{ $link }}">{{ $title }}</a>
</li>