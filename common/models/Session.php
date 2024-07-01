<?php

namespace common\models;
use Yii;
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
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::class, 'targetAttribute' => ['film_id' => 'id']],
            ['time', 'validateTime'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'film_id' => 'Фильм',
            'date' => 'Дата',
            'time' => 'Время',
            'cost' => 'Стоимость',
        ];
    }
    public function getFilm()
    {
        return $this->hasOne(Film::class, ['id' => 'film_id']);
    }

    /**
     * проверка времени между сеансами
     * @param $attribute
     * @param $params
     * @return void
     */
    public function validateTime($attribute, $params)
    {
        $sessionStartTime = strtotime($this->date . ' ' . $this->time);
        $thirtyMinutesInSeconds = 30 * 60;
        $query = self::find()->where(['date' => $this->date]);

        if (!$this->isNewRecord) {
            $query->andWhere(['!=', 'id', $this->id]);
        }

        $existingSessions = $query->all();

        foreach ($existingSessions as $session) {
            $existingSessionStartTime = strtotime($session->date . ' ' . $session->time);

            if (abs($existingSessionStartTime - $sessionStartTime) < $thirtyMinutesInSeconds) {
                $this->addError($attribute, 'Время между сеансами должно быть не менее 30 минут.');
                break;
            }
        }
    }




}
