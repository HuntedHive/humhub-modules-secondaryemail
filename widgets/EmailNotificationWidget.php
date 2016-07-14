<?php

namespace humhub\modules\secondaryemail\widgets;

use Yii;
use humhub\components\Widget;

/**
 * @package humhub.modules.mail
 * @since 0.5
 */
class EmailNotificationWidget extends Widget
{

//    public function init()
//    {
//        $assetPrefix = Yii::$app->assetManager->publish(dirname(__FILE__) . '/../assets', true, 0, defined('YII_DEBUG'));
//        Yii::$app->clientScript->registerCssFile($assetPrefix . '/secondaryemail.css');
//    }

    /**
     * Creates the Wall Widget
     */
    public function run()
    {
        return $this->render('emailNotifications');
    }

}

?>