<?php

declare(strict_types=1);
namespace App\Http\Controllers\Api\v1\Workflow\Tasks;

use App\Http\Requests\Api\V1\Workflow\Tasks\StoreRequest;
use App\Jobs\Workflow\Tasks\CreateTask;
use Domains\Workflow\DataObjects\TaskObject;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Infrastructure\Workflow\Actions\CreateNewTaskContract;
use JustSteveKing\DataObjects\Facades\Hydrator;
use JustSteveKing\StatusCode\Http;

final class StoreController
{
    public function __invoke(StoreRequest $request): JsonResponse
    {
        dispatch(new CreateTask(
            task: Hydrator::fill(
                class: TaskObject::class,
                properties: [
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                    'status' => strval($request->get('status', 'open')),
                    'due' => $request->get('due') ? Carbon::parse(
                        time: strval($request->get('due')),
                    ) : null,
                    'completed' => $request->get('completed') ? Carbon::parse(
                        time: strval($request->get('completed')),
                    ) : null,
                ],
            ),
            user: intval($request->user()->id)
        ));
        return new JsonResponse(
            data: null,
            status: Http::ACCEPTED(),
        );
    }
}
