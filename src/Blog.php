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
 * Time: 4:09 PM
 */

namespace Juzaweb\Blog;

class Blog
{
    public static function adminRoutes()
    {
        require (__DIR__ . '/routes/admin.php');
    }

    public static function themeRoutes()
    {
        require (__DIR__ . '/routes/theme.php');
    }
}