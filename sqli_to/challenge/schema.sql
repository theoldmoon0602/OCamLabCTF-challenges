create table if not exists users (
    username text unique not null,
    password text not null
);

insert into users(username, password) values ('admin', 'g3t_l0n93r_and_m0r3_c0mpl3x');
