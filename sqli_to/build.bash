rm -rf distfiles
mkdir -p distfiles
cp -r challenge/html/ distfiles/
cp challenge/schema.sql distfiles/
cp challenge/utils.php distfiles/

sed -i "s/, '.*'/, redacted/g" distfiles/schema.sql
