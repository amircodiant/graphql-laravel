<?php

namespace App\GraphQL\Mutation\User;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;

class UserAddMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UserAddMutation',
        'description' => 'add new user'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'username' => ['name' => 'username', 'type' => Type::nonNull(Type::string())],
            'email' => ['name' => 'email', 'type' => Type::nonNull(Type::string())],
            'password' => ['name' => 'password', 'type' => Type::nonNull(Type::string())]
        ];
    }


    public function rules()
    {
        return [
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = new User;

        $user->username = $args['username'];
        $user->email = $args['email'];
        $user->password = bcrypt($args['password']);
        $user->save();

        return $user;
    }
}
