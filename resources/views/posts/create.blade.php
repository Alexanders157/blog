<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <h2>Создать пост</h2>

                        <form action="{{ url('posts/store') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            <div>
                                <label for="choice">Выбрать категорию:</label>
                                <select id="choice" name="category_id" class="block mt-1 w-full">
                                    @foreach( $categories as $category )
                                        <option value="{{$category->id}}"> {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="title">Заголовок:</label>
                                <input id="title" name="title" type="text" required autofocus class="block mt-1 w-full">
                            </div>

                            <div>
                                <label for="content">Описание:</label>
                                <textarea id="content" name="content" rows="10" class="block mt-1 w-full" required></textarea>
                            </div>

                            <div>
                                <label for="photo">Выберите файл для вложения:</label>
                                <input type="file" id="photo" name="photo" accept="image/*" class="block mt-1 w-full">
                            </div>

                            <div>
                                <input type="submit" value="Отправить" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
