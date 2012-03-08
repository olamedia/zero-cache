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

class apcCache{
	protected $_prefix = null;
	public function __construct($prefix){
		$this->_prefix = $prefix;
	}
	public function getKey($id){
		return $this->_prefix.$id;
	}
	public function set($id, $value, $ttl){
		\apc_add($this->getKey($id), $value, $ttl);
	}
	public function get($id){
		return \apc_fetch($this->getKey($id));
	}
	public function lastModified($id){
		return \apc_exists($this->getKey($id))?\time():false;
	}
	public function isValid($id){
		return \apc_exists($this->getKey($id));
	}
}

