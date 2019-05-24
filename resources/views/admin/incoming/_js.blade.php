<script>
    var $form, form, $, layer, laydate;

    layui.use(['jquery', 'form', 'laydate'],function () {
        $ = layui.jquery;
        form = layui.form;
        laydate = layui.laydate;
        layer = layui.layer;
        $form = $('form');

        //常规用法
        laydate.render({
            elem: '#order_at',
            format: 'yyyy-MM-dd',
            showBottom: false,
            trigger: 'click',
            value: '2019-05-01'
        });

        /* 触发弹层 */
        var active = {
            goods: function(){
                layer.open({
                    type: 2,
                    area: ['800px', '450px'],
                    fixed: false,
                    maxmin: true,
                    shadeClose: true,
                    content: '{{ route("admin.goods.iframe") }}'
                });
            }
        }

        $('#LAY_layer_goods').on('click', function(){
            var type = $(this).data('type');
            active[type] && active[type].call(this);
        });
    });
</script>