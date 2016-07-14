<?php

namespace humhub\modules\secondaryemail;

use Yii;
use humhub\modules\secondaryemail\widgets\EmailNotificationWidget;

class Events extends \yii\base\Object
{  
    /**
     * Add the Q&A menu item to
     * the top menu
     * @param $event
     */
    public static function onAdminMenuInit($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }
    }
    
    public static function onEmailNotificationAddonInit($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }

        return $event->sender->addWidget(EmailNotificationWidget::className(), array(), array('sortOrder' => 90));
    }
}