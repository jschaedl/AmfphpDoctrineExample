<?php

namespace Service\Vo;

/**
 * @MappedSuperclass 
 * @HasLifecycleCallbacks
 */
abstract class AbstractDTO
{
    /** @Id @Column(type="integer") @GeneratedValue(strategy="IDENTITY") */
    public $id;
    
	/** @Column(type="boolean") */
	public $active = true;

	/**  @Column(type="datetime", nullable=true) */
	public $creationDate;

	/** @Column(type="datetime", nullable=true)  */
	public $modificationDate;
	
	/** @Column(type="datetime", nullable=true) */
	public $locked;
	
	
	/** @PrePersist */
	public function onPersist() {
	    $this->creationDate = new \DateTime();
	}
	
	/** @PreUpdate */
	public function onUpdate() {
		$this->modificationDate = new \DateTime();
	}
}
