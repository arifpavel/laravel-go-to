<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;


class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
     return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
        {
            $userSocial =   Socialite::driver($provider)->stateless()->user();
            $users       =   User::where(['email' => $userSocial->getEmail()])->first();
            if($users){
                        Auth::login($users);
                        return redirect('/');
                    }else{
                        $user = User::create([
                                'username'          => $userSocial->getName(),
                                'email'         => $userSocial->getEmail(),
                                'image'         => $userSocial->getAvatar(),
                                'provider_id'   => $userSocial->getId(),
                                'provider'      => $provider,
                                'satus'      => 'active',
                            ]);
                        //Attache default role to user.
                        $user->assignRole('user');
                        return redirect()->route('/');
                    }
        }
    
}
