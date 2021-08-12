<?php
/**
 * MYMO CMS - The Best Laravel CMS
 *
 * @package    mymocms/mymocms
 * @author     The Anh Dang <dangtheanh16@gmail.com>
 * @link       https://github.com/mymocms/mymocms
 * @license    MIT
 *
 * Created by The Anh.
 * Date: 8/12/2021
 * Time: 5:47 PM
 */

use Juzaweb\Core\Facades\HookAction;
use Juzaweb\Blog\Http\Controllers\PostController;

HookAction::registerPermalink('page', [
    'label' => trans('juzaweb::app.news'),
    'base' => 'news',
    'callback' => PostController::class,
]);
