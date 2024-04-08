<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex gap-x-12 p-8">
                <div>
                    <img class="rounded-lg" width="600px" src="{{ isset($post->thumbnail)
                            ? asset('storage/' . $post->thumbnail)
                            : " /images/not_found.jpg" }}" alt="img">

                    <p class="mt-2 text-gray-400 text-sm text-center">
                        Published
                        <time> {{ $post->created_at->diffForHumans() }} </time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="https://i.pravatar.cc/100?u={{ $post->author->id }}" class="rounded-2xl" width="60"
                            height="60" alt="Lary avatar">
                        <div class="ml-3 text-center text-lg">
                            <h5 class="font-bold">
                                <p>
                                    {{ $post->author->name }}
                                </p>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="w-full">
                    <div>
                        <div class="hidden lg:flex justify-between mb-6">
                            <div class="flex items-center">
                                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5"
                                            d="M21 1v20.16H.84V1z">
                                        </path>
                                        <path class="fill-current"
                                            d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                        </path>
                                    </g>
                                </svg>

                                <a href="{{ route('posts.index') }}" class="relative inline-flex items-center text-lg">
                                    Back to Posts
                                </a>
                            </div>
                            <div class="flex gap-x-3">
                                @foreach ($post->categories as $category)
                                <span
                                    class="px-3 py-1 border border-indigo-400 bg-indigo-50 rounded-full text-indigo-400 text-xs uppercase font-semibold"
                                    style="font-size: 10px">
                                    {{ $category->name }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        <h1 class="font-bold text-3xl lg:text-4xl mb-3">
                            {{ $post->title }}
                        </h1>
                        <hr>
                        <br>
                        <div class="space-y-4 lg:text-lg leading-loose">
                            <p> {{ $post->body }} </p>
                        </div>
                    </div>
                </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>