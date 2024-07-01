<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "film".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $duration
 * @property string $age_limit
 * @property string $photo_extension
 * @property string $created_at
 * @property string $updated_at
 */
class Film extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'duration', 'age_limit', 'photo_extension'], 'required'],
            [['description'], 'string'],
            [['duration'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'age_limit', 'photo_extension'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'duration' => 'Продолжительность',
            'age_limit' => 'Возрастное ограничение',
            'photo_extension' => 'Расширение фото',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }
}
