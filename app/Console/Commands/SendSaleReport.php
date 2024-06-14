<?php

namespace App\Console\Commands;

use App\Exports\SalesReportExport;
use App\Models\SaleReport;
use App\Models\User;
use App\Notifications\SalesReportNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class SendSaleReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-sale-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the daily sale report to the admin. With this command, the admin will receive a daily report of the sales made.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $admin = User::where('email', 'admin@example.com')->first();

        $date = Carbon::yesterday();
        $displayDate = $date->format('d-m-Y');
        $filePath = storage_path("app/public/exports/sales/sales_report-$displayDate.xlsx");

        SaleReport::create([
            'file_path' => $filePath,
        ]);

        Excel::store((new SalesReportExport)->forDate($date), "public/exports/sales/sales_report-$displayDate.xlsx");

        if ($admin) {
            $admin->notify(new SalesReportNotification($filePath));
            $this->info('Daily sales report sent successfully.');
        } else {
            $this->error('Admin user not found.');
        }
    }
}
