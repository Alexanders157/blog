<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\MoonShine\Pages\Post\PostIndexPage;
use App\MoonShine\Pages\Post\PostFormPage;
use App\MoonShine\Pages\Post\PostDetailPage;
use MoonShine\Decorations\Flex;
use MoonShine\Fields\Slug;
use MoonShine\Metrics\DonutChartMetric;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Post>
 */
class PostResource extends ModelResource
{

    protected string $model = Post::class;

    protected string $title = 'Posts';
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


    public function metrics(): array
    {
        return [
            ValueMetric::make('Посты')
                ->value(Post::count()),

            ValueMetric::make('Пользователи')
                ->value(User::count()),

            ValueMetric::make('Comments')
            ->value(Comment::count()),
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
            Flex::make([
                Text::make('Description')
                    ->hint('Текст поста'),

                Slug::make('Slug')
                    ->from('Title')
                    ->unique()
                    ->hint('Метка')
                ]),

            Column::make([
                Block::make('Дополнительная информация', [
                    ])
            ])
            ])
        ];

    }


    public function rules(Post|Model $item): array
    {
        return [];
    }
}
