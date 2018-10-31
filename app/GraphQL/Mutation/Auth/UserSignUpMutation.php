<?php

namespace App\GraphQL\Mutation\Auth;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\User;
class UserSignUpMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UserSignUpMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return Type::string();
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
            'username' => ['required','unique:users'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['required']
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = User::create([
            'username' => $args['username'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']),
        ]);

        // generate token for user and return the token
        return auth()->login($user);
    }
}
