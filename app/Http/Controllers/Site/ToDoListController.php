<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ToDoList;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Define o número de itens por página (por exemplo, 10)
            $lists = ToDoList::where("user_id", Auth::user()->id)->paginate(9);
        } catch (ModelNotFoundException $e) {
            return redirect()->route("list.index")->with("message", "Você não tem nenhuma tarefa");
        }

        return view("List.index", [
            "title"    => "Lista de Atividades",
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
    $request->validate([
        "titulo"      => "required|max:30|min:3",
        "descricao"   => "required|max:150|min:3"
    ],[
        "titulo.required"       => "Esse campo é obrigatório",
        "titulo.max"            => "O título não pode ter mais de 30 caracteres",
        "titulo.min"            => "O título deve ter pelo menos 3 caracteres",
        "descricao.required"    => "Esse campo é obrigatório",
        "descricao.max"         => "A descrição não pode ter mais de 150 caracteres",
        "descricao.min"         => "A descrição deve ter pelo menos 3 caracteres"
    ]);

    $makeList = ToDoList::create([
        "user_id"   => Auth::user()->id,
        "titulo"    => $request->titulo,
        "descricao" => $request->descricao
    ]);

    return to_route("list.index")->with("message", "Atividade " . $makeList->titulo . " criada com sucesso");
}


    /**
     * Display the specified resource.
     */
    public function show(ToDoList $toDoList)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDoList $toDoList)
    {
        
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
