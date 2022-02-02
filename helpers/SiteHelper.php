<?php namespace app\helpers;

use app\models\Entity\Invitation;
use app\models\Entity\Person;

/**
 * Class SiteHelper
 * @package app\helpers
 */
class SiteHelper
{
    /**
     * @param Person|null $person
     * @return mixed|string
     */
    public static function getInvitation(Person $person = null)
    {
        if($person){
            $text = (Invitation::findOne(['id' => $person->invitation_id]))->text;
            $text = str_replace('{name}', '<b>' . $person->name . '</b>', $text);
            $text = str_replace('{surname}', '<b>' . $person->surname . '</b>', $text);
        }else{
            $text = (Invitation::findOne(1))->text;
        }
        return $text ?? '';
    }
}