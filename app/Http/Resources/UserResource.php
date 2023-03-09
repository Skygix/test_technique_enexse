<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'userId' => $this->userId,
            'username' => $this->username,
            'fullName' => $this->fullname,
            'gender' => $this->gender->name,
            'email' => $this->email,
            'emailPec' => $this->emailPec,
            'roles' => UsersRolesResource::collection($this->roles),
            'dateOfBirth' => $this->dateOfBirth,
            'lastLogin' => $this->lastLogin,
            'createdAt' => $this->created_at,
            'active' => (bool)$this->active,
            'userAddress' => UsersAdressesResource::collection($this->adresses),
            'userContact' => UsersContactsResource::collection($this->contacts)
        ];
    }

     /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request
     * @param  \Illuminate\Http\Response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->header('Charset', 'utf-8');
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
