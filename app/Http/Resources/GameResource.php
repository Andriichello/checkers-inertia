<?php

namespace App\Http\Resources;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class GameResource.
 *
 * @mixin Game
 */
class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_one_id' => $this->user_one_id,
            'user_two_id' => $this->user_two_id,
            'state' => $this->state,
            'moves' => $this->moves,
            'metadata' => $this->metadata,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'userOne' => new UserResource($this->userOne),
            'userTwo' => new UserResource($this->userTwo),
        ];
    }
}
