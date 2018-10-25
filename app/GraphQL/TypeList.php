<?php 
namespace App\GraphQL;

 /**
  * Type list class used to add graphql
  */
final class TypeList
{
 	/**
 	 *@param unique key value list for graphql type 
 	 */
 	private static $typeList = [
 		'User' => 'App\GraphQL\Type\UserType',
 	];

 	/**
 	 * return default key value pair of graphql type
 	 * @return Array
 	 */
 	public static function  type()
 	{
 		return self::$typeList;
 	}
}