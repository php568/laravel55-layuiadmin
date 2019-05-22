@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <div class="layui-btn-group ">
                @can('product.incoming.destroy')
                    <button class="layui-btn layui-btn-sm layui-btn-danger" id="listDelete">删除</button>
                @endcan
                @can('product.incoming.create')
                    <a class="layui-btn layui-btn-sm" href="{{ route('admin.incoming.create') }}">添加</a>
                @endcan
                <button class="layui-btn layui-btn-sm" id="incomingSearch">搜索</button>
            </div>
            <div class="layui-form">
                <div class="layui-input-inline">
                    <input type="text" name="name" id="name" placeholder="请输入名称" class="layui-input">
                </div>
                <div class="layui-input-inline">
                    <input type="text" name="bn" id="bn" placeholder="请输入货号" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-card-body">
            <table id="dataTable" lay-filter="dataTable"></table>
            <script type="text/html" id="options">
                <div class="layui-btn-group">
                    @can('product.incoming.create')
                        <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
                    @endcan
                    @can('product.incoming.destroy')
                        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                    @endcan
                </div>
            </script>
        </div>
    </div>
@endsection

@section('script')
    @can('product.incoming')
        <script>
            layui.use(['layer','table','form'],function () {
                var layer = layui.layer;
                var form = layui.form;
                var table = layui.table;
                //用户表格初始化
                var dataTable = table.render({
                    elem: '#dataTable'
                    ,height: 500
                    ,url: "{{ route('admin.incoming.data') }}" //数据接口
                    ,where:{model:"incoming"}
                    ,page: true //开启分页
                    ,cellMinWidth: 80
                    ,cols: [[ //表头
                        {checkbox: true,fixed: true}
                        ,{field: 'id', title: 'ID', sort: true, width: 50}
                        ,{field: 'name', title: '名称'}
                        ,{field: 'bn', title: '货号'}
                        ,{field: 'color', title: '颜色'}
                        ,{field: 'size', title: '尺寸'}
                        ,{field: 'quantity', title: '数量'}
                        ,{field: 'price', title: '价格'}
                        ,{field: 'order_at', title: '进货日期'}
                        ,{fixed: 'right', width: 120, align:'center', toolbar: '#options'}
                    ]],
                     done: function(res, curr, count){
                         //如果是异步请求数据方式，res即为你接口返回的信息。
                         //如果是直接赋值的方式，res即为：{data: [], count: 99} data为当前页数据、count为数据总长度
                         // console.log(res);

                         //得到当前页码
                         // console.log(curr);

                         //得到数据总量
                         // console.log(count);
                     }
                });

                //监听工具条
                table.on('tool(dataTable)', function(obj){ //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
                    var data = obj.data //获得当前行数据
                        ,layEvent = obj.event; //获得 lay-event 对应的值
                    if(layEvent === 'del'){
                        layer.confirm('确认删除吗？', function(index){
                            $.post("{{ route('admin.incoming.destroy') }}",{_method:'delete',ids:[data.id]},function (result) {
                                if (result.code==0){
                                    obj.del(); //删除对应行（tr）的DOM结构
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        });
                    } else if(layEvent === 'edit'){
                        location.href = '/admin/incoming/'+data.id+'/edit';
                    }
                });

                //按钮批量删除
                $("#listDelete").click(function () {
                    var ids = []
                    var hasCheck = table.checkStatus('dataTable')
                    var hasCheckData = hasCheck.data
                    if (hasCheckData.length>0){
                        $.each(hasCheckData,function (index,element) {
                            ids.push(element.id)
                        })
                    }
                    if (ids.length>0){
                        layer.confirm('确认删除吗？', function(index){
                            $.post("{{ route('admin.incoming.destroy') }}",{_method:'delete',ids:ids},function (result) {
                                if (result.code==0){
                                    dataTable.reload()
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        })
                    }else {
                        layer.msg('请选择删除项')
                    }
                })
                //搜索
                $("#incomingSearch").click(function () {
                    var userSign = $("#user_sign").val()
                    var name = $("#name").val();
                    var bn = $("#bn").val();
                    dataTable.reload({
                        where:{user_sign:userSign,name:name,bn:bn},
                        page:{curr:1}
                    })
                })
            })
        </script>
    @endcan
@endsection



