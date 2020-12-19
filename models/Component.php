<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "response".
 *
 * @property int $id
 * @property int|null $id_parent
 * @property string|null $title
 * @property int|null $point
 */
class Component extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'component';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_parent', 'point'], 'integer'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_parent' => 'Parent',
            'title' => 'Title',
            'point' => 'Point',
        ];
    }

    public function getChild()
    {
        return $this->hasMany(self::className(), ['id_parent' => 'id']);
    }

    public function getParent()
    {
        return $this->hasOne(self::className(), ['id' => 'id_parent']);
    }
}
