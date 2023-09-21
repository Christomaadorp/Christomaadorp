@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.task.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.tasks.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label class="required" for="description">{{ trans('cruds.task.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('command') ? 'has-error' : '' }}">
                            <label class="required" for="command">{{ trans('cruds.task.fields.command') }}</label>
                            <input class="form-control" type="text" name="command" id="command" value="{{ old('command', '') }}" required>
                            @if($errors->has('command'))
                                <span class="help-block" role="alert">{{ $errors->first('command') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.command_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('expression') ? 'has-error' : '' }}">
                            <label for="expression">{{ trans('cruds.task.fields.expression') }}</label>
                            <input class="form-control" type="text" name="expression" id="expression" value="{{ old('expression', '') }}">
                            @if($errors->has('expression'))
                                <span class="help-block" role="alert">{{ $errors->first('expression') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.expression_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_active" style="font-weight: 400">{{ trans('cruds.task.fields.is_active') }}</label>
                            </div>
                            @if($errors->has('is_active'))
                                <span class="help-block" role="alert">{{ $errors->first('is_active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.is_active_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dont_overlap') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="dont_overlap" value="0">
                                <input type="checkbox" name="dont_overlap" id="dont_overlap" value="1" {{ old('dont_overlap', 0) == 1 ? 'checked' : '' }}>
                                <label for="dont_overlap" style="font-weight: 400">{{ trans('cruds.task.fields.dont_overlap') }}</label>
                            </div>
                            @if($errors->has('dont_overlap'))
                                <span class="help-block" role="alert">{{ $errors->first('dont_overlap') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.dont_overlap_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('run_in_maintenance') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="run_in_maintenance" value="0">
                                <input type="checkbox" name="run_in_maintenance" id="run_in_maintenance" value="1" {{ old('run_in_maintenance', 0) == 1 ? 'checked' : '' }}>
                                <label for="run_in_maintenance" style="font-weight: 400">{{ trans('cruds.task.fields.run_in_maintenance') }}</label>
                            </div>
                            @if($errors->has('run_in_maintenance'))
                                <span class="help-block" role="alert">{{ $errors->first('run_in_maintenance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.run_in_maintenance_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notifications_email') ? 'has-error' : '' }}">
                            <label for="notifications_email">{{ trans('cruds.task.fields.notifications_email') }}</label>
                            <input class="form-control" type="text" name="notifications_email" id="notifications_email" value="{{ old('notifications_email', '') }}">
                            @if($errors->has('notifications_email'))
                                <span class="help-block" role="alert">{{ $errors->first('notifications_email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.notifications_email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('timestamps') ? 'has-error' : '' }}">
                            <label for="timestamps">{{ trans('cruds.task.fields.timestamps') }}</label>
                            <input class="form-control timepicker" type="text" name="timestamps" id="timestamps" value="{{ old('timestamps') }}">
                            @if($errors->has('timestamps'))
                                <span class="help-block" role="alert">{{ $errors->first('timestamps') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.task.fields.timestamps_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
