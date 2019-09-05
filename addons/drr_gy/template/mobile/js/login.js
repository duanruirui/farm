function clean_login(){

	var login=document.getElementsByClassName('login');

	for(i in login){

		login[i].style='display:none';

	}

}

function register(){

	clean_login();

	document.getElementById('register').style='display:block';

}

function password_reset(){

	clean_login();

	document.getElementById('password_reset').style='display:block';

}

function login(){

	clean_login();

	document.getElementById('login').style='display:block';

}

function send_phone_code(){

	if(countdown!=60) return false;

	var send_button = document.getElementById('second');

	send_button.classList.add('disable');

	setTime(send_button);

}


//60s倒计时实现逻辑
var countdown = 60;

function setTime(obj) {

    if (countdown == 0) {

        obj.classList.remove('disable');

        obj.innerText = "点击获取验证码";

        countdown = 60;//60秒过后button上的文字初始化,计时器初始化;

        return;

    } else {

        obj.classList.add('disable');

        obj.innerText = "("+countdown+"s)后重新发送" ;

        countdown--;
        
    }

    setTimeout(function() { setTime(obj) },1000) //每1000毫秒执行一次
    
}
