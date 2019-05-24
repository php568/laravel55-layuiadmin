<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dict;
use App\Models\Output;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutputController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.output.index');
    }
    public function data(Request $request)
    {
        $model = Output::query();
        if ($request->get('name')){
            $model = $model->where('name','like','%'.$request->get('name').'%');
        }
        if ($request->get('bn')){
            $model = $model->where('bn','like','%'.$request->get('bn').'%');
        }
        $res = $model->orderBy('id','desc')->paginate($request->get('limit',30))->toArray();
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
        $color = Dict::query()->where('group','product_color')->get();
        $size = Dict::query()->where('group','product_size')->get();
        $style = Dict::query()->where('group','product_style')->get();
        return view('admin.output.create',compact( ['color', 'size', 'style']));
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
            'name'  => 'required|string|max:50',
            'bn'  => 'required|string|max:50',
            'color' => 'string|max:50',
            'size' => 'string|max:50',
            'style' => 'string|max:50',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'order_at' => 'string|date_format:Y-m-d',
            'buyer' => 'string',
            'phone' => 'string',
            'logi_no' => 'string',
            'address' => 'string',
        ], [
            'name.required' => '名称必填',
            'name.max' => '名称不能超过50个字符',
            'bn.required' => '货号必填',
            'bn.max' => '货号不能超过50个字符',
            'quantity.required' => '数量必填',
            'quantity.numeric' => '数量必须是数字',
            'price.required' => '价格必填',
            'price.numeric' => '价格必须是数字',
            'order_at.date_format' => '日期不匹配Y-m-d格式',
        ]);
        $request['order_at'] = date('Y-m-d H:i:s', strtotime($request['order_at']));
        $request->merge(['no' => date('YmdHis').$this->getCounter()]);
        if (Output::create($request->all())){
            return redirect(route('admin.output'))->with(['status'=>'添加完成']);
        }
        return redirect(route('admin.output'))->with(['status'=>'系统错误']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $output = Output::findOrFail($id);
        $color = Dict::query()->where('group','product_color')->get();
        $size = Dict::query()->where('group','product_size')->get();
        $style = Dict::query()->where('group','product_style')->get();
        return view('admin.output.edit',compact(['output', 'color', 'size', 'style']));
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
            'name'  => 'required|string|max:50',
            'bn'  => 'required|string|max:50',
            'color' => 'string|max:50',
            'size' => 'string|max:50',
            'style' => 'string|max:50',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'order_at' => 'string|date_format:Y-m-d',
            'buyer' => 'string',
            'phone' => 'string',
            'logi_no' => 'string',
            'address' => 'string',
        ], [
            'name.required' => '名称必填',
            'name.max' => '名称不能超过50个字符',
            'bn.required' => '货号必填',
            'bn.max' => '货号不能超过50个字符',
            'quantity.required' => '数量必填',
            'quantity.numeric' => '数量必须是数字',
            'price.required' => '价格必填',
            'price.numeric' => '价格必须是数字',
            'order_at.date_format' => '日期不匹配Y-m-d格式',
        ]);
        $output = Output::findOrFail($id);
        $data = $request->only(['name','bn','color','size','style','quantity','price','order_at','buyer','phone','logi_no','address']);
        $data['order_at'] = date('Y-m-d H:i:s', strtotime($data['order_at']));
        if ($output->update($data)){
            return redirect()->to(route('admin.output'))->with(['status'=>'更新出货记录成功']);
        }
        return redirect()->to(route('admin.output'))->withErrors('系统错误');
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
        if (Output::destroy($ids)){
            return response()->json(['code'=>0,'msg'=>'删除成功']);
        }
        return response()->json(['code'=>1,'msg'=>'删除失败']);
    }

    /**
     * 获得计数器
     */
    public function getCounter(){
        $date = date('Ymd');
        $path = storage_path('logs');
        $counterFile = $path."/output_".$date.".txt";
        clearstatcache();
        if (!file_exists($counterFile)) {
            file_put_contents($counterFile, 0);
        }

        $fp = fopen($counterFile, "r+");

        if (flock($fp, LOCK_EX)) {  // 进行排它型锁定
            $num = trim(fgets($fp,4096));
            $num = intval($num);
            $num++;
            ftruncate($fp, 0);      // truncate file

            fseek($fp, 0, SEEK_SET);
            fwrite($fp, $num);
            fflush($fp);            // flush output before releasing the lock
            flock($fp, LOCK_UN);    // 释放锁定

            return str_pad($num, 4, '0', STR_PAD_LEFT);
        } else {
            return str_pad(random(9999), 4, '0', STR_PAD_LEFT);
        }
    }
}
