<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Post;
use App\MoonShine\Resources\PostResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [
        ];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make('moonshine::ui.resource.system', [
                MenuItem::make('moonshine::ui.resource.admins_title', new MoonShineUserResource())
                    ->translatable(),
                MenuItem::make('moonshine::ui.resource.role_title', new MoonShineUserRoleResource())
                    ->translatable(),
            ])->translatable(),

            MenuGroup::make('Посты', [
                MenuItem::make('Посты', new PostResource())->icon('heroicons.list-bullet')->badge(fn() => Post::query()->count())])->icon('heroicons.list-bullet')
        ];
    }

    protected function theme(): array
    {
        return [];
    }
}
