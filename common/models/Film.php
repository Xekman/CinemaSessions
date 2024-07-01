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
    public $photoFile;
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
            [['title', 'description', 'duration', 'age_limit'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['duration', 'age_limit'], 'integer'],
            [['photoFile'], 'file', 'extensions' => 'png, jpg, jpeg'],
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
            'photoFile' => 'Фото',
        ];
    }

    /**
     * получение id модели и расширения фото
     * @return string
     */
    public function getPhotoUrl()
    {
        return Yii::getAlias('@web') . '/upload/film/' . $this->id . '.' . $this->photo_extension;
    }



    /**
     * загрузка фото
     * @return bool
     */
    public function uploadPhoto()
    {
        if ($this->validate()) {
            $uploadPath = Yii::getAlias('@frontend/web/upload/film/');
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $photoPath = $uploadPath . $this->id . '.' . $this->photoFile->extension;
            if ($this->photoFile->saveAs($photoPath)) {
                $this->photo_extension = $this->photoFile->extension;
                return true;
            }
        }
        return false;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (empty($this->photo_extension)) {
                $this->photo_extension = '';
            }
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($this->photoFile) {
            $this->uploadPhoto();
            $this->updateAttributes(['photo_extension' => $this->photoFile->extension]);
        }
    }
}
