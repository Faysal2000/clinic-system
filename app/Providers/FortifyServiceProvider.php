<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $request = request();

        // Admin Panel Config
        if ($request->is('admin/*')) {
            Config::set('fortify.guard', 'admin');
            Config::set('fortify.passwords', 'admins');
            Config::set('fortify.prefix', 'admin');
        } else {
            Config::set('fortify.guard', 'web');
            Config::set('fortify.passwords', 'users');
        }
    }

    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        /*
        |--------------------------------------------------------------------------
        | Login Rate Limit
        |--------------------------------------------------------------------------
        */
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::lower($request->input(Fortify::username())) . '|' . $request->ip();
            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        /*
        |--------------------------------------------------------------------------
        | 🔥 Redirect After Login (المهم)
        |--------------------------------------------------------------------------
        */
        Fortify::redirects('login', function (Request $request) {

            $user = auth()->user();

            if (!$user) {
                return '/';
            }

            // لو عندك spatie roles
            if ($user->hasRole('admin')) {
                return '/admin/dashboard';
            }

            // المستخدم العادي يرجع للواجهة
            return '/';
        });

        /*
        |--------------------------------------------------------------------------
        | Auth Views
        |--------------------------------------------------------------------------
        */
        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        /*
        |--------------------------------------------------------------------------
        | View Prefix
        |--------------------------------------------------------------------------
        */
        if (Config::get('fortify.guard') == 'admin') {
            Fortify::viewPrefix('auth.');
        } else {
            Fortify::viewPrefix('front.auth.');
        }
    }
}
