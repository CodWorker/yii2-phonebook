<?php

namespace frontend\models;

use Yii;
use common\components\validators\YearValidator;
use common\components\validators\PhoneValidator;
use common\components\behaviors\PurifyBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $birthday
 * @property string $phone
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'birthday', 'phone'], 'required'],
            [['email'], 'email'],
            [['birthday'], YearValidator::class],
            [['phone'], PhoneValidator::class],
            [['first_name', 'last_name', 'email', 'birthday', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'Email',
            'birthday' => 'День рождения',
            'phone' => 'Телефоны',
        ];
    }

    // Protection data incomed from form field 'phone'
    public function beforeSave($insert) {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->phone = strip_tags(trim($this->phone));
        $this->phone = \yii\helpers\HtmlPurifier::process($this->phone);
        $this->phone = \yii\helpers\Html::encode($this->phone);

        $arrayRes = array();
        $array = explode(',', $this->phone);

        foreach($array as $item){
            $arrayRes[] = trim($item);
        }
        $this->phone = implode(',', $arrayRes);

        return true;
    }

    // public function check_years($attribute, $params){
    //     $this->addError($attribute, "Este email já existe");

    //     // return true;
    // }

//     public function clientValidateAttribute($model, $attribute, $view)
//     {
//      return <<<JS
// messages.push('cdscds scdscdscs');

// JS;
//     }

    /**
     * {@inheritdoc}
     * @return ContactsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactsQuery(get_called_class());
    }
}
