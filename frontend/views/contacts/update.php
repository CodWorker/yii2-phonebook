<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Contacts */

$this->title = 'Обновить контакт: ' . $model->first_name . " " . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => $model->first_name . " " . $model->last_name, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="contacts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
