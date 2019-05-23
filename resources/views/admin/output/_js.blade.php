<script>
    var $form; var form; var $; var laydate;

    layui.use(['jquery', 'form', 'laydate'],function () {
        $ = layui.jquery;
        form = layui.form;
        laydate = layui.laydate;
        $form = $('form');

        //常规用法
        laydate.render({
            elem: '#order_at',
            format: 'yyyy-MM-dd',
            showBottom: false,
            trigger: 'click',
            value: '2019-05-01'
        });

    });
</script>