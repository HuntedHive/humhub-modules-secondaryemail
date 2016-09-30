<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.org/licences
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
 */

namespace humhub\modules\secondaryemail\controllers;

use yii\web\Controller;
use humhub\modules\user\models\User;
use Yii;
use humhub\modules\secondaryemail\forms\AccountChangeSeconderyEmailForm;
use humhub\modules\user\models\forms\AccountChangeEmail;

class CustomsController extends Controller
{
    
    public $subLayout = "@humhub/modules/user/views/account/_layout";
    
    
    public function actionChangeEmail()
    {
        $user = User::findOne(Yii::$app->user->id);
        if ($user->auth_mode != User::AUTH_MODE_LOCAL) {
            throw new CHttpException(500, Yii::t('UserModule.controllers_AccountController', 'You cannot change your e-mail address here.'));
        }
        
        $model = new AccountChangeEmail;
        
        if (isset($_POST['AccountChangeEmail'])) {
            $model->attributes = $_POST['AccountChangeEmail'];
            if ($model->validate()) {

                $model->sendChangeEmail();
                return $this->render('changeEmail_success', array('model' => $model));
            }
        }
        
        $modelSecond = new AccountChangeSeconderyEmailForm;
        if (isset($_POST['AccountChangeSeconderyEmailForm'])) {
          
            $modelSecond->seconderyPassword = $_POST['AccountChangeSeconderyEmailForm']['seconderyPassword'];
            $modelSecond->newSeconderyEmail = $_POST['AccountChangeSeconderyEmailForm']['newSeconderyEmail'];
            if ($modelSecond->validate()) {
                
                $user->secondary_email = $modelSecond->newSeconderyEmail;
                $user->secondary_password = $modelSecond->generatePassword($modelSecond->seconderyPassword);
                $user->save(false);
                
                return $this->render('changeSeconderyEmail_success', array('model' => $modelSecond));

                // form inputs are valid, do something here
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        return $this->render('changeEmail', array('model' => $model, 'modelSecond' => $modelSecond));
    }
}
