<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_admin = Role::create(['name' => 'admin']);
        $role_customer = Role::create(['name' => 'customer']);

        $user = \App\Models\User::factory()->create([
            'name' => 'schoolproject',
            'email' => 'school@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole($role_admin);

        $user = \App\Models\User::factory()->create([
            'name' => 'rabih',
            'email' => 'rfares93@gmail.com',
            'password' => Hash::make('azerty123'),
        ]);

        $user->assignRole($role_customer);

        $user = \App\Models\User::factory()->create([
            'name' => 'fatoumata',
            'email' => 'fatou10@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        $user->assignRole($role_customer);

        $user = \App\Models\User::factory()->create([
            'name' => 'massire',
            'email' => 'massire@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        $user->assignRole($role_customer);

        /*DB::table('users')->insert([
            'name' => 'schoolproject',
            'email' => 'school@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'rabih',
            'email' => 'rfares93@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'fatoumata',
            'email' => 'fatou10@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'massire',
            'email' => 'massire@gmail.com',
            'password' => Hash::make('123456'),
        ]);*/
    }
}
