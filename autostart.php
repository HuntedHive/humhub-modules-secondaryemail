<?php
Yii::app()->moduleManager->register(array(
    'id' => 'seconderyemail',
    'class' => 'application.modules.seconderyemail.EmailModule',
    'import' => array(
        'application.modules.seconderyemail.*',
        'application.modules.seconderyemail.forms.*',
    ),
    'events' => array(
        array('class' => 'AdminMenuWidget', 'event' => 'onInit', 'callback' => array('EmailEvents', 'onAdminMenuInit')),
        array('class' => 'NotificationAddonWidget', 'event' => 'onInit', 'callback' => array('EmailEvents', 'onEmailNotificationAddonInit')),
        
    ),
));
?>