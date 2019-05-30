<?php

if (!is_dir('database')) {
    mkdir('database');
}
if (file_exists('database/db.sqlite')) {
    unlink('database/db.sqlite');
}
system('sqlite3 database/db.sqlite < schema.sql');
chmod('database/db.sqlite', 0755);
chmod('database', 0755);
