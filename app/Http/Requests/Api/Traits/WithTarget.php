<?php

namespace App\Http\Requests\Api\Traits;

use App\Http\Requests\BaseRequest;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Trait WithTarget.
 *
 * @mixin BaseRequest
 */
trait WithTarget
{
    /**
     * Name of the id parameter.
     *
     * @var string
     */
    protected string $idKey = 'id';

    /**
     * Get value of the id parameter.
     *
     * @return mixed
     */
    public function getId(): mixed
    {
        $formId = $this->get($this->idKey);
        $routeId = $this->route($this->idKey);

        return $routeId ?? $formId;
    }

    /**
     * Get target of the request.
     *
     * @param string $modelClass
     *
     * @return Model|null
     * @throws Exception
     */
    public function getTarget(string $modelClass): ?Model
    {
        if (is_subclass_of($modelClass, Model::class)) {
            return $modelClass::query()
                ->where($this->idKey, $this->getId())
                ->first();
        }

        throw new Exception(
            'Target type must an instance of Eloquent Model.'
            . ' Specify the needed concrete type in class\' @method annotation.'
        );
    }

    /**
     * Get target of the request or fail.
     *
     * @param string $modelClass
     *
     * @return Model|null
     * @throws Exception
     */
    public function getTargetOrFail(string $modelClass): ?Model
    {
        if ($target = $this->getTarget($modelClass)) {
            return $target;
        }

        throw new Exception(
            'Failed to find ' . $modelClass
            . ' with ' . $this->idKey . ': ' . json_encode($this->getId())
        );
    }
}
