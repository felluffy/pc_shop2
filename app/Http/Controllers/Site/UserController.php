<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {

        $user = auth()->user();
        return view('site.pages.user_profile', compact('user'));
    }

    public function update(Request $request)
    {
        $params = $request->except('_token');

        $params = array_merge($params, array('password' => auth()->user()->password, 'id' => auth()->user()->id));

        $user = auth()->user();
        $user->update(collect($params)->except('_token')->all());
        if(!$user->save())
        {
            return $this->responseRedirectBack('Error occured while upadting information.', 'error', true, true);
        }
        return $this->responseRedirect('user.profile.index', 'Information updated successfully', 'success', false, false);
    }


}
