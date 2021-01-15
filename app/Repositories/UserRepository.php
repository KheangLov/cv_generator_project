<?php

namespace App\Repositories;

use App\Actions\Jetstream\DeleteUser;
use App\Models\User;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }

    // public function getAllUsers()
    // {
    //     return $this->model->all();
    // }

    public function deleteUser($id, $soft = true)
    {
        $jetstreamUserDelete = resolve(DeleteUser::class);
        $user = $this->model->find($id);
        if (!$soft) {
            $jetstreamUserDelete->destory($user);
        }

        return $jetstreamUserDelete->delete($user);;
    }
}
