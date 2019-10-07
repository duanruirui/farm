function id(id){
	return document.getElementById(id);
}
function name(name){
	return document.getElementsByName(name);
}
function tag(tag){
	return document.getElementsByTagName(tag);
}
var scolls = name('scoll_img_data');

var i = scolls.length - 1;

function changeImg(){
    id('banner_img').src=scolls[i].value;
    i--;
    if(i<0) i = scolls.length - 1;
}
id('toindex').onclick = function(){
	window.location.href = "?i=1&c=entry&op=index&do=index&m=drr_gy";
}
id('buynow').onclick = function(){
	id('bottom_nav').style = 'display:none';
	id('select_spec').style = 'display:block';
}
id('buysure').onclick = function(){
	var address = id('input_address').value;
	if(address==''){
		alert('请输入收货地址信息');
		return;
	}
	var address = id('input_address').value;
	var num = id('order_num').value;
	var price = id('input_price').value;
	var gid = id('input_gid').value;

	var query_string = '&gid='+gid+'&num='+num+'&price='+price+'&addr='+address;
	window.location.href = "?i=1&c=entry&op=adopt&do=order&m=drr_gy&handle=new"+query_string;
}
id('blank').onclick = function(){
	id('select_spec').style = 'display:none';
	id('bottom_nav').style = 'display:block';
}
function input_add(){
	id('goods_num').value++;
}
function input_minus(){
	if(obj.value>1) id('goods_num').value--;
}

id('banner_img').src=scolls[i].value;
setInterval("changeImg()",3000);
cascdeInit();