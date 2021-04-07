<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class CommentsTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($obj)
    {
        return [
            'id' => $obj->id,
            'author_id' => $obj->author_id,
            'content' => $obj->content,
            'recipe_id' => $obj->recipe_id,
            'date' => $obj->date,
            'url' => $obj->url
        ];
    }
}
