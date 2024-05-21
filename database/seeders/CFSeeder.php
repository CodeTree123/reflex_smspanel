<?php

namespace Database\Seeders;

use App\Models\clinical_finding;
use App\Models\redeem_code;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        clinical_finding::create(['name' => 'Abrassion', 'status' => 0]);
        clinical_finding::create(['name' => 'Abscess', 'status' => 0]);
        clinical_finding::create(['name' => 'Aesthetic', 'status' => 0]);
        clinical_finding::create(['name' => 'Alveolar Bone Loss', 'status' => 0]);
        clinical_finding::create(['name' => 'Apexification', 'status' => 0]);
        clinical_finding::create(['name' => 'Apexogenesis', 'status' => 0]);
        clinical_finding::create(['name' => 'Apical Abscess/Infection', 'status' => 0]);
        clinical_finding::create(['name' => 'Attrition,Abrasion,Erosion', 'status' => 0]);
        clinical_finding::create(['name' => 'Avulsed Tooth/Teeth', 'status' => 0]);
        clinical_finding::create(['name' => 'Avulsion', 'status' => 0]);
        clinical_finding::create(['name' => 'BDC', 'status' => 0]);
        clinical_finding::create(['name' => 'BDR', 'status' => 0]);
        clinical_finding::create(['name' => 'Biunderbass Canal', 'status' => 0]);
        clinical_finding::create(['name' => 'Calculas With Gingibitis and Stain', 'status' => 0]);
        clinical_finding::create(['name' => 'Caries', 'status' => 0]);
        clinical_finding::create(['name' => 'Complete Endentulousness', 'status' => 0]);
        clinical_finding::create(['name' => 'Cracked Tooth Syndrome', 'status' => 0]);
        clinical_finding::create(['name' => 'Cyst', 'status' => 0]);
        clinical_finding::create(['name' => 'Discharging Buccal Sinus', 'status' => 0]);
        clinical_finding::create(['name' => 'Elective', 'status' => 0]);
        clinical_finding::create(['name' => 'Fracutured Tooth/Root', 'status' => 0]);
        clinical_finding::create(['name' => 'Grossly Carious Tooth', 'status' => 0]);
        clinical_finding::create(['name' => 'Impaction', 'status' => 0]);
        clinical_finding::create(['name' => 'Intra/Extra Oral Swelling', 'status' => 0]);
        clinical_finding::create(['name' => 'Malalignment', 'status' => 0]);
        clinical_finding::create(['name' => 'Missing Teeth', 'status' => 0]);
        clinical_finding::create(['name' => 'Mobility', 'status' => 0]);
        clinical_finding::create(['name' => 'MOD Caries', 'status' => 0]);
        clinical_finding::create(['name' => 'Partial Edentuous', 'status' => 0]);
        clinical_finding::create(['name' => 'Perforation Repair', 'status' => 0]);
        clinical_finding::create(['name' => 'Pericoronitis', 'status' => 0]);
        clinical_finding::create(['name' => 'Pwridontal Abscess', 'status' => 0]);
        clinical_finding::create(['name' => 'Periodontitis', 'status' => 0]);
        clinical_finding::create(['name' => 'Peri-radicular Pathosis', 'status' => 0]);
        clinical_finding::create(['name' => 'Plaque, Calculus, Stain', 'status' => 0]);
        clinical_finding::create(['name' => 'Pulp Polyp', 'status' => 0]);
        clinical_finding::create(['name' => 'Pulpitis', 'status' => 0]);
        clinical_finding::create(['name' => 'Restoration of Endodontically Treated Tooth', 'status' => 0]);
        clinical_finding::create(['name' => 'Retained Deciduous', 'status' => 0]);
        clinical_finding::create(['name' => 'Retained Primary Tooth', 'status' => 0]);
        clinical_finding::create(['name' => 'Retainer', 'status' => 0]);
        clinical_finding::create(['name' => 'Sealer', 'status' => 0]);
        clinical_finding::create(['name' => 'Sensitivity', 'status' => 0]);
        clinical_finding::create(['name' => 'Severe Mobility', 'status' => 0]);
        clinical_finding::create(['name' => 'Spacing/Crowding', 'status' => 0]);
        clinical_finding::create(['name' => 'Calculus', 'status' => 1]);
        clinical_finding::create(['name' => 'pulpitis', 'status' => 1]);
        clinical_finding::create(['name' => 'LOOSE FITTING RPD', 'status' => 1]);
        clinical_finding::create(['name' => 'Pocket Pain', 'status' => 1]);
        clinical_finding::create(['name' => 'Mobility', 'status' => 1]);

        redeem_code::create(['redeem_code' => 'CodeTreeTest', 'duration' => '2', 'duration_type' => 'Days']);
    }
}
