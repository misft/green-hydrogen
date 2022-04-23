<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if(Schema::hasTable('smtp_configs')){
            $mail = DB::table('smtp_configs')->first();
            if(!empty($mail))
            {
                $config = [
                    'driver' => 'smtp',
                    'host' => $mail->smtp_server,
                    'port' => $mail->smtp_port,
                    'from' => ['address' => $mail->smtp_from, 'name' => $mail->smtp_name],
                    'encryption' => $mail->smtp_auth,
                    'username' => $mail->smtp_username,
                    'password' => $mail->smtp_password,
                    'sendmail' => '/usr/sbin/sendmail -bs',
                    'pretend' => false
                ];

                Config::set('mail', $config);
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
