<?php
// YearValidator

namespace common\components\validators;

use yii\validators\Validator;
use app\models\Status;

class YearValidator extends Validator
{
    public function init()
    {
        parent::init();
        $this->message = 'Добавляемый пользователь должен быть старше 18 лет';
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;

        if ($this->computeEquals($value)) {
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

    private function computeEquals($attr){
        $now = \Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        // $attr = '2003-11-18';
        $year = 18;
        $parts = explode('-', $attr);
        $parts[0] += 18;
        $computeDate = implode('-', $parts);
        return (strtotime($computeDate) > strtotime($now));
    }

}