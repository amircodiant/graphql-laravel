<?php

namespace App\GraphQL\Mutation\Video;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class addNewVideo extends Mutation
{
    protected $attributes = [
        'name' => 'addNewVideo',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'title' => ['name' => 'title', 'type' => Type::nonNull(Type::string())],
            'file' => ['name' => 'file', 'type' => Type::nonNull(Type::string())]
        ];
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'file' => ['required']
        ];
    }


    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        print_r($args);
        die;
    }
}
