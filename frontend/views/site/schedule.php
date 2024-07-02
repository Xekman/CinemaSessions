<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Session;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Расписание сеансов';
$this->params['breadcrumbs'][] = $this->title;
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
                'attribute' => 'film.photo_extension',
                'label' => 'Постер',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->film->photo_extension) {
                        return Html::img(Yii::getAlias('@web') . '/upload/film/' . $model->film->id . '.' . $model->film->photo_extension, ['width' => '100']);
                    } else {
                        return 'No photo';
                    }
                },
            ],
            [
                'attribute' => 'date',
                'label' => 'Дата',
                'enableSorting' => false,
            ],
            [
                'attribute' => 'time',
                'label' => 'Время',
                'enableSorting' => false,
            ],
            [
                'attribute' => 'film.duration',
                'label' => 'Продолжительность',
                'value' => function ($model) {
                    return $model->film->duration . ' ч.';
                },
            ],
            [
                'attribute' => 'cost',
                'label' => 'Стоимость',
                'enableSorting' => false,
                'value' => function ($model) {
                    return $model->cost . ' ₽';
                },
            ],
        ],
    ]); ?>
</div>
