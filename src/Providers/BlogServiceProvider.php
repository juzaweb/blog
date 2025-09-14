<?php

namespace Juzaweb\Modules\Blog\Providers;

use Juzaweb\Core\Facades\Menu;
use Juzaweb\Core\Providers\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        //

        $this->booted(
            function () {
                $this->registerMenus();
            }
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->app->register(RouteServiceProvider::class);
    }

    protected function registerMenus(): void
    {
        Menu::make('blog', __('Blog'))
            ->icon('fas fa-newspaper');

        Menu::make('posts', __('Posts'))
            ->parent('blog');

        Menu::make('post-categories', __('Categories'))
            ->parent('blog');
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/blog.php' => config_path('blog.php'),
        ], 'config');
        $this->mergeConfigFrom(__DIR__ . '/../../config/blog.php', 'blog');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    protected function registerTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'blog');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');
    }

    /**
     * Register views.
     *
     * @return void
     */
    protected function registerViews(): void
    {
        $viewPath = resource_path('views/modules/blog');

        $sourcePath = __DIR__ . '/../resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', 'blog-module-views']);

        $this->loadViewsFrom($sourcePath, 'blog');
    }
}
