<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property string $valuteID
 * @property int $numCode
 * @property string $сharCode
 * @property string|null $name
 * @property float $value
 * @property string $date
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['valuteID', 'numCode', 'сharCode', 'value', 'date'], 'required'],
            [['numCode'], 'integer'],
            [['value'], 'number'],
            [['date'], 'safe'],
            [['valuteID'], 'string', 'max' => 50],
            [['сharCode'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'valuteID' => 'Valute ID',
            'numCode' => 'Num Code',
            'сharCode' => 'Сhar Code',
            'name' => 'Name',
            'value' => 'Value',
            'date' => 'Date',
        ];
    }
}
