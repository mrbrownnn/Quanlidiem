<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();

        $adminRoles = Roles::where('name','Admin')->take(1)->get();
        $authorRoles = Roles::where('name','Author')->take(1)->get();
        $userRoles = Roles::where('name','User')->take(1)->get();

        $admin = Admin::create([
			'admin_name' => 'Nghiêm Đình Nam',
			'admin_email' => 'hieutan@gmail.com',
			'admin_password' => md5('12345678')	
        ]);
        $author = Admin::create([
			'admin_name' => 'Phạm Hoàng Long',
			'admin_email' => 'hieutan123@gmail.com',
			'admin_password' => md5('12345678')	
        ]);
        $user = Admin::create([
			'admin_name' => 'Bùi Thị Minh Nguyệt',
			'admin_email' => 'hieutan456@gmail.com',
			'admin_password' => md5('12345678')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
    }
    
}
