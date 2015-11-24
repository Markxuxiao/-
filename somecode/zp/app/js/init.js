
//初始化
$(function(){ 
     $("#startbtn").click(function(){ 
        noPhone()?lottery():alert("您已抽过奖，把机会留给其他人吧！");
    }); 
});

//判断是否是同一手机号或同一IP地址
function noPhone () {
    return true;
}

//抽奖
function lottery(){ 
    $.ajax({ 
        type: 'POST', 
        url: './data.php', 
        dataType: 'json', 
        cache: false, 
        error: function(){ 
            alert('出错了！'); 
            return false; 
        }, 
        success:function(json){ 
            $("#startbtn").unbind('click').css("cursor","default"); 
            var a = json.angle; //角度 
            var p = json.prize; //奖项 
            $("#startbtn").rotate({ 
                duration:3000, //转动时间 
                angle: 0, 
                animateTo:1800+a, //转动角度 
                easing: $.easing.easeOutSine, 
                callback: function(){ 
                    var con = confirm('恭喜你，中得'+p+'\n还要再来一次吗？'); 
                    if(con){ 
                        lottery(); 
                    }else{ 
                        return false; 
                    } 
                } 
            }); 
        } 
    }); 
}