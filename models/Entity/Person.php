<?php
namespace app\models\Entity;

use yii\db\ActiveRecord;

/**
 * Class Person
 * @package app\models\Entity
 * @property $id
 * @property $name
 * @property $text
 * @property $status
 * @property int $question
 * @property string $answer
 * @property $key
 */
class Person extends ActiveRecord
{
    const Q_CHILDREN = 2;
    const Q_PARTNER = 1;


    public function getAttributeLabel($attribute): string
    {
        switch ($attribute) {
            case 'name':
                return 'Кому';
            case 'text':
                return 'Текст приглашения';
            case 'question':
                return 'Доп. вопрос:';
        }
        return parent::getAttributeLabel($attribute);
    }
}