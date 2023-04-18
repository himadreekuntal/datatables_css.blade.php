<?php

namespace App\Console\Commands;

use App\Models\StockFile;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use PDF;
use File;
use DB;
use Mail;

class MonthlyStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:stock';

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
     * @return int
     */
    public function handle()
    {
        /*$users = User::where('status', 1)->get();
        $startMonth = Carbon::now();
        $lastMonth =  $startMonth->subMonth()->format('F');
        $fileName = $lastMonth.'.pdf';

        $product = Product::all();
        $amount = Product::select(DB::raw('sum(qty * selling_price) as total'))->first();
        $total = $amount->total;

        $pdf = PDF::loadView('reports.monthlystock',compact('product','total','lastMonth'));

        foreach($users as $users){
            $mail = $users->email;
            $name = $users->name;

            $data["email"]=$mail;
            $data["client_name"]=$name;
            $data["subject"]='New Sales';
            $data["attachment"] = $fileName;

            try{
                Mail::send('reports.body', $data, function($message)use($data,$pdf) {
                $message->to($data["email"], $data["client_name"])
                ->subject($data["subject"])
                ->attachData($pdf->output(),  $data["attachment"]);
                });
            }catch(JWTException $exception){
                $this->serverstatuscode = "0";
                $this->serverstatusdes = $exception->getMessage();
            }
         }*/

        $startMonth = Carbon::now();
        $lastMonth =  $startMonth->subMonth()->format('F');
        $start = new Carbon('first day of this month');
        $startDate = $start->toDateString();

        $fileName = $startDate.'('.($lastMonth).').pdf';
        $path = public_path('monthly_report/');

        $product = Product::all();
        $amount = Product::select(DB::raw('sum(qty * selling_price) as total'))->first();
        $total = $amount->total;

            $pdf = PDF::loadView('reports.monthlystock',compact('product','total','lastMonth'));
            $pdf->save($path . '/' . $fileName);

            $stockfile = new StockFile;
            $stockfile->file = $fileName;
            $stockfile->save();
    }
}
