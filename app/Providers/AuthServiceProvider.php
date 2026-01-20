<?php

namespace App\Providers;

use App\Models\Juridica\LeyVigente;
use App\Models\Juridica\ProcesoJuridico;
use App\Models\Juridica\PublicacionSecop;
use App\Policies\Juridica\LeyVigentePolicy;
use App\Policies\Juridica\ProcesoJuridicoPolicy;
use App\Policies\Juridica\PublicacionSecopPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        ProcesoJuridico::class => ProcesoJuridicoPolicy::class,
        PublicacionSecop::class => PublicacionSecopPolicy::class,
        LeyVigente::class => LeyVigentePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
