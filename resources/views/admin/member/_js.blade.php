<style>
    #layui-upload-box li{
        width: 120px;
        height: 100px;
        float: left;
        position: relative;
        overflow: hidden;
        margin-right: 10px;
        border:1px solid #ddd;
    }
    #layui-upload-box li img{
        width: 100%;
    }
    #layui-upload-box li p{
        width: 100%;
        height: 22px;
        font-size: 12px;
        position: absolute;
        left: 0;
        bottom: 0;
        line-height: 22px;
        text-align: center;
        color: #fff;
        background-color: #333;
        opacity: 0.6;
    }
    #layui-upload-box li i{
        display: block;
        width: 20px;
        height:20px;
        position: absolute;
        text-align: center;
        top: 2px;
        right:2px;
        z-index:999;
        cursor: pointer;
    }
</style>
<script type="text/javascript" src="/js/area.js"></script>//area.js存放省市县/区数据
<script>
    //初始数据
    var areaData = Area;
    var $form; var form; var $;
    var province_hidden, city_hidden, district_hidden;
    var province_value, city_value, district_value;

    layui.use(['jquery', 'form', 'upload'],function () {
        $ = layui.jquery;
        form = layui.form;
        $form = $('form');
        province_hidden = $('#province_hidden').val();
        city_hidden = $('#city_hidden').val();
        district_hidden = $('#district_hidden').val();
        loadProvince();
        getSelectValue();

        var upload = layui.upload;
        //普通图片上传
        var uploadInst = upload.render({
            elem: '#uploadPic'
            ,url: '{{ route("uploadImg") }}'
            ,multiple: false
            ,data:{"_token":"{{ csrf_token() }}"}
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                /*obj.preview(function(index, file, result){
                 $('#layui-upload-box').append('<li><img src="'+result+'" /><p>待上传</p></li>')
                 });*/
                obj.preview(function(index, file, result){
                    $('#layui-upload-box').html('<li><img src="'+result+'" /><p>上传中</p></li>')
                });

            }
            ,done: function(res){
                //如果上传失败
                if(res.code == 0){
                    $("#avatar").val(res.url);
                    $('#layui-upload-box li p').text('上传成功');
                    return layer.msg(res.msg,{icon:6});
                }
                return layer.msg(res.msg,{icon:5});
            }
        });
    });

    function getSelectValue() {
        if(province_hidden) {
            $("#province").val(province_hidden);
            form.render();
            var province_s = province_hidden.split('_');
            if (province_s[1] > 0) {
                loadCity(areaData[province_s[2]].mallCityList);
            }
            if(city_hidden) {
                $("#city").val(city_hidden);
                form.render();
                var city_s = city_hidden.split('_');
                if (city_s[1] > 0) {
                    loadDistrict(areaData[province_s[2]].mallCityList[city_s[2]].mallAreaList);
                }
                if(district_hidden) {
                    $("#district").val(district_hidden);
                    form.render();
                }
            }
        }
    }
    //加载省数据   '_' + areaData[i].mallCityList.length + '_' + i +
    function loadProvince() {
        var proHtml = '';
        for (var i = 0; i < areaData.length; i++) {
            // if(areaData[i].provinceName == province_hidden) province_value = '' + areaData[i].provinceCode + '_' + areaData[i].mallCityList.length + '_' + i + '';
            proHtml += '<option value="' + areaData[i].provinceCode + '_' + areaData[i].mallCityList.length + '_' + i + '">' + areaData[i].provinceName + '</option>';
        }
        //初始化省数据
        $form.find('select[name=province]').append(proHtml);
        // if(province_value) $('#province').val(province_value);
        form.render();
        form.on('select(province)', function(data) {
            $form.find('select[name=district]').html('<option value="">请选择县/区</option>'); //.parent().hide();
            var value = data.value;
            var d = value.split('_');
            var code = d[0];
            var count = d[1];
            var index = d[2];
            if (count > 0) {
                loadCity(areaData[index].mallCityList);
            } else {
                // $form.find('select[name=city]').parent().hide();
            }
        });
    }
    //加载市数据   '_' + citys[i].mallAreaList.length + '_' + i +
    function loadCity(citys) {
        var cityHtml = '';
        for (var i = 0; i < citys.length; i++) {
            // if(citys[i].cityName == city_hidden) city_value = '' + citys[i].cityCode + '_' + citys[i].mallAreaList.length + '_' + i + '';
            cityHtml += '<option value="' + citys[i].cityCode + '_' + citys[i].mallAreaList.length + '_' + i +'">' + citys[i].cityName + '</option>';
        }
        $form.find('select[name=city]').html(cityHtml);//.parent().show();
        // if(city_value) $('#city').val(city_value);
        form.render();
        form.on('select(city)', function(data) {
            var value = data.value;
            var d = value.split('_');
            var code = d[0];
            var count = d[1];
            var index = d[2];
            if (count > 0) {
                loadDistrict(citys[index].mallAreaList);
            } else {
                // $form.find('select[name=district]').parent().hide();
            }
        });
    }
    //加载县/区数据
    function loadDistrict(district) {
        var districtHtml = '';
        for (var i = 0; i < district.length; i++) {
            // if(district[i].areaName == district_hidden) district_value = '' + district[i].areaCode + '';
            districtHtml += '<option value="' + district[i].areaCode + '">' + district[i].areaName + '</option>';
        }
        $form.find('select[name=district]').html(districtHtml);//.parent().show();
        // if(district_value) $('#district').val(district_value);
        form.render();
        form.on('select(district)', function(data) {

        });
    }
</script>