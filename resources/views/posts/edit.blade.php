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
    <title>Редактирование поста</title>
</head>
<body>
<header>
    <h1>Блог о домашних животных</h1>
    <p class="upper-text a" align=left><a href="/posts"> Главная </a></p>
    <p class="upper-text a" align=left><a href="/posts/create"> Создать пост </a></p>
</header>
<br>

<main>
    <div class="container">
        <div id="main-col">
            <h1>Редактирование поста</h1>
            <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="title">Заголовок:</label><br>
                <input type="text" id="title" name="title" value="{{ $post->title }}" required><br>

                <label for="content">Содержание:</label><br>
                <textarea id="content" name="content" rows="10" cols="50" required>{{ $post->content }}</textarea><br>

                <label for="attachment">Выберите файл для вложения:</label><br>
                <input type="file" id="attachment" name="attachment" value="{{ $post->video_url }}" accept="image/*"><br> <br>

                <label for="video">Вставить ссылку на видео:</label><br>
                <label>
                    <input type="text" name="video_url" value="{{ $post->video_url }}" />
                </label>
                <input type="submit" value="Сохранить изменения">
            </form>
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
