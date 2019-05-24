@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加字典</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.dict.store')}}" method="post">
                @include('admin.dict._form')
            </form>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.dict._js')
@endsection

