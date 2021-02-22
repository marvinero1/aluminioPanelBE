<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::tokensCan([
            'root' => "super usuario del sistema",
            'admin' => "administrador del sistema",
            'cliente' => "cliente app",
            'apiweb' => "cliente api"
        ]);

        Passport::routes();

        Passport::personalAccessClientId(3);

        Passport::personalAccessClientSecret('XJrxBjPth3VuGPMS1WwvzaBDuxT2Fcjof0N6ZK65');

        Passport::tokensExpireIn(now()->addDays(15));

        Passport::refreshTokensExpireIn(now()->addDays(30));

        Passport::personalAccessTokensExpireIn(now()->addYears(100));
    }
}
