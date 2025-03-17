<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

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
        VerifyEmail::toMailUsing(function($notifiable, $url) {
           return (New MailMessage)
           ->greeting('Hola!')
           ->subject('Verifica tu Cuenta')
           ->line('Haz clic en el botón de abajo para verificar tu dirección de correo electrónico.')
           ->action('Confirmar cuenta', $url)
           ->line('Si no creaste una cuenta, no es necesario realizar ninguna acción.');
        });
    }
}
