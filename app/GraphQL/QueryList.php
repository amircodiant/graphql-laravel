<?php 
namespace App\GraphQL;

 /**
  * query list class used to add graphql schema
  */
final class QueryList
{
 	/**
 	 *@param unique key value list for default query schema list 
 	 */
 	private static $defaultSchemasList = [
 		'user' => 'App\GraphQL\Query\User\UserQuery',
        'users' => 'App\GraphQL\Query\User\UsersQuery',
 	];

 	/**
 	 * return default key value pair of default query schema
 	 * @return Array
 	 */
 	public static function  defaultSchemas()
 	{
 		return self::$defaultSchemasList;
 	}
}