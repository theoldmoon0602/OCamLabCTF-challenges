import sys

with open(sys.argv[1], "r") as f:
    s = f.read().strip()

k = None
flag = ""
for i in range(len(s) / 16):
    s2 = s[i * 16 : (i + 1) * 16]
    t = int(s2, 16)
    if k is None:
        k = t ^ int("OCamLabCTF"[:8].encode("hex"), 16)
    flag += hex(t ^ k)[2:].rstrip("L").decode("hex")
print(flag)
