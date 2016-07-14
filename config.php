<?php

use humhub\modules\admin\widgets\AdminMenu;
use humhub\widgets\NotificationArea;

return [
    'id' => 'secondaryemail',
    'class' => 'humhub\modules\secondaryemail\Module',
    'namespace' => 'humhub\modules\secondaryemail',
    'events' => array(
        array('class' => AdminMenu::className(), 'event' => AdminMenu::EVENT_INIT, 'callback' => array('humhub\modules\secondaryemail\Events', 'onAdminMenuInit')),
        array('class' => NotificationArea::className(), 'event' => NotificationArea::EVENT_INIT, 'callback' => array('humhub\modules\secondaryemail\Events', 'onEmailNotificationAddonInit')),
    ),
]
?>