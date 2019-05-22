{{csrf_field()}}
<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">昵称</label>
        <div class="layui-input-inline">
            <input type="text" name="name" value="{{ $member->name ?? old('name') }}" lay-verify="required" placeholder="请输入昵称" class="layui-input" >
        </div>
    </div>
    <div class="layui-inline">
        <label for="" class="layui-form-label">姓名</label>
        <div class="layui-input-inline">
            <input type="text" name="real_name" value="{{ $member->real_name ?? old('real_name') }}"  placeholder="请输入姓名" class="layui-input">
        </div>
    </div>
</div>

<div class="layui-form-item" lay-filter="sex">
    <div class="layui-inline">
        <label class="layui-form-label">客户级别</label>
        <div class="layui-input-block">
            <select name="level" id="level">
                <option value="0" @if(isset($member->level)&&$member->level=='普通客户') selected @endif >普通客户</option>
                <option value="1" @if(isset($member->level)&&$member->level=='大客户') selected @endif >大客户</option>
                <option value="2" @if(isset($member->level)&&$member->level=='VIP') selected @endif >VIP</option>
                <option value="3" @if(isset($member->level)&&$member->level=='区代') selected @endif >区代</option>
                <option value="4" @if(isset($member->level)&&$member->level=='省代') selected @endif >省代</option>
            </select>
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">选择性别</label>
        <div class="layui-input-block">
            <input type="radio" name="sex" value="1" title="男" @if(isset($member->sex)&&$member->sex=='男') checked @endif >
            <input type="radio" name="sex" value="0" title="女" @if(isset($member->sex)&&$member->sex=='女') checked @endif >
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">手机号</label>
        <div class="layui-input-inline">
            <input type="text" name="phone" value="{{$member->phone??old('phone')}}" required="phone" lay-verify="required|phone" placeholder="请输入手机号" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-inline">
            <input type="text" name="email" value="{{$member->email??old('email')}}"  lay-verify="email" autocomplete="off" class="layui-input">
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-inline">
        <label for="" class="layui-form-label">密码</label>
        <div class="layui-input-inline">
            <input type="password" name="password" placeholder="请输入密码" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label for="" class="layui-form-label">确认密码</label>
        <div class="layui-input-inline">
            <input type="password" name="password_confirmation" placeholder="请输入密码" class="layui-input">
        </div>
    </div>
</div>

<div class="layui-form-item" id="provice_city_district">
    <label class="layui-form-label">省市区</label>
    <input type="hidden" id="province_hidden" value="{{$member->province??old('province')}}">
    <input type="hidden" id="city_hidden" value="{{$member->city??old('city')}}">
    <input type="hidden" id="district_hidden" value="{{$member->district??old('district')}}">
    <div class="layui-input-block">
        <div class="layui-inline">
            <select name="province" id="province" lay-filter="province">
                <option value="">请选择省</option>
            </select>
        </div>
        <div class="layui-inline">
            <select name="city" id="city" lay-filter="city">
                <option value="">请选择市</option>
            </select>
        </div>
        <div class="layui-inline">
            <select name="district" id="district" lay-filter="district">
                <option value="">请选择县/区</option>
            </select>
        </div>
    </div>
    <label class="layui-form-label">详细地址</label>
    <div class="layui-input-block">
        <input type="text" name="address" value="{{ $member->address ?? old('address') }}" placeholder="" autocomplete="off" class="layui-input">
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">头像</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear">
                    @if(isset($member->avatar))
                        <li><img src="{{ $member->avatar }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="avatar" id="avatar" value="{{ $member->avatar??'' }}">
            </div>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('admin.member')}}" >返 回</a>
    </div>
</div>