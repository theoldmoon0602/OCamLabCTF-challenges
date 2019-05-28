x=$(echo 'OCamLabCTF{0p3n_y0ur_3y3s_and_1d3nt1fy_1t_1s_r0t13}' | tr A-Za-z N-ZA-Mn-za-m)
echo $x
mkdir -p solution
echo "echo '$x' | tr A-Za-z N-ZA-Mn-za-m" > solution/solve.bash
