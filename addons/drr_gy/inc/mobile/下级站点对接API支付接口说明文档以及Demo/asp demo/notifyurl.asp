<!-- #include file="Config.asp" -->
<!-- #include file="Md5.asp" -->
<%
    Channelid    = Trim(Request("Bankco"))    '通道编号
    Moneys    = Trim(Request("Moneys"))    '金额
        IF Channelid="wx" Then
pay_bankcode="902"   '银行编码 微信支付
        ElseIF Channelid="zfb" Then
pay_bankcode="903"   '银行编码  支付宝
        End if
pay_memberid=merchantId
pay_orderid=GetNewNumb()a
pay_applydate=Timepp()
pay_notifyurl=notifyurl
pay_callbackurl=CallbackURL
pay_amount=Moneys
pay_attach=""
pay_productname="100话费充值"
pay_productnum=""
pay_productdesc=""
pay_producturl=""
stringSignTemp="pay_amount="&pay_amount&"&pay_applydate="&pay_applydate&"&pay_bankcode="&pay_bankcode&"&pay_callbackurl="&pay_callbackurl&"&pay_memberid="&pay_memberid&"&pay_notifyurl="&pay_notifyurl&"&pay_orderid="&pay_orderid&"&key="&keyValue&""
pay_md5sign=MD5(stringSignTemp,32,1)
%>
<html>
<head>
<title>To Pay</title>
<script>
self.moveTo(0,0);
self.resizeTo(screen.availWidth,screen.availHeight);
</script>
<style> 
.tabPages{
margin-top:150px;text-align:center;display:block; border:3px solid #d9d9de; padding:30px; font-size:14px;
}
</style>
</head>
<body onLoad="document.uncome.submit()">
<div id="Content">
  <div class="tabPages">我们正在为您连接银行，请稍等......</div>
</div>
<!-- 
<iframe src="about:blank" id="kaixin" name="kaixin" align="center" width="960"  height="301" marginwidth="1" marginheight="1" frameborder="0" scrolling="no"> </iframe>
    <form name="uncome" action="<%=AuthorizationURL%>" method="post" target="kaixin">
 -->
<form name="uncome" action="<%=AuthorizationURL%>" method="post">
<input type="hidden" name="pay_memberid"  value="<%=pay_memberid%>">
<input type="hidden" name="pay_orderid"  value="<%=pay_orderid%>">
<input type="hidden" name="pay_applydate"  value="<%=pay_applydate%>">
<input type="hidden" name="pay_bankcode"  value="<%=pay_bankcode%>">
<input type="hidden" name="pay_notifyurl"  value="<%=pay_notifyurl%>">
<input type="hidden" name="pay_callbackurl"  value="<%=pay_callbackurl%>">
<input type="hidden" name="pay_amount"  value="<%=pay_amount%>">
<input type="hidden" name="pay_reserved1"  value="<%=pay_reserved1%>">
<input type="hidden" name="pay_reserved2"  value="<%=pay_reserved2%>">
<input type="hidden" name="pay_reserved3"  value="<%=pay_reserved3%>">
<input type="hidden" name="pay_productname"  value="<%=pay_productname%>">
<input type="hidden" name="pay_productnum"  value="<%=pay_productnum%>">
<input type="hidden" name="pay_productdesc"  value="<%=pay_productdesc%>">
<input type="hidden" name="pay_producturl"  value="<%=pay_producturl%>">
<input type="hidden" name="pay_md5sign"  value="<%=pay_md5sign%>">
</form>
</body>
</html>