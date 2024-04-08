<?php
$paginated = [5, 10, 15, 20, 25, 30, 35];
?>

@props(['paginatedBy'])

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-3 px-6">
                    <form action="{{ route('posts.index') }}" class="p-6 font-semibold flex items-end justify-between">
                        <div>
                            @can('create', App\Models\Post::class)
                            <a href="{{ route('posts.create') }}">
                                <x-primary-button type="button">
                                    Create Post
                                </x-primary-button>
                            </a>
                            @endcan
                        </div>
                        <div class="text-sm flex items-center gap-x-6">
                            <button type="submit">
                                <span class="text-indigo-500">Show</span>
                            </button>
                            <div>
                                <label for="paginate">Paginate by:</label>
                                <br>
                                <select name="paginate" id="paginate" class="border rounded-lg w-full">
                                    <option disabled selected>
                                        Select
                                    </option>
                                    @foreach ($paginated as $value)
                                    <option value="{{ $value }}" @if ($value==$paginatedBy) selected @endif>
                                        {{ $value }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="p-6 text-gray-900">
                    @if($posts->count())
                    <x-posts-grid :posts="$posts" />
                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                    @else
                    <p class="text-lg text-center text-red-700">There's no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>