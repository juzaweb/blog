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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Categories') }}</h3>
                    </div>
                    <div class="card-body">
                        {!! Field::text($model, 'name') !!}

                        {!! Field::textarea($model, 'description') !!}

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')

@endsection
