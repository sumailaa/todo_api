<?php

declare(strict_types=1);
namespace Domains\Workflow\Providers;
use Domains\Workflow\Actions\CreateNewTask;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Workflow\Actions\CreateNewTaskContract;
final class ActionsServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CreateNewTaskContract::class => CreateNewTask::class,
    ];
}