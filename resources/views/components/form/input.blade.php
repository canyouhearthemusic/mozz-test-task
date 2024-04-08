@props(['name', 'type' => 'text', 'value'])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <input
        class="border rounded-md border-gray-400 p-2 w-full"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value ?? old($name) }}"
    >
    
    @error('title')
    <x-form.error name="{{ $name }}" />
    @enderror
    
</x-form.field>
