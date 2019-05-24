{{csrf_field()}}

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">商品</label>
        <div class="layui-input-inline">
            <button class="layui-btn layui-btn-lg" data-type="goods" id="LAY_layer_goods">点击选择商品</button>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">名称</label>
        <div class="layui-input-inline">
            <input type="text" name="name" value="{{ $output->name ?? old('name') }}" lay-verify="required" placeholder="请输入名称" class="layui-input" layui-disabled readonly >
        </div>
    </div>
    <div class="layui-inline">
        <label for="" class="layui-form-label">货号</label>
        <div class="layui-input-inline">
            <input type="text" name="bn" value="{{ $output->bn ?? old('bn') }}" lay-verify="required" placeholder="请输入货号" class="layui-input" layui-disabled readonly >
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">颜色</label>
        <div class="layui-input-block">
            @if(isset($color))
                @foreach($color as $item)
                    <input type="radio" name="color" value="{{$item->value}}" title="{{$item->desc}}" @if(isset($output->color)&&$output->color==$item->value) checked @endif layui-disabled readonly >
                @endforeach
            @else
                <input type="text" name="color" value="{{$output->color??old('color')}}" placeholder="请输入颜色" class="layui-input">
            @endif
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label class="layui-form-label">尺寸</label>
        <div class="layui-input-block">
            @if(isset($size))
                @foreach($size as $item)
                    <input type="radio" name="size" value="{{$item->value}}" title="{{$item->desc}}" @if(isset($output->size)&&$output->size==$item->value) checked @endif layui-disabled readonly >
                @endforeach
            @else
                <input type="text" name="size" value="{{$output->size??old('size')}}" placeholder="请输入尺寸" class="layui-input">
            @endif
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label class="layui-form-label">款式</label>
        <div class="layui-input-block">
            @if(isset($style))
                @foreach($style as $item)
                    <input type="radio" name="style" value="{{$item->value}}" title="{{$item->desc}}" @if(isset($output->style)&&$output->style==$item->value) checked @endif layui-disabled readonly >
                @endforeach
            @else
                <input type="text" name="style" value="{{$output->style??old('style')}}"  placeholder="请输入款式" class="layui-input">
            @endif
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label class="layui-form-label">数量</label>
        <div class="layui-input-inline">
            <input type="text" name="quantity" value="{{$output->quantity??old('quantity')}}" lay-verify="required|numeric" placeholder="请输入数量" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">价格</label>
        <div class="layui-input-inline">
            <input type="text" name="price" value="{{$output->price??old('sss')}}" lay-verify="required|numeric" placeholder="￥" class="layui-input">
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
    <div class="layui-inline">
        <label class="layui-form-label">购买人</label>
        <div class="layui-input-inline">
            <input type="text" name="buyer" value="{{$output->buyer??old('buyer')}}"  placeholder="请输入购买人" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">联系电话</label>
        <div class="layui-input-inline">
            <input type="text" name="phone" value="{{$output->phone??old('phone')}}"  placeholder="请输入联系电话" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">快递单号</label>
        <div class="layui-input-inline">
            <input type="text" name="logi_no" value="{{$output->logi_no??old('logi_no')}}"  placeholder="请输入快递单号" class="layui-input">
        </div>
    </div>
</div>


<div class="layui-form-item">
    <label class="layui-form-label">详细地址</label>
    <div class="layui-input-block">
        <input type="text" name="address" value="{{ $output->address ?? old('address') }}" placeholder="" autocomplete="off" class="layui-input">
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('admin.output')}}" >返 回</a>
    </div>
</div>