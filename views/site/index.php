<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = Yii::t('app', Yii::$app->name);
?>
<div class="site-index">

    <div class="jumbotron">
        <h1 style="color: #00CED1;">Selamat datang di Rumos!</h1>

        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        
        <p><?=Html::a('Mulai Jelajah', ['emo/index'], ['class' => 'btn btn-lg btn-warning']);?></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h3 style="text-align: center;">Positive</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>
                <div class="row">
                    <div class="col-xs-3">
                        <?= Html::a(Yii::t('app', 'Positive'), ['#'], ['class' => 'btn btn-default']) ?>
                    </div>
                    <div class="col-xs-3">
                        <?= Html::a(Yii::t('app', 'Positive'), ['#'], ['class' => 'btn btn-default']) ?>
                    </div>
                    <div class="col-xs-3">
                        <?= Html::a(Yii::t('app', 'Positive'), ['#'], ['class' => 'btn btn-default']) ?>
                    </div>
                    <div class="col-xs-3">
                        <?= Html::a(Yii::t('app', 'Positive'), ['#'], ['class' => 'btn btn-default']) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h3 style="text-align: center;">Negative</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>
                <div class="row">
                    <div class="col-xs-3">
                        <?= Html::a(Yii::t('app', 'Negative'), ['#'], ['class' => 'btn btn-default']) ?>
                    </div>
                    <div class="col-xs-3">
                        <?= Html::a(Yii::t('app', 'Negative'), ['#'], ['class' => 'btn btn-default']) ?>
                    </div>
                    <div class="col-xs-3">
                        <?= Html::a(Yii::t('app', 'Negative'), ['#'], ['class' => 'btn btn-default']) ?>
                    </div>
                    <div class="col-xs-3">
                        <?= Html::a(Yii::t('app', 'Negative'), ['#'], ['class' => 'btn btn-default']) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <h3>Title 1</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="col-lg-3">
                <h3>Title 2</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="col-lg-3">
                <h3>Title 3</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="col-lg-3">
                <h3>Title 4</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div>
    </div>
</div>

