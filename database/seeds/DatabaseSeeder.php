<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(DisputePriorityTableSeeder::class);
        $this->call(MailSettingsTableSeeder::class);
        $this->call(GeneralSettingTableSeeder::class);
    }
}
