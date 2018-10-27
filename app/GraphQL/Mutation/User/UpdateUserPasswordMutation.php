<?php 
namespace App\GraphQL\Mutation\User;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\User;

class UpdateUserPasswordMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateUserPassword',
        'description' => 'update user password'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::string())],
            'password' => ['name' => 'password', 'type' => Type::nonNull(Type::string())]
        ];
    }

    public function rules()
    {
        return [
            'id' => ['required'],
            'password' => ['required', 'email']
        ];
    }
    
    public function resolve($root, $args)
    {
        $user = User::find($args['id']);

        if (!$user) {
            return null;
        }

        $user->password = bcrypt($args['password']);
        $user->save();

        return $user;
    }
}
