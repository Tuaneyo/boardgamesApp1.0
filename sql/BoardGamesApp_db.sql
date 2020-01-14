create table battles
(
  id         int auto_increment
    primary key,
  dtPlayed   date         not null,
  gameid     int          not null,
  players	 varchar(255) not null,
  wonby      int          not null,
  score      varchar(256) null
);
 

create table games
(
  id          int(4) auto_increment
    primary key,
  name        varchar(128)              not null,
  nop         varchar(128)              not null,
  dor         year                      not null,
  publisherid int(4)                    null,
  duration    varchar(32)               null,
  description varchar(12800) default '' not null
);

create table users
(
  id       int(2) auto_increment
    primary key,
  fname    varchar(128)            not null,
  lname    varchar(255)            not null,
  email    varchar(255)            not null,
  mobile   varchar(10) default ''  not null,
  password varchar(256) default '' null,
  verified int(1) default 0 null
);

create table player
(
  id         int(2) auto_increment
    primary key,
  nickname   varchar(128)    not null,
  gamestatus int default '1' null,
  constraint player_users_id_fk
  foreign key (id) references users (id)
);

create table verify
(
	id int(2) auto_increment
	primary key,
	email varchar(255) not null,
	hash varchar(255) not null
);



