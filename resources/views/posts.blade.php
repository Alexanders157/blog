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

        .blog-post {
            border: 1px solid #ddd;
            padding: 1rem;
            margin: 1rem;
            background-color: #f9f9f9;
        }

        .blog-post a {
            color: #007bff;
            text-decoration: none;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background-color: #5675e3;
            color: #fff;
        }

        .last-next-page-container {
            display:flex;
            justify-content: center;

        }

        .last-next-page-container a {
            margin: 0 4px;
        }

        .upper-text a {
            color: #ccde99;
        }

        .pagination {
            text-align: center;
            margin: 20px 0;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            display: inline-block;
            margin: 0 10px;
        }

        .pagination li a {
            color: #337ab7;
            text-decoration: none;
        }

        .pagination li a:hover {
            color: #23527c;
        }

        .pagination li.active a {
            color: #fff;
            background-color: #337ab7;
            border-radius: 3px;
            padding: 5px 10px;
        }

        .reglog {
            display: flex;
        }



    </style>


    <title>Блог</title>
</head>
<body>

<header>
    <div>
        @if (Route::has('login'))
            <div>
                @auth
                    <p class="upper-text a" align=right><a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <p class="upper-text a" align=right><a href="{{ route('login') }}">Авторизация</a>

                    @if (Route::has('register'))
                        <p class="upper-text a" align=right><a href="{{ route('register') }}">Регистрация</a>
                    @endif
                @endauth
            </div>
        @endif
    <h1>Блог о домашних животных</h1>
    <p class="upper-text a" align=left><a href="/posts/create"> Создать пост </a></p>
    <!--
    <a href="{ { //route('/register') }}">Регистрация</a>
    <a href="{ { //('/login') }}">Авторизация</a>
    -->
</header>
<br>
<main>
    <form action="{{ route('posts.filter') }}" method="GET">
        <input type="date" name="date">
        <button type="submit">Фильтровать</button>
    </form>

@foreach($posts as $post)
        <article class="blog-post">
            <p> <b> {{ $post->title }} </b></p>
            <p>{{ $post->content }}</p>
            <a href="{{ route('posts.show', $post->id) }}">Читать далее</a>
        </article>
    @endforeach

    <div class="pagination">
        {{ $posts->links('pagination::default', ['class' => 'pagination pagination-sm', 'dotted' => false]) }}
    </div>
    <br>
    <footer>
        <p>&copy; 2024 Мой Блог</p>
    </footer>
</main>
</body>
</html>
