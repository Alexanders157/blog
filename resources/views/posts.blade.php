<!DOCTYPE html>
<html lang="ru">

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <form action="{{ route('posts.filter') }}" class="mt-6 space-y-6" method="GET">
                            @csrf
                            <div class="data-time-piker">
                                <input type="date" name="date">
                                <button type="submit">Фильтровать</button>
                            </div>
                        </form>
                    </div>

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        @foreach($posts as $post)
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <article class="blog-post">
                                    <p class="text-lg font-medium text-gray-900">
                                        <b> {{ $post->title }} </b>
                                    </p>

                                    <p class="mt-1 text-sm text-gray-600">{{ $post->content }}</p>

                                    <a class="mt-5" href="{{ route('posts.show', $post->id) }}">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Читать далеее
                                        </button>
                                    </a>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    <div class="pagination-container">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
