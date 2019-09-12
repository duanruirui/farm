import hashlib
import time
import random
def Md5str(src):
    m = hashlib.md5( src.encode("utf8"))
    return m.hexdigest().upper()
if __name__ =="__main__":
    Md5str( 'this is a md5 test.')
def obtaindate():
    return time.strftime("%Y-%m-%d %H:%M:%S", time.localtime())
def order():
    pre=time.strftime("%Y%m%d%H%M%S", time.localtime())
    sub=random.randint(100000,999999) #输出 12
    return str(pre)+str(sub)