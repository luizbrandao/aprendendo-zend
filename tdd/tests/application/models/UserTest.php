<?php

require_once '../../../application/models/User.php';

class Model_UserTest extends PHPUNit_Framework_TestCase {
	
    private $username = 'Luiz';
	private $password = '123456';

    public function testUserModel() {
        $u = new Model_User();
        $this->assertTrue(!empty($u));
    }

    public function testCanCreateUsers(){
    	Model_User::create($this->username,$this->password);
    	$users = Model_User::getUsers();
    	$this->assertArrayHasKey($this->username,$users);

        $user= new Model_User();
        $user->username = 'Luiz Teste';
        $user->password = 'senha';
        $user->save();
        $users = Model_User::getUsers();
        $this->assertArrayHasKey('Luiz Teste',$users);
    }
    
    public function testCanFindByUsername(){
        Model_User::create($this->username,$this->password);
        $user = Model_User::findByUsername($this->username);
        $this->assertTrue(!empty($user));

        $userNotFound = Model_User::findByUsername('asdfasdfasd');
        $this->assertFalse($userNotFound);
    }

    public function testCanDeleteUsername(){
        Model_User::create($this->username,$this->password);
        $user = Model_User::findByUsername($this->username);
        $user->delete();

        $userNotFound = Model_User::findByUsername($this->username);
        $this->assertFalse($userNotFound);
    }
}