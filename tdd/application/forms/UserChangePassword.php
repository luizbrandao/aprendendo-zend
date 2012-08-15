<?php

class Form_UserChangePassword {
    protected $_user;

    public function __construct(\Model_User $user, $options = null) {
        parent::__construct($options);
        $this->_user = $user;
    }
}