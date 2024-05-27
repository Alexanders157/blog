<ul id="comment-list">
    @foreach($comments as $comment)
        <li>{{ $comment->message }} ({{ $comment->user ? $comment->user->name : 'Unknown' }})</li>
    @endforeach
</ul>
