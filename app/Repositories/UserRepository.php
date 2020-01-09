<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserInterface;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\DBAL\Exception\InvalidArgumentException;

class UserRepository extends BaseRepository implements UserInterface
{

    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findUserById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function createUser(array $params)
    {
        try {
            $params['password'] = bcrypt($params['password']);
            $collection = collect($params);
            //$merge = $collection->merge();

            $user = new User($collection->all());

            $user->save();

            return $user;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateUser(array $params)
    {

        $user = $this->findUserById($params['id']);
        $params = array_merge($params, array("password"=>$user->password));
        $collection = collect($params)->except('_token');

        $user->update($collection->all());

        return $user;
    }

    public function deleteUser($id)
    {
        $user = $this->findUserById($id);
        $user->delete();

        return $user;
    }
}
