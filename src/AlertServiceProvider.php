<?php

namespace Veldman\Alert;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class AlertServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'alert');

        Blade::include('alert::default', 'alerts');

        RedirectResponse::macro('error', function ($message) {
            return $this->with('status', ['type' => 'danger', 'message' => __($message)]);
        });

        RedirectResponse::macro('warning', function ($message) {
            return $this->with('status', ['type' => 'warning', 'message' => __($message)]);
        });

        RedirectResponse::macro('success', function ($message) {
            return $this->with('status', ['type' => 'success', 'message' => __($message)]);
        });

        RedirectResponse::macro('info', function ($message) {
            return $this->with('status', ['type' => 'info', 'message' => __($message)]);
        });
    }
}
