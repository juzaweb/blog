@extends('juzaweb::layouts.backend')

@section('content')

    <div class="row">
        <div class="col-md-6"></div>

        <div class="col-md-6">
            <div class="btn-group float-right">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> @lang('juzaweb::app.add_new')</a>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <form method="post" class="form-inline">
                @csrf
                <select name="bulk_actions" class="form-control w-60 mb-2 mr-1">
                    <option value="">@lang('juzaweb::app.bulk_actions')</option>
                    <option value="publish">@lang('juzaweb::app.public')</option>
                    <option value="private">@lang('juzaweb::app.private')</option>
                    <option value="draft">@lang('juzaweb::app.draft')</option>
                    <option value="delete">@lang('juzaweb::app.delete')</option>
                </select>

                <button type="submit" class="btn btn-primary mb-2" id="apply-action">@lang('juzaweb::app.apply')</button>
            </form>
        </div>

        <div class="col-md-8">
            <form method="get" class="form-inline" id="form-search">

                <div class="form-group mb-2 mr-1">
                    <label for="inputName" class="sr-only">@lang('juzaweb::app.search')</label>
                    <input name="search" type="text" id="inputName" class="form-control" placeholder="@lang('juzaweb::app.search')" autocomplete="off">
                </div>

                <div class="form-group mb-2 mr-1">
                    <label for="inputStatus" class="sr-only">@lang('juzaweb::app.status')</label>
                    <select name="status" id="inputStatus" class="form-control">
                        <option value="">--- @lang('juzaweb::app.status') ---</option>
                        <option value="publish">@lang('juzaweb::app.public')</option>
                        <option value="private">@lang('juzaweb::app.private')</option>
                        <option value="draft">@lang('juzaweb::app.draft')</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> @lang('juzaweb::app.search')</button>
            </form>
        </div>

    </div>

    <div class="table-responsive mb-5">
        <table class="table juzaweb-table">
            <thead>
                <tr>
                    <th data-width="3%" data-field="state" data-checkbox="true"></th>
                    <th data-width="10%" data-field="thumbnail" data-formatter="thumbnail_formatter">@lang('juzaweb::app.thumbnail')</th>
                    <th data-field="title" data-formatter="name_formatter">@lang('juzaweb::app.name')</th>

                    <th data-width="15%" data-field="created">@lang('juzaweb::app.created_at')</th>
                    <th data-width="15%" data-field="status" data-align="center" data-formatter="status_formatter">@lang('juzaweb::app.status')</th>
                </tr>
            </thead>
        </table>
    </div>

    <script type="text/javascript">
        function thumbnail_formatter(value, row, index) {
            return '<img src="'+ row.thumb_url +'" class="w-100">';
        }

        function name_formatter(value, row, index) {
            return '<a href="'+ row.edit_url +'">'+ value +'</a>';
        }

        function status_formatter(value, row, index) {
            switch (value) {
                case 'public':
                    return `<span class="text-success">${juzaweb.lang.public}</span>`;
                case 'private':
                    return `<span class="text-warning">${juzaweb.lang.private}</span>`;
                case 'draft':
                    return `<span class="text-secondary">${juzaweb.lang.draft}</span>`;
            }
        }

        var table = new JuzawebTable({
            url: '{{ route('admin.posts.get-data') }}',
            action_url: '{{ route('admin.posts.bulk-actions') }}',
        });
    </script>
@endsection