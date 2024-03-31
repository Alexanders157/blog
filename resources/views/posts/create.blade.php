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
            padding: 20px;
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
<div>
</div>
<header>
    <h1>Блог о домашних животных</h1>
    <p class="upper-text a" align=left><a href="#"> Главная </a></p>
    <p class="upper-text a" align=left><a href="#"> Категории </a></p>
    <p class="upper-text a" align=left><a href="#"> Все посты </a></p>
    <p class="upper-text a" align=left><a href="#"> Контакты </a></p>
</header>
<br>
<br>
<main>
    <div class="container">
        <h2>Создать пост</h2>

        <form action="{{ route('posts/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="choice">Выбрать категорию:</label>
                <select id="choice" name="category_id">
                    @foreach( $categories as $category )
                        <option value="{{$category->id}}"> {{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <label for="title">Заголовок:</label><br>
            <label for="title"></label>
            <input id="title" name="title" required autofocus>

            <br>

            <label for="description">Описание:</label><br>
            <textarea id="description" name="description" rows="10" cols="50" required></textarea>

            <br>

            <label for="content">Контент:</label><br>
            <textarea id="content" name="content" rows="10" cols="50" required></textarea><br>

            <label for="photo">Выберите файл для вложения:</label><br>
            <input type="file" id="photo" name="photo" accept="image/*">
            <br>
            <br>
            <input type="submit" value="Отправить">
        </form>

    </div>
    <br>
    <br>
    <footer>
        <p>&copy; 2024 Мой Блог</p>
    </footer>
</main>
</body>
</html>
