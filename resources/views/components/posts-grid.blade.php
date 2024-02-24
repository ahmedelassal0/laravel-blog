@props(['posts'])
    @foreach($posts as $post)
        @if($loop->iteration <= 2)
            <x-post-card class="col-span-3" :post="$post"></x-post-card>
        @else
            <x-post-card class="col-span-2" :post="$post"></x-post-card>
        @endif

    @endforeach
