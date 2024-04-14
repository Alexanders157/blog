<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\MoonShine\Pages\Post\PostIndexPage;
use App\MoonShine\Pages\Post\PostFormPage;
use App\MoonShine\Pages\Post\PostDetailPage;

use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Post>
 */
class PostResource extends ModelResource
{

    protected string $model = Post::class;

    protected string $title = 'Посты';
    public string $titleField = 'title';
    protected function pages(): array
    {
        return [
            PostIndexPage::make($this->title()),
            PostFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            PostDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Block::make('Основная информация', [
                Text::make('Title')
                    ->sortable()
                    ->required()
                    ->hint('Ввода заголовка'),
                Text::make('Description')
                    ->hint('Текст поста'),
                ])
        ];
    }
    public function rules(Model $item): array
    {
        return [];
    }
}
