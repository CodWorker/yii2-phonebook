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

    // Required formats +380123456789, 0123456789
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        $array = explode(',', $value);
        // var_dump('+-380 123456 789');
        // PHP_EOL;
        // var_dump($array);exit;
        foreach($array as $item){
            $item = trim($item);
            // $firstL = substr($item, 1);
            // $isPlus = ($firstL == '+');
            // $item = $isPlus ? ltrim('+', $item) : $item;
            // $item = (int)$item;
            // var_dump(str_split(trim("+", $item)));exit;
            if(!is_numeric($item)){
                $model->addError($attribute, $this->message);
            }else{
                // $item = ltrim('+', $item);
                $chars = str_split($item);
                if($chars[0] == "+"){
                    unset($chars[0]);
                }
                // var_dump($chars);exit;
                // if(in_array(".", $chars)){
                //     // var_dump($char);exit;
                //     $model->addError($attribute, $this->message);
                // }
                foreach($chars as $char){
                    // $char = (int)$char;
                    // var_dump(is_int".");exit;
                    if($char == '.'){
                        // var_dump($char);exit;
                        $model->addError($attribute, $this->message);
                    }
                }
            }

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