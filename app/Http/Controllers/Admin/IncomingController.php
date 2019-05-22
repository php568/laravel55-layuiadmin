<?php

namespace App\Http\Controllers\Admin;

use App\Models\Incoming;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomingController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.incoming.index');
    }
    public function data(Request $request)
    {
        $model = Incoming::query();
        if ($request->get('name')){
            $model = $model->where('name','like','%'.$request->get('name').'%');
        }
        if ($request->get('bn')){
            $model = $model->where('bn','like','%'.$request->get('bn').'%');
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
        return view('admin.incoming.create');
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
            'quantity' => 'string|max:50',
            'price' => 'string|max:50',
            'order_at' => 'string',
        ]);
        $request->merge(['no' => date('YmdHis').$this->getCounter()]);
        if (Incoming::create($request->all())){
            return redirect(route('admin.incoming'))->with(['status'=>'添加完成']);
        }
        return redirect(route('admin.incoming'))->with(['status'=>'系统错误']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incoming = Incoming::findOrFail($id);
        $incoming['sss'] = str_pad(12, 4, '0');
        return view('admin.incoming.edit',compact('incoming'));
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
        $incoming = Incoming::findOrFail($id);
        $data = $request->only(['name','bn','color','size','style']);
        if ($incoming->update($data)){
            return redirect()->to(route('admin.incoming'))->with(['status'=>'更新出货记录成功']);
        }
        return redirect()->to(route('admin.incoming'))->withErrors('系统错误');
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
        if (Incoming::destroy($ids)){
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
        $counterFile = $path."/incoming_".$date."txt";
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
