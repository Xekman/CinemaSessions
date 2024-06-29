<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "session".
 *
 * @property int $id
 * @property int $film_id
 * @property string $date
 * @property string $time
 * @property float $cost
 *
 * @property Film $film
 */
class Session extends ActiveRecord
{
    public static function tableName()
    {
        return 'session';
    }

    public function rules()
    {
        return [
            [['film_id', 'date', 'time', 'cost'], 'required'],
            [['film_id'], 'integer'],
            [['date', 'time'], 'safe'],
            [['cost'], 'number'],
        ];
    }

    public function getFilm()
    {
        return $this->hasOne(Film::class, ['id' => 'film_id']);
    }
}
