create table if not exists users (
    username text unique not null,
    password text not null
);

insert into users(username, password) values ('admin', redacted);
