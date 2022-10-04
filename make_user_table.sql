use test;

CREATE TABLE IF NOT EXISTS `accounts` (
    `useridx` int primary key auto_increment,
    `userid` varchar(255) unique not null,
    `userpw` varchar(255) not null,
    `username` varchar(255) not null,
    `useremail` varchar(255),
    `regdate` datetime DEFAULT now()
);
