CREATE TABLE `blog` (
  `id` int PRIMARY KEY,
  `title` varchar(255),
  `create` varchar(255),
  `nd` longtext,
  `img1` varchar(255),
  `nd2` longtext,
  `img2` varchar(255)
);



-- ///////////////////
CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT ,
  `username` varchar(50),
  `password` varchar(150),
  `is_admin` int,
  `create_time` varchar(20),
  `gmail` varchar(50),
  
);