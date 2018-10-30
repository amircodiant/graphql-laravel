<?php

namespace App\GraphQL\Mutation\Video;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Video;

class AddNewVideoMutation extends Mutation
{
    protected $attributes = [
        'name' => 'addNewVideo',
        'description' => 'A mutation for video upload'
    ];

    public function type()
    {
        return GraphQL::type('Video');
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

        
        $files = Video::upload(request());
        if($files){
            $model = new Video;

            $model->title = $args['title'];
            $model->url = $files;
            $model->save();
            return $model;

        }else{
            return null;
        }
    }
}
