<?php

namespace App\Http\Controllers\API;

use App\Models\Role;
use App\Models\User;
use App\Models\Gender;
use App\Models\UsersRoles;
use Illuminate\Http\Request;
use App\Models\UsersAdresses;
use App\Models\UsersContacts;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $userId = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 1, 2)
        .substr(str_shuffle('123456789'), 1, 5);
        $gender = Gender::where('name', 'LIKE', $request->gender)->first();
        $role = Role::where('name', 'ROLE_USER')->first();

        $user = User::create([
            'userId' => $userId,
            'username' => $request->username,
            'fullname' => $request->fullname,
            'gender_id' => $gender->id,
            'email' => $request->email,
            'emailPec' => $request->emailPec,
            'dateOfBirth' => $request->dateOfBirth,
            'active' => 1
        ]);

        UsersAdresses::create([
            'country' => $request->country,
            'state' => $request->state,
            'addressLine' => $request->addressLine,
            'zipCode' => $request->zipCode ?? 0,
            'user_id' => $user->id,
        ]);

        UsersContacts::create([
            'phonePrefix' => $request->phonePrefix,
            'phoneNumber' => $request->phoneNumber,
            'landlinePrefix' => $request->landlinePrefix,
            'landlineNumber' => $request->landlineNumber,
            'user_id' => $user->id,
        ]);

        UsersRoles::create([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);
        
        //return informations about new user
        return new UserResource($user);

    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, $userId)
    {
        $user = User::find($userId);
        $gender = Gender::where('name', 'LIKE', $request->gender)->first();

        $address = UsersAdresses::where('user_id', $user->id)->first();        
        $contact = UsersContacts::where('user_id', $user->id)->first();

        $user->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'gender_id' => $gender->id,
            'email' => $request->email,
            'emailPec' => $request->emailPec,
            'dateOfBirth' => $request->dateOfBirth
        ]);

        $address->update([
            'country' => $request->country,
            'state' => $request->state,
            'addressLine' => $request->addressLine,
            'zipCode' => $request->zipCode ?? 0,
        ]);

        $contact->update([
            'phonePrefix' => $request->phonePrefix,
            'phoneNumber' => $request->phoneNumber,
            'landlinePrefix' => $request->landlinePrefix,
            'landlineNumber' => $request->landlineNumber,
        ]);

        //return informations about new user
        return new UserResource($user);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userId)
    {
        //Retrieve the user
        $user = User::find($userId);
      
        //Delete User
        $user->delete();

        return response()->json();
    }
}
