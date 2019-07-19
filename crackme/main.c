#include <stdio.h>
#include <string.h>

int main(int argc, char** argv) {
    if (argc <= 1) {
        fprintf(stderr, "usage: %s flag\n", argv[0]);
        return 1;
    }

    char prefix[] = "OCamLabCTF{";
    int i = 0;
    for (; i < strlen(prefix); i++) {
        if (prefix[i] != argv[1][i]) {
            printf("BAD1\n");
            return 0;
        }
    }

    int xs[] = {9, 23, 4, 5};
    for (int j = 0; j < 4; j++, i++) {
        if ((argv[1][i-1] ^ argv[1][i]) != xs[j]) {
            printf("BAD2\n");
            return 0;
        }
    }

    i++;

    if (!(argv[1][i] < argv[1][i+1] &&
        argv[1][i+1] == argv[1][i+2] &&
        argv[1][i] < argv[1][i+3] &&
        argv[1][i] + 4 == argv[1][i+3] &&
        argv[1][i] * argv[1][i+1] * argv[1][i+2] * argv[1][i+3] == 129565325)) {
        printf("BAD3\n");
        return 0;
    }
    i += 4;

    if (argv[1][i] != 'm') {
        printf("BAD4\n");
        return 0;
    }
    i++;

    FILE* fp = fopen(argv[0], "rb");
    char buf[4];
    fread(buf, 4, 1, fp);
    fclose(fp);

    if (argv[1][i] != buf[1] + 0x20 - 3) {
        printf("BAD5\n");
        return 0;
    }
    i++;

    if (argv[1][i] != buf[2] + 0x20) {
        printf("BAD6\n");
        return 0;
    }
    i++;

    if ((argv[1][i] ^ buf[0]) != 6) {
        printf("BAD7\n");
        return 0;
    }
    i++;

    if ((argv[1][i] ^ argv[1][15]) != 34 || argv[1][i+1] != 0) {
        printf("BAD8\n");
        return 0;
    }

    printf("PERFECT\n");
    return 0;
}
