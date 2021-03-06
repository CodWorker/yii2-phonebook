<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//  use common\widgets\datepicker\DatePicker;
use common\widgets\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Contacts */
/* @var $form yii\widgets\ActiveForm */

// $js = <<<JS
// $(document).on("change", "#contacts-birthday", function() {
//         // alert($(this).val());
//         console.log($(this).val());
//     });
// JS;

// $this->registerJs($js);
?>

<div class="contacts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <? //echo $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>
    <? echo $form->field($model, 'birthday')->widget(DatePicker::className(), [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'showButtonPanel' => true
        ],
     ]) 
    ?>

    <?= $form->field($model, 'phone')
    ->textarea(['rows' => 2, 'cols' => 5])->hint('Телефоны необходимо вводить через запятую.Допускаются телефоны в формате: +380123456789, 0123456789')
    // ->textInput(['maxlength' => true]) 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>