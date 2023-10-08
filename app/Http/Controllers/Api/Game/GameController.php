<?php

namespace App\Http\Controllers\Api\Game;

use App\Http\Controllers\CrudController;
use App\Http\Requests\Api\Crud\CrudRequest;
use App\Http\Requests\Api\Game\IndexGameRequest;
use App\Http\Requests\Api\Game\ShowGameRequest;
use App\Http\Resources\GameCollection;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class GameController.
 */
class GameController extends CrudController
{
    /**
     * Controller's model resource class.
     *
     * @var string
     */
    protected string $resourceClass = GameResource::class;

    /**
     * Controller's model resource collection class.
     *
     * @var string
     */
    protected string $collectionClass = GameCollection::class;

    /**
     * List of enabled CRUD operations
     * and their corresponding requests.
     *
     * @var array
     */
    protected array $operations = [
        'index' => IndexGameRequest::class,
        'show' => ShowGameRequest::class,
    ];

    /**
     * Get eloquent query builder instance.
     *
     * @param CrudRequest $request
     *
     * @return Builder
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function builder(CrudRequest $request): Builder
    {
        return Game::query();
    }
}
