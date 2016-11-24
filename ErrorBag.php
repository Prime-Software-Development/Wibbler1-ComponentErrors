<?php
namespace TrunkSoftware\Component\Errors;

class ErrorBag implements \Countable {

	/**
	 * @var ErrorInterface[] $errors
	 */
	private $errors = array();

	/**
	 * Add error
	 *
	 * @param ErrorInterface $error
	 *
	 * @return $this
	 */
	public function addError( ErrorInterface $error )
	{
		$this->errors[] = $error;

		return $this;
	}

	/**
	 * Add array of errors
	 *
	 * @param ErrorInterface[] $errors
	 *
	 * @return $this
	 */
	public function addErrors(array $errors)
	{
		foreach($errors as $error) {
			$this->addError($error);
		}

		return $this;
	}

	/**
	 * Merge given ErrorBag into self
	 *
	 * @param ErrorBag $bag
	 *
	 * @return $this
	 */
	public function merge(ErrorBag $bag) {

		$this->addErrors($bag->getErrors());

		return $this;
	}

	/**
	 * @return Error[]
	 */
	public function getErrors() {
		return $this->errors;
	}

	/**
	 * @return int
	 */
	public function getCount() {
		return $this->count();
	}

	/**
	 * @return null|Error
	 */
	public function getFirst() {
		return isset($this->errors[0]) ? $this->errors[0] : null;
	}

	/**
	 * Clear all errors and return them
	 *
	 * @return Error[]
	 */
	public function clear()
	{
		$errors = $this->errors;
		$this->errors = array();

		return $errors;
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

	/**
	 * Count elements of an object
	 * @link  http://php.net/manual/en/countable.count.php
	 * @return int The custom count as an integer.
	 * </p>
	 * <p>
	 * The return value is cast to an integer.
	 * @since 5.1.0
	 */
	public function count() {

		return count($this->errors);
	}
}