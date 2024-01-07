create table khachhang (
    makh varchar(10) primary key,
    tenkh varchar(50),
    diachi varchar(100)
);

create table hanghoa (
    mahh varchar(10) primary key,
    tenhh varchar(50),
    gia float
);

create table donhang (
    madh varchar(10) primary key,
    tendh varchar(50),
    ngaydat date,
    makh varchar(10),
    foreign key (makh) references khachhang(makh)
);

create table chitietdonhang (
    madh varchar(10),
    mahh varchar(10),
    soluong int,
    primary key (madh, mahh),
    foreign key (madh) references donhang(madh),
    foreign key (mahh) references hanghoa(mahh)
);

insert into khachhang 
(makh, tenkh, diachi) values 
('KH01', 'Tran Dinh Khanh', 'HCM'),
('KH02', 'Le Trung Hieu', 'HN'),
('KH03', 'Phan Dinh The Trung', 'DN'),
('KH04', 'Nguyen van phong', 'HCM'),
('KH05', 'Ho Nhat Huy', 'HN'),
('KH06', 'Phan Thanh Duong', 'DN'),
('KH07', 'Nguyen Viet Sang', 'HCM'),
('KH08', 'Luong Quoc Toan', 'HN'),
('KH09', 'Nguyen Huy Hoang', 'DN'),
('KH10', 'Ha Dinh Kien', 'HCM');

insert into hanghoa
(mahh, tenhh, gia) values
('HH01', 'Iphone 6', 10000000),
('HH02', 'Iphone 6s', 12000000),
('HH03', 'Iphone 7', 15000000),
('HH04', 'Iphone 7s', 17000000),
('HH05', 'Iphone 8', 20000000),
('HH06', 'Iphone 8s', 22000000),
('HH07', 'Iphone X', 25000000),
('HH08', 'Iphone Xs', 27000000),
('HH09', 'Iphone Xs Max', 30000000),
('HH10', 'Iphone 11', 35000000);

insert into donhang
(madh, tendh, ngaydat, makh) values
('DH01', 'Don hang 1', '2024-01-01', 'KH01'),
('DH02', 'Don hang 2', '2024-01-02', 'KH02'),
('DH03', 'Don hang 3', '2024-01-03', 'KH03'),
('DH04', 'Don hang 4', '2024-01-04', 'KH04'),
('DH05', 'Don hang 5', '2024-01-05', 'KH05'),
('DH06', 'Don hang 6', '2024-01-06', 'KH06'),
('DH07', 'Don hang 7', '2024-01-07', 'KH07'),
('DH08', 'Don hang 8', '2024-01-08', 'KH08'),
('DH09', 'Don hang 9', '2024-01-09', 'KH09'),
('DH10', 'Don hang 10', '2024-01-10', 'KH10');

insert into chitietdonhang
(madh, mahh, soluong) values
('DH01', 'HH01', 1),
('DH01', 'HH02', 2),
('DH01', 'HH03', 3),
('DH02', 'HH04', 4),
('DH02', 'HH05', 5),
('DH02', 'HH06', 6),
('DH03', 'HH07', 7),
('DH03', 'HH08', 8),
('DH03', 'HH09', 9),
('DH04', 'HH10', 10),
('DH05', 'HH03', 3),
('DH05', 'HH04', 4),
('DH05', 'HH05', 5),
('DH05', 'HH01', 5),
('DH05', 'HH02', 5),
('DH06', 'HH06', 6),
('DH06', 'HH07', 7),
('DH07', 'HH09', 9),
('DH07', 'HH10', 10),
('DH07', 'HH01', 1),
('DH08', 'HH02', 2),
('DH09', 'HH05', 5),
('DH09', 'HH06', 6),
('DH09', 'HH07', 7),
('DH10', 'HH01', 1),
('DH10', 'HH02', 2),
('DH10', 'HH03', 2),
('DH10', 'HH08', 8),
('DH10', 'HH09', 9),
('DH10', 'HH10', 10);
