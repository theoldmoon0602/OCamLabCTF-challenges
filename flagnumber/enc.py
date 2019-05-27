from binascii import hexlify

flag = b"OCamlabCTF{str1ng_t0_1nt_c0nv3rs10n_1s_us3ful_f0r_crypt0graphy}"
print(int(hexlify(flag), 16))
