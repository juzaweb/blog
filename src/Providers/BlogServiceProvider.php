<?php
/**
 * MYMO CMS - The Best Laravel CMS
 *
 * @package    juzaweb/laravel-cms
 * @author     The Anh Dang <dangtheanh16@gmail.com>
 * @link       https://juzaweb.com/cms
 * @license    MIT
 *
 * Created by JUZAWEB.
 * Date: 8/11/2021
 * Time: 12:04 PM
 */

namespace Juzaweb\Blog\Providers;

use Illuminate\Support\ServiceProvider;
use Juzaweb\Core\Facades\HookAction;

class BlogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        HookAction::loadActionForm(__DIR__ . '/../../actions');
        $this->loadViewsFrom(__DIR__ . '/../views', 'jw_blog');
    }
}