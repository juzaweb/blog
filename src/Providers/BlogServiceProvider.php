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
        HookAction::loadActionForm(__DIR__ . '/../actions');
    }
}