<?php

namespace App\GraphQL\Query\Video;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Video;
use App\User;

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
            'id' => ['name' => 'id', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $id = '';
        if ($root instanceof User) {
           $id = 6; 
        }else{
            $id = isset($args['id']) ? $args['id'] : '';
        } 
        
        $model = Video::find($id);

        if (!$model) {
            return null;
        }

        return $model;
        
    }
}
