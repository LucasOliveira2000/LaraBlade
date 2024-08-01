<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ToDoList;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $lists = ToDoList::all();
        }catch(ModelNotFoundException){
            return redirect()->route("list.index")->with("Você não tem nenhuma tarefa", "error");
        }

        return view("List.index",[
            "title"    => "Atividades",
            "lists"    => $lists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("List.create", [
            "title"     => ["Criar Atividade"],
            "form"      => [
                "titulo"        => "",
                "descrição"     => ""
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teste = $request->validate([
            "titulo"      => "required|max:30|min:3",
            "descricao"   => "required|max:150|min:3"
        ],[
            "titulo.required"       => "Esse campo é obrigatório",
            "descricao.required"    => "Esse campo é obrigatório"
        ]);

        $makeList = ToDoList::create([
            // "user_id"   => Auth::user()->id,
            "titulo"    => $request->titulo,
            "descricao" => $request->descricao
        ]);

        return to_route("list.index")->with("Atividade ".$makeList->titulo."criada com sucesso", "success");
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDoList $toDoList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDoList $toDoList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToDoList $toDoList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDoList $toDoList)
    {
        //
    }
}
