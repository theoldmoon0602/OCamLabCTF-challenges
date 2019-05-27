from Crypto.Util.number import *

p = getPrime(1024)
q = getPrime(1024)
n = p * q
e = 65537
m = bytes_to_long(b"OCamLabCTF{R1v3st-Sh4m1r-Adl3m4n}")
c = pow(m, e, n)

print("p = {}".format(p))
print("q = {}".format(q))
print("e = {}".format(e))
print("c = {}".format(c))
