-- sản phẩm : (xóa mềm)
--  1. bảng danh mục
--     id : ->khóa tự tăng
--     name: string ->100
CREATE TABLE `danhmuc` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `sanpham` (
  `id` int PRIMARY KEY AUTO_INCREMENT ,
  `name` varchar(350),
  `mota` longtext,
  `danhmuc_id` int,
  `gia` float,
  `img` varchar(500),
  `create_at` datetime,
  `update_at` datetime,
  `deleted` int DEFAULT(1)
);

ALTER TABLE `sanpham` ADD FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`);

ALTER TABLE `sanpham` CHANGE `create_at` `create_at` VARCHAR(100) NULL;
ALTER TABLE `sanpham` CHANGE `update_at` `update_at` VARCHAR(100) NULL;
ALTER TABLE `sanpham` ADD `soluong` INT(255) NOT NULL AFTER `deleted`;

-- phải có bảng user
ALTER TABLE `user` ADD `gmail` VARCHAR(50) NOT NULL AFTER `create_time`;

CREATE TABLE `hoadon` (
  `id` int PRIMARY KEY AUTO_INCREMENT ,
  `order_id` int,          -- số hóa đơn
  -- `name` varchar(255),     -- tên người dùng
  `note` varchar(255),      -- số sản phẩm
  `ma_gd` int,           -- giá trị 1,0 (dành cho dành cho người dùng có tài khoản và không có tài khoản)
  -- `taikhoan_id` int,        -- id của tài khoản người dùng
  `money` float,
  `code_bank` varchar(255), -- mã ngân hàng
  `time` datetime
);
ALTER TABLE `hoadon` CHANGE `time` `time` VARCHAR(20) NULL DEFAULT NULL;


CREATE TABLE `blog` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `create` varchar(255),
  `nd` longtext,
  `img1` varchar(255),
  `nd2` longtext,
  `img2` varchar(255)
);

ALTER TABLE `blog` ADD `render` INT NOT NULL AFTER `img2`;
ALTER TABLE `blog` ADD `vitri` INT NOT NULL AFTER `render`;
ALTER TABLE `hoadon` ADD `user_id` INT NOT NULL AFTER `time`;
ALTER TABLE `hoadon` CHANGE `order_id` `order_id` INT(255) NULL DEFAULT NULL;
ALTER TABLE `hoadon` CHANGE `order_id` `order_id` VARCHAR(255) NULL DEFAULT NULL;
ALTER TABLE `hoadon` CHANGE `time` `time` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
--  2. bảng sản phẩm
--     id : khóa tự tăng
--     name: string -> 350
--     mô tả: longText
--     id(danh muc)
--     giá: fload
--     img:string -> 500
--    create_at: datetime 
--    update_at: datetime
   


