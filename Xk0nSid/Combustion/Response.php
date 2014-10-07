<?php namespace Combustion;

class Response {

	public static function send($msg = 'OK', $code = 200, $type = 'text/html', $data = null) {
		header("HTTP/1.0 " . (string)$code . " " . $msg);
		if ( $type === 'application/json') {
			header("Content-Type: " . $type);
			if ( isset($data) ) {
				echo json_encode($data);
				exit;
			}
		}
	}

}