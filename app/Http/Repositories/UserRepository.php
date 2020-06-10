<?php


namespace App\Http\Repositories;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user=$user;
    }
    public function index(){
        return Auth::user();
    }

}
