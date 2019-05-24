@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <div class="layui-btn-group ">
                <button class="layui-btn layui-btn-sm" id="goodsSearch">搜索</button>
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
                    <a class="layui-btn layui-btn-sm" lay-event="select">选择</a>
                </div>
            </script>
        </div>
    </div>
@endsection

@section('script')
    @can('product.goods')
        <script>
            layui.use(['layer','table','form'],function () {
                var layer = layui.layer;
                var form = layui.form;
                var table = layui.table;
                var index = parent.layer.getFrameIndex(window.name); //获取窗口索引

                //用户表格初始化
                var dataTable = table.render({
                    elem: '#dataTable'
                    ,height: 500
                    ,url: "{{ route('admin.goods.data') }}" //数据接口
                    ,where:{model:"goods"}
                    ,page: true //开启分页
                    ,cellMinWidth: 80
                    ,cols: [[ //表头
                        {field: 'id', title: 'ID', sort: true, width: 50}
                        ,{field: 'name', title: '名称'}
                        ,{field: 'bn', title: '货号', width: 120}
                        ,{field: 'color', title: '颜色'}
                        ,{field: 'size', title: '尺寸'}
                        ,{field: 'style', title: '款式'}
                        ,{field: 'created_at', title: '创建时间'}
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
                    if(layEvent === 'select'){
                        var id = '#LAY_layer_goods';

                        parent.layui.$('input[name=name]').val(data.name);
                        parent.layui.$('input[name=bn]').val(data.bn);
                        parent.layui.$('input[name=color]').val(data.color).attr('checked','checked');
                        parent.layui.$('input[name=size]').val(data.size).attr('checked','checked');
                        parent.layui.$('input[name=style]').val(data.style).attr('checked','checked');
                        parent.layui.form.render();

                        parent.layer.tips('选择成功', id, {
                            time: 5000
                        });
                        parent.layer.close(index);
                    }
                });

                //搜索
                $("#goodsSearch").click(function () {
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



