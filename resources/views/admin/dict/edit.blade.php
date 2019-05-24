@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新字典</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.dict.update',['dict'=>$dict])}}" method="post">
                <input type="hidden" name="id" value="{{$dict->id}}">
                {{method_field('put')}}
                @include('admin.dict._form')
            </form>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.dict._js')
@endsection
