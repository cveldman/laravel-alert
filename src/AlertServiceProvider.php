<?php

namespace Veldman\Alert;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
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
