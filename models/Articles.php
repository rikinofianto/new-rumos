<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property int|null $id_response
 * @property resource|null $title
 * @property string|null $content
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_response'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_response' => 'Response',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }
}
