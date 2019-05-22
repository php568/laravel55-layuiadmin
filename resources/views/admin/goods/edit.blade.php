@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新商品</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.goods.update',['goods'=>$goods])}}" method="post">
                <input type="hidden" name="id" value="{{$goods->id}}">
                {{method_field('put')}}
                @include('admin.goods._form')
            </form>
        </div>
    </div>
@endsection
