<?php
class UserController extends Zend_Controller_Action
{
    public function getForm()
    {
        return new Application_Form_User_Login(array(
            'action' => '/user/login',
            'method' => 'post',
        ));
    }
	public function loginAction()
	{
		$this->view->headTitle()->prepend('Login');
		$request = $this->getRequest();
	    if (!$request->isPost()) {
            return $this->view->form = $this->getForm();
        }
	    $form = $this->getForm();
        if (!$form->isValid($request->getPost())) {
            $this->view->form = $form;
            return $this->render('login');
        }
	}
}
