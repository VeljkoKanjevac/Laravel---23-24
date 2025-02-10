<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCurrencyValue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:get-value';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get currency value';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currencies = ["eur", "usd"];

        foreach ($currencies as $currency)
        {
            $response = Http::get("https://kurs.resenje.org/api/v1/currencies/$currency/rates/today");
            ExchangeRates::create([
                'currency' => $currency,
                'value' => $response->json()['exchange_middle'],
            ]);
        }
    }
}
