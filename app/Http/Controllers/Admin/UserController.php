<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Interfaces\UserInterface;

class UserController extends BaseController
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->listUsers();

        $this->setPageTitle('Users', 'List of all users');
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->setPageTitle('Users', 'Create user');
        return view('admin.users.create');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'address' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'post_code' => 'required',
        ]);

        $params = $request->except('_token');
        //echo($params);
        $user = $this->userRepository->updateUser($params);
        //dd($params);
        if (!$user) {
            return $this->responseRedirectBack('Error occurred while updating user.', 'error', true, true);
        }
        return $this->responseRedirectBack('User updated successfully', 'success', false, false);
    }
    public function edit($id)
    {
        $user = $this->userRepository->findUserById($id);

        $this->setPageTitle('Users', 'Edit user : ' . $user->name);
        return view('admin.users.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'address' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'post_code' => 'required',
        ]);

        $params = $request->except('_token');

        $user = $this->userRepository->createUser($params);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while creating user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.users.index', 'User added successfully', 'success', false, false);
    }

    public function delete($id)
    {
        $user = $this->userRepository->deleteUser($id);
        if (!$user) {
            return $this->responseRedirectBack('Error occured while deletingf user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.users.index', 'user deleted successfully', 'success', false, false);
    }

}
