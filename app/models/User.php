<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	
		// We try two different methods of finding out if this user already has an account
		// first we check the session variables.  If those don't exist we check the cookies.

	public function look_for_user()
	{

		$session = Session::all();
		$found_user = false;

		// First check session variables
		$session_id = Session::get('userid');
		$session_hashed_id = Session::get('sessid');


		// 1. BY SESSION

		// If the User ID matches with the checked user ID, then we have found this user.
		if (Hash::check($session_id,$session_hashed_id))
		{

			Auth::loginUsingId($session_id);
			$session = Session::all();
			$user = $this->login($session_id);
			return $user;
		}else{
	//			echo "We couldn't find a user by Session.<BR>";	

		}

		// 2. BY COOKIE	
		//   if we haven't found the user, let's check the cookies.

			$cookie_userid = Cookie::get('userid');
			
			if (($cookie_userid != null))
			{
			
				Auth::loginUsingId($cookie_userid);
				$user = $this->login($cookie_userid);
				
				return $user;
			}else{
		//		echo "No Valid Cookie.<BR>";
			}

		// 3. If Session and Cookie didn't get it, lets create a guest account for them.
		
			$user = $this->makeGuest();
			return $user;
	}


		public function makeGuest()
		{
		//	echo "This is how you make guests.<BR>";
			// First Create a User account for this guest.
			$randnum = rand(1,10000);
			$username = "Guest-$randnum";
			$this->username = $username;
			$this->save();

	//		$error_messages = $this->errors()->all();
	//		var_dump($error_messages);

			// Log them In.
			$result = Auth::loginUsingId($this->id);
			$userid = $this->id;
			Cookie::queue('userid',$userid,525600);
			$user = $this->login($userid);
		}
		
	public function login($userid)
	{


		$session_hashed_id = Hash::make($userid);

		Session::put('userid',$userid);  		// Lets store the "raw" user ID.  It's still encrypted as all session variables are.
		Session::put('sessid',$session_hashed_id);				// and here we store the encrypted user ID.

		$sess = Session::all();
		Cookie::queue('userid',$userid,525600);

		$final_user = User::find($userid);
		
		return $final_user;
	}
	
	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
}
