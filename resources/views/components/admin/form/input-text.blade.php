@props([
    'id' => $name,
    'name' => $name,
    'value' => $value,
    'type' => $type ?? 'text',
    'groupClass' => ''
])
<x-admin.form.group extraClass="{{ $groupClass }}">
    <x-admin.form.label for="{{ $name }}">{{ $slot }}</x-admin.form.label>
    <input type="{{ $type }}" class="form-input rounded border-gray-200" id="{{ $id }}" name="{{ $name }}"
           value="{{ $value }}">
</x-admin.form.group>
