<?php

use Illuminate\Database\Seeder;

class MailSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        \DB::table("mail_settings")->truncate();
        \App\MailSetting::insert([
            [
                'id' => 1,
                'from_name' => 'BetaLyf',
                'from_address'=> 'support@betalyf.com',
                'reply_to'  => 'noreply@betalyf.com',
                'username'  => 'futurerealityfoundation@gmail.com',
                'password'  => '3handsofGod@123',
                'driver'    => 'smtp',
                'host'      =>  'smtp.gmail.com',
                'port'      => '587',
                'encryption'=> 'tls',
                'is_active' => 1
            ],
        ]);
    }
}
