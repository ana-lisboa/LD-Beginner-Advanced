@props([
    'class' => 'flex-col',
    'extraClass' => ''
])

<div class="flex {{ $class . ' ' . $extraClass }} mb-6">
    {{ $slot }}
</div>
