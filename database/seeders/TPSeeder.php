<?php

namespace Database\Seeders;

use App\Models\medicine;
use App\Models\subscription_plan;
use App\Models\treatment_plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        treatment_plan::create(['name' => 'Restoration', 'status' => 0]);
        treatment_plan::create(['name' => 'Pulpectomy', 'status' => 0]);
        treatment_plan::create(['name' => 'Pulpotomy', 'status' => 0]);
        treatment_plan::create(['name' => 'Operculectomy', 'status' => 0]);
        treatment_plan::create(['name' => 'Abscess Drainage', 'status' => 0]);
        treatment_plan::create(['name' => 'Cyst Enucleation', 'status' => 0]);
        treatment_plan::create(['name' => 'Polishing', 'status' => 0]);
        treatment_plan::create(['name' => 'Curettage with Scaler', 'status' => 0]);
        treatment_plan::create(['name' => 'Scaling', 'status' => 0]);
        treatment_plan::create(['name' => 'Apisectomy', 'status' => 0]);
        treatment_plan::create(['name' => 'Abscess Drainage', 'status' => 0]);
        treatment_plan::create(['name' => 'Orthodontic Tratment', 'status' => 0]);
        treatment_plan::create(['name' => 'helloeas', 'status' => 1]);
        treatment_plan::create(['name' => 'Extraction', 'status' => 1]);
        treatment_plan::create(['name' => 'CAP', 'status' => 1]);
        treatment_plan::create(['name' => 'Root Canal Treatment', 'status' => 0]);
        treatment_plan::create(['name' => 'RCT+Cap', 'status' => 1]);
        treatment_plan::create(['name' => 'RE-RCT', 'status' => 1]);
        treatment_plan::create(['name' => 'Surgical Extraction', 'status' => 1]);
        treatment_plan::create(['name' => 'deep curratage', 'status' => 1]);
        treatment_plan::create(['name' => 'cap bridge', 'status' => 1]);
        treatment_plan::create(['name' => 'Normal crown', 'status' => 1]);
        treatment_plan::create(['name' => 'Zirconia crown', 'status' => 1]);

        subscription_plan::create(['package_name' => 'Package - 01', 'basic_price' => 1000, 'package_price' => '600', 'duration' => '1', 'duration_types' => 'Months', 'descount' => 40, 'saved_price' => 400]);
        subscription_plan::create(['package_name' => 'Package - 02', 'basic_price' => 3000, 'package_price' => '2000', 'duration' => '3', 'duration_types' => 'Months', 'descount' => 33, 'saved_price' => 1000]);
        subscription_plan::create(['package_name' => 'Package - 03', 'basic_price' => 6000, 'package_price' => '4000', 'duration' => '6', 'duration_types' => 'Months', 'descount' => 33, 'saved_price' => 2000]);
        subscription_plan::create(['package_name' => 'Package - 04', 'basic_price' => 12000, 'package_price' => '6000', 'duration' => '12', 'duration_types' => 'Months', 'descount' => 50, 'saved_price' => 6000]);

        medicine::create(['name' => 'Tab. Napa 500mg']);
        medicine::create(['name' => 'Tab. Clacido 1gm', 'brand' => 'Amoxicillin with clavulanic acid']);
        medicine::create(['name' => 'Tab. Filmet 400']);
        medicine::create(['name' => 'Cap. Maxpro 40 mg']);
        medicine::create(['name' => 'Tab.Fimoxyclav 625mg']);
        medicine::create(['name' => 'Tab.Rubee 2mg']);
        medicine::create(['name' => 'Tab.Rubee 20mg']);
        medicine::create(['name' => 'Tab.Tory 120mg']);
        medicine::create(['name' => 'Mouthcare mouth wash']);
        medicine::create(['name' => 'Tab.Amodis 400mg']);
        medicine::create(['name' => 'tab. cefotil 250 mg', 'brand' => 'cefuroxime']);
        medicine::create(['name' => 'tab. tory 90 mg']);
        medicine::create(['name' => 'tab. maxpro 20 mg']);
        medicine::create(['name' => 'Tab. Xenole 500 mg', 'brand' => 'Naproxen+ Esomeprazole']);
        medicine::create(['name' => 'Tab. Cefotil 500 mg']);
        medicine::create(['name' => 'Cap. Cef-3  200mg', 'brand' => 'Cefixime']);
        medicine::create(['name' => 'susp. Lebac-forte']);
        medicine::create(['name' => 'syp. Flamex']);
        medicine::create(['name' => 'Tab. ACE 500 mg', 'brand' => 'PARACETAMOL']);
        medicine::create(['name' => 'Syrup. ACE 120 mg', 'brand' => 'PARACETAMOL']);
        medicine::create(['name' => 'Cap. Adora 500 mg', 'brand' => 'Cefadroxil Monohydrate']);
        medicine::create(['name' => 'Apsol 5% Oral Gel', 'brand' => 'Amlexanox']);
        medicine::create(['name' => 'Tab. Ciprocin 500 mg', 'brand' => 'Ciprofloxacin']);
        medicine::create(['name' => 'Tab. Ciprocin 250 mg', 'brand' => 'Ciprofloxacin']);
        medicine::create(['name' => 'Cap. Climycin 300 mg', 'brand' => 'Clindamycin']);
        medicine::create(['name' => 'Cap. Clindacin 150 mg', 'brand' => 'Clindamycin']);
        medicine::create(['name' => 'Cap. Clindacin 300 mg', 'brand' => 'Clindamycin']);
        medicine::create(['name' => 'Cap. Lebac 250 mg', 'brand' => 'Cephradine']);
        medicine::create(['name' => 'Cap. Lebac 500 mg', 'brand' => 'Cephradine']);
        medicine::create(['name' => 'Cap. Moxacil 500 mg', 'brand' => 'Amoxicillin trihydrate']);
        medicine::create(['name' => 'Cap. Moxacil 250 mg', 'brand' => 'Amoxicillin trihydrate']);
        medicine::create(['name' => 'Cap. Cef-3 200 mg', 'brand' => 'Cefixime Trihydrate']);
        medicine::create(['name' => 'Cap. Cef-3  400mg', 'brand' => 'Cefixime Trihydrate']);
        medicine::create(['name' => 'Tab. Neuro-B', 'brand' => 'Vitamin B1+B6+B12']);
        medicine::create(['name' => 'Cap. Seclo 20 mg', 'brand' => 'Omeprazole']);
        medicine::create(['name' => 'Cap. Seclo 40 mg', 'brand' => 'Omeprazole']);
        medicine::create(['name' => 'Cap. Sergel 20 mg', 'brand' => 'Esomeprazole Magnesium Trihydrate']);
        medicine::create(['name' => 'Cap. Sergel 40 mg', 'brand' => 'Esomeprazole Magnesium Trihydrate']);
        medicine::create(['name' => 'Tab. Sergel 20 mg', 'brand' => 'Esomeprazole Magnesium Trihydrate']);
        medicine::create(['name' => 'Tab. Sergel 40 mg', 'brand' => 'Esomeprazole Magnesium Trihydrate']);
        medicine::create(['name' => 'Tab. Filmet 200 mg', 'brand' => 'Metronidazole']);
        medicine::create(['name' => 'Tab. Filmet 400 mg', 'brand' => 'Metronidazole']);
        medicine::create(['name' => 'Tab. Metro 400 mg', 'brand' => 'Metronidazole']);
        medicine::create(['name' => 'Tab. Tory 60 mg', 'brand' => 'Etoricoxib']);
        medicine::create(['name' => 'Tab. Tory 90 mg', 'brand' => 'Etoricoxib']);
        medicine::create(['name' => 'Tab. Tory 120 mg', 'brand' => 'Etoricoxib']);
        medicine::create(['name' => 'Viodin Mouthwash', 'brand' => 'Povidone Iodine']);
        medicine::create(['name' => 'Tab. Etorix 60 mg', 'brand' => 'Etoricoxib']);
        medicine::create(['name' => 'Tab. Etorix 90 mg', 'brand' => 'Etoricoxib']);
        medicine::create(['name' => 'Tab. Etorix 120 mg', 'brand' => 'Etoricoxib']);
        medicine::create(['name' => 'Tab. Napadol 325 mg', 'brand' => 'PARACETAMOL + Tramadol']);
        medicine::create(['name' => 'Tab. Zimax 250 mg', 'brand' => 'Azithromycin Dihydrate']);
        medicine::create(['name' => 'Tab. Zimax 500 mg', 'brand' => 'Azithromycin Dihydrate']);
        medicine::create(['name' => 'Mouthwash Viodin']);
        medicine::create(['name' => 'Mouthwash Oral-C']);
        medicine::create(['name' => 'Tab. Ceevit 250 mg', 'brand' => 'Vitamin -C']);
        medicine::create(['name' => 'Tab. Finix 20 mg']);
        medicine::create(['name' => 'Tab. Myolax 50 mg']);
        medicine::create(['name' => 'Tab. Beklo 10 mg']);
        medicine::create(['name' => 'Cap. Fluclox 250 mg']);
        medicine::create(['name' => 'Suspension Lebac forte']);
        medicine::create(['name' => 'Suspension Flamex']);
        medicine::create(['name' => 'Syp. Filmet']);
        medicine::create(['name' => 'Syp. Moxacil']);
        medicine::create(['name' => 'Syp. Lebac Fort', 'brand' => 'Cephradine']);
        medicine::create(['name' => 'Tab. Cevic C Plus', 'brand' => 'Vit-C']);
        medicine::create(['name' => 'Viodin', 'brand' => 'Mouthwash']);
        medicine::create(['name' => 'Tab. Flamyd 500mg', 'brand' => 'Metronidazole']);
        medicine::create(['name' => 'Me Oral', 'brand' => 'opsonin']);
        medicine::create(['name' => 'Suspension Nystat']);
    }
}
