<?php

/*
 * This file is part of the zero package.
 * Copyright (c) 2012 olamedia <olamedia@gmail.com>
 *
 * This source code is release under the MIT License.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace zero;

class cachedValue{
	protected $_id = null;
	protected $_lifetime = null;
	protected $_data = '';
	protected $_driver = null;
	protected static $_defaultDriver = null;
	public function __construct($id, $lifetime = 3600){
		$this->_id = $id;
		$this->_lifetime = $lifetime;
	}
	public function lastModified(){
		return $this->getDriver()->lastModified($this->_id);
	}
	public function isValid(){
		return $this->getDriver()->isValid($this->_id)
			&&
			(false !== 
					($mtime = $this->lastModified())
			)
			&& ($mtime + $this->_lifetime > time());
	}
	public function get(){
		return $this->getDriver()->get($this->_id);
	}
	public function set($value){
		$this->_data = $value;
		$this->save();
	}
	public function start(){ // if ($cache->start()) { .... $cache->end(); }
		if ($this->isValid()){
			echo $this->get();
			return false;
		}
		\ob_start();
		return true;
	}
	public function end(){
		$this->_data = \ob_get_flush();
		$this->save();
		return $this;
	}
	public function save(){
		if (null !== $this->_driver){
			$this->getDriver()->save();
		}
		return $this;
	}
	public static function setDefaultDriver($driver){
		self::$_defaultDriver = $driver;
	}
	public static function getDefaultDriver(){
		return self::$_defaultDriver;
	}
	public function setDriver($driver){
		$this->_driver = $driver;
		return $this;
	}
	public function getDriver(){
		if (null === $this->_driver){
			if (null !== self::$_defaultDriver){
				$this->_driver = self::$_defaultDriver;
			}else{
				$this->_driver = new nullCache();
			}
		}
		return $this->_driver;
	}
}


