{{csrf_field()}}

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">商品</label>
        <div class="layui-input-inline">
            <a class="layui-btn layui-btn-lg" data-type="goods" id="LAY_layer_goods">点击选择商品</a>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">名称</label>
        <div class="layui-input-inline">
            <input type="text" name="name" value="{{ $incoming->name ?? old('name') }}" lay-verify="required" placeholder="请输入名称" class="layui-input" >
        </div>
    </div>
    <div class="layui-inline">
        <label for="" class="layui-form-label">货号</label>
        <div class="layui-input-inline">
            <input type="text" name="bn" value="{{ $incoming->bn ?? old('bn') }}" placeholder="请输入货号" class="layui-input">
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">颜色</label>
        <div class="layui-input-block">
            @if(isset($color))
                @foreach($color as $item)
                    <input type="radio" name="color" value="{{$item->value}}" title="{{$item->desc}}" @if(isset($incoming->color)&&$incoming->color==$item->value) checked @endif >
                @endforeach
            @else
                <input type="text" name="color" value="{{$incoming->color??old('color')}}" placeholder="请输入颜色" class="layui-input">
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
                    <input type="radio" name="size" value="{{$item->value}}" title="{{$item->desc}}" @if(isset($incoming->size)&&$incoming->size==$item->value) checked @endif >
                @endforeach
            @else
                <input type="text" name="size" value="{{$incoming->size??old('size')}}" placeholder="请输入尺寸" class="layui-input">
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
                    <input type="radio" name="style" value="{{$item->value}}" title="{{$item->desc}}" @if(isset($incoming->style)&&$incoming->style==$item->value) checked @endif >
                @endforeach
            @else
                <input type="text" name="style" value="{{$incoming->style??old('style')}}"  placeholder="请输入款式" class="layui-input">
            @endif
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label class="layui-form-label">数量</label>
        <div class="layui-input-inline">
            <input type="text" name="quantity" value="{{$incoming->quantity??old('quantity')}}" lay-verify="required|numeric" placeholder="请输入数量" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">价格</label>
        <div class="layui-input-inline">
            <input type="text" name="price" value="{{$incoming->price??old('sss')}}" lay-verify="required|numeric" placeholder="￥" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">日期</label>
        <div class="layui-input-inline">
            <input type="text" name="order_at" id="order_at" value="{{date('Y-m-d', strtotime($incoming->order_at??old('order_at')))}}"  placeholder="yyyy-MM-dd" class="layui-input">
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('admin.incoming')}}" >返 回</a>
    </div>
</div>