<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/images/illustration-1.png" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}">
                                {{ $post->author->name }}
                            </a>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <div class="space-x-2">
                        <a href="#"
                           class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{ $post->category->name }}</a>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-2">
                    {{ $post->excerpt }}
                </h1>

                <div class="flex gap-2 mb-10">
                    <a class="text-gray-500 hover:text-blue-500 hover:underline font-semibold" href="/posts/{{ $post->slug }}/edit">
                        Update
                    </a>
                    <form action="/posts/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:underline font-semibold">
                            delete
                        </button>
                    </form>
                </div>
                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>
                        {{ $post->body }}
                    </p>
                </div>
            </div>
            @auth
                    @include('posts._comment-form')
            @else
                <p class="col-start-5 col-end-13 text-xl font-bold mt-12"><a class="text-blue-500 hover:underline"
                                                                             href="/register">register</a> or <a
                        class="text-blue-500 hover:underline" href="/login">login</a> to comment</p>
            @endauth

            @foreach($post->comments as $comment)
                <x-post-comment class="col-start-5 col-end-13" :comment="$comment"></x-post-comment>
            @endforeach
        </article>
    </main>
</x-layout>

