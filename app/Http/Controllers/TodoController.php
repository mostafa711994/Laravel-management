<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        $todo = Todo::all();
        return view('Todo.index')->with('todos', $todo);
    }


    public function create()
    {
        return view('Todo.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:15',
            'description' => 'required|max:100'
        ]);
        $data = $request->all();
        $name = $data['name'];
        $description = $data['description'];
        $newTodo = new Todo();
        $newTodo->name = $name;
        $newTodo->description = $description;
        $newTodo->completed = false;
        $newTodo->save();
        session()->flash('success','your todo created successfully');
        return redirect('/todos');
    }


    public function show($id)
    {
        $todoId = Todo::find($id);
        return view('Todo.show')->with('todo', $todoId);

    }


    public function edit($id)
    {
        $todoId = Todo::find($id);
        return view('Todo.edit')->with('todo', $todoId);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|min:4|max:15',
            'description' => 'required|max:100'
        ]);

        $data = $request->all();

        $todoId = Todo::find($id);
        $name = $data['name'];
        $description = $data['description'];

        $todoId->name = $name;
        $todoId->description = $description;

        $todoId->save();
        session()->flash('success','your todo updated successfully');

        return redirect('/todos');

    }
    public function complete(Todo $todo){
        $todo->completed = true;
        $todo->save();
        session()->flash('success','your todo completed successfully');
        return redirect('/todos');

    }


    public function destroy(Todo $todo)
    {
        $todo->delete();
        session()->flash('success','your todo deleted successfully');
        return redirect('/todos');
    }
}
