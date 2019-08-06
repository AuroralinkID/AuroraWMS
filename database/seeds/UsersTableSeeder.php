<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Role
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        //Member Role
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();

        //User Admin
        $admin = new User();
        $admin->name = "admin";
        $admin->email = "auroralinkid@gmail.com";
        $admin->password = bcrypt('auroralink');
        $admin->save();
        $admin->attachRole('$adminRole');

        //User Member
        $member = new User();
        $member->name = "member";
        $member->email = "aurora.an98@gmail.com";
        $member->password = bcrypt('auroralink');
        $member->save();
        $member->attachRole('$memberRole');
    }
}
