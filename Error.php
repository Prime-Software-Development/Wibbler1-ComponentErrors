<?php
namespace Trunk\Component\Errors;

class Error implements ErrorInterface {

	private $_message;
	private $_code;

	public function __construct($message, $code = null) {

		$this->setErrorMessage($message);
		$this->setErrorCode($code);
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
		return $this->_code ." - " . $this->_message;
	}
}
