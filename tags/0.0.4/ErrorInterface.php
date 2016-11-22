<?php
namespace TrunkSoftware\Component\Errors;
/**
 * Created by PhpStorm.
 * User: trunk
 * Date: 05/01/16
 * Time: 16:53
 */

interface ErrorInterface {
	// Get error message
	public function getErrorMessage();
	// Set error message
	public function setErrorMessage( $message );
	// Get error code
	public function getErrorCode();
	// Set error code
	public function setErrorCode( $code );
	// Return Error as array
	public function toArray();
}