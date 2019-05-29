from binascii import hexlify
import os

flag = b"OCamlabCTF{str1ng_t0_1nt_c0nv3rs10n_1s_us3ful_f0r_crypt0graphy}"
x = int(hexlify(flag), 16)
print(x)

solution = """
python3 << EOF
print(bytes.fromhex(hex({})[2:]))
EOF
""".format(
    x
)

os.system("mkdir -p solution")
with open("solution/solve.bash", "w") as f:
    f.write(solution)
