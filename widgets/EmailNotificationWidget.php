<?php

/**
 * Connected Communities Initiative
 * Copyright (C) 2016  Queensland University of Technology
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.org/licences GNU AGPL v3
 *
 */

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
