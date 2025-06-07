<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\Accordion;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Perfil', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php echo Accordion::widget([
        'items' => [
            [
                'header' => 'Buscar',
                'content' => $this->render('_search', ['model' => $searchModel]),
                // Opcional: para que aparezca abierto por defecto
                'contentOptions' => ['class' => 'in'],
                'options' => ['tag' => 'div'],
                'headerOptions' => ['tag' => 'h3'],
            ],
        ],
        'options' => ['tag' => 'div', 'class' => 'panel-group'],
        'itemOptions' => ['tag' => 'div', 'class' => 'panel panel-default'],
        'headerOptions' => ['tag' => 'h3', 'class' => 'panel-title'],
        'clientOptions' => ['collapsible' => true, 'active' => 0],
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            ['attribute'=>'perfilIdLink', 'format'=>'raw'],
            ['attribute'=>'userLink', 'format'=>'raw'],
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'generoNombre',
            ['class' => 'yii\grid\ActionColumn'],
            
           // 'created_at',
            // 'updated_at',
            // 'user_id',
        ],
    ]); ?>

</div>