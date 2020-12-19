<?php

namespace app\controllers;

use app\models\Component;
use app\models\Response;
use app\models\Articles;
use Yii;

class EmoController extends AppController
{
    public function actionIndex()
    {
        $buttons = Component::find()->where(['in', 'id_parent', [1,2]])->orderBy('id_parent DESC')->all();
        if (!empty($buttons)) {
            $pos = [];
            $neg = [];
            foreach ($buttons as $key => $btn) {
                if ($btn->parent->id == 2 || "Positive" == $btn->parent->title) {
                    $pos[] = $btn;
                } else {
                    $neg[] = $btn;
                }
            }
        }
        return $this->render('index', [
            'positive' => $pos,
            'negative' => $neg
        ]);
    }

    public function actionArticle($next = null)
    {
        $idUser = Yii::$app->user->identity->id;
        $response = Response::find()->where(['id_user' => Yii::$app->user->identity->id])->all();
        $data = [];

        if (!empty($response)) {
            $idArticle = [];
            foreach ($response as $key => $rsp) {
                $idArticle[] = $rsp->id_article;
            }
            $article = Articles::find()->where(['not in', 'id', $idArticle])->one();
            if (!empty($article)) {
                $data['code'] = 1;
                $data['article'] = [
                    'id' => $article->id,
                    'title' => $article->title,
                    'content' => $article->content
                ];
            } else {
                $data['code'] = 0;
            }
        } else {
            $article = Articles::find()->one();
            if (!empty($article)) {
                $data['code'] = 1;
                $data['article'] = [
                    'id' => $article->id,
                    'title' => $article->title,
                    'content' => $article->content
                ];
            } else {
                $data['code'] = 0;
            }
        }

        return json_encode($data);
    }

    public function actionNextArticle($id = null)
    {
        if (!empty($id)) {
            $idUser = Yii::$app->user->identity->id;
            $response = Response::find()->where(['id_user' => Yii::$app->user->identity->id])->all();
            $data = [];

            if (!empty($response)) {
                $idArticle = [];
                foreach ($response as $key => $rsp) {
                    $idArticle[] = $rsp->id_article;
                }
                $article = Articles::find()->where(['not in', 'id', $idArticle])->andWhere(['>', 'id', $id])->one();
                if (!empty($article)) {
                    $data['code'] = 1;
                    $data['article'] = [
                        'id' => $article->id,
                        'title' => $article->title,
                        'content' => $article->content
                    ];
                } else {
                    $data['code'] = 0;
                }
            } else {
                $article = Articles::find()->where(['>', 'id', $id])->one();
                if (!empty($article)) {
                    $data['code'] = 1;
                    $data['article'] = [
                        'id' => $article->id,
                        'title' => $article->title,
                        'content' => $article->content
                    ];
                } else {
                    $data['code'] = 0;
                }
            }

            return json_encode($data);
        }
    }

    public function actionResponse()
    {
        if (Yii::$app->request->isAjax) {
            $words = Yii::$app->request->post('words');
            $id_component = Yii::$app->request->post('id_component');
            $id_article = Yii::$app->request->post('id_article');

            $model = new Response();
            if (!empty($words) && is_array($words)) {
                $words = json_encode($words);
                $model->words = $words;
            }

            $model->id_user = Yii::$app->user->identity->id;
            $model->id_component = $id_component;
            $model->id_article = $id_article;
            if ($model->save()) {
                return json_encode(['success' => 1]);
            }
        }
    }

    public function actionGetResponse()
    {
        $responses = Response::find()->where(['id_user' => Yii::$app->user->identity->id])->all();
        $positive = [];
        $negative = [];
        if (!empty($responses)) {
            foreach ($responses as $key => $response) {
                if ('Negative' == $response->component->parent->title) {
                    $negative[] = [
                        'id' => $response->id,
                        'title' => $response->article->title,
                        'words' => $response->words
                    ];
                } else {
                    $positive[] = [
                        'id' => $response->id,
                        'title' => $response->article->title,
                    ];
                }
            }
        }
        $data = [
            'positive' => $positive,
            'negative' => $negative
        ];

        return json_encode($data);
    }
}
