<?php

namespace App\GraphQL\Mutation\User;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;

class UserUpdateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UserUpdateMutation',
        'description' => 'update user'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::string())],
            'email' => ['name' => 'email', 'type' => Type::nonNull(Type::string())],            
        ];
    }


    public function rules()
    {
        return [
            'id' => ['required'],
            'email' => ['required', 'email'],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = User::find($args['id']);

        if (!$user) {
            return null;
        }

        $user->email = $args['email'];
        $user->save();

        return $user;
    }
}
