<?php

require_once '../../../application/forms/UserChangePassword.php';
require_once '../../../application/models/User.php';

class Form_UserChangePasswordTest extends PHPUnit_Framework_TestCase {

    public function testCanCreateForm() {
        $u = new Model_User();
        $form = new Form_UserChangePassword($u);
        $this->assertEquals(!empty($form));
    }

    public function testCheckElementExist() {
        $u = new Model_User();
        $form = new Form_UserChangePassword($u);
        $this->assertEquals('Zend_Form_Element_Password', $form->geElement('currentPassword'));
        $this->assertEquals('Zend_Form_Element_Password', $form->geElement('newPassword'));
        $this->assertEquals('Zend_Form_Element_Password', $form->geElement('newPasswordConfirm'));
    }

}