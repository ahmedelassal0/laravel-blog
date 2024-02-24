<x-layout>
    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if(!$posts->isEmpty())
            <x-post-featured-card :post="$posts[0]"></x-post-featured-card>

            @if(count($posts) > 1)
                <div class="lg:grid lg:grid-cols-6">
                    <x-posts-grid :posts="$posts->skip(1)"></x-posts-grid>
                </div>
            @endif

        @else
            <p class="text-5xl text-center text-white bg-blue-500 p-3 w-3/5 m-auto rounded-lg">No posts yet</p>
        @endif
        {{ $posts->links() }}
    </main>
</x-layout>
