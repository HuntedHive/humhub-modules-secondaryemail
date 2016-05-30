<?php

/**
 * @package humhub.modules.mail
 * @since 0.5
 */
class EmailNotificationWidget extends HWidget
{

    public function init()
    {
        $assetPrefix = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../assets', true, 0, defined('YII_DEBUG'));
        Yii::app()->clientScript->registerCssFile($assetPrefix . '/secondaryemail.css');
    }

    /**
     * Creates the Wall Widget
     */
    public function run()
    {
        $this->render('emailNotifications');
    }

}

?>