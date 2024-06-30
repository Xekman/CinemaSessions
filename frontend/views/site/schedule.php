<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Расписание сеансов';
?>

<div class="site-schedule">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'film.title',
                'label' => 'Фильм',
            ],
            [
                'attribute' => 'date',
                'label' => 'Дата',
            ],
            [
                'attribute' => 'time',
                'label' => 'Время',
            ],
            [
                'attribute' => 'cost',
                'label' => 'Стоимость',
            ],
        ],
    ]); ?>
</div>
