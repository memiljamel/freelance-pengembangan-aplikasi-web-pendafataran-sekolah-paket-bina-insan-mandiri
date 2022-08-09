<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\Personal;
use App\Models\User;
use App\Policies\AnnouncementPolicy;
use App\Policies\GalleryPolicy;
use App\Policies\PersonalPolicy;
use App\Policies\UserPolicy;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Announcement::class => AnnouncementPolicy::class,
        Gallery::class => GalleryPolicy::class,
        Personal::class => PersonalPolicy::class,
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
    }
}
