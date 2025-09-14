<?php
/**
 * JUZAWEB CMS - Laravel CMS for Your Project
 *
 * @package    juzaweb/cms
 * @author     The Anh Dang
 * @link       https://cms.juzaweb.com
 */

namespace Juzaweb\Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Juzaweb\Core\Rules\AllExist;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        $locale = $this->input('locale');

        return [
			"{$locale}.title" => ['required', 'string', 'max:255'],
            "{$locale}.content" => ['nullable', 'string', 'max:255'],
            "{$locale}.slug" => ['nullable', 'string', 'max:255'],
            "thumbnail" => ['nullable', 'string', 'max:255'],
            'categories' => ['nullable', 'array', AllExist::make('post_categories','id')],
		];
    }
}
