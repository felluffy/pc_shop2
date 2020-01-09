<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Interfaces\UserInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
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
        //error_log($params);
        $params = array_merge($params, array('password' => auth()->user()->password, 'id' => auth()->user()->id));
        //error_log($params);
        //  dd($params);
        $user = auth()->user();
        $user->update(collect($params)->except('_token')->all());
        $user->save();
        return redirect()->back();
        //$user = $this->userRepository->updateUser($params);

    }

    //public function show($)
}
