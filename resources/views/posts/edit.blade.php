<x-layout>
    <form class="flex flex-col w-2/5 m-auto gap-6" action="/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <x-input
            name="title"
            value="{{ $post->title }}"
            placeholder="title"
            err="title"
        >
            title
        </x-input>
        <x-input
            name="slug"
            value="{{ $post->slug }}"
            placeholder="slug"
            err="slug"
        >
            slug
        </x-input>
        <x-textarea
            label="excerpt"
            name="excerpt"
            err="excerpt"
            placeholder="excerpt"
        >
            {{ $post->excerpt }}

        </x-textarea>
        <x-textarea
            label="body"
            name="body"
            placeholder="body"
            err="body"
        >
            {{ $post->body }}
        </x-textarea>
        <x-input
            label="thumbnail"
            name="thumbnail"
            value="{{ $post->thumbnail?? null }}"
            err="thumbnail"
            type="file"
        >Image</x-input>
        @php
            $categories = \App\Models\Category::all();
        @endphp
        <select class="h-10 bg-white ring ring-gray-100 focus:outline-none rounded focus:ring-blue-500"
                name="category_id">
            @foreach($categories as $category)
                <option
                    {{$post->category_id == $category->id ? 'selected' : ''}}
                    value="{{ $category->id }}"
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <x-post-btn>post</x-post-btn>
    </form>
</x-layout>
