@props(['id' => \Illuminate\Support\Str::random(40), 'alignment' => 'dropdown-menu-end', 'active' => false, 'title'])

<li {{ $attributes->merge(['class' => 'nav-item dropdown' . ($active ? ' active' : '')]) }}>
    <a class="nav-link dropdown-toggle" href="#" id="{{ $id }}" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{ $title }}
    </a>
    <ul class="dropdown-menu {{ \LocaleHelper::isRTL(app()->getLocale()) ? ($alignment === 'dropdown-menu-end' ? 'dropdown-menu-start' : ($alignment === 'dropdown-menu-start' ? 'dropdown-menu-end' : $alignment)) : $alignment }}" aria-labelledby="{{ $id }}">
        {{ $links }}
    </ul>
</li>