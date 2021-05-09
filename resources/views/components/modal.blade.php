@props(['id', 'maxWidth', 'modal' => false])

@php
$id = $id ?? md5($attributes->wire('model'));
switch ($maxWidth ?? '') {
    case 'sm':
        $maxWidth = ' modal-sm';
        break;
    case 'md':
        $maxWidth = '';
        break;
    case 'lg':
        $maxWidth = ' modal-lg';
        break;
    case 'xl':
        $maxWidth = ' modal-xl';
        break;
    case '2xl':
    default:
        $maxWidth = '';
        break;
}
@endphp

<!-- Modal -->
<div 
    x-data="{
        show: @entangle($attributes->wire('model')).defer,
    }"
    x-init="() => {
        let element = document.getElementById('{{ $id }}')
        $watch('show', value => {
            const modal = bootstrap.Modal.getInstance(element)
            if (value) {
                modal.show()
            } else {
                modal.hide()
            }
        })
        element.addEventListener('hide.bs.modal', function () {
            show = false
        })
    }"
    wire:ignore.self 
    class="modal fade" 
    tabindex="-1" 
    id="{{ $id }}" 
    aria-labelledby="{{ $id }}" 
    aria-hidden="true"
    x-ref="{{ $id }}"
>
    <div class="modal-dialog{{ $maxWidth }}">
        {{ $slot }}
    </div>
</div>