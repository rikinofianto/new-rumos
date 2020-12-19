<?php

namespace app\models;

use Yii;
use app\models\Component;
use app\models\Articles;
/**
 * This is the model class for table "response".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $id_component
 * @property int|null $id_article
 * @property string|null $words
 */
class Response extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'response';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_component', 'id_article'], 'integer'],
            [['words'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'User',
            'id_component' => 'Component',
            'id_article' => 'Article',
            'words' => 'Words',
        ];
    }

    public function getComponent()
    {
        return $this->hasOne(Component::className(), ['id' => 'id_component']);
    }

    public function getArticle()
    {
        return $this->hasOne(Articles::className(), ['id' => 'id_article']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
