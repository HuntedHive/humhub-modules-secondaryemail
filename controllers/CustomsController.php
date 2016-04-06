<?php



class CustomsController extends AccountController
{
    
    public $subLayout = "application.modules_core.user.views.account._layout";
    
    
    public function actionChangeEmail()
    {
        $user = User::model()->findByPk(Yii::app()->user->id);
        if ($user->auth_mode != User::AUTH_MODE_LOCAL) {
            throw new CHttpException(500, Yii::t('UserModule.controllers_AccountController', 'You cannot change your e-mail address here.'));
        }
        
        $model = new AccountChangeEmailForm;
        
        if (isset($_POST['AccountChangeEmailForm'])) {
            $_POST['AccountChangeEmailForm'] = Yii::app()->input->stripClean($_POST['AccountChangeEmailForm']);
            $model->attributes = $_POST['AccountChangeEmailForm'];
            var_dump($model);
            if ($model->validate()) {

                $model->sendChangeEmail();

                $this->render('changeEmail_success', array('model' => $model));

                // form inputs are valid, do something here
                return;
            }
        }
        
        $modelSecond = new AccountChangeSeconderyEmailForm;
        if (isset($_POST['AccountChangeSeconderyEmailForm'])) {
          
            $_POST['AccountChangeSeconderyEmailForm'] = Yii::app()->input->stripClean($_POST['AccountChangeSeconderyEmailForm']);
            $modelSecond->seconderyPassword = $_POST['AccountChangeSeconderyEmailForm']['seconderyPassword'];
            $modelSecond->newSeconderyEmail = $_POST['AccountChangeSeconderyEmailForm']['newSeconderyEmail'];
            
            if ($modelSecond->validate()) {
                
                $user->secondery_email = $modelSecond->newSeconderyEmail;
                $user->secondery_password = $modelSecond->generatePassword($modelSecond->seconderyPassword);
                $user->save();
                
                $this->render('changeSeconderyEmail_success', array('model' => $modelSecond));

                // form inputs are valid, do something here
                return;
            }
        }
        ///var_dump($modelSecond);die;
        $this->render('changeEmail', array('model' => $model, 'modelSecond' => $modelSecond));
    }
}
