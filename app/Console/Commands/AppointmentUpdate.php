<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\appointment;
use Carbon\Carbon;

class AppointmentUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointupdate:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Appointment Status Update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today();
        $formatted_today = Carbon::createFromFormat('Y-m-d',$today);
        $appoint_checks = appointment::all();
        foreach($appoint_checks as $appoint_check){
            if($appoint_check->status == '0'){
                $date = $appoint_check->date;
                $formatted_date = Carbon::createFromFormat('Y-m-d',$date);
                if($formatted_today->gt($formatted_date)){
                    $appoint_check->status = 2;
                    $appoint_check->update();
                }
            }
        }
    }
}
