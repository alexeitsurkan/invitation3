<?php

namespace app\controllers;

use app\models\Entity\Person;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Class PersonController
 * @package app\controllers
 */
class PersonController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only'  => ['index'],
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['index'],
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $model        = Person::find()->all();
        $dataProvider = new ArrayDataProvider(
            [
                'allModels'  => $model,
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]
        );

        return $this->render('index', [
            'dataProvider'  => $dataProvider,
            'model'         => new Person(),
            'question_list' => [
                Person::Q_PARTNER  => 'спросить за партнера',
                Person::Q_CHILDREN => 'спросить за детей'
            ],
        ]);
    }

    public function actionAdd()
    {
        $post            = \Yii::$app->request->post();
        $model           = new Person();
        $model->name     = $post['Person']['name'];
        $model->text     = $post['Person']['text'];
        $model->question = $post['Person']['question'];
        $model->save();
        $model->key = md5($model['id'] . $model['name']);
        $model->save();
        return $this->redirect('index');
    }

    public function actionDel()
    {
        $get = Yii::$app->request->get();
        Person::deleteAll(['id' => $get['key']]);

        return $this->redirect('index');
    }
}
