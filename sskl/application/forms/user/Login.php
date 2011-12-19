<?php
class Application_Form_User_Login extends Zend_Form
{
    public function init()
    {
        $username = $this->addElement('text', 'username', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                    'Alnum',
                    array( 'StringLength',
                           false,
                           array( 3,
                                  20,
                                  'messages' => array( 'stringLengthTooShort' => 'too short.. custom error msg',                                                       
                                                     )
                                )
                         ),
            ),
            'required'   => true,
            'label'      => 'Your username:',
        ));

        $password = $this->addElement('password', 'password', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                'Alnum',
                array('StringLength', false, array(6, 20)),
            ),
            'required'   => true,
            'label'      => 'Password:',
        ));

        $login = $this->addElement('submit', 'login', array(
            'required' => false,
            'ignore'   => true,
            'label'    => 'Login',
        ));

        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'dl', 'class' => 'login_form')),
            array('Description', array('placement' => 'prepend')),
            'Form'
        ));
    }
}