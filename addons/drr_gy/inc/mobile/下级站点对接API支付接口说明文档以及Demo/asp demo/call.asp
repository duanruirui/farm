<!-- #include file="Config.asp" -->
<!-- #include file="Md5.asp" -->
<%
memberid=Trim(Request("memberid"))
orderid=Trim(Request("orderid"))
amount=Trim(Request("amount"))
datetime=Trim(Request("datetime"))
returncode=Trim(Request("returncode"))
transaction_id=Trim(Request("transaction_id"))
attach=Trim(Request("attach"))
signp=Trim(Request("sign"))
stringSignTemp="amount="&amount&"&datetime="&datetime&"&memberid="&memberid&"&orderid="&orderid&"&returncode="&returncode&"&transaction_id="&transaction_id&"&key="&keyValue&""
md5sign=MD5(stringSignTemp,32,1)
    IF signp=md5sign Then
        IF returncode="00" Then
        '支付成功，写返回数据逻辑
        response.write"支付成功"
        response.end
        Else
        response.write"支付失败"
        response.end
        End if
    Else
        response.write"验签失败"
        response.end
    End if
%>