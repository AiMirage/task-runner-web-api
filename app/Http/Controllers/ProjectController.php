<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectsListResource;
use App\Repositories\ProjectsRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{

    protected $projectsRepo;

    public function __construct(ProjectsRepo $projectsRepo)
    {
        $this->projectsRepo = $projectsRepo;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $projects = $this->projectsRepo->allQuery()->paginate(10);

        return $this->sendResponse(ProjectsListResource::collection($projects), 'Projects retrieved successfully');
    }
}
