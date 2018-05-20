<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserProfile;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement("SET FOREIGN_KEY_CHECKS = 0");
        \DB::table("users")->truncate();
        \DB::table("user_profiles")->truncate();
        $user = User::create([
            'id' => 1,
            'slug' => bin2hex(random_bytes(64)),
            'name' => 'Dev Team',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'is_active' => 1,
            'created_at' => '2018-01-01 09:19:28',
            'updated_at' => '2018-01-01 09:19:28'
        ]);
        $profile = UserProfile::create([
            'id' => 1,
            'slug' => bin2hex(random_bytes(64)),
            'user_id'   => $user->id,
            'name' => 'Dev Team',
            'telephone' => '09078675645',
            'sex'   =>1,
            'created_at' => '2018-01-01 09:19:28',
            'updated_at' => '2018-01-01 09:19:28'
        ]);
        $user->assignRole('administrator');

    }
}
