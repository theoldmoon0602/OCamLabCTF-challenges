#include <stdio.h>
#include <string.h>

int main() {
    char buf[64];
    printf("flag: ");
    scanf("%63s", buf);
    if (((int*)buf)[0] == 0x6d61434f &&
        ((int*)buf)[1] == 0x4362614c &&
        ((int*)buf)[2] == 0x737b4654 &&
        ((int*)buf)[3] == 0x6e697274 &&
        ((int*)buf)[4] == 0x6e615f67 &&
        ((int*)buf)[5] == 0x6e695f64 &&
        ((int*)buf)[6] == 0x65676574 &&
        ((int*)buf)[7] == 0x7d72) {
        printf("Yes it's flag!\n");
    } else {
        printf("No, no no.");
    }

    return 0;
}
