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


--  2. bảng sản phẩm
--     id : khóa tự tăng
--     name: string -> 350
--     mô tả: longText
--     id(danh muc)
--     giá: fload
--     img:string -> 500
--    create_at: datetime 
--    update_at: datetime
   


