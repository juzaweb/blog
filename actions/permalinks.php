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
 * Time: 5:47 PM
 */

use Juzaweb\Core\Facades\HookAction;
use Juzaweb\Blog\Http\Controllers\PostController;

HookAction::registerPermalink('post', [
    'label' => trans('juzaweb::app.news'),
    'base' => 'post',
    'callback' => PostController::class,
]);
