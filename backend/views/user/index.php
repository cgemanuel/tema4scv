<?php
 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\Accordion;

 
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
 
$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
 
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 
<?php   

echo Accordion::widget([
    'items' => [
        [
            'header' => 'Search',
            'content' => $this->render('_search', ['model' => $searchModel]),
        ],
    ],
    'clientOptions' => [
        'collapsible' => true, // Permite que todos los paneles se colapsen
        'active' => false,    // Inicia todos cerrados
    ],
]);
  
   
?>
    
 
   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 
            //'id',
            ['attribute'=>'userIdLink', 'format'=>'raw'],
            ['attribute'=>'userLink', 'format'=>'raw'],
            ['attribute'=>'perfilLink', 'format'=>'raw'],
           
            'email:email',
            'rolNombre',
            'tipoUsuarioNombre',
            'estadoNombre',
            'created_at',
          
           ['class' => 'yii\grid\ActionColumn'],
           
            
            // 'updated_at',
 
            
        ],
    ]); ?>
 
</div>