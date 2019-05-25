<script>
    var $form; var form; var $; var laydate;

    layui.use(['jquery', 'layer', 'form', 'laydate'],function () {
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

        form.on('radio(color)', function (data) {
            console.log(data);
            console.log(data.elem); //得到radio原始DOM对象
            console.log(data.value); //被点击的radio的value值
        });
        form.on('radio(size)', function (data) {
            console.log(data);
            console.log(data.elem); //得到radio原始DOM对象
            console.log(data.value); //被点击的radio的value值
        });
        form.on('radio(style)', function (data) {
            console.log(data);
            console.log(data.elem); //得到radio原始DOM对象
            console.log(data.value); //被点击的radio的value值
        });
    });
</script>