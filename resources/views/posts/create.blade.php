<x-layout>
    <form class="flex flex-col w-2/5 m-auto gap-6" action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <x-input err="title" name="title" placeholder="title">
            title
        </x-input>
        <x-input err="slug" name="slug" placeholder="slug">
            slug
        </x-input>
        <x-textarea err="excerpt" label="excerpt" name="excerpt" placeholder="excerpt"></x-textarea>
        <x-textarea err="body" label="body" name="body" placeholder="body"></x-textarea>
        <x-input type="file" name="thumbnail" err="thumbnail" label="thumbnail">Image</x-input>
        @php
            $categories = \App\Models\Category::all();
        @endphp
        <select class="h-10 bg-white ring ring-gray-100 focus:outline-none rounded focus:ring-blue-500" name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <x-post-btn>post</x-post-btn>
    </form>
</x-layout>
