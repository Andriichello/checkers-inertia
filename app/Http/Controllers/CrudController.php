<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Traits\PaginationTrait;
use App\Http\Requests\Api\Crud\CrudRequest;
use App\Http\Requests\Api\Crud\IndexRequest;
use App\Http\Requests\Api\Crud\ShowRequest;
use BadMethodCallException;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class CrudController.
 */
abstract class CrudController extends Controller
{
    use PaginationTrait;

    /**
     * List of enabled CRUD operations
     * and their corresponding requests.
     *
     * @var array
     */
    protected array $operations = [
        'index' => IndexRequest::class,
        'show' => ShowRequest::class,
    ];


    /**
     * Controller's model resource class.
     *
     * @var string
     */
    protected string $resourceClass;

    /**
     * Controller's model resource collection class.
     *
     * @var string
     */
    protected string $collectionClass;

    /**
     * Handle calls to missing methods on the controller.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     *
     * @throws BadMethodCallException|ValidationException|AuthorizationException
     */
    public function __call($method, $parameters): mixed
    {
        if (in_array($method, $this->getOperations())) {
            return $this->handle($method, request());
        }

        return parent::__call($method, $parameters);
    }

    /**
     * Check if user is authorized to perform a given request.
     *
     * @param CrudRequest $request
     *
     * @return void
     * @throws AuthorizationException
     */
    public function checkPolicy(CrudRequest $request): void
    {
        $result = true;

        if (isset($this->policy)) {
            $result = $this->policy->determine($request);
        }

        if ($result === false) {
            throw new AuthorizationException();
        }
    }

    /**
     * Handle given CRUD operation request.
     *
     * @param string $operation
     * @param CrudRequest $request
     *
     * @return JsonResponse
     * @throws AuthorizationException|ValidationException
     */
    public function handle(string $operation, Request $request): JsonResponse
    {
        /** @var CrudRequest $operationRequest */
        $operationRequest = $this->getOperationRequest($operation);
        $specificRequest = $operationRequest::createFrom($request);

        $this->checkPolicy($specificRequest);
        $specificRequest->validateResolved();

        $method = 'handle' . ucfirst($operation);
        return $this->$method($specificRequest);
    }

    /**
     * Handle index operation.
     *
     * @param IndexRequest $request
     *
     * @return JsonResponse
     * @throws Exception
     */
    protected function handleIndex(IndexRequest $request): JsonResponse
    {
        $builder = $this->builder($request);
        $paginator = $this->paginateResource($builder, $this->collectionClass);

        return new JsonResponse($paginator->toArray());
    }

    /**
     * Handle show operation.
     *
     * @param ShowRequest $request
     *
     * @return JsonResponse
     */
    protected function handleShow(ShowRequest $request): JsonResponse
    {
        /** @var Model $model */
        $model = $this->builder($request)
            ->findOrFail($request->getId());

        $data = new ($this->resourceClass)($model);

        return new JsonResponse(compact('data'));
    }

    /**
     * Get available controller operations.
     *
     * @return string[]
     */
    public function getOperations(): array
    {
        return array_keys($this->operations);
    }

    /**
     * Get request type for given operation.
     *
     * @param string $operation
     * @return string|null
     */
    public function getOperationRequest(string $operation): ?string
    {
        return data_get($this->operations, $operation);
    }
}
