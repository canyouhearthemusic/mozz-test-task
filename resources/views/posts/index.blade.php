<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-3 p-6">
                    asd
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