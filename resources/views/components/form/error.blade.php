@props(['name'])

@error($name)
    <p class="mb-3 mt-1 text-xs text-red-500"> {{ $message }}</p>
@enderror
