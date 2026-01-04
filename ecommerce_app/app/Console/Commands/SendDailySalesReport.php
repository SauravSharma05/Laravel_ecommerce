<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendDailySalesReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:daily-sales';
    /**
     * The console command description.
     *
     * @var string
     */
   protected $description = 'Send daily sales report to admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    $today = now()->startOfDay();
    $sales = \App\Models\OrderItem::where('created_at', '>=', $today)->with('product')->get();

    \Illuminate\Support\Facades\Mail::to('teste2saurav@gmail.com')
        ->send(new \App\Mail\DailySalesReportMail($sales));
    }
}
