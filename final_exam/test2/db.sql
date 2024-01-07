create table KHACHHANG (
    MAKH varchar(10) primary key,
    HOTENKH varchar(50),
    DIACHI varchar(50),
    DIENTHOAI varchar(10)
);

create table XE (
    SOXE varchar(10) primary key,
    HANGXE varchar(50),
    NAMSX int,
    MAKH varchar(10), 
    foreign key (MAKH) references KHACHHANG(MAKH)
);

create table BAODUONG (
    MABD varchar(10) primary key,
    NGAYNHAN date,
    NGAYTRA date,
    SOKM int,
    NOIDUNG varchar(50),
    SOXE varchar(10), 
    foreign key (SOXE) references XE(SOXE),
    THANHTIEN int
);

create table CONGVIEC (
    MACV varchar(10) primary key,
    TENCV varchar(50),
    DONGIA int
);

create table CT_BD (
    MABD varchar(10), 
    MACV varchar(10), 
    foreign key (MABD) references BAODUONG(MABD),
    foreign key (MACV) references CONGVIEC(MACV),
    primary key (MABD, MACV)
);

-- seeding 
insert into khachhang 
(makh, hotenkh, diachi, dienthoai) values 
('KH01', 'Tran Dinh Khanh', 'HCM', '00000001'),
('KH02', 'Le Trung Hieu', 'HN', '0000002'),
('KH03', 'Phan Dinh The Trung', 'DN', '0000003'),
('KH04', 'Nguyen van phong', 'HCM', '0000004'),
('KH05', 'Ho Nhat Huy', 'HN', '0000005'),
('KH06', 'Phan Thanh Duong', 'DN', '0000006'),
('KH07', 'Nguyen Viet Sang', 'HCM', '0000007'),
('KH08', 'Luong Quoc Toan', 'HN', '0000008'),
('KH09', 'Nguyen Huy Hoang', 'DN', '0000009'),
('KH10', 'Ha Dinh Kien', 'HCM', '0000010');

insert into xe 
(soxe, hangxe, namsx, makh) values 
('X01', 'Honda', 2010, 'KH01'),
('X02', 'Honda', 2011, 'KH02'),
('X03', 'Yamaha', 2012, 'KH03'),
('X04', 'Honda', 2013, 'KH04'),
('X05', 'Suzuki', 2014, 'KH05'),
('X06', 'Honda', 2015, 'KH06'),
('X07', 'Yamaha', 2016, 'KH07'),
('X08', 'Suzuki', 2017, 'KH08'),
('X09', 'Yamaha', 2018, 'KH09'),
('X10', 'Honda', 2019, 'KH10');

insert into baoduong
(mabd, ngaynhan, ngaytra, sokm, noidung, soxe, thanhtien) values
('BD01', '2023-12-01', null , 100, 'Thay dầu', 'X01', null),
('BD02', '2023-12-02', null , 150, 'Thay bánh', 'X02', null),
('BD03', '2023-12-03', null , 100, 'sửa đèn', 'X03', null),
('BD04', '2023-12-04', null , 400, 'Thay phanh', 'X04', null),
('BD05', '2023-12-05', null , 120, 'thay nhớt', 'X05', null),
('BD06', '2023-12-06', null , 160, 'Thay loc', 'X06', null),
('BD07', '2023-12-07', null , 200, 'Thay chân chống' , 'X07', null),
('BD08', '2023-12-08', null , 250, 'Thay vỏ', 'X08', null),
('BD09', '2023-12-08', null , 130, 'Thay bộ lọc' , 'X09', null),
('BD10', '2023-12-09', null , 100, 'Thay gương', 'X10', null),
('BD11', '2023-12-09', null , 300, 'Thay dầu', 'X01', null),
('BD12', '2023-12-10', null , 300, 'Thay bánh', 'X05', null),
('BD13', '2023-12-10', null , 300, 'sửa đèn', 'X10', null),
('BD14', '2023-12-01', null , 300, 'Thay phanh', 'X02', null),
('BD15', '2023-12-01', null , 300, 'thay nhớt', 'X03', null),
('BD16', '2023-12-01', null , 300, 'Thay dầu', 'X01', null),
('BD17', '2023-12-02', null , 150, 'Thay bánh', 'X02', null),
('BD18', '2023-12-03', null , 100, 'sửa đèn', 'X03', null),
('BD19', '2023-12-04', null , 400, 'Thay phanh', 'X05', null),
('BD20', '2023-12-05', null , 120, 'thay nhớt', 'X08', null),
('BD21', '2023-12-06', null , 160, 'Thay loc', 'X01', null),
('BD22', '2023-12-07', null , 200, 'Thay chân chống' , 'X02', null),
('BD23', '2023-12-08', null , 250, 'Thay vỏ', 'X03', null),
('BD24', '2023-12-08', null , 130, 'Thay bộ lọc' , 'X05', null),
('BD25', '2023-12-09', null , 100, 'Thay gương', 'X08', null),
('BD26', '2023-12-09', null , 300, 'Thay dầu', 'X01', null),
('BD27', '2023-12-10', null , 300, 'Thay bánh', 'X05', null),
('BD28', '2023-12-10', null , 300, 'sửa đèn', 'X08', null),
('BD29', '2023-12-01', null , 300, 'Thay phanh', 'X02', null),
('BD30', '2023-12-01', null , 300, 'thay nhớt', 'X03', null);

insert into congviec
(macv, tencv, dongia) values
('CV01', 'Thay dầu', 100000),
('CV02', 'Thay bánh', 150000),
('CV03', 'sửa đèn', 200000),
('CV04', 'Thay phanh', 130000),
('CV05', 'thay nhớt', 180000),
('CV06', 'Thay loc', 300000),
('CV07', 'Thay chân chống', 500000),
('CV08', 'Thay vỏ', 240000),
('CV09', 'Thay bộ lọc', 100000),
('CV10', 'Thay gương', 900000); 

insert into ct_bd
(mabd, macv) values
('BD01', 'CV01'),
('BD02', 'CV02'),
('BD03', 'CV03'),
('BD04', 'CV04'),
('BD05', 'CV05'),
('BD06', 'CV06'),
('BD07', 'CV07'),
('BD08', 'CV08'),
('BD08', 'CV01'),
('BD08', 'CV02'),
('BD09', 'CV09'),
('BD09', 'CV03'),
('BD09', 'CV04'),
('BD10', 'CV10'),
('BD11', 'CV01'),
('BD12', 'CV02'),
('BD13', 'CV03'),
('BD14', 'CV04'),
('BD15', 'CV05');