<?php

declare(strict_types=1);
namespace Domains\Workflow\Routing\Registrars;
use App\Http\Controllers\Api\V1\Workflow\Tasks\DeleteController;
use App\Http\Controllers\Api\V1\Workflow\Tasks\IndexController;
use App\Http\Controllers\Api\V1\Workflow\Tasks\StoreController;
use App\Http\Controllers\Api\V1\Workflow\Tasks\UpdateController;
use App\Routing\Contracts\RouteRegistrar as ContractsRouteRegistrar;
use Illuminate\Contracts\Routing\Registrar;
use Todo\Routing\Contracts\RouteRegistrar;
final class TaskRouteRegistrar implements ContractsRouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        $registrar->group(
            attributes: [
                'middleware' => ['api', 'auth:sanctum', 'throttle:6,1',],
                'prefix' => 'api/v1/tasks',
                'as' => 'api:v1:tasks:',
            ],
            routes: static function (Registrar $router): void {
                $router->get(
                    '/',
                    IndexController::class,
                )->name('index');
                $router->post(
                    '/',
                    StoreController::class,
                )->name('store');
                $router->put(
                    '{task}',
                    UpdateController::class,
                )->name('update');
                $router->delete(
                    '{task}',
                    DeleteController::class,
                )->name('delete');
            },
        );
    }
}