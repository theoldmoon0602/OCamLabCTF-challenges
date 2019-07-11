from PIL import Image
import sys
import random

img = Image.open(sys.argv[1])
w, h = img.size
plaintext = "".join("{:08b}".format(b) for b in open(sys.argv[2], "rb").read().strip())

offset = random.randrange(0, h)

i = 0
for y in range(offset, h):
    for x in range(w):
        r, g, b, a = img.getpixel((x, y))
        if plaintext[i] == "1":
            r = r | 1
        else:
            r = r & 0xfe
        img.putpixel((x, y), (r, g, b, a))
        i += 1
        if i >= len(plaintext):
            img.save("steg.png")
            exit()
