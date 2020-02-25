<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class GetOrCreateUserByCredentialsTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class GetOrCreateUserByCredentialsTask extends Task
{

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param bool        $isClient
     * @param string      $email
     * @param string      $password
     * @param string|null $name
     * @param string|null $gender
     * @param string|null $birth
     *
     * @return  mixed
     * @throws  CreateResourceFailedException
     */
    public function run(array $data) {


        try {
            // create new user
            $user = $this->repository->updateOrCreate($data);
        } catch (Exception $e) {
            throw (new CreateResourceFailedException())->debug($e);
        }

        return $user;
    }

}
