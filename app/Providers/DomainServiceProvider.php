<?php

declare(strict_types=1);

namespace App\Providers;

use Domains\Taxonomy\Providers\TaxonomyServiceProvider;
use Domains\Workflow\Providers\WorkflowServiceProvider;
use Illuminate\Support\ServiceProvider;

final class DomainServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(
            provider: WorkflowServiceProvider::class,
        );
        $this->app->register(
            provider: TaxonomyServiceProvider::class,
        );
    }
}