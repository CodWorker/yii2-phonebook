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
            [['first_name', 'phone'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name', 'email', 'birthday', 'phone'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['birthday'], YearValidator::class],
            [['phone'], PhoneValidator::class],
            
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
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата редактирования',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function(){
                                return gmdate("Y-m-d H:i:s");
                },
            //'value' => new \yii\db\Expression('NOW()'),

            ],
        ];
    }

    // Protection data incomed from form field 'phone'
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->phone = strip_tags(trim($this->phone));
        $this->phone = \yii\helpers\HtmlPurifier::process($this->phone);
        $this->phone = \yii\helpers\Html::encode($this->phone);

        $arrayRes = array();
        $array = explode(',', $this->phone);

        foreach ($array as $item) {
            $arrayRes[] = trim($item);
        }
        $this->phone = implode(',', $arrayRes);

        return true;
    }


    /**
     * {@inheritdoc}
     * @return ContactsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactsQuery(get_called_class());
    }
}
