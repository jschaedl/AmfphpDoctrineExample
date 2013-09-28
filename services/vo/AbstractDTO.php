<?php

/** 
 * @MappedSuperclass 
 */
abstract class AbstractDTO
{
	/**
 	 * @Column(type="boolean")
	 */
	protected $active = true;

	/**
 	 * @Column(type="datetime")
	 */
	protected $creationDate;

	/**
 	 * @Column(type="datetime")
	 */
	protected $modificationDate;
	
	/**
	 * @Column(columnDefinition = "datetime")
	 */
	protected $lock;
	
	/**
	 * @PreUpdate
	 */
	protected function onUpdate() {
		$this->modificationDate = new DateTime();
	}
}