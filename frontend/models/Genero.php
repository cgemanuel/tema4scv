<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property int $id
 * @property string $genero_nombre
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genero_nombre'], 'required'],
            [['genero_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genero_nombre' => 'Genero',
        ];
    }
}
