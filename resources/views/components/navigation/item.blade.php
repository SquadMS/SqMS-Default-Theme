@props(['active' => false, 'disabled' => false, 'link' => '#', 'onClick' => false, 'title'])

<li {{ isset($attributes) ? $attributes->merge(['class' => 'nav-item']) : '' }}>
    <a class="nav-link {{ $disabled ? ' disabled' : '' }} {{ $active ? ' active' : '' }}" href="{{ $link }}" {{ $onClick ? 'onClick="' . $onClick . '"' : ''}}>{!! $title !!}</a>
</li>