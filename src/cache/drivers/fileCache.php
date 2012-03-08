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

class fileCache{
	protected $_path = null;
	public function __construct($path){
		$this->_path = $path;
	}
	public function getFilename($id){
		return $this->_path.'/'.$id;
	}
	public function set($id, $value, $ttl){
		\file_put_contents($this->getFilename($id), $value);
	}
	public function get($id){
		return \file_get_contents($this->getFilename($id));
	}
	public function isValid($id, $ttl){
		return \is_file($this->getFilename($id))?(\filemtime($this->getFilename($id)) + $ttl > time()):false;
	}
}

