<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Component */

$this->title = 'Create Component';
$this->params['breadcrumbs'][] = ['label' => 'Component', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="response-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'parent' => $parent
    ]) ?>

</div>
