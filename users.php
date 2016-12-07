<?php
/**
*/
include_once("adb.php");
/**
*User class
*/
class user extends adb{
	function user(){
	}
	/**
	*Adds a new user
	*@param int uid user id
	*@param string firstname first name
	*@param string lastname last name
	*@param string username user name
	*@param int phonenumber phone number
	*@return boolean returns true if successful or false
	*/

    /*This function takes in the entered parameters and enters them in the database*/
	function addUser($firstname,$email,$username,$password,$telephone){
		$strQuery="insert into user
						(firstname,email,username,password,phonenumber)
						VALUES('$firstname','$email','$username',MD5('$password'),'$telephone')";
		return $this->query($strQuery);
		}
	function addAdmin($email,$username,$password){
		$strQuery="insert into admin
						(email,username,password)
						VALUES('$email','$username',MD5('$password'))";
		return $this->query($strQuery);
		}
		
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getUser($filter=false){
		$strQuery="select username,phonenumber from user";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
	function getUserLogin($username,$password){
		$strQuery="select uid,username,password from user where
					username = '$username' and password =MD5('$password')";

		return $this->query($strQuery);
	}
	function getAdminLogin($username,$password){
		$strQuery="select uid,username,password from admin where
					username = '$username' and password =MD5('$password')";

		return $this->query($strQuery);
	}
}
?>
 