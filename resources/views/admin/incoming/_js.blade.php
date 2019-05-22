<script>
    var $form; var form; var $; var laydate;

    layui.use(['jquery', 'form', 'laydate'],function () {
        $ = layui.jquery;
        form = layui.form;
        laydate = layui.laydate;
        $form = $('form');

        //常规用法
        laydate.render({
            elem: '#order_at'
        });

    });
</script>