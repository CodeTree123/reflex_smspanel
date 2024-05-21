<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\subscription;
use Carbon\Carbon;

class StatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statusupdate:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Doctor Subscription Status Update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sub_infos = subscription::where('status', '=', '1')->get();
        $today = Carbon::today();
        $formatted_today = Carbon::createFromFormat('Y-m-d H:i:s',$today);
        foreach($sub_infos as $sub_info){
            $sub_check = $sub_info->end;
            $formatted_subcheck = Carbon::createFromFormat('Y-m-d H:i:s',$sub_check);
            if($formatted_today->gt($formatted_subcheck)){
                $sub_info->status = 0;
                $sub_info->update();
            }
        }
    }
}
