<?php

namespace App\GraphQL\Fields\Field;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Field;

class PictureField extends Field {
    protected $attributes = [
        'description' => 'A field for picture'
    ];

    public function type()
    {
        return Type::string();
    }

    public function args()
    {
        return [];
    }

    protected function resolve($root, $args)
    {
    }
}
