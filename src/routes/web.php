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
 * Time: 12:06 PM
 */

$adminPrefix = config('juzaweb.admin_prefix', 'admin-cp');

Route::group([
    'prefix' => $adminPrefix,
    'middleware' => ['admin']
], function () {
    require __DIR__ . '/components/page.route.php';
    require __DIR__ . '/components/post.route.php';
});
