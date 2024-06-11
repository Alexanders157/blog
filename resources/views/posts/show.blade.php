<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #5675e3;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background-color: #5675e3;
            color: #fff;
        }


        .upper-text a {
            color: #ccde99;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 100px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        input[type="submit"] {
            background-color: #5675e3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #5675e3;
        }

        button[type="submit"]{
            background: #5675e3;
            color: white;
        }

        .comment-card {
            background-color: #f7f7f7;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .comment-card h5 {
            font-weight: bold;
            margin-top: 0;
        }

        .comment-card p {
            margin-bottom: 10px;
        }

    </style>

    <title>Блог</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>


<header>
    <h1>Блог о домашних животных</h1>
    <p class="upper-text a" align=left><a href="all"> Главная </a></p>
    <p class="upper-text a" align=left><a href="create"> Создать пост </a></p>
</header>
<br>
<main>

    <div class="container">
        <div id="main-col">

            <div>
                <form method="get" action="/posts/{{ $post->id }}/edit">
                    <button type="submit">Редактировать</button>
                </form>
            </div>
            <br>
            <div><img src="{{ asset('storage/' . $post->photo) }}" alt="Изображение поста"></div>

            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>
            <div>{!! $post->qr_code !!}</div>
            <div id="comments">
                <h2>Комментарии:</h2>

                <form method="POST" action="/posts/{{ $post->id }}/comments">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="message">Ваш комментарий:</label>
                        <textarea name="message" id="message" placeholder="Ваш комментарий" required></textarea>
                    </div>
                    @if(!Auth::user()->isAdmin())
                        <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                    @endif
                </form>
                <br>
                <div id="comment-list">
                    @foreach($comments as $comment)
                        <div class="comment-card">
                            <h5>{{ $comment->user ? $comment->user->name : 'Unknown' }}</h5>
                            <p>{{ $comment->message }}</p>
                            <!-- Add some interactivity here, such as reply, like, or edit buttons -->
                        </div>
                    @endforeach
                </div>
            </div>

            </div>
    </div>
    <br>
    <br>
</main>
<footer>
    <p>&copy; 2024 Мой Блог</p>
</footer>

<script>
    $(document).ready(function() {
        function fetchComments() {
            $.ajax({
                url: "http://127.0.0.1:8000/posts/{{ $post->id }}/comments/update",
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
</body>
</html>
