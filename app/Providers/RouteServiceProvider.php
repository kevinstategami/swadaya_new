<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $namespace_cms = 'App\Http\Controllers\CMS';

    protected $namespace_backoffice = 'App\Http\Controllers\Backoffice';
    protected $namespace_backoffice_compro = 'App\Http\Controllers\Backoffice\Compro';

    protected $namespace_membership_auth = 'App\Http\Controllers\Auth';
    protected $namespace_membership = 'App\Http\Controllers\Membership';

    protected $namespace_backoffice_membership = 'App\Http\Controllers\Backoffice\Membership';
    protected $namespace_backoffice_referensi = 'App\Http\Controllers\Backoffice\Referensi';
    protected $namespace_backoffice_user_pengguna = 'App\Http\Controllers\Backoffice\UserPengguna';

    protected $namespace_backoffice_transaction = 'App\Http\Controllers\Backoffice\Transaction';


    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    public const HOME_MEMBERSHIP = '/membership/index/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapBackofficeComproRoutes();

        $this->mapMembershipAuthRoutes();

        $this->mapMembershipRoutes();

        $this->mapWebRoutesMembership();

        $this->mapWebRoutesReferensi();

        $this->mapUserPengguna();
        
        $this->mapWebRoutesTransaction();

        $this->mapCms();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/web.php'));

        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/membership.php'));
    }

    protected function mapWebRoutesMembership()
    {
        Route::middleware('web')
        ->namespace($this->namespace_backoffice_membership)
        ->group(base_path('routes/backoffice/membership/anggota.php'));
        Route::middleware('web')
        ->namespace($this->namespace_backoffice_membership)
        ->group(base_path('routes/backoffice/membership/activation.php'));
    }

    protected function mapWebRoutesTransaction()
    {
        Route::middleware('web')
        ->namespace($this->namespace_backoffice_transaction)
        ->group(base_path('routes/backoffice/transaction/invoice.php'));
        Route::middleware('web')
        ->namespace($this->namespace_backoffice_transaction)
        ->group(base_path('routes/backoffice/transaction/invoice-history.php'));
        Route::middleware('web')
        ->namespace($this->namespace_backoffice_transaction)
        ->group(base_path('routes/backoffice/transaction/wallet.php'));
    }

    protected function mapBackofficeComproRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace_backoffice_compro)
        ->group(base_path('routes/backoffice/compro/aboutus.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_compro)
        ->group(base_path('routes/backoffice/compro/visi.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_compro)
        ->group(base_path('routes/backoffice/compro/misi.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_compro)
        ->group(base_path('routes/backoffice/compro/syaratKeanggotaan.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_compro)
        ->group(base_path('routes/backoffice/compro/keuntunganAnggota.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_compro)
        ->group(base_path('routes/backoffice/compro/ketentuanAnggota.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_compro)
        ->group(base_path('routes/backoffice/compro/strukturAnggota.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_compro)
        ->group(base_path('routes/backoffice/compro/jenisKoperasi.php'));

    }

    protected function mapMembershipAuthRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace_membership_auth)
        ->group(base_path('routes/membership/auth.php'));
    }

    protected function mapMembershipRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace_membership)
        ->group(base_path('routes/membership/home.php'));

    }

    protected function mapWebRoutesReferensi()
    {
        Route::middleware('web')
        ->namespace($this->namespace_backoffice_referensi)
        ->group(base_path('routes/backoffice/referensi/jenisSimpanan.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_referensi)
        ->group(base_path('routes/backoffice/referensi/shu.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_referensi)
        ->group(base_path('routes/backoffice/referensi/bank.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_referensi)
        ->group(base_path('routes/backoffice/referensi/paymentMethod.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_referensi)
        ->group(base_path('routes/backoffice/referensi/province.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_referensi)
        ->group(base_path('routes/backoffice/referensi/city.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_referensi)
        ->group(base_path('routes/backoffice/referensi/limitTransaksi.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_referensi)
        ->group(base_path('routes/backoffice/referensi/documentType.php'));

        Route::middleware('web')
        ->namespace($this->namespace_backoffice_referensi)
        ->group(base_path('routes/backoffice/referensi/referralBonus.php'));
        
        Route::middleware('web')
        ->namespace($this->namespace_backoffice_referensi)
        ->group(base_path('routes/backoffice/referensi/advertisement.php'));
    }

    protected function mapUserPengguna()
    {
        Route::middleware('web')
        ->namespace($this->namespace_backoffice_user_pengguna)
        ->group(base_path('routes/backoffice/pengguna/pengguna.php'));

    }

    protected function mapCms()
    {
        Route::middleware('web')
        ->namespace($this->namespace_cms)
        ->group(base_path('routes/cms/progress.php'));

        Route::middleware('web')
        ->namespace($this->namespace_cms)
        ->group(base_path('routes/cms/jenis-koperasi.php'));

        Route::middleware('web')
        ->namespace($this->namespace_cms)
        ->group(base_path('routes/cms/fungsi-peran.php'));

        Route::middleware('web')
        ->namespace($this->namespace_cms)
        ->group(base_path('routes/cms/introduction-about-us.php'));

        Route::middleware('web')
        ->namespace($this->namespace_cms)
        ->group(base_path('routes/cms/introduction-homepage.php'));

        Route::middleware('web')
        ->namespace($this->namespace_cms)
        ->group(base_path('routes/cms/about-us.php'));

        Route::middleware('web')
        ->namespace($this->namespace_cms)
        ->group(base_path('routes/cms/logo.php'));

        Route::middleware('web')
        ->namespace($this->namespace_cms)
        ->group(base_path('routes/cms/sk.php'));

        Route::middleware('web')
        ->namespace($this->namespace_cms)
        ->group(base_path('routes/cms/block.php'));

    }
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api.php'));
    }
}
