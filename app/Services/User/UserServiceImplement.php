<?php

namespace App\Services\User;

use App\Traits\Image;
use App\Helpers\Response;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;

class UserServiceImplement implements UserService
{
    use Image;

    protected $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findUserById($id)
    {
        try {
            $user = $this->userRepository->findOneById($id);
            return $user ? Response::objectResponse('User found!', true, $user) : Response::objectResponse('User not found!');
        } catch (\Throwable $th) {
            return Response::objectResponse('an Error occurred while searching for data!');
        }
    }

    public function updateUser($id, $data)
    {
        try {
            $getUserResponse = $this->findUserById($id);

            if($getUserResponse->success){
                if(array_key_exists('photo', $data) && $data['photo']){
                    // Save Image to Directory & Delete Old Image (If Exists)
                    $fileName = $this->saveImage($data['photo'], 'user', $getUserResponse->data->photo);

                    // Set New File Name
                    $data['photo'] = $fileName;
                }
    
                // Save Data to Database
                $this->userRepository->updateById($id, $data);
                return Response::objectResponse('User Account Successfully Updated!', true);
            }

            return $getUserResponse;
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return Response::objectResponse('Failed to Update User Account!');
        }
    }
    
    public function updateUserPassword($id, $data)
    {
        try {
            $getUserResponse = $this->findUserById($id);
            if($getUserResponse->success){
                $user = $getUserResponse->data;
                $validCurrentPassword = Hash::check($data['current_password'], $user->password);

                if($validCurrentPassword){
                    $validNewPassword = $data['new_password'] == $data['confirm_password'];
                    if($validNewPassword){
                        // Set Password
                        $data['password'] = Hash::make($data['new_password']);

                        // Delete (Unset) Non Necessary data
                        unset($data['current_password'], $data['new_password'], $data['confirm_password']);

                        // Save Password to Database
                        $this->userRepository->updateById($id, $data);
                        return Response::objectResponse('User Account Successfully Updated!', true);
                    }
                    return Response::objectResponse('Your New Password Not Match! Please Check Your New Password!');
                }
                return Response::objectResponse("Current Password Doesn't Match!");
            }

            return $getUserResponse;
        } catch (\Throwable $th) {
            return Response::objectResponse('Failed to Update User Account!');
        }
    }
}