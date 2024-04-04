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
    </style>


    <title>Блог</title>
</head>
<body>
<div>
</div>
<header>
    <h1>Блог о домашних животных</h1>
    <p class="upper-text a" align=left><a href="#"> Главная </a></p>
    <p class="upper-text a" align=left><a href="#"> Категории </a></p>
    <p class="upper-text a" align=left><a href="#"> Создать пост </a></p>
    <p class="upper-text a" align=left><a href="#"> Контакты </a></p>
</header>

<main>
    @foreach($posts as $post)
        <article class="blog-post">
            <p> <b> {{ $post->title }} </b></p>
            <p>{{ $post->description }}</p>
            <a href="{{ route('show', $post->id) }}">Читать далее</a>
        </article>
    @endforeach

    <div class="last-next-page-container">
        <a href="#">Предыдущая страница</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">Следующая страница</a>
    </div>
    <br>
    <footer>
        <p>&copy; 2024 Мой Блог</p>
    </footer>
</main>
</body>
</html>
