<?php

namespace App\GraphQL\Query\User;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\User;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'UserQuery',
        'description' => 'fetch single user'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::string())]
        ];
    }


    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = User::find($args['id']);

        if (!$user) {
            return null;
        }
        
        return $user;
    }
}
