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
function goods_detail(gid){
	window.location.href = "?i=1&c=entry&op=index&goods_id="+gid+"&do=goods_detail&m=drr_gy";
}
function adopt_detail(aid){
	window.location.href = "?i=1&c=entry&op=adopt_detail&adopt_id="+aid+"&do=adopt&m=drr_gy";
}
function crowd_detail(cid){
	window.location.href = "?i=1&c=entry&op=crowd_detail&crowd_id="+cid+"&do=crowd&m=drr_gy";
}