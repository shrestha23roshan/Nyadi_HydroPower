<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryEloquent;
use Modules\Configuration\Repositories\User\UserRepository;
use Modules\Configuration\Repositories\User\UserRepositoryEloquent;
use Modules\Configuration\Repositories\Role\RoleRepository;
use Modules\Configuration\Repositories\Role\RoleRepositoryEloquent;
use Modules\Configuration\Repositories\Module\ModuleRepository;
use Modules\Configuration\Repositories\Module\ModuleRepositoryEloquent;
use Illuminate\Support\Facades\Schema;
use Modules\AboutUs\Repositories\CompanyProfile\CompanyProfileRepository;
use Modules\AboutUs\Repositories\CompanyProfile\CompanyProfileRepositoryEloquent;
use Modules\AboutUs\Repositories\BOD\BodRepository;
use Modules\AboutUs\Repositories\BOD\BodRepositoryEloquent;
use Modules\AboutUs\Repositories\Team\TeamRepository;
use Modules\AboutUs\Repositories\Team\TeamRepositoryEloquent;
use Modules\MediaManagement\Repositories\Banner\BannerRepository;
use Modules\MediaManagement\Repositories\Banner\BannerRepositoryEloquent;
use Modules\Projects\Repositories\NHP\NHPRepository;
use Modules\Projects\Repositories\NHP\NHPRepositoryEloquent;
use Modules\Projects\Repositories\ProgressReport\ProgressReportRepository;
use Modules\Projects\Repositories\ProgressReport\ProgressReportRepositoryEloquent;
use Modules\InvestorRelations\Repositories\AnnualReport\AnnualReportRepository;
use Modules\InvestorRelations\Repositories\AnnualReport\AnnualReportRepositoryEloquent;
use Modules\InvestorRelations\Repositories\FinancialReport\FinancialReportRepository;
use Modules\InvestorRelations\Repositories\FinancialReport\FinancialReportRepositoryEloquent;
use Modules\MediaManagement\Repositories\Album\AlbumRepository;
use Modules\MediaManagement\Repositories\Album\AlbumRepositoryEloquent;
use Modules\MediaManagement\Repositories\AlbumPhoto\AlbumPhotoRepository;
use Modules\MediaManagement\Repositories\AlbumPhoto\AlbumPhotoRepositoryEloquent;
use Modules\MediaManagement\Repositories\Video\VideoRepository;
use Modules\MediaManagement\Repositories\Video\VideoRepositoryEloquent;
use Modules\NewsAndUpdate\Repositories\News\NewsRepository;
use Modules\NewsAndUpdate\Repositories\News\NewsRepositoryEloquent;
use Modules\Seo\Repositories\Seo\SeoRepository;
use Modules\Seo\Repositories\Seo\SeoRepositoryEloquent;
use Modules\Settings\Repositories\Setting\SettingRepository;
use Modules\Settings\Repositories\Setting\SettingRepositoryEloquent;
use Modules\Popup\Repositories\Popup\PopupRepository;
use Modules\Popup\Repositories\Popup\PopupRepositoryEloquent;
use Modules\CSR\Repositories\CSP\CSPRepository;
use Modules\CSR\Repositories\CSP\CSPRepositoryEloquent;
use Modules\MediaManagement\Repositories\MainAlbum\MainAlbumRepository;
use Modules\MediaManagement\Repositories\MainAlbum\MainAlbumRepositoryEloquent;
use Modules\Pages\Repositories\Page\PageRepository;
use Modules\Pages\Repositories\Page\PageRepositoryEloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultstringlength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            BaseRepository::class,
            BaseRepositoryEloquent::class
        );
        $this->app->singleton(
            UserRepository::class,
            UserRepositoryEloquent::class
        );
        $this->app->singleton(
            RoleRepository::class,
            RoleRepositoryEloquent::class
        );
        $this->app->singleton(
            ModuleRepository::class,
            ModuleRepositoryEloquent::class
        );
        $this->app->singleton(
            CompanyProfileRepository::class,
            CompanyProfileRepositoryEloquent::class
        );
        $this->app->singleton(
            BodRepository::class,
            BodRepositoryEloquent::class
        );
        $this->app->singleton(
            TeamRepository::class,
            TeamRepositoryEloquent::class
        );
        $this->app->singleton(
            BannerRepository::class,
            BannerRepositoryEloquent::class
        );
        $this->app->singleton(
            NHPRepository::class,
            NHPRepositoryEloquent::class
        );
        $this->app->singleton(
            ProgressReportRepository::class,
            ProgressReportRepositoryEloquent::class
        );
        $this->app->singleton(
            AnnualReportRepository::class,
            AnnualReportRepositoryEloquent::class
        );
        $this->app->singleton(
            FinancialReportRepository::class,
            FinancialReportRepositoryEloquent::class
        );
        $this->app->singleton(
            AlbumRepository::class,
            AlbumRepositoryEloquent::class
        );
        $this->app->singleton(
            AlbumPhotoRepository::class,
            AlbumPhotoRepositoryEloquent::class
        );
        $this->app->singleton(
            VideoRepository::class,
            VideoRepositoryEloquent::class
        );
        $this->app->singleton(
            NewsRepository::class,
            NewsRepositoryEloquent::class
        );
        $this->app->singleton(
            SeoRepository::class,
            SeoRepositoryEloquent::class
        );
        $this->app->singleton(
            SettingRepository::class,
            SettingRepositoryEloquent::class
        );
        $this->app->singleton(
            PopupRepository::class,
            PopupRepositoryEloquent::class
        );
        $this->app->singleton(
            CSPRepository::class,
            CSPRepositoryEloquent::class
        );
        $this->app->singleton(
            PageRepository::class,
            PageRepositoryEloquent::class
        );
        $this->app->singleton(
            MainAlbumRepository::class,
            MainAlbumRepositoryEloquent::class
        );
    }
}
