<?php

namespace App\GraphQL\Mutation\Auth;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class UserLoginMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UserLoginMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return Type::string();
    }

    public function args()
    {
        return [
          'email' => [
            'name' => 'email',
            'type' => Type::nonNull(Type::string()),
            'rules' => ['required', 'email'],
          ],
          'password' => [
            'name' => 'password',
            'type' => Type::nonNull(Type::string()),
            'rules' => ['required'],
          ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        // error_log(print_r($args, TRUE));
        $credentials = [
          'email' => $args['email'],
          'password' => $args['password']
        ];

        $token = auth()->attempt($credentials);

        
        
        if (!$token) {
          throw new \Exception('Unauthorized!');
        }

        return $token;
    }
}
