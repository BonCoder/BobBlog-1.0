var $form;
var form;
var $;
layui.config({
	base : "/Public/Admin/js/"
}).use(['form','layer','upload','laydate'],function(){
	form = layui.form();
	var layer = parent.layer === undefined ? layui.layer : parent.layer;
		$ = layui.jquery;
		$form = $('form');
    var upload = layui.upload;

    // upload.render({
    //     elem: '.layui-upload-file"'
    //     ,url: '/Admin/User/uploadImg'
    //     ,accept: 'images' //允许上传的文件类型
    //     ,auto:'true' //是否选完文件后自动上传
    //     ,size:'1000' //设置文件最大可允许上传的大小，单位 KB
    //     ,done: function(res, index, upload){ //上传后的回调
    //        alert(res);
    //     }
    //     ,error: function(){
    //         //请求异常回调
    //     }
    //     //,size: 50 //最大允许上传的文件大小
    //     //,……
    // })

    layui.upload({
        elem:"#userlogo"
    	,url : "/Admin/User/uploadImg"
        ,type: 'post' //默认post
    	,success: function(res){
            if(res.code == 0){
                setTimeout(function(){
                    layer.msg("头像修改成功！请强刷新或重新登陆！");
                    userFace.src = res.data.src;
                    window.sessionStorage.setItem('userFace',res.data.src);
                },1000);
        }else{
                setTimeout(function(){
                    layer.msg("头像修改失败！");
                },1000);
            }

	    }
    });

    //添加验证规则
    form.verify({
        oldPwd : function(value, item){
            if(value != "123456"){
                return "密码错误，请重新输入！";
            }
        },
        newPwd : function(value, item){
            if(value.length < 6){
                return "密码长度不能小于6位";
            }
        },
        confirmPwd : function(value, item){
            if(!new RegExp($("#oldPwd").val()).test(value)){
                return "两次输入密码不一致，请重新输入！";
            }
        }
    })

    //判断是否修改过用户信息，如果修改过则填充修改后的信息
    // if(window.sessionStorage.getItem('userInfo')){
    //     var userInfo = JSON.parse(window.sessionStorage.getItem('userInfo'));
    //     var citys;
    //     $(".realName").val(userInfo.realName); //用户名
    //     $(".userSex input[value="+userInfo.sex+"]").attr("checked","checked"); //性别
    //     $(".userPhone").val(userInfo.userPhone); //手机号
    //     $(".userBirthday").val(userInfo.userBirthday); //出生年月
    //     for(key in userInfo){
    //         if(key.indexOf("like") != -1){
    //             $(".userHobby input[name='"+key+"']").attr("checked","checked");
    //         }
    //     }
    //     $(".userEmail").val(userInfo.userEmail); //用户邮箱
    //     $(".myself").val(userInfo.myself); //自我评价
    //     form.render();
    // }

    //判断是否修改过头像，如果修改过则显示修改后的头像，否则显示默认头像
    if(window.sessionStorage.getItem('userFace')){
    	$("#userFace").attr("src",window.sessionStorage.getItem('userFace'));
    }else{
    	$("#userFace").attr("src","/Public/Home/images/logo3.png");
    }

    //提交个人资料
    form.on("submit(changeUser)",function(data){
    	var index = layer.msg('提交中，请稍候',{icon: 16,time:false,shade:0.8});
        //将填写的用户信息存到session以便下次调取
        // var key,userInfoHtml = '';
        // userInfoHtml = {
        //     'realName' : $(".realName").val(),
        //     'sex' : data.field.sex,
        //     'userPhone' : $(".userPhone").val(),
        //     'userBirthday' : $(".userBirthday").val(),
        //     'userEmail' : $(".userEmail").val(),
        //     'myself' : $(".myself").val()
        // };
        // window.sessionStorage.setItem("userInfo",JSON.stringify(userInfoHtml));
        setTimeout(function(){
            layer.close(index);
            layer.msg("提交成功！");
        },2000);
    })

    //修改密码
    form.on("submit(changePwd)",function(data){
    	var index = layer.msg('提交中，请稍候',{icon: 16,time:false,shade:0.8});
        setTimeout(function(){
            layer.close(index);
            layer.msg("密码修改成功！");
            $(".pwd").val('');
        },2000);
    	return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
    })

})
