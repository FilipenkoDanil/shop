<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use App\Models\Currency;
use App\Models\Order;
use App\Services\CurrencyConversion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ChangeController extends Controller
{
    public function changeLocale($locale)
    {
        $locales = ['ru', 'en'];
        if (!in_array($locale, $locales)) {
            $locale = config('app.locale');
        }

        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function changeCurrency($currencyCode)
    {
        $currency = Currency::byCode($currencyCode)->firstOrFail();
        session(['currency' => $currency->code]);


        $order = (new Cart())->getOrder();
        if(!is_null($order)){
            if($order->currency_id != CurrencyConversion::getCurrentCurrencyFromSession()->id){
                $order->currency_id = CurrencyConversion::getCurrentCurrencyFromSession()->id;
            }
        }

        return redirect()->back();
    }
}
