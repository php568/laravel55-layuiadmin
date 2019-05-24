{{csrf_field()}}
<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">名称</label>
        <div class="layui-input-inline">
            <input type="text" name="name" value="{{ $goods->name ?? old('name') }}" lay-verify="required" placeholder="请输入名称" class="layui-input" >
        </div>
    </div>
    <div class="layui-inline">
        <label for="" class="layui-form-label">货号</label>
        <div class="layui-input-inline">
            <input type="text" name="bn" value="{{ $goods->bn ?? old('bn') }}" lay-verify="required" placeholder="请输入货号" class="layui-input">
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">颜色</label>
        <div class="layui-input-block">
            @if(isset($color))
                @foreach($color as $item)
                    <input type="radio" name="color" value="{{$item->value}}" title="{{$item->desc}}" @if(isset($goods->color)&&$goods->color==$item->value) checked @endif >
                @endforeach
            @else
                <input type="text" name="color" value="{{$goods->color??old('color')}}" placeholder="请输入颜色" class="layui-input">
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
                    <input type="radio" name="size" value="{{$item->value}}" title="{{$item->desc}}" @if(isset($goods->size)&&$goods->size==$item->value) checked @endif >
                @endforeach
            @else
                <input type="text" name="size" value="{{$goods->size??old('size')}}" placeholder="请输入尺寸" class="layui-input">
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
                    <input type="radio" name="style" value="{{$item->value}}" title="{{$item->desc}}" @if(isset($goods->style)&&$goods->style==$item->value) checked @endif >
                @endforeach
            @else
                <input type="text" name="style" value="{{$goods->style??old('style')}}"  placeholder="请输入款式" class="layui-input">
            @endif
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('admin.goods')}}" >返 回</a>
    </div>
</div>