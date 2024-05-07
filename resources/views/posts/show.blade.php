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

    </style>


    <title>Блог</title>
</head>
<body>

<header>
    <h1>Блог о домашних животных</h1>
    <p class="upper-text a" align=left><a href="/posts"> Главная </a></p>
    <p class="upper-text a" align=left><a href="#"> Категории </a></p>
    <p class="upper-text a" align=left><a href="/posts"> Все посты </a></p>
    <p class="upper-text a" align=left><a href="/post/create"> Создать пост </a></p>
    <p class="upper-text a" align=left><a href="#"> Контакты </a></p>
</header>
<br>
<main>

    <div class="container">
        <div id="main-col">

            <div>
                <form method="get" action="/post/{{ $post->id }}/edit">
                    <button type="submit">Редактировать</button>
                </form>
            </div>

            <div><img src="{{ asset('storage/' . $post->photo) }}" alt="Изображение поста"></div>

            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>
            <div>{!! $post->qr_code !!}</div>
            <div id="comments">
                <br>

                <form method="POST" action="/posts/{{ $post->id }}/comments">
                    {{ csrf_field() }}
                    <label>
                        <textarea name="message" placeholder="Ваш комментарий" required></textarea>
                    </label>
                    <button type="submit">Добавить комментарий</button>
                </form>


                    <ul>
                        @foreach($post->comments as $comment)
                            <li>{{ $comment->message }}</li>
                        @endforeach
                    </ul>

            </div>
    </div>
    </div>
    <br>
    <br>
</main>
<footer>
    <p>&copy; 2024 Мой Блог</p>
</footer>
</body>
</html>
