<?php

namespace Neil\MailSetting;

use Config; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MailSetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/resources/views','mailsetting');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

         $this->publishes([
        __DIR__.'/resources/views' => resource_path('views/smtp'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (\Schema::hasTable('settings')) {
            $mail = DB::table('settings')->first();
            if ($mail) //checking if table is not empty
            {
                $config = array(
                    'driver'     => $mail->driver,
                    'host'       => $mail->host,
                    'port'       => $mail->port,
                    'from'       => array('address' => $mail->username, 'name' => $mail->name),
                    'encryption' => $mail->encryption,
                    'username'   => $mail->username,
                    'password'   => $mail->password,
                    'sendmail'   => '/usr/sbin/sendmail -bs',
                    'pretend'    => false,
                );
                Config::set('mail', $config);
            }
        }
    }
}