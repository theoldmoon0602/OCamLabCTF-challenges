import os
import sys


def enc_block(m, k):
    return m ^ k


def pad(m, a):
    l = a - (len(m) % a)
    return m + chr(l) * l


def enc(m):
    m = pad(m, 8)
    k = int(os.urandom(8).encode("hex"), 16)

    r = ""
    for i in range(len(m) / 8):
        c = enc_block(int(m[i * 8 : (i + 1) * 8].encode("hex"), 16), k)
        r += hex(c)[2:].rstrip("L")
    return r


if __name__ == "__main__":
    print(enc(sys.argv[1]))
