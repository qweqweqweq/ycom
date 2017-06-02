

//密码登陆js
$(function(){
    $(".login-submit").click(function(){
        var phone=/^1[3-9]{1}[0-9]{9}$/;
layer.alert('请输入手机号码', {icon:2});
        if(!$('.phone').val()){
            layer.alert('请输入手机号码', {icon:2});
            return false;
        }

        if(!phone.test($(".phone").val())){
            layer.alert('输入的手机号码格式有误,请重新输入', {icon:2});
            return false;
        }

        if(!$('#password').val()){
            layer.alert('请输入登录密码', {icon:2});
            return false;
        }

        if(!$('#verify').val()){
            layer.alert('请输入验证码', {icon:2});
            return false;
        }
        //ajax 提交
        $.ajax({
            type: "post",
            url: "/Application/Home/Technician/loginAction",
            dataType: "json",
            data:$('#login-act').serialize(),
            success: function(data){
                if(data.status==0){
                    //跳转到个人中心
                    window.location.href=data.url;
                }else{
                    layer.alert(data.msg, {icon:2});
                    Refreshverify();
                }
            }
        });
        return false;
    });
});