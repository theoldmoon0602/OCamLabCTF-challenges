#include <stdio.h>
#include <string.h>

int main() {
    char buf[64];
    printf("flag: ");
    scanf("%63s", buf);

    if (strcmp(buf, "OCamLabCTF{str1ngs_1s_us3ful_t00l_4lw4ys}") == 0) {
        printf("Yes it's flag!\n");
    } else {
        printf("No, no no.");
    }

    return 0;
}
