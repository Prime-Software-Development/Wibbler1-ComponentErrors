<?php
namespace TrunkSoftware\Component\Errors;

class ErrorBag {
	private $errors = array();

	public function addError( ErrorInterface $error )
	{
		$this->errors[] = $error;

		return $this;
	}

	public function getErrors() {
		return $this->errors;
	}

	public function getCount() {
		return count( $this->errors );
	}

	public function getFirst() {
		return isset($this->errors[0]) ? $this->errors[0] : null;
	}

	/**
	 * Transform all ErrorInterface to array and return
	 * @return array
	 */
	public function toArray() {
		$data = array();
		foreach( $this->errors as $error ) {
			$data[] = $error->toArray();
		}

		return $data;
	}

	/**
	 * Convenience method to encode are to JSON
	 * @return string
	 */
	public function toJSON()
	{
		return json_encode( $this->toArray() );
	}
}