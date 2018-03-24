<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Lcobucci\JWT\Parser;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.
        $this->app['auth']->viaRequest('api', function ($request) {
            $token = substr($request->header('Authorization'), 7);
            
            if ($token) {
                $parsedToken = (new Parser())->parse((string) $token);
                $user = factory(\App\Models\User::class)->make([
                    'uid' => $parsedToken->getClaim('UserInfo')->id,
                    'name' => $parsedToken->getClaim('UserInfo')->name,
                    'firstname' => $parsedToken->getClaim('UserInfo')->first_name,
                    'lastname' => $parsedToken->getClaim('UserInfo')->last_name,
                    'email' => $parsedToken->getClaim('UserInfo')->email
                ]);

                return $user;
            }
            return null;
        });
    }
}
