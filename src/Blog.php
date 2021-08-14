<?php
/**
 * JUZAWEB CMS - The Best CMS for Laravel Project
 *
 * @package    juzaweb/laravel-cms
 * @author     The Anh Dang <dangtheanh16@gmail.com>
 * @link       https://juzaweb.com/cms
 * @license    MIT
 *
 * Created by JUZAWEB.
 * Date: 8/12/2021
 * Time: 4:09 PM
 */

namespace Juzaweb\Blog;

use Illuminate\Support\Facades\Route;

class Blog
{
    protected static $namespace = 'Juzaweb\Blog\Http\Controllers';

    public static function adminRoutes()
    {
        Route::namespace(self::$namespace)
            ->group(__DIR__ . '/routes/admin.php');
    }

    public static function themeRoutes()
    {
        Route::namespace(self::$namespace)
            ->group(__DIR__ . '/routes/theme.php');
    }
}
