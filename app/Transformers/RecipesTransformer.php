<?php

namespace App\Transformers;

use App\Models\Recipes;
use League\Fractal\TransformerAbstract;

class RecipesTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
    /**
     * List of resources possible to include
     *
     * @var array
     */

    protected $availableIncludes = [
        'comments',
        'author'
    ];

    protected $model;

    public function __construct()
    {
        $this->model = new Recipes();
        $this->availableIncludes = $this->getAvailableIncludes();
    }

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($obj)
    {
        return [
            'id' => $obj->id,
            'title' => $obj->title,
            'status' => $obj->status,
            'content' => $obj->content,
            'ingredients' => $obj->ingredients,
            'url' => $obj->url,
        ];
    }

    public function includeComments(Recipes $recipes) {
        if (isset($recipes->comments))
            return $this->collection($recipes->comments, new CommentsTransformer());
    }

    public function includeAuthor(Recipes $recipes) {
        if (isset($recipes->author))
            return $this->item($recipes->author, new UserTransformer());
    }
}
