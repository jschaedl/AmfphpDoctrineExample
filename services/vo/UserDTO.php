<?php

/**
 * @Entity @Table(name="user")
 */
class UserDTO extends AbstractDTO
{
    /** @Id @Column(type="integer") @GeneratedValue(strategy="IDENTITY") */
    public $userId;

    /** @Column(type="string") */
    public $username;
    
    /** @Column(type="string") */
    public $password;
    
    /** @Column(type="string") */
    public $activationKey;
    
    /** @Column(type="string") */
    public $isActivated;
    
    /** @Column(type="datetime") */
    public $lastLogin;
    
    /** @OneToMany(targetEntity="AccountDTO", mappedBy="userId", fetch="EAGER", indexBy="accountId") */
    public $accounts;

    
    public function generatePassword($password) {
    	$this->password = md5($password);
    }
    
    public function generateActivationKey() {
    	if (!empty($this->username) && !empty($this->password)) {
    		$this->activationKey = md5($this->username . $this->password);
    	} else { 
    		throw new InvalidArgumentException('username and password must be set');
    	}
    }
    
    public function validatePassword($password) {
    	return (0 == strcmp($this->password, md5($password)));
    }
}
