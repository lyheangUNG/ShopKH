<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Ads;
use Illuminate\Support\Carbon;
use File;
class TruncateOldAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'items:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Ads::where('end_date', '<', Carbon::today()->toDateString())->each(function ($item) {
            $id = $item->id;
            $ads = Ads::findOrFail($id);
            $image_path = $ads->image;
            File::delete(public_path('uploads\ads\\' . $image_path));
            $item->delete();
        });
        echo Carbon::today()->toDateString();
    }
}
