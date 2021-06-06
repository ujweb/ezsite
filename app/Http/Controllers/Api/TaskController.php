<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    //生成JSON字串
    private function makeJson($status, $data = null, $msg = null)
    {
        //轉 JSON 時確保中文不會變成 Unicode
        return response()->json(['status' => $status, 'data' => $data, 'message' => $msg])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::where('enabled', true)->get();
        return $this->makeJson(1, $tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->only(['title', 'salary', 'desc', 'enabled']);
        $task = Task::create($data);
        if( isset($task) ) {
            return $this->makeJson(1, $task);
        } else {
            return $this->makeJson(0, null, '工作新增失敗');
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
        //
        $task = Task::find($id);
        if ( isset($task) ) {
            return $this->makeJson(1, $task);
        } else {
            return $this->makeJson(0, null, '找不到此工作');
        }
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
        //
        $task = Task::find($id);
        if (isset($task)) {
            $row = $task->update($request->only(['title','salary','desc','enabled']));
            if ( $row == 1 ) {
                return $this->makeJson(1, null, '工作更新成功');
            } else {
                return $this->makeJson(0, null, '工作更新失敗');
            }
        } else {
            return $this->makeJson(0, null, '找不到此工作');
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
        //
        $task = Task::find($id);
        $row = $task->delete();
        if ( $row == 1 ) {
            return $this->makeJson(1, null, '工作刪除成功');
        } else {
            return $this->makeJson(0, null, '工作刪除失敗');
        }   
    }
    public function query(Request $request)
    {
        $tasks = Task::where('enabled', true)->where('title', 'like', '%' . $request->s . '%')->orderBy('created_at', 'asc')->get();
        if ($tasks && count($tasks) > 0) {
            return $this->makeJson(1, $tasks);
        } else {
            return $this->makeJson(0, null, '找不到工作資料');
        }
    }
}
