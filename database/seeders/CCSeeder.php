<?php

namespace Database\Seeders;

use App\Models\chife_complaint;
use App\Models\investigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        chife_complaint::create([ 'name' =>'Bad breath', 'status' => 0]);
        chife_complaint::create([ 'name' =>'Bad smell', 'status' => 0]);
        chife_complaint::create([ 'name' =>'Bleeding gum', 'status' => 0]);
        chife_complaint::create([ 'name' =>'Broken filling', 'status' => 0]);
        chife_complaint::create([ 'name' =>'Burning sensation', 'status' => 0]);
        chife_complaint::create([ 'name' =>'Decayed tooth', 'status' => 0]);
        chife_complaint::create([ 'name' =>'Dental checkup', 'status' => 0]);
        chife_complaint::create([ 'name' =>'Dental decay', 'status' => 0]);
        chife_complaint::create([ 'name' =>'Deposits in the teeth', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Discomfort', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Facial swelling', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Food impaction', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Forwardly placed front teeth', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Gum discoloration', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Gum enlargement', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Implant placement', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Intra-oral swelling', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Irregularly placed front teeth', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Missing tooth/teeth', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Mobile tooth', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Oral ulcer', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Pain', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Pain in the gum', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Routine check-up', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Sensitivity', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Swollen gum', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Temporomandibular joint disorder', 'status' => 0]);
        chife_complaint::create([ 'name' => 'To improve the aesthetics of my teeth', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Tooth cleaning', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Tooth filling', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Tooth malaignment', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Tooth sensitivity', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Tooth whitening', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Toothache', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Unerupted upper fornt teeth', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Want to clean the teeth', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Want to fill the decayed tooth', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Want to replace the missing tooth', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Want to wear clip', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Wants to remove the tooth', 'status' => 0]);
        chife_complaint::create([ 'name' => 'Swelling for 7 days', 'status' => 1]);
        chife_complaint::create([ 'name' => 'PUS', 'status' => 1]);
        chife_complaint::create([ 'name' => 'food accomodation', 'status' => 1]);
        chife_complaint::create([ 'name' => 'loose teeth', 'status' => 1]);
        chife_complaint::create([ 'name' => 'missing teeth', 'status' => 1]);


        investigation::create(['name' => 'X-ray', 'status' => 0]);
        investigation::create(['name' => 'OPG', 'status' => 0]);
        investigation::create(['name' => 'CBCT', 'status' => 0]);
        investigation::create(['name' => 'BT,CT', 'status' => 1]);
        investigation::create(['name' => 'BCB', 'status' => 1]);
        investigation::create(['name' => 'Xray', 'status' => 1]);
        investigation::create(['name' => 'RBS', 'status' => 1]);
    }
}
