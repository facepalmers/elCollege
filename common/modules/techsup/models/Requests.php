<?php

namespace common\modules\techsup\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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

    const STATUS_ACTIVE = 0;
    const STATUS_INACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_end'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'category', 'title', 'description'], 'required'],
            [['category', 'status_id'], 'integer'],
            [['description'], 'string', 'max' => 1500],
            [['date_create', 'date_end'], 'safe'],
            [['name'], 'string', 'max' => 25],
            [['phone'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['email'], 'email', 'message' => 'Пожалуйста, введите корректный e-mail адрес. Пример: example@example.com'],
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
            'date_create' => 'Дата поступления',
            'date_end' => 'Дата выполнения',
            'status_id' => 'Статус',
        ];
    }

    public function getStatusList() {
        return ['Активно', 'В архиве'];
    }

    public function getCategoryList() {
        return ['Учебные аспекты', 'Технические вопросы'];
    }

    public function getCategoryName() {
        $list = self::getCategoryList();
        return $list[$this->category];
    }

    public function isPhoneExist($phone) {
        if ($phone == null) {
            return false;
        }
        return true;
    }
}
