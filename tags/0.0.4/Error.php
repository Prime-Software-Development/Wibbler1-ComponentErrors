<?php
namespace TrunkSoftware\Component\Errors;
/**
 * Created by PhpStorm.
 * User: trunk
 * Date: 05/01/16
 * Time: 16:55
 */

class Error implements ErrorInterface {

	private $_message = null;
	private $_code = null;

	public function __construct( $message, $code = null ) {

		$this->_message = $message;
		$this->_code = $code;

	}

	public function getErrorMessage() {
		return $this->_message;
	}

	public function setErrorMessage( $message ) {
		$this->_message = $message;
	}

	public function getErrorCode() {
		return $this->_code;
	}

	public function setErrorCode( $code ) {
		$this->_code = $code;
	}

	public function toArray() {
		return array(
			'code' => $this->getErrorCode(),
			'message' => $this->getErrorMessage()
		);
	}

	public function __toString() {
		// TODO: Implement __toString() method.
		return $this->_code ." - " . $this->_message;
	}
}