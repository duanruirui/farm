var scolls = document.getElementsByName('scoll_img_data');

var i = scolls.length - 1;

window.onload = function(){

    document.getElementById('banner_img').src=scolls[i].value;
    setInterval("changeImg()",3000);
}
function changeImg(){
    document.getElementById('banner_img').src=scolls[i].value;
    i--;
    if(i<0){
        i = scolls.length - 1;
    }
}