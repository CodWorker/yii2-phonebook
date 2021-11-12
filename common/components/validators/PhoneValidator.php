<?php
// YearValidator

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

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;

        if (true) {
            $model->addError($attribute, $this->message);
        }
    }

    public function clientValidateAttribute($model, $attribute, $view)
    {

//         $value = $model->$attribute;

//         $message = json_encode($this->message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

//         return <<<JS
        
//         var inp = $("#contacts-birthday").val();
        
//         if (true) {
//             console.log(inp);
//             messages.push($message);
//         }
// JS;


    }



}