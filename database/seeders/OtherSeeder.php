<?php

namespace Database\Seeders;

use App\Models\medical_clg;
use App\Models\mobile_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mobile_type::create(['name'=>'Self']);
        mobile_type::create(['name'=>'Father']);
        mobile_type::create(['name'=>'Mother']);
        mobile_type::create(['name'=>'Sister']);
        mobile_type::create(['name'=>'Daughter']);
        mobile_type::create(['name'=>'Son']);
        mobile_type::create(['name'=>'Brother']);
        mobile_type::create(['name'=>'Husband']);
        mobile_type::create(['name'=>'Wife']);
        mobile_type::create(['name'=>'Ohter']);
        

        medical_clg::create(['name' => "Dhaka Dental College"]);
        medical_clg::create(['name' => "Khulna Dental College"]);
        medical_clg::create(['name' => "Chittagong Medical College Dental Unit"]);
        medical_clg::create(['name' => "Rajshahi Medical College Dental Unit"]);
        medical_clg::create(['name' => "Shaheed Suhrawardy Medical College Dental Unit"]);
        medical_clg::create(['name' => "Sir Salimullah Medical College Dental Unit"]);
        medical_clg::create(['name' => "Mymensingh Medical College Dental Unit"]);
        medical_clg::create(['name' => "MAG Osmani Medical College Dental Unit"]);
        medical_clg::create(['name' => "Sher-e-Bangla Medical College Dental Unit"]);
        medical_clg::create(['name' => "Rangpur Medical College Dental Unit"]);
        medical_clg::create(['name' => "University Dental College and Hospital"]);
        medical_clg::create(['name' => "Update Dental College"]);
        medical_clg::create(['name' => "Pioneer Dental College"]);
        medical_clg::create(['name' => "Chattagram International Dental College"]);
        medical_clg::create(['name' => "Sapporo Dental College"]);
        medical_clg::create(['name' => "City Dental College"]);
        medical_clg::create(['name' => "Rangpur Dental College"]);
        medical_clg::create(['name' => "Bangladesh Dental College"]);
        medical_clg::create(['name' => "Marks Dental College"]);
        medical_clg::create(['name' => "Saphena Women's Dental College"]);
        medical_clg::create(['name' => "Mandy Dental College"]);
        medical_clg::create(['name' => "Udayan Dental College"]);
        medical_clg::create(['name' => "TMSS Medical College Dental Unit"]);
        medical_clg::create(['name' => "MH Samorita Medical College & Dental Unit"]);
        medical_clg::create(['name' => "Kumudini Women's Medical College, Dental Unit"]);
        medical_clg::create(['name' => "Holy Family Red Cresect Medical College Dental Unit"]);
        medical_clg::create(['name' => "Gonoshasthaya Samajvittik Samaj Vittik Dental College"]);
        medical_clg::create(['name' => "Ibrahim Medical College, Dental Unit	IMCDU	DU"]);
        medical_clg::create(['name' => "Dhaka Community Medical College Hospital And Dental Unit"]);
        medical_clg::create(['name' => "Delta Medical College & Hospital Dental Unit"]);
        medical_clg::create(['name' => "Community Based Medical College, Bangladesh Dental Unit"]);
        medical_clg::create(['name' => "Dhaka National Medical College Dental Unit"]);
        medical_clg::create(['name' => "Islami Bank Medical College Dental Unit"]);
        medical_clg::create(['name' => "Sylhet Central Dental College & General Hospital"]);
        medical_clg::create(['name' => "Khawja Eunus Ali Medical College Dental Unit"]);
        medical_clg::create(['name' => "North East Medical College Dental Unit"]);
    }
}
