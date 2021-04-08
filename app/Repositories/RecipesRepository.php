<?php

namespace App\Repositories;

use App\Models\Recipes;
use Carbon\Carbon;
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
                Filter::partial('ingredients'),
                Filter::partial('date'),
                Filter::partial('status'),
            ])
            ->allowedIncludes(['comments', 'author'])
            ->jsonPaginate();
    }

    public function show($id)
    {
        $recipes = Recipes::findOrFail($id);

        return $recipes;
    }

    public function store($request)
    {
        $request = $request->request->all();
        $request['author_id'] = auth()->user()->id;
        $request['date'] = Carbon::now()->format('Y-m-d');

        $recipes = new Recipes();
        $recipes->fill($request);
        $recipes->save();

        return $recipes;
    }

    public function update($request, $id)
    {
        $request = $request->request->all();
        $request['author_id'] = auth()->user()->id;
        $request['date'] = Carbon::now()->format('Y-m-d');

        $recipes = Recipes::findOrFail($id);
        $recipes->fill($request);
        $recipes->save();

        return $recipes;
    }

    public function destroy($id)
    {
        $recipes = Recipes::findOrFail($id);
        $recipes->delete();

        return $recipes;
    }
}
