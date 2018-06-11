layui.config({
    base : "/Public/Admin/js/"
}).use(['form','layer','jquery','laypage'],function(){
    var form = layui.form(),
        layer = parent.layer === undefined ? layui.layer : parent.layer,
        laypage = layui.laypage,
        $ = layui.jquery;

    layui.use(['layer' , 'form'], function () {
        var layer = layui.layer
            , form = layui.form();

        window.$ = layui.jquery;

        // 修改分类点击
        $('.saveCategory-btn').on('click', function () {
            var id = $(this).attr("data-id");
            $.ajax({
                url: "/Admin/PostCategory/create",
                type: "get",
                data : {'id':id},
                dataType: "json",
                success: function (data) {
                    $("#name").val(data.name);
                    $("#sort").val(data.sort);
                    $(".id").val(data.id);
                    if(data.status == 0){
                        $("#start").removeAttr('checked');
                        $("#stop").attr('checked',true);
                    }else if(data.status == 1){
                        $("#stop").removeAttr('checked');
                        $("#start").attr('checked',true);
                    }
                    form.render('radio');
                    layer.open({
                        type: 1,
                        shadeClose: true,
                        title: '修改分类',
                        area :  ['400px', '300px'],
                        offset: '20%',
                        content: $('#addCategory')
                    });
                }
            });
        });

        // 添加分类点击
        $('#addCategory-btn').on('click', function () {
            layer.open({
                type: 1,
                shadeClose: true,
                title: '添加分类',
                area :  ['400px', '300px'],
                offset: '20%',
                content: $('#addCategory')
            });
        });
    });


    //全选
    form.on('checkbox(allChoose)', function(data){
        var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="show"])');
        child.each(function(index, item){
            item.checked = data.elem.checked;
        });
        form.render('checkbox');
    });

    //通过判断文章是否全部选中来确定全选按钮是否选中
    form.on("checkbox(choose)",function(data){
        var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="show"])');
        var childChecked = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="show"]):checked')
        if(childChecked.length == child.length){
            $(data.elem).parents('table').find('thead input#allChoose').get(0).checked = true;
        }else{
            $(data.elem).parents('table').find('thead input#allChoose').get(0).checked = false;
        }
        form.render('checkbox');
    })

    //是否展示
    form.on('switch(isShow)', function(data){
        var index = layer.msg('修改中，请稍候',{icon: 16,time:false,shade:0.5});
        var id = $(this).val();
        $.ajax({
            type : "POST",
            url  : "/Admin/PostCategory/updateStatus",
            data : {'id':id},
            success : function(date) {
                if(date == 1){
                    setTimeout(function(){
                        layer.close(index);
                        layer.msg("展示状态修改成功！");
                    },1000);
                }else {
                    setTimeout(function(){
                        layer.close(index);
                        layer.msg("展示状态修改失败！");
                    },1000);
                }
            },
            error:function(){
                setTimeout(function(){
                    layer.close(index);
                    layer.msg("展示状态修改失败！");
                },1000);
            }
        });

    })

    //操作
    $("body").on("click",".news_edit",function(){  //编辑
        layer.alert('您点击了文章编辑按钮，由于是纯静态页面，所以暂时不存在编辑内容，后期会添加，敬请谅解。。。',{icon:6, title:'文章编辑'});
    })

    $(function () {
        // 删除单条
        $(".js-delete-one").click(function () {
            var id = $(this).attr("data-id");

            leaf.confirm("您确定要删除吗？", function () {
                // 把id填充到form表单中
                $("#js-delete-form input[name='id']").val(id);

                // 提交表单
                $("#js-delete-form").submit();
            });
        });

        // 多条删除
        $(".js-delete").click(function () {
            var ids = [];
            var checkboxList = $(".ids:checked"); // 取到已选中的项

            for (var i = 0; i < checkboxList.length; i++) {
                ids.push($(checkboxList[i]).val());
            }

            if (ids.length == 0) {
                leaf.toast("请选择你要删除的数据！");
                return;
            }

            leaf.confirm("你确定要删除吗？", function () {
                // 把id填充到form表单中
                $("#js-delete-form input[name='id']").val(ids.toString());

                // 提交表单
                $("#js-delete-form").submit();
            });
        });

        // 实现全选影响下面复选框的选中效果
        $(".js-select-all").click(function () {
            $(".ids").prop("checked", $(this).prop('checked'));
        });

        // 实现单个选择影响上方复选框的选中效果
        $('.ids').click(function () {
            $('.js-select-all').prop('checked', $('.ids:not(:checked)').length == 0);
        });

    })


    function newsList(that){
        //渲染数据
        function renderDate(data,curr){
            var dataHtml = '';
            if(!that){
                currData = newsData.concat().splice(curr*nums-nums, nums);
            }else{
                currData = that.concat().splice(curr*nums-nums, nums);
            }
            if(currData.length != 0){
                for(var i=0;i<currData.length;i++){
                    dataHtml += '<tr>'
                        +'<td><input type="checkbox" name="checked" lay-skin="primary" lay-filter="choose"></td>'
                        +'<td align="left">'+currData[i].newsName+'</td>'
                        +'<td>'+currData[i].newsAuthor+'</td>';
                    if(currData[i].newsStatus == "待审核"){
                        dataHtml += '<td style="color:#f00">'+currData[i].newsStatus+'</td>';
                    }else{
                        dataHtml += '<td>'+currData[i].newsStatus+'</td>';
                    }
                    dataHtml += '<td>'+currData[i].newsLook+'</td>'
                        +'<td><input type="checkbox" name="show" lay-skin="switch" lay-text="是|否" lay-filter="isShow"'+currData[i].isShow+'></td>'
                        +'<td>'+currData[i].newsTime+'</td>'
                        +'<td>'
                        +  '<a class="layui-btn layui-btn-mini news_edit"><i class="iconfont icon-edit"></i> 编辑</a>'
                        +  '<a class="layui-btn layui-btn-normal layui-btn-mini news_collect"><i class="layui-icon">&#xe600;</i> 收藏</a>'
                        +  '<a class="layui-btn layui-btn-danger layui-btn-mini news_del" data-id="'+data[i].newsId+'"><i class="layui-icon">&#xe640;</i> 删除</a>'
                        +'</td>'
                        +'</tr>';
                }
            }else{
                dataHtml = '<tr><td colspan="8">暂无数据</td></tr>';
            }
            return dataHtml;
        }

        //分页
        var nums = 13; //每页出现的数据量
        if(that){
            newsData = that;
        }
        laypage({
            cont : "page",
            pages : Math.ceil(newsData.length/nums),
            jump : function(obj){
                $(".news_content").html(renderDate(newsData,obj.curr));
                $('.news_list thead input[type="checkbox"]').prop("checked",false);
                form.render();
            }
        })
    }
})
