<?php

declare(strict_types=1);
namespace Domains\Workflow\Actions;
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\Workflow\Actions\CreateNewTaskContract;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;
final class CreateNewTask implements CreateNewTaskContract
{
    public function handle(DataObjectContract $task, int $user): Task|Model
    {
        return Task::query()->create(
            attributes: array_merge(
                $task->toArray(),
                ['user_id' => $user],
            ),
        );
    }
}