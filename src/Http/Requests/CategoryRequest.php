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

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        $locale = $this->input('locale');

        return [
			"{$locale}.name" => ['required', 'string', 'max:255'],
            "{$locale}.description" => ['nullable', 'string', 'max:255'],
            "{$locale}.slug" => ['nullable', 'string', 'max:255'],
            'parent_id' => ['nullable', 'exists:post_categories,id'],
		];
    }
}
