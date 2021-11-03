<?php

namespace App\Providers;
use App\Models\Resource;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Aluno' => 'App\Policies\AlunoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //
        $resources=Resource::all();
        //dd( $resources);
            foreach($resources as $resource){
               // dd();
                Gate::define($resource->resource, function($user) use ($resource){
                return $resource->roles->contains($user->role);
                //$user->isAdmin();
                });
        }

        //dd(Gate::abilities());
    }
}
