<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','User')->first();
        $role_admin = Role::where('name','Admin')->first();

        $user = new User();
        $user->name = 'Md Robi Hasan';
        //$user->username = 'robi';
        $user->email = 'robicse8@gmail.com';
        $user->password = bcrypt('123456');
        //$user->status = '1';
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->name = 'Md Robeul Islam';
        //$admin->username = 'robeul';
        $admin->email = 'robeulcse1@gmail.com';
        $admin->password = bcrypt('123456');
        //$admin->status = '1';
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
