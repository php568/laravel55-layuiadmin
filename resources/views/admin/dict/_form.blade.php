{{csrf_field()}}
<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">组别</label>
        <div class="layui-input-inline">
            <input type="text" name="group" value="{{ $dict->group ?? old('group') }}" {{ !empty($dict->group) ? 'layui-disabled readonly disabled':'' }} lay-verify="required" placeholder="请输入组别" class="layui-input" >
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">code码</label>
        <div class="layui-input-inline">
            <input type="text" name="code" value="{{ $dict->code ?? old('code') }}" lay-verify="required" placeholder="请输入code码" class="layui-input" >
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">字典值</label>
        <div class="layui-input-inline">
            <input type="text" name="value" value="{{ $dict->value ?? old('value') }}" lay-verify="required" placeholder="请输入字典值" class="layui-input" >
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">排序</label>
        <div class="layui-input-inline">
            <input type="text" name="sort" value="{{ $dict->sort ?? old('sort') }}" lay-verify="numeric" placeholder="请输入排序值" class="layui-input" >
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-block">
        <label for="" class="layui-form-label">描述</label>
        <div class="layui-input-block">
            <input type="text" name="desc" value="{{ $dict->desc ?? old('desc') }}" placeholder="请输入描述" class="layui-input" >
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('admin.dict')}}" >返 回</a>
    </div>
</div>