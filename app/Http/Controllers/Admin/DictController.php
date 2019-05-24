<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dict;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DictController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.dict.index');
    }
    public function data(Request $request)
    {
        $model = Dict::query();
        if ($request->get('group')){
            $model = $model->where('group', $request->get('group'));
        }
        $res = $model->orderBy('created_at','desc')->paginate($request->get('limit',30))->toArray();
        $data = [
            'code' => 0,
            'msg'   => '正在请求中...',
            'count' => $res['total'],
            'data'  => $res['data']
        ];
        return response()->json($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dict.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'group'  => 'required|string|max:20',
            'code'  => 'required|string|max:50',
            'value' => 'required|string|max:50',
            'sort' => 'integer|min:1',
            'desc' => 'string|max:100',
        ], [
            'group.required' => '组别必填',
            'group.max' => '组别不能超过20个字符',
            'code.required' => 'code码必填',
            'code.max' => 'code码不能超过50个字符',
            'value.required' => '字典值必填',
            'value.max' => '字典值不能超过50个字符',
            'sort.integer' => '排序必须为整数',
            'sort.min' => '排序最小值应为1',
            'desc.max' => '描述不能超过100个字符',
        ]);
        if (Dict::create($request->all())){
            return redirect(route('admin.dict'))->with(['status'=>'添加完成']);
        }
        return redirect(route('admin.dict'))->with(['status'=>'系统错误']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dict = Dict::findOrFail($id);
        return view('admin.dict.edit',compact('dict'));
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
        $this->validate($request,[
            'group'  => 'required|string|max:20',
            'code'  => 'required|string|max:50',
            'value' => 'required|string|max:50',
            'sort' => 'integer|min:1',
            'desc' => 'string|max:100',
        ], [
            'group.required' => '组别必填',
            'group.max' => '组别不能超过20个字符',
            'code.required' => 'code码必填',
            'code.max' => 'code码不能超过50个字符',
            'value.required' => '字典值必填',
            'value.max' => '字典值不能超过50个字符',
            'sort.integer' => '排序必须为整数',
            'sort.min' => '排序最小值应为1',
            'desc.max' => '描述不能超过100个字符',
        ]);
        $dict = Dict::findOrFail($id);
        $data = $request->only(['group','code','value','sort','desc']);
        if ($dict->update($data)){
            return redirect()->to(route('admin.dict'))->with(['status'=>'更新字典成功']);
        }
        return redirect()->to(route('admin.dict'))->withErrors('系统错误');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (empty($ids)){
            return response()->json(['code'=>1,'msg'=>'请选择删除项']);
        }
        if (Dict::destroy($ids)){
            return response()->json(['code'=>0,'msg'=>'删除成功']);
        }
        return response()->json(['code'=>1,'msg'=>'删除失败']);
    }
}
