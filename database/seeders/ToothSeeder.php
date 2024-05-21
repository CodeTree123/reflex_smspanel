<?php

namespace Database\Seeders;

use App\Models\notice;
use App\Models\tooth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToothSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tooth::create(['tooth_No' => '18', 'Tooth_name' => 'Upper Right Third Molar', 'img' => '1TMR.png']);
        tooth::create(['tooth_No' => '17', 'Tooth_name' => 'Upper Right Second Molar', 'img' => '2SMR.png']);
        tooth::create(['tooth_No' => '16', 'Tooth_name' => 'Upper Right First Molar', 'img' => '3FMR.png']);
        tooth::create(['tooth_No' => '15', 'Tooth_name' => 'Upper Right Second Premolar', 'img' => '4SPMR.png']);
        tooth::create(['tooth_No' => '14', 'Tooth_name' => 'Upper Right First Premolar', 'img' => '5FPMR.png']);
        tooth::create(['tooth_No' => '13', 'Tooth_name' => 'Upper Right Canine', 'img' => '6CR.png']);
        tooth::create(['tooth_No' => '12', 'Tooth_name' => 'Upper Right Lateral Incisor', 'img' => '7LIR.png']);
        tooth::create(['tooth_No' => '11', 'Tooth_name' => 'Upper Right Central Incisor', 'img' => '8CIR.png']);
        tooth::create(['tooth_No' => '21', 'Tooth_name' => 'Upper left Central Incisor', 'img' => '9CIL.png']);
        tooth::create(['tooth_No' => '22', 'Tooth_name' => 'Upper left lateral Incisor', 'img' => '10LIL.png']);
        tooth::create(['tooth_No' => '23', 'Tooth_name' => 'Upper left Canine', 'img' => '11CL.png']);
        tooth::create(['tooth_No' => '24', 'Tooth_name' => 'Upper left First Pre0molar', 'img' => '12FPML.png']);
        tooth::create(['tooth_No' => '25', 'Tooth_name' => 'Upper left second premolar', 'img' => '13SPML.png']);
        tooth::create(['tooth_No' => '26', 'Tooth_name' => 'Upper left first molar', 'img' => '14FML.png']);
        tooth::create(['tooth_No' => '27', 'Tooth_name' => 'Upper left second molar', 'img' => '15SML.png']);
        tooth::create(['tooth_No' => '28', 'Tooth_name' => 'Upper left third molar', 'img' => '16TML.png']);
        tooth::create(['tooth_No' => '48', 'Tooth_name' => 'Lower Right Third Molar', 'img' => '48TMR.png']);
        tooth::create(['tooth_No' => '47', 'Tooth_name' => 'lower Right Second Molar', 'img' => '47SMR.png']);
        tooth::create(['tooth_No' => '46', 'Tooth_name' => 'Lower Right First Molar', 'img' => '46FMR.png']);
        tooth::create(['tooth_No' => '45', 'Tooth_name' => 'Lower Right Second Premolar', 'img' => '45SPMR.png']);
        tooth::create(['tooth_No' => '44', 'Tooth_name' => 'Lower Right First Premolar', 'img' => '44FPMR.png']);
        tooth::create(['tooth_No' => '43', 'Tooth_name' => 'Lower right Canine', 'img' => '43CR.png']);
        tooth::create(['tooth_No' => '42', 'Tooth_name' => 'Lower right lateral Incisor', 'img' => '42LIR.png']);
        tooth::create(['tooth_No' => '41', 'Tooth_name' => 'Lower right central Incisor', 'img' => '41CIR.png']);
        tooth::create(['tooth_No' => '31', 'Tooth_name' => 'Lower left central Incisor', 'img' => '31CIL.png']);
        tooth::create(['tooth_No' => '32', 'Tooth_name' => 'Lower left lateral Incisor', 'img' => '32LIL.png']);
        tooth::create(['tooth_No' => '33', 'Tooth_name' => 'Lower left Canine', 'img' => '33CL.png']);
        tooth::create(['tooth_No' => '34', 'Tooth_name' => 'Lower left first premolar', 'img' => '34FPML.png']);
        tooth::create(['tooth_No' => '35', 'Tooth_name' => 'lower left second premolar', 'img' => '35SPML.png']);
        tooth::create(['tooth_No' => '36', 'Tooth_name' => 'Lower left first molar', 'img' => '36FML.png']);
        tooth::create(['tooth_No' => '37', 'Tooth_name' => 'Lower left second molar', 'img' => '37SML.png']);
        tooth::create(['tooth_No' => '38', 'Tooth_name' => 'Lower left Third Molar', 'img' => '38TML.png']);
        tooth::create(['tooth_No' => '55', 'Tooth_name' => 'Upper right second molar', 'img' => '4SPMR.png']);
        tooth::create(['tooth_No' => '54', 'Tooth_name' => 'Upper right first molar', 'img' => '5FPMR.png']);
        tooth::create(['tooth_No' => '53', 'Tooth_name' => 'Upper right Canine', 'img' => '6CR.png']);
        tooth::create(['tooth_No' => '52', 'Tooth_name' => 'Upper right lateral Incisor', 'img' => '7LIR.png']);
        tooth::create(['tooth_No' => '51', 'Tooth_name' => 'Upper right central Incisor', 'img' => '8CIR.png']);
        tooth::create(['tooth_No' => '61', 'Tooth_name' => 'Upper left central Incisor', 'img' => '9CIL.png']);
        tooth::create(['tooth_No' => '62', 'Tooth_name' => 'Upper left lateral Incisor', 'img' => '10LIL.png']);
        tooth::create(['tooth_No' => '63', 'Tooth_name' => 'Upper left Canine', 'img' => '11CL.png']);
        tooth::create(['tooth_No' => '64', 'Tooth_name' => 'Upper left first molar', 'img' => '12FPML.png']);
        tooth::create(['tooth_No' => '65', 'Tooth_name' => 'Upper Left second molar', 'img' => '13SPML.png']);
        tooth::create(['tooth_No' => '85', 'Tooth_name' => 'Lower right second molar', 'img' => '45SPMR.png']);
        tooth::create(['tooth_No' => '84', 'Tooth_name' => 'Lower right first molar', 'img' => '44FPMR.png']);
        tooth::create(['tooth_No' => '83', 'Tooth_name' => 'Lower right Canine', 'img' => '43CR.png']);
        tooth::create(['tooth_No' => '82', 'Tooth_name' => 'Lower right lateral Incisor', 'img' => '42LIR.png']);
        tooth::create(['tooth_No' => '81', 'Tooth_name' => 'Lower right Central Incisor', 'img' => '41CIR.png']);
        tooth::create(['tooth_No' => '71', 'Tooth_name' => 'Lower left central Incisor', 'img' => '31CIL.png']);
        tooth::create(['tooth_No' => '72', 'Tooth_name' => 'Lower left lateral Incisor', 'img' => '32LIL.png']);
        tooth::create(['tooth_No' => '73', 'Tooth_name' => 'Lower left Canine', 'img' => '33CL.png']);
        tooth::create(['tooth_No' => '74', 'Tooth_name' => 'Lower left lateral Incisor', 'img' => '34FPML.png']);
        tooth::create(['tooth_No' => '75', 'Tooth_name' => 'Lower left central Incisor', 'img' => '35SPML.png']);
        tooth::create(['tooth_No' => 'All', 'Tooth_name' => 'All Tooth']);


        notice::create([ 'title' => 'স্বাগতম!','description' => 'রিফ্লেক্স ডেন্টাল নেটওয়ার্কে আপনাকে স্বাগতম।  ReflexDN ওয়েবএপ্লিকেশন এর মাধ্যমে আপনি আপনার চেম্বারের যাবতীয় তথ্য সর্বোচ্চ নিরাপত্তার সাথে নিশ্চিন্তে সংরক্ষণ করতে পারবেন।','status' => 1, 'created_at' => '2022-10-21 06:43:24', 'updated_at' => '2022-11-08 14:19:37']);
        notice::create([ 'title' => 'ডেন্টাল সফট-এ কিভাবে সাবস্ক্রাইব করবেন?','description' => 'ওয়েলকাম নোটের পাশেই Subscription বাটন আছে, সেখান থেকে আপনার পছন্দ মত প্যাকেজ পছন্দ করে। বিকাশে পেমেন্ট করলেই আপনি রিফ্লেক্স ডেন্টাল সফটওয়ার ব্যবহার করতে পারবেন।','status' => 1, 'created_at' => '2022-10-21 07:44:40', 'updated_at' => '2022-11-10 05:43:38']);
    }
}
