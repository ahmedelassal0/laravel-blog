<form class="rounded-lg col-start-5 col-end-13 border border-gray-300 p-6 mt-4"
      action="/posts/{{ $post->slug }}/comment" method="POST">
    @csrf
    <div class="flex gap-3">
        <img class="rounded self-start" src="https://i.pravatar.cc/100?img=3" alt="user avatar">
        <div class="inline-flex flex-col flex-grow gap-3">
            <h3 class="font-semibold">{{ auth()->user()->name }}</h3>
            <textarea name="body" class="flex-grow focus:outline-none focus:ring rounded p-3"
                      placeholder="leave a comment">

            </textarea>
        </div>
    </div>
    @error('body')
    <p class="text-sm text-red-500 mt-6">{{ $message }}</p>
    @enderror
    <div class="flex justify-end mt-6">
        <x-post-btn>post</x-post-btn>
    </div>
</form>
