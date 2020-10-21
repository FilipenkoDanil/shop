<?php

namespace App\Http\Controllers;

use App\Models\Currency;
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

        return redirect()->back();
    }
}
