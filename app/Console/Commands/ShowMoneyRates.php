<?php

namespace App\Console\Commands;

use App\Services\MoneyConv\DateRange;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Tests\Unit\Services\MoneyConv\MoneyConvService;

class ShowMoneyRates extends Command
{
    const DEFAULT_CODES = ['EUR', 'USD', 'KGS'];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:show-money-rates {codes?*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $codes = $this->argument('codes') ?: self::DEFAULT_CODES;

        $now = Carbon::now()->format('Y-m-d');
        $dates = DateRange::fromMondayToNow($now);

        $service = new MoneyConvService();
        $data = $service->getRateOnDates($dates);

        foreach ($codes as $code) {
            $this->info($code . ':');
            foreach ($data as $date => $rates) {
                $this->info($date . '      ' . $rates[$code]);
            }
            $this->newLine();
        }
    }
}
