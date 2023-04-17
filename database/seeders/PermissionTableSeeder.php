<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            'about-list','about-create','about-edit','about-delete',
            'award-list','award-create','award-edit','award-delete',
            'department-list','department-create','department-edit','department-delete',
            'doctor-list','doctor-create','doctor-edit','doctor-delete',
            'feature-list','feature-create','feature-edit','feature-delete',
            'partner-list','partner-create','partner-edit','partner-delete',
            'qualification-list','qualification-create','qualification-edit','qualification-delete',
            'role-list','role-create','role-edit','role-delete',
            'schedule-list','schedule-create','schedule-edit','schedule-delete',
            'testimonial-list','testimonial-create','testimonial-edit','testimonial-delete',
            'user-list','user-create','user-edit','user-delete',

        ];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}
