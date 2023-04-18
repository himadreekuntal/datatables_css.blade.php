<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Cashhand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cash_hand';

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
        $cashHand = \App\Models\CashHand::all()->last();
        $amount = $cashHand->amount;
        $cashHandToday = new \App\Models\CashHand();
        $cashHandToday->date = date('Y-m-d');
        $cashHandToday->amount = $amount;
        $cashHandToday->save();
    }
}
