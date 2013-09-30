<?php

/**
 * @Entity @Table(name="account")
 */
class AccountDTO extends AbstractDTO
{
    /** @Id @Column(type="integer") @GeneratedValue(strategy="IDENTITY") */
    public $accountId;
    
    /** @Column(type="integer") */
    public $userId;
}
