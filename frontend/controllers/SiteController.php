<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Session;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * Displays the schedule of sessions.
     *
     * @return mixed
     */
    public function actionSchedule()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Session::find()->orderBy(['date' => SORT_ASC, 'time' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('schedule', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Error handler.
     *
     * @return mixed
     */
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }
}
