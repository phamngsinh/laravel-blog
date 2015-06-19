<?php
if (! function_exists ( 'buildResponseMessage' )) {
	/**
	 * Get error message.
	 *
	 * @param string $id        	
	 * @return array()
	 */
	function buildResponseMessage($message = null, $code = null, $redirect = null,$data = null) {
		$message = empty($message) ? null : $message;
		return array (
				'message' => $message,
				'code' => $code,
				'redirect' => $redirect,
				'data' => $data 
		);
	}
}

if (! function_exists ( 'showArr' )) {
	/**
	 * out put data of mixed data.
	 *
	 * @param mixed $data        	
	 * @param boolean $varDump        	
	 *
	 */
	function showArr($data, $varDump = false) {
		echo "<pre>";
		if ($varDump)
			var_dump ( $data );
		else
			print_r ( $data );
		echo "</pre>";
	}
}

if (! function_exists ( 'getCheckBox' )) {
	/**
	 * out put data of mixed data.
	 *
	 * @param mixed $data
	 * @param boolean $varDump
	 *
	 */
	function getCheckBox($data) {
		return true;
		//return $data == 'on' ? true : false;
		return $data = ! empty ($data ) && $data == 'on' ? true : false;
		
	}
}

