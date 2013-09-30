<?php

/** 
 * @MappedSuperclass 
 */
abstract class AbstractDTO
{
	/** @Column(type="boolean") */
	public $active = true;

	/**  @Column(type="datetime") */
	public $creationDate;

	/** @Column(type="datetime")  */
	public $modificationDate;
	
	/** @Column(type="datetime") */
	public $lock;
	
	
	/** @PreUpdate */
	public function onUpdate() {
		$this->modificationDate = new DateTime();
	}
}
