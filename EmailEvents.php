<?php

class EmailEvents
{  
    /**
     * Add the Q&A menu item to
     * the top menu
     * @param $event
     */
    public static function onAdminMenuInit($event)
    {
        if (Yii::app()->user->isGuest) {
            return;
        }
    }
    
    public static function onEmailNotificationAddonInit($event)
    {
        if (Yii::app()->user->isGuest) {
            return;
        }

        $event->sender->addWidget('application.modules.secondaryemail.widgets.EmailNotificationWidget', array(), array('sortOrder' => 90));
    }
}