<?php

namespace App\Repositories;

use App\Models\Comments;
use Carbon\Carbon;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter as Filter;

class CommentRepository
{

    /**
     * @return \Illuminate\Database\Eloquent\Model|object|QueryBuilder|null
     */
    public function index()
    {
        return QueryBuilder::for(Comments::class)
            ->allowedFilters([
                Filter::partial('title'),
                Filter::partial('content'),
            ])
            ->get();
    }

    public function show($id)
    {
        $comment = Comments::findOrFail($id);

        return $comment;
    }

    public function store($request)
    {
        $request = $request->request->all();
        $request['author_id'] = auth()->user()->id;
        $request['date'] = Carbon::now()->format('Y-m-d');

        $comment = new Comments();
        $comment->fill($request);
        $comment->save();
        return $comment;
    }

    public function update($request, $id)
    {

        $request = $request->request->all();
        $request['author_id'] = auth()->user()->id;
        $request['date'] = Carbon::now()->format('Y-m-d');

        $comment = Comments::findOrFail($id);
        $comment->fill($request);
        $comment->save();

        return $comment;
    }
}
