<?php
/**
 * JUZAWEB CMS - The Best CMS for Laravel Project
 *
 * @package    juzaweb/laravel-cms
 * @author     The Anh Dang <dangtheanh16@gmail.com>
 * @link       https://juzaweb.com/cms
 * @license    MIT
 */

namespace Juzaweb\Blog\Http\Controllers;

use Juzaweb\Theme\Http\Controllers\FrontendController;

class PostController extends FrontendController
{
    public function index(...$slug)
    {
        dd($slug);
    }
}