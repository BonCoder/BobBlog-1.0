layui.use(['laydate', 'form'], function(){
    var laydate = layui.laydate
        ,form = layui.form;
    //日期范围
    laydate.render({
        elem: '#test1'
    });
    laydate.render({
        elem: '#test2'
    });

    //批量删除
    $(".batchDel").click(function(){
        var ids = [];
        var $checkbox = $('.links_list tbody input[type="checkbox"][name="checked"]');
        var $checked = $('.links_list tbody input[type="checkbox"][name="checked"]:checked');
        for (var i = 0; i < $checked.length; i++) {
            ids.push($($checked[i]).val());
        }
        if($checkbox.is(":checked")){
            layer.confirm('确定删除选中的信息？',{icon:3, title:'提示信息'},function(index){
                // 把id填充到form表单中
                $("#js-delete-form input[name='id']").val(ids.toString());

                // 提交表单
                $("#js-delete-form").submit();

                var index = layer.msg('删除中，请稍候',{icon: 16,time:false,shade:0.8});
                setTimeout(function(){
                    //删除数据
                    for(var j=0;j<$checked.length;j++){
                        for(var i=0;i<linksData.length;i++){
                            if(linksData[i].linksId == $checked.eq(j).parents("tr").find(".links_del").attr("data-id")){
                                linksData.splice(i,1);
                                linksList(linksData);
                            }
                        }
                    }
                    $('.links_list thead input[type="checkbox"]').prop("checked",false);
                    form.render();
                    layer.close(index);
                    layer.msg("删除成功");
                },2000);
            })
        }else{
            layer.msg("请选择需要删除的文章");
        }
    })

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
        data.elem.checked;
        if(childChecked.length == child.length){
            $(data.elem).parents('table').find('thead input#allChoose').get(0).checked = true;
        }else{
            $(data.elem).parents('table').find('thead input#allChoose').get(0).checked = false;
        }
        form.render('checkbox');
    })
});
layui.config({
	base : "/Public/Admin/js/"
}).use(['form','layer','jquery','laypage'],function(){
	var layer = parent.layer === undefined ? layui.layer : parent.layer,
		laypage = layui.laypage,
		$ = layui.jquery;
    $("body").on("click",".js-delete-one",function(){  //删除
        var _this = $(this);
        layer.confirm('确定删除此信息？',{icon:3, title:'提示信息'},function(index){
            var id = _this.attr("data-id");
            // 把id填充到form表单中
            $("#js-delete-form input[name='id']").val(id);

            // 提交表单
            $("#js-delete-form").submit();
            //_this.parents("tr").remove();
            for(var i=0;i<linksData.length;i++){
                if(linksData[i].linksId == _this.attr("data-id")){
                    linksData.splice(i,1);
                    linksList(linksData);
                }
            }
            layer.close(index);
        });
    })

	function linksList(that){
		//渲染数据
		function renderDate(data,curr){
			var dataHtml = '';
			if(!that){
				currData = linksData.concat().splice(curr*nums-nums, nums);
			}else{
				currData = that.concat().splice(curr*nums-nums, nums);
			}
			if(currData.length != 0){
				for(var i=0;i<currData.length;i++){
					dataHtml += '<tr>'
			    	+'<td><input type="checkbox" name="checked" lay-skin="primary" lay-filter="choose"></td>'
			    	+'<td align="left">'+currData[i].linksName+'</td>'
			    	+'<td><a style="color:#1E9FFF;" target="_blank" href="'+currData[i].linksUrl+'">'+currData[i].linksUrl+'</a></td>'
			    	+'<td>'+currData[i].masterEmail+'</td>'
			    	+'<td>'+currData[i].linksTime+'</td>'
			    	+'<td>'+currData[i].showAddress+'</td>'
			    	+'<td>'
					+  '<a class="layui-btn layui-btn-mini links_edit"><i class="iconfont icon-edit"></i> 编辑</a>'
					+  '<a class="layui-btn layui-btn-danger layui-btn-mini links_del" data-id="'+data[i].linksId+'"><i class="layui-icon">&#xe640;</i> 删除</a>'
			        +'</td>'
			    	+'</tr>';
				}
			}else{
				dataHtml = '<tr><td colspan="7">暂无数据</td></tr>';
			}
		    return dataHtml;
		}

		//分页
		var nums = 13; //每页出现的数据量
		if(that){
			linksData = that;
		}
		laypage({
			cont : "page",
			pages : Math.ceil(linksData.length/nums),
			jump : function(obj){
				$(".links_content").html(renderDate(linksData,obj.curr));
				$('.links_list thead input[type="checkbox"]').prop("checked",false);
		    	form.render();
			}
		})
	}
})
