<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::get();

        $role = Role::create([
            'name'=>'Super Admin',
            'guard_name'=>'web'
        ]);

        foreach ($permissions as $p) {
            DB::table('role_has_permissions')->insert([
                'permission_id'=>$p->id,
                'role_id'=>$role->id,
            ]);
        }


        $user = User::create([
            'name'=>'Admin System',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('123456789')
        ]);

        $user->assignRole($role->id);
    }
}
