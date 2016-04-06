<?php
Yii::app()->moduleManager->register(array(
    'id' => 'secondaryemail',
    'class' => 'application.modules.secondaryemail.EmailModule',
    'import' => array(
        'application.modules.secondaryemail.*',
        'application.modules.secondaryemail.forms.*',
    ),
    'events' => array(
        array('class' => 'AdminMenuWidget', 'event' => 'onInit', 'callback' => array('EmailEvents', 'onAdminMenuInit')),
        array('class' => 'NotificationAddonWidget', 'event' => 'onInit', 'callback' => array('EmailEvents', 'onEmailNotificationAddonInit')),
        
    ),
));
?>