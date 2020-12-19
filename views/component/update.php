<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Component */

$this->title = 'Update Component: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Component', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="response-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'parent' => $parent
    ]) ?>

</div>
