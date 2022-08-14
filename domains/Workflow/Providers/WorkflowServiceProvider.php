<?php

declare(strict_types=1);
namespace Domains\Workflow\Providers;
use Illuminate\Support\ServiceProvider;
final class WorkflowServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(
            provider: ActionsServiceProvider::class,
        );
    }
}