<?php

/**
 * @Entity @Table(name="account") 
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="accounttype", type="string")
 * @DiscriminatorMap({"lecturer" = "LecturerAccountDTO", "tutor" = "TutorAccountDTO", "guest" = "GuestAccountDTO"})
 */
abstract class AccountDTO extends AbstractDTO
{    
    /** @Column(type="datetime") */
    public $livetimeStart;
    
    /** @Column(type="datetime") */
    public $livetimeEnd;
}
