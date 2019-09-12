<%
merchantId = "10007"   '用户编号，必须换成自己的
keyValue = "t4ig5acnpx4fet4zapshjacjd9o4bhbi"     '交易密钥，用户替换成自己的
'===================以下不用修改===========================
'提交地址，用户平台的单据信息提交到此地址，提交方式必须为Post
AuthorizationURL = "https://pay.xxx.com/Pay_Index.html"
'跳转地址
CallbackURL = "http://"&request.ServerVariables("HTTP_HOST")&"/Pay/Callback.asp"
'异步回调地址
notifyurl = "http://"&request.ServerVariables("HTTP_HOST")&"/Pay/notifyurl.asp"
Public Function GetNewNumb()
    Dim ranNum, dtNow
    dtNow=Now()
    randomize
    ranNum=int(90000*rnd)+10000
    GetNewNumb=year(dtNow) & right("0" & month(dtNow),2) & right("0" & day(dtNow),2) & right("0" & hour(dtNow),2) & right("0" & minute(dtNow),2) & right("0" & second(dtNow),2) & ranNum
End Function
Function Timepp()
Dim y, m, d, h, mi, s
s_Time = Now()
y = cstr(year(s_Time))
m = cstr(month(s_Time))
If len(m) = 1 Then m = "0" & m
d = cstr(day(s_Time))
If len(d) = 1 Then d = "0" & d
h = cstr(hour(s_Time))
If len(h) = 1 Then h = "0" & h
mi = cstr(minute(s_Time))
If len(mi) = 1 Then mi = "0" & mi
s = cstr(second(s_Time))
If len(s) = 1 Then s = "0" & s
Timepp= y & "-" & m & "-" & d & " " & h & ":" & mi & ":" & s
End Function
%>