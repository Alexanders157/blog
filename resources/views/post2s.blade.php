<!DOCTYPE html>
<html lang="ru">

<x-app-layout>
    <div class="py-12">
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

        <br>

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
    </div>
</x-app-layout>
