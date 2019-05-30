create table if not exists users (
    username text not null unique,
    password_hash text not null,
    is_admin int not null default 0
);
