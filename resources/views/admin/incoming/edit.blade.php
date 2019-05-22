@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新进货记录</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.incoming.update',['incoming'=>$incoming])}}" method="post">
                <input type="hidden" name="id" value="{{$incoming->id}}">
                {{method_field('put')}}
                @include('admin.incoming._form')
            </form>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.incoming._js')
@endsection
