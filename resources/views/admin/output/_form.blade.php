{{csrf_field()}}
<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">名称</label>
        <div class="layui-input-inline">
            <input type="text" name="name" value="{{ $output->name ?? old('name') }}" lay-verify="required" placeholder="请输入名称" class="layui-input" >
        </div>
    </div>
    <div class="layui-inline">
        <label for="" class="layui-form-label">货号</label>
        <div class="layui-input-inline">
            <input type="text" name="bn" value="{{ $output->bn ?? old('bn') }}" required="bn" placeholder="请输入货号" class="layui-input">
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">颜色</label>
        <div class="layui-input-inline">
            <input type="text" name="color" value="{{$output->color??old('color')}}" placeholder="请输入颜色" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">尺寸</label>
        <div class="layui-input-inline">
            <input type="text" name="size" value="{{$output->size??old('size')}}" placeholder="请输入尺寸" class="layui-input">
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label class="layui-form-label">数量</label>
        <div class="layui-input-inline">
            <input type="text" name="quantity" value="{{$output->quantity??old('quantity')}}"  placeholder="请输入数量" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">价格</label>
        <div class="layui-input-inline">
            <input type="text" name="price" value="{{$output->price??old('sss')}}" placeholder="￥" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">日期</label>
        <div class="layui-input-inline">
            <input type="text" name="order_at" id="order_at" value="{{date('Y-m-d', strtotime($output->order_at??old('order_at')))}}"  placeholder="yyyy-MM-dd" class="layui-input">
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('admin.output')}}" >返 回</a>
    </div>
</div>