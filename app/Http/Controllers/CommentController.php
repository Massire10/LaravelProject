<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $comment_repository;

    public function __construct(CommentRepository $comment_repository)
    {
        $this->comment_repository = $comment_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $comment = $this->comment_repository->index();
            return response()->json(['success' => true, 'comment' => $comment], 200);
        }catch(\Exception $exception){
            return response()->json(['success' => false, $exception->getMessage()], $exception->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        try{
            $comment = $this->comment_repository->store($request);
            return response()->json(['success' => true, 'comment' => $comment], 200);
        }catch(\Exception $exception){
            return response()->json(['success' => false, $exception->getMessage()], $exception->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipes_recepes  $recipes_recepes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try{
            $comment = $this->comment_repository->show($id);
            return response()->json(['success' => true, 'comment' => $comment], 200);
        }catch(\Exception $exception){
            return response()->json(['success' => false, $exception->getMessage()], $exception->getCode());
        }
    }

    public function update(CommentRequest $request, $id)
    {
        try{
            $comment = $this->comment_repository->update($request, $id);
            return response()->json(['success' => true, 'comment' => $comment], 200);
        }catch(\Exception $exception){
            return response()->json(['success' => false, $exception->getMessage()], $exception->getCode());
        }
    }
}
