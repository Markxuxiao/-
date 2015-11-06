
var g_Interval = 1;//滚动速度
var g_Timer;
var running = false;
var num;

function beginRndNum(trigger){
	if(g_Personlist.length>0){
		if(running){
			//2点击停止 停止滚动显示中奖，记录中奖，名单列表删除中奖人，按钮变开始
			running = false;
			clearTimeout(g_Timer);		
			Delete_person($('#ResultNum').html());
			$('#ResultNum').css('color','red');
			$('#resultlist').append("<li>"+$('#ResultNum').html()+"</li>");
			$(trigger).val("开始");
		}
		else{
			//1点击开始 检查是否抽奖完成，开始滚动，按钮变停止
			running = true;
			$('#ResultNum').css('color','black');
			$(trigger).val("停止");
			beginTimer();
		}
	}else{
		return alert("抽奖名额不够，请刷新浏览器。")
	}
	
}


function updateRndNum(){
	var a = Math.floor(Math.random()*g_Personlist.length+1)-1;
	num = a;
	$('#ResultNum').html(g_Personlist[num]);
	
}

function beginTimer(){
	g_Timer = setTimeout(beat, g_Interval);
}

function beat() {
	g_Timer = setTimeout(beat, g_Interval);
	updateRndNum();
}
function Delete_person (txt) {
	var a;
	for (i in g_Personlist) {
		if(g_Personlist[i]==txt){
			a = i;
			break;
		}
	};
	g_Personlist.splice(a,1);
	console.log(g_Personlist.length)
}
