<?php

namespace common\modules\techsup\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $phone
 * @property string $category
 * @property string $title
 * @property string $description
 * @property string $date_create
 * @property string $date_end
 * @property int $status_id
 */
class Requests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'category', 'title', 'description'], 'required'],
            [['phone', 'status_id'], 'integer'],
            [['description'], 'string', 'max' => 800],
            [['date_create', 'date_end'], 'safe'],
            [['name'], 'string', 'max' => 25],
            [['category', 'title'], 'string', 'max' => 50],
            [['email'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'category' => 'Категория',
            'title' => 'Тема',
            'description' => 'Описание',
            'date_create' => 'Дата создания',
            'date_end' => 'Дата выполнения',
            'status_id' => 'Статус',
        ];
    }
}
