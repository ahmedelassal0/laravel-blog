<div {{$attributes(['class' => 'flex gap-6 mt-6 bg-gray-100 p-6 rounded-lg'])}} >
    <img class="self-start rounded" src="https://i.pravatar.cc/100?img=3" alt="avatar">
    <div>
        <h3 class="font-bold">{{ $comment->author->username }}</h3>
        <small>
            posted
            <time>{{ $comment->created_at->diffForHumans() }}</time>
        </small>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</div>
