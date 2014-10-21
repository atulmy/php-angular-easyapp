<?php

class Auth extends Dbop {

	/**
	 * setLoginDetails sets User details in session or cookies
	 * @param String $userId contains User id
	 * @param String $username contains the name of user
	 * @param Boolean $rememberMe contains the boolean value [0 or 1]
	 * <p>This function sets user login details in database through session or cookies</p>
	 * @return void
	 */
    public static function setLoginDetails($userId, $userName, $type, $rememberMe = 0) {
        $userId = strrev(base64_encode(strrev(base64_encode($userId))));
        $userName = strrev(base64_encode(strrev(base64_encode($userName))));
        $type = strrev(base64_encode(strrev(base64_encode($type))));
        if ($rememberMe == 1) {
            $validityPeriod = 2592000;
        } else {
            $validityPeriod = '';
        }
        Util::setCookie('user_id', $userId, $validityPeriod);
        Util::setCookie('user_name', $userName, $validityPeriod);
        Util::setCookie('user_type', $type, $validityPeriod);
    }

    /**
	 * getLoginDetails get User details from session or cookies
	 * <p>This function gets user login details from session or cookies</p>
	 * @return Array [Login Details]
	 */
    public static function getLoginDetails() {
        $userId = (string) base64_decode(strrev(base64_decode(strrev(Util::getCookie('user_id')))));
        $userName = (string) base64_decode(strrev(base64_decode(strrev(Util::getCookie('user_name')))));
        $userType = (string) base64_decode(strrev(base64_decode(strrev(Util::getCookie('user_type')))));
        return array('user_id' => $userId, 'user_name' => $userName, 'user_type' => $userType);
    }

    /**
	 * checkSession validates user session
	 * <p>This function validates user session</p>
	 * @return Boolean [True or False]
	 */
    public static function checkSession() {
        $userId = Util::getCookie('uuid');
        if (!$userId) {
            return false;
        } else {
            $userId = (string) base64_decode(strrev(base64_decode(strrev($userId))));
            if (strlen($userId) == 0) {
                self::logout();
                return false;
            }
            return true;
        }
    }

	/**
	 *  logout ends user session
	 * @param String $userUID contains the user id whose session wants to end
	 * <p>This function ends user session whose userUID provided as an argument, by calling setSessionEnd method</p>
	 * @return void
	 */
    public static function logout() {
        Util::setcookie('user_id', '', -1);
        Util::setcookie('user_name', '', -1);
    }
}
?>