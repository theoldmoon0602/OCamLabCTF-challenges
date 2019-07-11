numbers = [
    0x6D61434F,
    0x4362614C,
    0x737B4654,
    0x6E697274,
    0x6E615F67,
    0x6E695F64,
    0x65676574,
    0x7D72,
]
flag = b""
for n in numbers:
    flag += bytes.fromhex(hex(n)[2:])[::-1]
print(flag)
