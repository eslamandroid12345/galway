<?php

namespace App\Providers;

use App\Repository\AboutRepositoryInterface;
use App\Repository\ArticleRepositoryInterface;
use App\Repository\CalenderRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\CenterNewsRepositoryInterface;
use App\Repository\CenterProgrammeRepositoryInterface;
use App\Repository\CenterPublicationRepositoryInterface;
use App\Repository\ContactRepositoryInterface;
use App\Repository\Eloquent\AboutRepository;
use App\Repository\Eloquent\ArticleRepository;
use App\Repository\Eloquent\CalenderRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\CenterNewsRepository;
use App\Repository\Eloquent\CenterProgrammeRepository;
use App\Repository\Eloquent\CenterPublicationRepository;
use App\Repository\Eloquent\ContactRepository;
use App\Repository\Eloquent\LectureRepository;
use App\Repository\Eloquent\ManagerRepository;
use App\Repository\Eloquent\MapCenterRepository;
use App\Repository\Eloquent\MemberRepository;
use App\Repository\Eloquent\PermissionRepository;
use App\Repository\Eloquent\ProgramRepository;
use App\Repository\Eloquent\Repository;
use App\Repository\Eloquent\RoleRepository;
use App\Repository\Eloquent\SettingsRepository;
use App\Repository\Eloquent\StructureRepository;
use App\Repository\Eloquent\TreeStructureRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\VisitorRepository;
use App\Repository\LectureRepositoryInterface;
use App\Repository\ManagerRepositoryInterface;
use App\Repository\MapCenterRepositoryInterface;
use App\Repository\MemberRepositoryInterface;
use App\Repository\PermissionRepositoryInterface;
use App\Repository\ProgramRepositoryInterface;
use App\Repository\RepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use App\Repository\SettingsRepositoryInterface;
use App\Repository\StructureRepositoryInterface;
use App\Repository\TreeStructureRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Repository\VisitorRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RepositoryInterface::class, Repository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
        $this->app->singleton(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->singleton(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->singleton(ManagerRepositoryInterface::class, ManagerRepository::class);
        $this->app->singleton(CenterProgrammeRepositoryInterface::class, CenterProgrammeRepository::class);
        $this->app->singleton(CenterPublicationRepositoryInterface::class, CenterPublicationRepository::class);
        $this->app->singleton(CenterNewsRepositoryInterface::class, CenterNewsRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->singleton(AboutRepositoryInterface::class, AboutRepository::class);
        $this->app->singleton(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->singleton(MapCenterRepositoryInterface::class, MapCenterRepository::class);
        $this->app->singleton(StructureRepositoryInterface::class, StructureRepository::class);
        $this->app->singleton(MemberRepositoryInterface::class, MemberRepository::class);
        $this->app->singleton(ProgramRepositoryInterface::class, ProgramRepository::class);
        $this->app->singleton(LectureRepositoryInterface::class, LectureRepository::class);
        $this->app->singleton(VisitorRepositoryInterface::class, VisitorRepository::class);
        $this->app->singleton(CalenderRepositoryInterface::class, CalenderRepository::class);
        $this->app->singleton(TreeStructureRepositoryInterface::class, TreeStructureRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
