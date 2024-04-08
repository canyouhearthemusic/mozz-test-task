@props(['categories', 'post'])

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-3 p-6">
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="w-1/2 mx-auto">
                            <select multiple name="category[]" id="category" class="w-full rounded-md px-2 py-2 mb-4">
                                <option disabled>
                                    Select Category
                                </option>
                                @foreach($categories as $category)
                                <option
                                    @if ($post->categories()->pluck('category_id')->contains($category->id))
                                        selected
                                    @endif
                                    value="{{ $category->id }}"
                                >
                                    {{ ucwords($category->name) }}
                                </option>
                                @endforeach
                            </select>

                            @error('category')
                            <x-form.error name="category[]" class="mt-0" />
                            @enderror
                        </div>

                        <div class="w-1/2 mx-auto">
                            <x-form.input name="title" :value="$post->title" />
                        </div>

                        <div class="w-1/2 mx-auto">
                            <x-form.input name="excerpt" :value="$post->excerpt" />
                        </div>

                        <div class="w-1/2 mx-auto">
                            <x-form.input name="body" :value="$post->body" />
                        </div>

                        <div class="w-1/2 mx-auto flex justify-between items-center">

                            <x-form.input name="thumbnail" type="file" />

                            <x-primary-button type="submit" class="w-1/3 py-3.5 mt-1.5">
                                Update
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>