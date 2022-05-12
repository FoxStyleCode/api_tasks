<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => Task::all(), 'msg' => 'Tareas cargadas']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->status = 'pendiente';
        if($task->save()){
            return response()->json(['data' => $task, 'msg' => 'Tarea creada']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->name = $request->name;
        if($task->save()){
            return response()->json(['data'=> $task, 'msg' => 'Tarea actualizada']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        if($task->delete()){
            return response()->json(['data' => $task, 'msg' => 'Tarea eliminada']);
        }
    }

    public function updateStatus($id){

        $task = Task::findOrFail($id);
        $task->status = 'terminada';
        
        if($task->save()){
            return response()->json(['data' => $task, 'msg' => 'Tarea terminada']);
        }

    }

}
