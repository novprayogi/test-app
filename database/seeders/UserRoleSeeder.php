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

        $permissions2 = Permission::whereIn('id',[9,10,11,13,14,15])->get();
        $role = Role::create([
            'name'=>'Super Admin',
            'guard_name'=>'web'
        ]);

        $role2 = Role::create([
            'name'=>'User',
            'guard_name'=>'web'
        ]);

        foreach ($permissions as $p) {
            DB::table('role_has_permissions')->insert([
                'permission_id'=>$p->id,
                'role_id'=>$role->id,
            ]);
        }

        foreach ($permissions2 as $p) {
            DB::table('role_has_permissions')->insert([
                'permission_id'=>$p->id,
                'role_id'=>$role2->id,
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
