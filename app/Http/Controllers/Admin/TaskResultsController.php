<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaskResultRequest;
use App\Http\Requests\StoreTaskResultRequest;
use App\Http\Requests\UpdateTaskResultRequest;
use App\Models\TaskResult;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskResultsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('task_result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskResults = TaskResult::all();

        return view('admin.taskResults.index', compact('taskResults'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_result_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taskResults.create');
    }

    public function store(StoreTaskResultRequest $request)
    {
        $taskResult = TaskResult::create($request->all());

        return redirect()->route('admin.task-results.index');
    }

    public function edit(TaskResult $taskResult)
    {
        abort_if(Gate::denies('task_result_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taskResults.edit', compact('taskResult'));
    }

    public function update(UpdateTaskResultRequest $request, TaskResult $taskResult)
    {
        $taskResult->update($request->all());

        return redirect()->route('admin.task-results.index');
    }

    public function show(TaskResult $taskResult)
    {
        abort_if(Gate::denies('task_result_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taskResults.show', compact('taskResult'));
    }

    public function destroy(TaskResult $taskResult)
    {
        abort_if(Gate::denies('task_result_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskResult->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskResultRequest $request)
    {
        $taskResults = TaskResult::find(request('ids'));

        foreach ($taskResults as $taskResult) {
            $taskResult->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
