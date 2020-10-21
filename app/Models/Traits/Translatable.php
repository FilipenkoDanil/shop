<?php


namespace App\Models\Traits;


use Illuminate\Support\Facades\App;

trait Translatable
{
    public function __($originFieldName)
    {
        $locale = App::getLocale() ?? 'ru';
        if ($locale === 'en') {
            $fieldName = $originFieldName . '_en';
        } else {
            $fieldName = $originFieldName;
        }

        if(!in_array($fieldName, array_keys($this->attributes))){
            throw new \LogicException('Поле ' . $fieldName . ' не найдено.');
        }


        if($locale === 'en' && (is_null($this->$fieldName) || empty($this->$fieldName))){
            return $this->$originFieldName;
        }

        return $this->$fieldName;
    }
}
