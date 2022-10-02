<?php

namespace Database\Seeders;

use App\Models\Abliity;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $ablility=[
        'all_department'=>'All Department',
        'add_department'=>'Add Department',
        'delete_department'=>'Delete Department',
        'edit_department'=>'Edit Department',

        'all_feature'=>'All Feature',
        'add_feature'=>'Add Feature',
        'delete_feature'=>'Delete Feature',
        'edit_feature'=>'Edit Feature',

        'all_about'=>'All About',
        'add_about'=>'Add About',
        'delete_about'=>'Delete About',
        'edit_about'=>'Edit About',

        'all_award'=>'All Award',
        'add_award'=>'Add Award',
        'delete_award'=>'Delete Award',
        'edit_award'=>'Edit Award',

        'all_partner'=>'All Partner',
        'add_partner'=>'Add Partner',
        'delete_partner'=>'Delete Partner',
        'edit_partner'=>'Edit Partner',

        'all_doctor'=>'All Doctor',
        'add_doctor'=>'Add Doctor',
        'delete_doctor'=>'Delete Doctor',
        'edit_doctor'=>'Edit Doctor',

        'all_qualification'=>'All Qualification',
        'add_qualification'=>'Add Qualification',
        'delete_qualification'=>'Delete Qualification',
        'edit_qualification'=>'Edit Qualification',

        'all_testimonial'=>'All Testimonial',
        'add_testimonial'=>'Add Testimonial',
        'delete_testimonial'=>'Delete Testimonial',
        'edit_testimonial'=>'Edit Testimonial',

        'all_schedule'=>'All Schedule',
        'add_schedule'=>'Add Schedule',
        'delete_schedule'=>'Delete Schedule',
        'edit_schedule'=>'Edit Schedule',

        'all_role'=>'All Role',
        'add_role'=>'Add Role',
        'delete_role'=>'Delete Role',
        'edit_role'=>'Edit Role',

        'all_user'=>'All User',
    ];
    public function run()
    {
        Abliity::truncate();
        Role::truncate();

     $data=[
            ['name'=>'Super Admin'],
            ['name'=>'Department Manger'],
            ['name'=>'Doctor']
     ];

     Role::insert($data);

     foreach($this->ablility as $code=>$name){
        Abliity::create([
            'name'=>$name,
            'code'=>$code
        ]);
     };


     }
}
