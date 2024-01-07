create table tour (
    MaTour int primary key,
    TenTour varchar(50),
    NgayKhoiHanh date,
    SoNgay int,
    SoDem int,
    Gia int
);

create table tinhthanhpho (
    MaTTP int primary key,
    TenTTP varchar(50)
);

create table diemdl (
    MaDDL int primary key,
    TenDDL varchar(50),
    MaTTP int,
    Dactrung varchar(50),
    foreign key (MaTTP) references tinhthanhpho(MaTTP)
);

create table chitiet (
    MaTour int,
    MaDDL int,
    Ngay int,
    Dem int,
    primary key (MaTour, MaDDL),
    foreign key (MaTour) references tour(MaTour),
    foreign key (MaDDL) references diemdl(MaDDL)
);



-- seeding 
insert into tinhthanhpho values 
(1, 'Hà Nội'),
(2, 'Hồ Chí Minh'),
(3, 'Đà Nẵng'),
(4, 'Hải Phòng'),
(5, 'Cần Thơ'),
(6, 'Hải Dương'),
(7, 'Hà Giang'),
(8, 'Hà Nam'),
(9, 'Hà Tĩnh'),
(10, 'Bình Định'),
(11, 'Long An');

insert into diemdl (MaDDL, TenDDL, MaTTP, Dactrung) values 
(1, 'Hồ Gươm', 1, 'Thăm quan'),
(2, 'Hồ Tây', 1, 'Thăm quan'),
(3, 'Hồ Đồng Đò', 1, 'Thăm quan'), 
(4, 'Bến Thành', 2, 'Thăm quan'),
(5, 'Chợ Bến Thành', 2, 'Mua sắm'),
(6, 'Chợ Bình Tây', 2, 'Mua sắm'),
(7, 'Bà Nà', 3, 'Thăm quan'),
(8, 'Bãi biển Mỹ Khê', 3, 'Tắm biển'),
(9, 'Bãi biển Non Nước', 3, 'Tắm biển'),
(10, 'Bãi biển Đồ Sơn', 4, 'Tắm biển'),
(11, 'Bãi biển Cát Bà', 4, 'Tắm biển'),
(12, 'Bãi biển Cát Cò', 4, 'Tắm biển'),
(13, 'Bến Ninh Kiều', 5, 'Thăm quan'),
(14, 'Bến Ninh Giang', 6, 'Thăm quan'),
(15, 'cafe núi cấm', 7, 'Thăm quan'),
(16, 'hà nam', 8, 'Thăm quan'),
(17, 'chùa hương', 9, 'Thăm quan'),
(18, 'ngã ba đồng lộc', 9, 'Thăm quan'),
(19, 'chùa tháp', 10, 'Thăm quan'),
(20, 'bãi biển quy nhơn', 10, 'Tắm biển'),
(21, 'chùa long an', 11, 'Thăm quan'),
(22, 'bến tre', 11, 'Thăm quan');

insert into tour values 
(1, 'Hà Nội - Hồ Chí Minh', '2021-01-01', 5, 4, 1000000),
(2, 'Hà Nội - Đà Nẵng', '2021-01-01', 5, 4, 1500000),
(3, 'Hà Nội - Hải Phòng', '2021-01-01', 5, 4, 1300000),
(4, 'Hà Nội - Cần Thơ', '2021-01-01', 5, 4, 1200000),
(5, 'Hà Nội - Hải Dương', '2021-01-01', 5, 4, 2000000),
(6, 'Hà Nội - Hà Giang', '2021-01-01', 5, 4, 10500000),
(7, 'Hà Nội - Hà Nam', '2021-01-01', 5, 4, 1500000),
(8, 'Hà Nội - Hà Tĩnh', '2021-01-01', 5, 4, 1400000),
(9, 'Hà Nội - Bình Định', '2021-01-01', 5, 4, 2400000),
(10, 'Hà Nội - Long An', '2021-01-01', 5, 4, 1600000),
(11, 'Hồ Chí Minh - Hà Nội', '2021-01-01', 5, 4, 1500000),
(12, 'Hồ Chí Minh - Đà Nẵng', '2021-01-01', 5, 4, 1000000),
(13, 'Hồ Chí Minh - Hải Phòng', '2021-01-01', 5, 4, 1100000),
(14, 'Hồ Chí Minh - Cần Thơ', '2021-01-01', 5, 4, 1500000),
(15, 'Hồ Chí Minh - Hải Dương', '2021-01-01', 5, 4, 1600000),
(16, 'Hồ Chí Minh - Hà Giang', '2021-01-01', 5, 4, 1900000),
(17, 'Hồ Chí Minh - Hà Nam', '2021-01-01', 5, 4, 700000),
(18, 'Hồ Chí Minh - Hà Tĩnh', '2021-01-01', 5, 4, 1500000);

insert into chitiet 
(MaTour, MaDDL, Ngay, Dem) values 
(1, 1, 3, 2),
(1, 2, 4, 3),
(1, 3, 5, 4),
(2, 4, 3, 2),
(2, 5, 4, 3),
(2, 6, 5, 4),
(2, 8, 5, 4),
(2, 9, 5, 4),
(2, 15, 5, 4),
(3, 7, 3, 2),
(3, 8, 4, 3),
(3, 9, 5, 4),
(4, 10, 3, 2),
(4, 11, 4, 3),
(4, 12, 5, 4),
(4, 1, 5, 4),
(4, 6, 5, 4),
(5, 13, 3, 2),
(5, 14, 4, 3),
(5, 15, 5, 4),
(6, 16, 3, 2),
(6, 18, 3, 2),
(6, 6, 3, 2),
(6, 17, 4, 3),
(6, 7, 4, 3),
(6, 11, 4, 3),
(6, 12, 5, 4),
(7, 19, 3, 2),
(7, 20, 4, 3),
(7, 21, 5, 4),
(8, 22, 3, 2),
(8, 1, 4, 3),
(8, 2, 5, 4),
(9, 3, 3, 2),
(9, 4, 4, 3),
(9, 5, 5, 4),
(10, 6, 3, 2),
(10, 7, 4, 3),
(10, 8, 5, 4),
(11, 9, 3, 2),
(11, 10, 4, 3),
(11, 11, 5, 4),
(12, 12, 3, 2),
(12, 13, 4, 3),
(12, 14, 5, 4),
(13, 15, 3, 2),
(13, 16, 4, 3),
(13, 17, 5, 4),
(14, 18, 3, 2),
(14, 19, 4, 3),
(14, 20, 5, 4),
(15, 21, 3, 2),
(15, 22, 4, 3),
(15, 1, 5, 4),
(16, 2, 3, 2),
(16, 3, 4, 3),
(16, 4, 5, 4),
(17, 5, 3, 2),
(17, 6, 4, 3),
(17, 7, 5, 4),
(18, 8, 3, 2),
(18, 9, 4, 3),
(18, 10, 5, 4);
