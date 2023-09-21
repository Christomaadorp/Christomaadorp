@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.task.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tasks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.task.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $task->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.task.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $task->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.task.fields.command') }}
                                    </th>
                                    <td>
                                        {{ $task->command }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.task.fields.expression') }}
                                    </th>
                                    <td>
                                        {{ $task->expression }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.task.fields.is_active_ed_sh') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $task->is_active ? 'checked' : '' }} data-toggle="toggle" data-offstyle="danger">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.task.fields.dont_overlap') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $task->dont_overlap ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.task.fields.run_in_maintenance') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $task->run_in_maintenance ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.task.fields.notifications_email') }}
                                    </th>
                                    <td>
                                        {{ $task->notifications_email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.task.fields.timestamps') }}
                                    </th>
                                    <td>
                                        {{ $task->timestamps }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tasks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
