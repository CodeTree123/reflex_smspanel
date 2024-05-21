<?php

namespace Database\Seeders;

use App\Models\doctor;
use App\Models\subscription;
use App\Models\User;
use App\Models\shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'fname' => 'Reflex',
            'lname' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'root@dmin',
            'phone' => '123',
            'role' => '1',
            'verification' => '1',
        ]);

        User::create([
            'fname' => 'Code',
            'lname' => 'Tree',
            'email' => 'code@gmail.com',
            'password' => '12',
            'phone' => '10000',
            'verification' => '1',
        ]);

        User::create([
            'fname' => 'CodeTree',
            'lname' => 'Shop',
            'email' => 'shop@gmail.com',
            'password' => '12',
            'phone' => '01963562452',
            'role' => '2',
            'verification' => '1',
            'p_image' => 'other20230309020305.PNG',
        ]);

        doctor::create([
            'u_id' => '2',
            'BMDC' => '12',
            'nid' => '123456789',
            'dob' => '1980-01-01',
            'gender' => 'Male',
            'blood_group' => 'AB+',
            'mCollege' => 'Dahakai',
            'batch' => '1990',
            'session' => '1991-1997',
            'passing_year' => '1998',
            'speciality' => 'Teeth',
            'designation' => 'Sergen',
        ]);

        subscription::create([
            'd_id' => '2',
            's_mobile' => '01912345678',
            'package_name' => 'Package - 04',
            'package_price' => '6000',
            'duration' => '12',
            'duration_types' => 'Months',
            'start' => '2022-08-15 00:00:00',
            'end' => '2023-08-15 17:30:51',
            'status' => 1,
            'request' => 1,
            'pending_status' => 0,
        ]);

        shop::create([
            'u_id' => 3
        ]);
    }
}
