<?php 
namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\Video;
class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user'
    ];

    /*
    * Uncomment following line to make the type input object.
    * http://graphql.org/learn/schema/#input-types
    */
    // protected $inputObject = true;

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the user'
            ],
            'username' => [
                'type' => Type::string(),
                'description' => 'The username of user'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'password' => [
                'type' => Type::string(),
                'description' => 'The password of user'
            ],
            'videos' => \App\GraphQL\Query\Video\VideosQuery::class,
            'video' =>  \App\GraphQL\Query\Video\VideoQuery::class
        ];
    }

    // If you want to resolve the field yourself, you can declare a method
    // with the following format resolve[FIELD_NAME]Field()
    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }

    protected function resolvePasswordField($root, $args)
    {
        return 'nothing';
    }


}