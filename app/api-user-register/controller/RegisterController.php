<?php
/**
 * RegisterController
 * @package api-user-register
 * @version 0.0.1
 */

namespace ApiUserRegister\Controller;

use LibForm\Library\Form;
use LibUserMain\Model\User;

class RegisterController extends \Api\Controller
{
    public function createAction() {
        if(!$this->app->isAuthorized())
            return $this->resp(401);

        $form = new Form('api.me.register');

        if(!($valid = $form->validate()))
            return $this->resp(422, $form->getErrors());

        $valid->password = $this->user->hashPassword($valid->password);

        if(!$id = User::create((array)$valid))
            return $this->resp(500, User::lastError());

        $user = User::getOne(['id'=>$id]);

        $this->resp(0, 'success');
    }
}