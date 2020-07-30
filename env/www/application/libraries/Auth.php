<?php (! defined('BASEPATH')) and exit('No direct script access allowed');

class Auth {
	
    const AUTH_TOKEN_KEY = "MakRo-2016_KeY%TokEn-akduFSS.q8d3R";

	function __construct() {

    }

    public function generate_token($cache, $passport, $device_id, $customer_model) {
    	
    	$hex_pass = bin2hex($passport);
        $timestamp = time();
    	$access_token = sha1($hex_pass.$device_id.self::AUTH_TOKEN_KEY.$timestamp);

        // for now we only use the passport to simplify the key
        $cache_id = "token_".$passport;
        $cache->save($cache_id, $access_token, 14400); // ttl 4hs

        $customer_model->log_auth_token($passport, $device_id, $timestamp, $access_token);

    	return $access_token;
    }

    public function logged_in($cache, $token, $passport) {
        $cache_id = "token_".$passport;
        
    	if ($access_token = $cache->get($cache_id)) {
            return $access_token == $token;
        }

        return false;
    }

    public function get_token($cache, $passport) {
        $cache_id = "token_".$passport;
        
        if ($access_token = $cache->get($cache_id)) {
            return $access_token;
        }

        return "";
    }
}