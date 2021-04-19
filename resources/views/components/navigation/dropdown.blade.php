@props(['active' => false, 'title'])

<li {{ $attributes->merge(['class' => 'nav-item dropdown' . ($active ? ' active' : '')]) }}>
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{ $title }}
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        {{ $links }}
    </ul>
</li>