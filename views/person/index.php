<?php

use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $model
 * @var $question_list
 * @var $dataProvider
 */

?>

<style>
    .card {
        margin: 0 20% 20px 20%;
        width: 60%;
        text-align: center;
    }
    .radio{
        display: inline-block;
    }
</style>

<div class="card">
    <?php
    $form = ActiveForm::begin(
        [
            'method'  => 'post',
            'action'  => Url::to(['add']),
            'options' => [
                'class' => ['form-horizontal'],
            ],
        ]
    );
    ?>

    <div class="text-left">
        <?= $form->field($model, 'name', [])
            ->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>

        <?= $form->field($model, 'text', [])
            ->textarea(
                [
                    'rows'        => 6,
                    'placeholder' => $model->getAttributeLabel('text'),
                    'class'       => 'form-control',
                ]
            ) ?>

        <?= $form->field($model, 'question', [])
            ->label($model->getAttributeLabel('question'))
            ->radioList($question_list) ?>

        <?= Html::submitButton('Создать приглашение', ['class' => 'btn btn-primary ']) ?>
    </div>
    <?php
    ActiveForm::end(); ?>
    <br>
    <hr>
    <br>
    <?= GridView::widget([
                             'dataProvider' => $dataProvider,
                             'columns'      => [
                                 ['class' => 'yii\grid\SerialColumn'],
                                 [
                                     'attribute' => 'name',
                                     'format'    => 'raw',
                                     'label'     => 'Кому',
                                 ],
                                 [
                                     'attribute' => 'status',
                                     'format'    => 'raw',
                                     'label'     => 'Статус',
                                     'value'     => function ($model, $key, $index, $column) {
                                         switch ($model['status']) {
                                             case null:
                                                 return '<span class="text-warning">Не подтверждено</span>';
                                             case 1:
                                                 return '<span class="text-success">Подтверждено</span>';
                                         }
                                     }
                                 ],
                                 [
                                     'attribute' => 'key',
                                     'format'    => 'raw',
                                     'label'     => 'ссылка',
                                     'value'     => function ($model, $key, $index, $column) {
                                         $url = Url::to(['/', 'key' => $model['key']]);
                                         return "<a href='$url'>" . $model['key'] . "</a>";
                                     },
                                 ],
                                 [
                                     'attribute' => 'answer',
                                     'format'    => 'raw',
                                     'label'     => 'подробнее',
                                     'value'     => function ($model, $key, $index, $column) {
                                         return $model['answer']??'пусто';
                                     },
                                 ],
                                 [
                                     'format' => 'raw',
                                     'label'  => '',
                                     'value'  => function ($model, $key, $index, $column) {
                                         return '<a href="' . Url::to('del?key=' . $model['id']) . '">удалить</a>';
                                     }
                                 ]
                             ],
                         ]); ?>
</div>

