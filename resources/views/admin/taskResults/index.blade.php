@extends('layouts.admin')
@section('content')
<div class="content">
   <!-- @can('task_result_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.task-results.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.taskResult.title_singular') }}
                </a>
            </div>
        </div>
    @endcan --!>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.taskResult.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-TaskResult">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.taskResult.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.taskResult.fields.taskid') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.taskResult.fields.run_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.taskResult.fields.duration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.taskResult.fields.result') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($taskResults as $key => $taskResult)
                                    <tr data-entry-id="{{ $taskResult->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $taskResult->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $taskResult->task_id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $taskResult->run_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ number_format($taskResult->duration ?? '' /1000)}} seconds
                                        </td>
                                        <td>
                                            {{ $taskResult->result ?? '' }}
                                        </td>
                                        <td>
                                            @can('task_result_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.task-results.show', $taskResult->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('task_result_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.task-results.edit', $taskResult->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('task_result_delete')
                                                <form action="{{ route('admin.task-results.destroy', $taskResult->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('task_result_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.task-results.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-TaskResult:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
