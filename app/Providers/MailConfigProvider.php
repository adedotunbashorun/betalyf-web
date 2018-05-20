<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Config;
use DB;

class MailConfigProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // if(Schema::hasTable('mail_settings')){
        //     $setting = \DB::table("mail_settings")->first();
        //     if(isset($setting->host)){
        //         config(['mail.host' => $setting->host]);
        //         config(['mail.port' => $setting->port]);
        //         config(['mail.username' => $setting->username]);
        //         config(['mail.password' => $setting->password]);
        //         config(['mail.encryption' => $setting->encryption]);
        //         config(['mail.from.address' => $setting->from_email]);
        //         config(['mail.from.name' => $setting->from_name]);
        //     }
        // }
        if (Schema::hasTable('mail_settings')) {
            $mail = DB::table('mail_settings')->where('is_active',1)->first();
            if (isset($mail)) //checking if table is not empty
            {
                $config = array(
                    'driver' => $mail->driver,
                    'host' => $mail->host,
                    'port' => $mail->port,
                    'from' => array('address' => $mail->from_address, 'name' => $mail->from_name),
                    'encryption' => $mail->encryption,
                    'username' => $mail->username,
                    'password' => $mail->password,
                    'sendmail' => '/usr/sbin/sendmail -bs',
                    'pretend' => false,
                );
                Config::set('mail', $config);
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
