<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Auth;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([])
            ->middleware(['web'])
            ->authMiddleware(['auth', 'restrict.admin.panel'])
            ->authGuard('web');
    }

    public function boot()
    {
        $this->app->router->aliasMiddleware('restrict.admin.panel', function ($request, $next) {
            if (!Auth::check() || Auth::user()->role !== 'admin') {
                abort(403, 'Unauthorized access to admin panel');
            }
            return $next($request);
        });
    }
}