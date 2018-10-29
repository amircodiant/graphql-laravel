<?php 
namespace App\GraphQL;

 /**
  * mutation list class used to add graphql schema
  */
final class MutationList
{
 	/**
 	 *@param unique key value list for default mutation schema list 
 	 */
 	private static $defaultMutationList = [
 		'updateUserPassword' 			=> 'App\GraphQL\Mutation\User\UpdateUserPasswordMutation',
 		'addNewUser'			 		=> 'App\GraphQL\Mutation\User\UserAddMutation',
 		'updateUser'			 		=> 'App\GraphQL\Mutation\User\UserUpdateMutation',
 		'deleteUser'			 		=> 'App\GraphQL\Mutation\User\UserDeteteMutation',


 		'addNewVideo'			 		=> 'App\GraphQL\Mutation\Video\AddNewVideoMutation',
 	];

 	/**
 	 * return default key value pair of default mutation schema
 	 * @return Array
 	 */
 	public static function  defaultMutation()
 	{
 		return self::$defaultMutationList;
 	}
}