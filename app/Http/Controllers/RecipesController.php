<?php

namespace App\Http\Controllers;

use App\Repositories\RecipesRepository;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    private $recipes_repository;

    public function __construct(RecipesRepository $recipes_repository)
    {
        $this->recipes_repository = $recipes_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $recipes = $this->recipes_repository->index();
            return response()->json(['success' => true, 'recipes' => $recipes], 200);
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
    public function store(Request $request)
    {
        try{
            $recipes = $this->recipes_repository->store($request);
            return response()->json(['success' => true, 'recipes' => $recipes], 200);
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
            $recipes = $this->recipes_repository->show($id);
            return response()->json(['success' => true, 'recipes' => $recipes], 200);
        }catch(\Exception $exception){
            return response()->json(['success' => false, $exception->getMessage()], $exception->getCode());
        }
    }
}
