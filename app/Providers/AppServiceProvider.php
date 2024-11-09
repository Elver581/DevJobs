<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        VerifyEmail::toMailUsing(function($notifiable, $url){
            return(new MailMessage)
            ->subject('Verificar cuenta')
            ->line('Tu cuenta esta casi lista sigue el enlace a continuacion')
            ->action('Confirma tu cuenta', $url)
            ->line('Si no creaste esta cuenta, ignora este mensaje');

        });
    }
}
