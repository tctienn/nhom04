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

--  2. bảng sản phẩm
--     id : khóa tự tăng
--     name: string -> 350
--     mô tả: longText
--     id(danh muc)
--     giá: fload
--     img:string -> 500
--    create_at: datetime 
--    update_at: datetime
   


