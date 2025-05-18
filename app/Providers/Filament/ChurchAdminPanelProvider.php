<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;

class ChurchAdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('church_admin')
            ->path('church-admin')
            ->login()
            ->colors([
                'primary' => Color::hex('#FFCC33'),
            ])
            ->discoverResources(in: app_path('Filament/ChurchAdmin/Resources'), for: 'App\\Filament\\ChurchAdmin\\Resources')
            ->discoverPages(in: app_path('Filament/ChurchAdmin/Pages'), for: 'App\\Filament\\ChurchAdmin\\Pages')
            ->discoverWidgets(in: app_path('Filament/ChurchAdmin/Widgets'), for: 'App\\Filament\\ChurchAdmin\\Widgets')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([Authenticate::class])
            ->authGuard('church_admin');
    }
}