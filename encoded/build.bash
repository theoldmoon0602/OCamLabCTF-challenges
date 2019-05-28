x=$(echo 'OCamlLabCTF{base64_3nc0d1ng_t0_mak3_data_pr1ntabl3}' | zlib-flate -compress | base64 -w0)
mkdir -p solution
echo "echo '$x' | base64 -d| zlib-flate -uncompress" > solution/solve.bash
echo $x

