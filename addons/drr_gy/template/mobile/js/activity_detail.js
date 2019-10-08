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

window.onload = function(){

    id('banner_img').src=scolls[i].value;
    setInterval("changeImg()",3000);
}
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
	var num = id('order_num').value;
	var price = id('input_price').value;
	var gid = id('input_gid').value;

	var query_string = '&gid='+gid+'&num='+num+'&price='+price;
	window.location.href = "?i=1&c=entry&op=activity&do=order&m=drr_gy&handle=new"+query_string;
}
id('blank').onclick = function(){
	id('select_spec').style = 'display:none';
	id('bottom_nav').style = 'display:block';
}
function choose_gear(price,spec){
	id('price_show').innerHTML = '￥'+price;
	id('content_show').innerHTML = spec;
	id('input_price').value = price;
	id('input_spec').value = spec;
}
function input_add(){
	id('goods_num').value++;
}
function input_minus(){
	if(obj.value>1) id('goods_num').value--;
}
function label_change(node){
	var onselect = document.getElementsByClassName('onselect');
	onselect[0].className = 'onrelease';
	node.parentNode.className='onselect';
}
var rate=id('schedule').textContent;
if(parseInt(rate)>100) rate='100%';
id('schedule').setAttribute('style','width:'+rate);
