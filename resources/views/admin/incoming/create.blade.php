@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加进货记录</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.incoming.store')}}" method="post">
                @include('admin.incoming._form')
            </form>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.incoming._js')
@endsection

