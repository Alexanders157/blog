<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div>
                                <img src="{{ asset('storage/' . $post->photo) }}" alt="Изображение поста" class="w-full h-auto mb-4 rounded-lg">
                                <article class="blog-post">
                                    <p class="mt-1 text-lg text-gray-600">{{ $post->content }}</p>
                                    <div class="mt-5">{!! $post->qr_code !!}</div>
                                </article>
                            </div>
                        </div>

                        <!-- Комментарии -->
                        <div class="bg-white shadow sm:rounded-lg p-4 sm:p-8">
                            <h2 class="text-xl font-semibold text-gray-800">Комментарии:</h2>
                            <form method="POST" action="/posts/{{ $post->id }}/comments" class="mt-6 space-y-6">
                                @csrf
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700">Ваш комментарий:</label>
                                    <textarea name="message" id="message" placeholder="Ваш комментарий" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                </div>
                                @if(!Auth::user()->isAdmin())
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Добавить комментарий
                                    </button>
                                @endif
                            </form>
                            <div id="comment-list" class="mt-6 space-y-4">
                                @foreach($comments as $comment)
                                    <div class="comment-card p-4 bg-gray-100 rounded-lg">
                                        <h5 class="font-bold">{{ $comment->user ? $comment->user->name : 'Unknown' }}</h5>
                                        <p>{{ $comment->message }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <form method="get" action="/posts/{{ $post->id }}/edit" class="mt-6">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Редактировать
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchComments() {
            $.ajax({
                url: "{{ url('/posts/' . $post->id . '/comments/update') }}",
                method: "GET",
                success: function(data) {
                    $('#comment-list').html(data);
                },
                error: function() {
                    console.error("Не удалось получить комментарии.");
                }
            });
        }

        setInterval(fetchComments, 2000);
    });
</script>
