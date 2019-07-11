import struct
import binascii

s = input()
for i in range(0, len(s), 4):
    print("((int*)buf)[{}] == 0x{:x}".format(i // 4, struct.unpack("<i", s[i : i + 4].ljust(4, '\x00').encode())[0]))
