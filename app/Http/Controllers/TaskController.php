<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Project;
use App\Repositories\ProjectsRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends BaseController
{
    protected $projectsRepo;

    public function __construct(ProjectsRepo $projectsRepo)
    {
        $this->projectsRepo = $projectsRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index($id)
    {
        $project = $this->projectsRepo->find($id);

        return $this->sendResponse(TaskResource::collection($project->Tasks), 'Tasks retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTaskRequest $request
     * @return JsonResponse
     */
    public function store(StoreTaskRequest $request)
    {
        $input = $request->validated();

        /**
         * @var Project
         */
        $project = $this->projectsRepo->firstOrCreate($input['project_id']);

        $task = $project->Tasks()->create($input);

        $task->count($input['file']);

        return $this->sendResponse(new TaskResource($task), 'Task created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
