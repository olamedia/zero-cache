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

class nullCache{
	public function set($id, $value, $ttl){
	}
	public function get($id){
	}
	public function lastModified($id){
		return false;
	}
	public function isValid($id, $ttl){
		return false;
	}
}


