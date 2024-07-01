<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Film;

/** @var yii\web\View $this */
/** @var backend\models\Session $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="session-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'film_id')->dropDownList(Film::find()
        ->select(['title', 'id'])
        ->indexBy('id')
        ->column(), ['prompt' => 'Выберите фильм']) ?>

    <?= $form->field($model, 'date')->input('date') ?>

    <?= $form->field($model, 'time')->input('time') ?>

    <?= $form->field($model, 'cost')->input('number', ['step' => '0.01']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
