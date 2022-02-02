<?php

namespace app\controllers;

use app\models\Entity\Person;
use app\models\LoginForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
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

    /**
     * @return string
     */
    public function actionIndex()
    {
        $get    = Yii::$app->request->get();
        $person = Person::findOne(['key' => $get['key'] ?? '']);

        return $this->render('index', [
            'person' => $person
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['person/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionAcceptInvitation()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $get = Yii::$app->request->post();
        if (isset($get['key'])) {
            if ($model = Person::findOne(['key' => $get['key']])) {
                if (isset($get['status'])) {
                    $model->status = true;
                    if ($model->save()) {
                        switch ($model->question) {
                            case Person::Q_PARTNER:
                                return $this->renderAjax('_partner');
                            case Person::Q_CHILDREN:
                                return $this->renderAjax('_children');
                            case null:
                                return '<div style="padding-top:15%;color: green">Спасибо что приняли наше приглашение!</div>';
                        }
                    }
                } elseif (isset($get['partner'])) {
                    $model->answer = (string)$get['partner'];
                    if ($model->save()) {
                        return '<div style="padding-top:15%;color: green">Спасибо за подробную информацию!</div>';
                    }
                } elseif (isset($get['children'])) {
                    $model->answer = (string)$get['children'];
                    if ($model->save()) {
                        if ($model->answer === 'Без детей') {
                            return '<div style="padding-top:15%;color: green">Спасибо за подробную информацию!</div>';
                        } else {
                            return $this->renderAjax('_children_count');
                        }
                    }
                } elseif (isset($get['children_count'])) {
                    $model->answer .= ': ' . $get['children_count'];
                    if ($model->save()) {
                        return '<div style="padding-top:15%;color: green">Спасибо за подробную информацию!</div>';
                    }
                }
            }
        }
        return false;
    }


}
