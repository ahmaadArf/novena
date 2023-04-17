<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'Super Admin',
            'email'=>'superadmin@admin.com',
            'password'=>Hash::make('superadmin123'),
            'type'=>'admin'
        ]);

        $role=Role::create(['name'=>'Super Admin']);
        $permission=Permission::pluck('id')->all();
        $role->syncPermissions($permission);
        $user->assignRole($role->id);

    }


}
