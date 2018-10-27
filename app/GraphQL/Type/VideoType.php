<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class VideoType extends BaseType
{
    protected $attributes = [
        'name' => 'VideoType',
        'description' => 'A type of video'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the video'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'The title of video'
            ],
            'url' => [
                'type' => Type::string(),
                'description' => 'The url of video'
            ]
        ];
    }

    protected function resolveUrlField($root, $args)
    {
        return 'http://'.strtolower($root->url);
    }
}
