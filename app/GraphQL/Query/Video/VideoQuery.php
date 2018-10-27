<?php

namespace App\GraphQL\Query\Video;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Video;

class VideoQuery extends Query
{
    protected $attributes = [
        'name' => 'VideoQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::type('Video');
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::string())]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
         $model = Video::find($args['id']);

        if (!$model) {
            return null;
        }

        return $model;
    }
}
