<?php
/**
 * Policy class to determine if the user can login
 *
 * @package   Acl
 * @author    Jeremy Bush <contractfrombelow@gmail.com>
 * @copyright (c) 2010-2011 Jeremy Bush
 * @license   ISC License http://github.com/zombor/Vendo/raw/master/LICENSE
 */
class Acl_Policy_Login extends Policy
{
	const LOGGED_IN = 1;

	/**
	 * Method to execute the policy
	 * 
	 * @param Model_ACL_User $user  the user account to run the policy on
	 * @param array          $extra an array of extra parameters that this policy
	 *                              can use
	 *
	 * @return bool/int
	 */
	public function execute(Model_ACL_User $user, array $extra = NULL)
	{
		if ($user->id == Auth::instance()->get_user()->id AND ! Auth::instance()->logged_in())
			return TRUE;

		if (Auth::instance()->logged_in())
			return self::LOGGED_IN;

		return FALSE;
	}
}