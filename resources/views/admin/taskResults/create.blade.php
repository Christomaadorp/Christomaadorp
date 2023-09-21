@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.taskResult.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.task-results.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('taskid') ? 'has-error' : '' }}">
                            <label for="taskid">{{ trans('cruds.taskResult.fields.taskid') }}</label>
                            <input class="form-control" type="number" name="taskid" id="taskid" value="{{ old('taskid', '') }}" step="1">
                            @if($errors->has('taskid'))
                                <span class="help-block" role="alert">{{ $errors->first('taskid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskResult.fields.taskid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('runat') ? 'has-error' : '' }}">
                            <label for="runat">{{ trans('cruds.taskResult.fields.runat') }}</label>
                            <input class="form-control timepicker" type="text" name="runat" id="runat" value="{{ old('runat') }}">
                            @if($errors->has('runat'))
                                <span class="help-block" role="alert">{{ $errors->first('runat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskResult.fields.runat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
                            <label for="duration">{{ trans('cruds.taskResult.fields.duration') }}</label>
                            <input class="form-control" type="text" name="duration" id="duration" value="{{ old('duration', '') }}">
                            @if($errors->has('duration'))
                                <span class="help-block" role="alert">{{ $errors->first('duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskResult.fields.duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('result') ? 'has-error' : '' }}">
                            <label for="result">{{ trans('cruds.taskResult.fields.result') }}</label>
                            <input class="form-control" type="text" name="result" id="result" value="{{ old('result', '') }}">
                            @if($errors->has('result'))
                                <span class="help-block" role="alert">{{ $errors->first('result') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskResult.fields.result_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('timestamp') ? 'has-error' : '' }}">
                            <label for="timestamp">{{ trans('cruds.taskResult.fields.timestamp') }}</label>
                            <input class="form-control timepicker" type="text" name="timestamp" id="timestamp" value="{{ old('timestamp') }}">
                            @if($errors->has('timestamp'))
                                <span class="help-block" role="alert">{{ $errors->first('timestamp') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskResult.fields.timestamp_helper') }}</span>
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