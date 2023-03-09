<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersContactsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'phonePrefix' => $this->phonePrefix,
            'phoneNumber' => $this->phoneNumber,
            'landlinePrefix' => $this->landlinePrefix,
            'landlineNumber' => $this->landlineNumber
        ];
    }   
}
