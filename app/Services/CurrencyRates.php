<?php


namespace App\Services;


use GuzzleHttp\Client;

class CurrencyRates
{
    public static function getRates()
    {
        $url = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';


        $client = new Client();
        $response = $client->request('GET', $url);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Problem with currency API');
        }

        $rates = json_decode($response->getBody()->getContents(), true);

        foreach (CurrencyConversion::getCurrencies() as $currency) {
            if (!$currency->is_main) {
                foreach ($rates as $rate) {
                    if ($rate['ccy'] == $currency->code) {
                        $curRate = $rate['sale'];
                        $currency->update(['rate' => $curRate]);
                        $currency->touch();
                    }
                }
            }
        }
    }
}
