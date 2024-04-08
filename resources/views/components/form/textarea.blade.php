@props(['name', 'value'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea
        class="border rounded-md border-gray-400 p-2 w-full"
        name="{{ $name }}"
        id="{{ $name }}"
        required
    >{{ $value ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}"/>
</x-form.field>
