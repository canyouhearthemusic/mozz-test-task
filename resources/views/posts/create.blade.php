@props(['categories'])

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-3 p-6">
                    <form action="/" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="w-1/2 mx-auto">
                            <select multiple name="category[]" id="category" class="w-full rounded-md px-2 py-2 mb-4">
                                <option selected disabled>
                                    Select Category
                                </option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ ucwords($category->name) }}
                                </option>
                                @endforeach
                            </select>

                            @error('category')
                            <x-form.error name="category[]" class="mt-0" />
                            @enderror
                        </div>

                        <div class="w-1/2 mx-auto">
                            <x-form.input name="title" />
                        </div>

                        <div class="w-1/2 mx-auto">
                            <x-form.input name="excerpt" />
                        </div>

                        <div class="w-1/2 mx-auto">
                            <x-form.input name="body" />
                        </div>

                        <div class="w-1/2 mx-auto flex justify-between items-center">

                            <x-form.input name="thumbnail" type="file" />

                            <x-primary-button type="submit" class="w-1/3 py-3.5 mt-1.5">
                                Publish
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>