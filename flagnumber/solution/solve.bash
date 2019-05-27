python3 << EOF
print(bytes.fromhex(hex(eval(open("encrypted").read().strip()))[2:]))
EOF
