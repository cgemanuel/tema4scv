<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use common\models\PermisosHelpers;
use backend\assets\FontAwesomeAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */

AppAsset::register($this);
FontAwesomeAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        if (!Yii::$app->user->isGuest) {
            $es_admin = PermisosHelpers::requerirMinimoRol('Admin');
            
            NavBar::begin([
                'brandLabel' => 'Yri 2 Build Admin',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-expand-lg navbar-dark bg-dark fixed-top',
                ],
            ]);
            
            $menuItems = [];
            
            if ($es_admin) {
                $menuItems = [
                    ['label' => 'Usuarios', 'url' => ['/user/index']],
                    ['label' => 'Perfiles', 'url' => ['/perfil/index']],
                    ['label' => 'Roles', 'url' => ['/rol/index']],
                    ['label' => 'Tipos de Usuario', 'url' => ['/tipo-usuario/index']],
                    ['label' => 'Estado', 'url' => ['/estado/index']],
                ];
            }
            
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav ml-auto'],
                'items' => $menuItems,
                'dropdownClass' => 'yii\bootstrap4\Dropdown',
            ]);
            
            NavBar::end();
        }
        ?>
        
        <div class="container" style="padding-top: 80px;">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Yii 2 Build <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>