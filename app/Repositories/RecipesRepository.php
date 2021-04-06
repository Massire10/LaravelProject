<?php

namespace App\Repositories;

use App\Models\Recipes;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter as Filter;

class RecipesRepository
{
    public function __construct()
    {}

    /**
     * @return \Illuminate\Database\Eloquent\Model|object|QueryBuilder|null
     */
    public function index()
    {
        return QueryBuilder::for(Recipes::class)
            ->allowedFilters([
                Filter::partial('title'),
                Filter::partial('content'),
            ])
            ->jsonPaginate();
    }

    public function show($id)
    {
        $recipes = Recipes::findOrFail($id);

        return $recipes;
    }

    public function store($request)
    {
        $recipes = new Recipes();
        $recipes->fill($request);
        $recipes->save();

        return $recipes;
    }

    public function update($request, $id)
    {
        $recipes = Recipes::findOrFail($id);
        $recipes->fill($request);
        $recipes->save();

        return $recipes;
    }
}
