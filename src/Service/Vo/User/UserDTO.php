<?php

/**
 * @Entity @Table(name="user")
 */
class UserDTO extends AbstractDTO
{
    /** @Column(type="string") */
    public $username;
    
    /** @Column(type="string") */
    public $password;
    
    /** @Column(type="string") */
    public $activationKey;
    
    /** @Column(type="boolean") */
    public $isActivated = false;
    
    /** @Column(type="datetime", nullable=true) */
    public $lastLogin;
    
    /**
     * @ManyToMany(targetEntity="AccountDTO", cascade={"persist", "remove"})
     * @JoinTable(name="users_accounts",
     *      joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="account_id", referencedColumnName="id")}
     *      )
     **/
    public $accounts;

    
    public function __construct() {
        $this->accounts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
