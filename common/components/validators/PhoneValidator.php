<?php

namespace common\components\validators;

use yii\validators\Validator;
use app\models\Status;

class PhoneValidator extends Validator
{
    public function init()
    {
        parent::init();
        $this->message = 'Телефонные номера не соответствуют указанному формату.';
    }

    // Required formats +380123456789, 0123456789
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        $array = explode(',', $value);

        foreach ($array as $item) {
            $item = trim($item);
            if (!is_numeric($item)) {
                $model->addError($attribute, $this->message);
            } else {
                $chars = str_split($item);
                if ($chars[0] == "+") {
                    unset($chars[0]);
                }

                foreach ($chars as $char) {
                    if ($char == '.') {
                        $model->addError($attribute, $this->message);
                    }
                }
            }
        }
    }

    public function clientValidateAttribute($model, $attribute, $view)
    {
    }
}
