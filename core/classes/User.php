<?php

require_once('../../classes/Alert.php');

class User
{
    //Properties
    private $_id;
    private $_email;
    private $_password;
    private $_role;
    private $_loggedIn;

    //Constructor
    public function __construct($id, $email, $password, $role, $loggedIn)
    {
        $this->setId($id);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setRole($role);
        $this->setLoggedIn($loggedIn);
    }

    //Methods

    //Over here the user will be logged in
    public function Login($dbEmail, $dbPassword, $dbRole)
    {
        $email = $this->getEmail();
        $password = $this->getPassword();
        $role;
        $loggedIn;

        if($email == $dbEmail && $password == $dbPassword)
        {
            $this->setRole($dbRole);
            $this->setLoggedIn("true");
            $alertSuccess = new Alert('success', 'Success.' , 'Welcome inside the system');
            echo $alertSuccess->createAlert();
        }
        else 
        {
            $alertWarning = new Alert('warning', 'Warning', 'Make sure all provided information is correct');
            echo $alertWarning->createAlert();
        }
    }

    //The password that is typed in will be hashed over here
    public function HashPassword()
    {
        $password = $this->getPassword();

        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        $this->setPassword($hashedPassword);
    }

    //Getters en setters
    public function getId()
    {
        return $this->_id;
    }
    public function getEmail()
    {
        return $this->_email;
    }
    public function getPassword()
    {
        return $this->_password;
    }
    public function getRole()
    {
        return $this->_role;
    }
    public function getLoggedIn()
    {
        return $this->_loggedIn;
    }
    public function setId($id = 0)
    {
        $this->_id = $id;
    }
    public function setEmail($email = "")
    {
        $this->_email = $email;
    }
    public function setPassword($password = "")
    {
        $this->_password = $password;
    }
    public function setRole($role = "")
    {
        $this->_role = $role;
    }
    public function setLoggedIn($loggedIn = "false")
    {
        $this->_loggedIn = $loggedIn;
    }
}
