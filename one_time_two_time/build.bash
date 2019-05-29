mkdir -p distfiles
python2 enc.py $(cat flag.txt) > distfiles/flag.enc
cp enc.py distfiles
