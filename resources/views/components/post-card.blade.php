@props(['post'])

<article {{ $attributes->merge(['class' => "transition-colors duration-300 hover:bg-gray-100 border border-black
    border-opacity-0 hover:border-opacity-5 rounded-xl"]) }}
    x-data="{show: false}"
    x-on:mouseenter="show = true"
    x-on:mouseleave="show = false"
    >
    <div class="h-full grid justify-between py-6 px-5">
        <div>
            <img src="{{ isset($post->thumbnail) ? asset('storage/' . $post->thumbnail) : asset('images/not_found.jpg')}}"
                alt="Blog Post illustration" class="rounded-xl grid-flow-col w-full">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="flex justify-between">
                    <div class="flex justify-start gap-x-3">
                        @foreach ($post->categories as $category)
                        <a href=""
                            class="px-3 py-1 border border-indigo-400 bg-indigo-50 rounded-full text-indigo-400 text-xs uppercase font-semibold"
                            style="font-size: 10px">
                            {{ $category->name }}
                        </a>
                        @endforeach
                    </div>

                    @hasanyrole('editor|admin')
                    <div class="flex gap-x-4 items-center" x-show="show">
                        <a href="{{ route('posts.edit', $post) }}">
                            <x-edit-icon />
                        </a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <x-delete-icon />
                            </button>
                        </form>

                    </div>
                    @endhasanyrole
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time> {{ $post->created_at->diffForHumans() }} </time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {{ $post->excerpt }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">

                <div class="flex items-center text-sm flex-1">
                    <img src="https://i.pravatar.cc/100?u={{ $post->user_id }}" class="border rounded-2xl" width="60"
                        height="60" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <p> {{ $post->author->name }} </p>
                        </h5>
                    </div>
                </div>

                <div>
                    <a href="{{ route('posts.show', $post) }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full lg:py-2 lg:px-4">
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>