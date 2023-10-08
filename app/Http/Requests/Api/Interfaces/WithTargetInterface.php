<?php

namespace App\Http\Requests\Api\Interfaces;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface WithTargetInterface.
 */
interface WithTargetInterface
{
    /**
     * Get value of the id parameter.
     *
     * @return mixed
     */
    public function getId(): mixed;

    /**
     * Get target of the request.
     *
     * @param string $modelClass
     *
     * @return Model|null
     * @throws Exception
     */
    public function getTarget(string $modelClass): ?Model;
}
