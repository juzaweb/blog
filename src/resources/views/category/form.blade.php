@extends('core::layouts.admin')

@section('content')
    <form action="{{ $action }}" class="form-ajax" method="post">
        @if($model->exists)
            @method('PUT')
        @endif

        <div class="row">
            <div class="col-md-12">
                <a href="{{ admin_url('post-categories') }}" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                </a>

                <button class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ __('Save') }}
                </button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Categories') }}</h3>
                    </div>
                    <div class="card-body">
                        {!! Field::text($model, "{$locale}[name]", ['label' => __('Name'), 'value' => $model->name]) !!}

                        {!! Field::textarea($model, "{$locale}[description]", ['label' => __('Description'), 'value' => $model->description]) !!}

                    </div>
                </div>

                <x-seo-meta :model="$model" :locale="$locale" />
            </div>

            <div class="col-md-3">
                <x-language-card :label="$model" :locale="$locale" />

                <div class="card">
                    <div class="card-body">
                        {{ Field::select($model, 'parent_id', ['label' => __('Parent')])
                           ->dropDownList(
                               [
                                   '' => __('Select parent'),
                                   ...$parentCategories->pluck('name', 'id')->toArray(),
                               ]
                           ) }}
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        {{ Field::image($model, "{$locale}[thumbnail]", ['label' => __('Thumbnail'), 'value' => $model->thumbnail]) }}
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection

@section('scripts')

@endsection
