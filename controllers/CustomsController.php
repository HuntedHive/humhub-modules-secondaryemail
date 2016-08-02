<?php

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

                $this->render('changeEmail_success', array('model' => $model));

                // form inputs are valid, do something here
                return;
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
                
                $this->render('changeSeconderyEmail_success', array('model' => $modelSecond));

                // form inputs are valid, do something here
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        return $this->render('changeEmail', array('model' => $model, 'modelSecond' => $modelSecond));
    }
}
