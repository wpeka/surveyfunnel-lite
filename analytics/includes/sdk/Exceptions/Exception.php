<?php
/**
 * Ask for review JS file
 *
 * @since 1.0.0
 * @package Surveyfunnel_Lite/analytics/includes/sdk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Analytics_Exception' ) ) {
	/**
	 * Thrown when an API call returns an exception.
	 */
	class Analytics_Exception extends Exception {
		/**
		 * The associated result object returned by the API server.
		 *
		 * @access protected
		 * @var    object    $_result    The associated result object returned by the API server.
		 */
		protected $_result;
		/**
		 * The associated type object returned by the API server.
		 *
		 * @access protected
		 * @var    object    $_type    The associated type object returned by the API server.
		 */
		protected $_type;
		/**
		 * The associated code object returned by the API server.
		 *
		 * @access protected
		 * @var    object    $_code    The associated code object returned by the API server.
		 */
		protected $_code;

		/**
		 * Make a new API Exception with the given result.
		 *
		 * @param array $result The result from the API server.
		 */
		public function __construct( $result ) {
			$this->_result = $result;

			$code    = 0;
			$message = 'Unknown error, please check GetResult().';
			$type    = '';

			if ( isset( $result['error'] ) && is_array( $result['error'] ) ) {
				if ( isset( $result['error']['code'] ) ) {
					$code = $result['error']['code'];
				}
				if ( isset( $result['error']['message'] ) ) {
					$message = $result['error']['message'];
				}
				if ( isset( $result['error']['type'] ) ) {
					$type = $result['error']['type'];
				}
			}

			$this->_type = $type;
			$this->_code = $code;

			parent::__construct( $message, is_numeric( $code ) ? $code : 0 );
		}

		/**
		 * Return the associated result object returned by the API server.
		 *
		 * @return array The result from the API server
		 */
		public function getResult() {
			return $this->_result;
		}
		/**
		 * Return the associated StringCode object returned by the API server.
		 *
		 * @return array The StringCode from the API server
		 */
		public function getStringCode() {
			return $this->_code;
		}
		/**
		 * Return the associated Type object returned by the API server.
		 *
		 * @return array The Type from the API server
		 */
		public function getType() {
			return $this->_type;
		}

		/**
		 * To make debugging easier.
		 *
		 * @return string The string representation of the error
		 */
		public function __toString() {
			$str = $this->getType() . ': ';

			if ( 0 !== $this->code ) {
				$str .= $this->getStringCode() . ': ';
			}

			return $str . $this->getMessage();
		}
	}
}
