create table khachhang (
    makh varchar(10) primary key,
    tenkh varchar(50),
    sdt varchar(10),
    cccn varchar(10)
);

create table phong (
    maphong varchar(10) primary key,
    tenphong varchar(50),
    tinhtrang varchar(50),
    loaiphong varchar(50)
);

create table hoadon (
    mahd varchar(10) primary key,
    tenhd varchar(50),
    makh varchar(10),
    tongtien float,
    foreign key (makh) references khachhang(makh)
);

create table thue (
    mahd varchar(10),
    maphong varchar(10),
    ngaythue date,
    ngaytra date,
    giathue float,
    primary key (mahd, maphong),
    foreign key (mahd) references hoadon(mahd),
    foreign key (maphong) references phong(maphong)
);

-- seeding 
insert into khachhang values 
('KH01', 'Tran Dinh Khanh', '0123456789', '1234567890'),
('KH02', 'Le Trung Hieu', '0123456789', '1234567890'),
('KH03', 'Phan Dinh The Trung', '0123456789', '1234567890'),
('KH04', 'Nguyen van phong', '0123456789', '1234567890'),
('KH05', 'Ho Nhat Huy', '0123456789', '1234567890'),
('KH06', 'Phan Thanh Duong', '0123456789', '1234567890'),
('KH07', 'Nguyen Viet Sang', '0123456789', '1234567890'),
('KH08', 'Luong Quoc Toan', '0123456789', '1234567890'),
('KH09', 'Nguyen Huy Hoang', '0123456789', '1234567890'),
('KH10', 'Ha Dinh Kien', '0123456789', '1234567890');

insert into phong values 
('P01', 'Phong 1', 'Trong', 'Phong don'),
('P02', 'Phong 2', 'Trong', 'Phong don'),
('P03', 'Phong 3', 'Trong', 'Phong don'),
('P04', 'Phong 4', 'Trong', 'Phong don'),
('P05', 'Phong 5', 'Trong', 'Phong doi'),
('P06', 'Phong 6', 'Trong', 'Phong doi'),
('P07', 'Phong 7', 'thue', 'Phong doi'),
('P08', 'Phong 8', 'thue', 'Phong doi'),
('P09', 'Phong 9', 'thue', 'Phong doi'),
('P10', 'Phong 10', 'thue', 'Phong doi');

insert into hoadon values 
('HD01', 'Hoa don 1', 'KH01', 100000),
('HD02', 'Hoa don 2', 'KH02', 200000),
('HD03', 'Hoa don 3', 'KH03', 300000),
('HD04', 'Hoa don 4', 'KH04', 400000),
('HD05', 'Hoa don 5', 'KH05', 500000),
('HD06', 'Hoa don 6', 'KH01', 600000),
('HD07', 'Hoa don 7', 'KH02', 700000),
('HD08', 'Hoa don 8', 'KH06', 800000),
('HD09', 'Hoa don 9', 'KH07', 900000),
('HD10', 'Hoa don 10', 'KH08', 1000000),
('HD11', 'Hoa don 11', 'KH09', 1100000),
('HD12', 'Hoa don 12', 'KH10', 1200000),
('HD13', 'Hoa don 13', 'KH05', 1300000),
('HD14', 'Hoa don 14', 'KH08', 1400000),
('HD15', 'Hoa don 15', 'KH02', 1500000);


insert into thue values 
('HD01', 'P01', '2020-01-01', '2020-01-10', 100000),
('HD02', 'P02', '2020-01-01', '2020-01-10', 200000),
('HD03', 'P03', '2020-01-01', '2020-01-10', 300000),
('HD04', 'P04', '2020-01-01', '2020-01-10', 400000),
('HD05', 'P05', '2020-01-01', '2020-01-10', 500000),
('HD06', 'P06', '2020-01-01', '2020-01-10', 600000),
('HD07', 'P07', '2020-01-01', '2020-01-10', 700000),
('HD08', 'P08', '2020-01-01', '2020-01-10', 800000),
('HD09', 'P09', '2020-01-01', '2020-01-10', 900000),
('HD10', 'P10', '2020-01-01', '2020-01-10', 1000000),
('HD11', 'P01', '2020-01-01', '2020-01-10', 1100000),
('HD12', 'P02', '2020-01-01', '2020-01-10', 1200000),
('HD13', 'P03', '2020-01-01', '2020-01-10', 1300000),
('HD14', 'P04', '2020-01-01', '2020-01-10', 1400000),
('HD15', 'P05', '2020-01-01', '2020-01-10', 1500000);