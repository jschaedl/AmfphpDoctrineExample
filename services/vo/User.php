<?php


/**
 * @Entity @Table(name="user")
 */
class User
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    public $userId;

    /**
     * @Column(type="string")
     * @var string
     */
    public $username;
    
    /**
     * @Column(type="string")
     * @var string
     */
    public $password;
}