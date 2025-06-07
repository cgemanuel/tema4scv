<?php

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermisosHelpers;
use common\models\RegistrosHelpers;
use frontend\models\Perfil;



class UpgradeController extends \yii\web\Controller
{
    public function actionIndex()
    {
      $persona = Perfil::find()->where(['user_id' =>
      Yii::$app->user->identity->id])->one();
      return $this->render('index',['persona' => $persona]);

    }


    public function actionUpdate()
    {
    PermisosHelpers::requerirUpgradeA('Pago');

    if ($model = Perfil::find()->where(['user_id' =>
        \Yii::$app->user->identity->id])->one()) {

      if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
      } else {
        return $this->render('update', [
            'model' => $model,
         ]);
       }
    } else {

     throw new NotFoundHttpException('No Existe el Perfil.');

      }
    }


    public function behaviors()
    {
    return [
    'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['index'],
            'rules' => [
                [
                    'actions' => ['index'],
                    'allow' => true,
                    'roles' => ['@'],
                    'matchCallback' => function ($rule, $action) {
                        return PermisosHelpers::requerirEstado('Activo');
                    }
                ],
                    
            ],
       ],
           
        'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
                'delete' => ['post'],
            ],
        ],
    ];
    }

}
