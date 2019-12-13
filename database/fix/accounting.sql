# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-08-03 08:10:13
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "invoice"
#

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `cust_id` varchar(20) DEFAULT NULL,
  `no` varchar(20) DEFAULT NULL,
  `no_inv` varchar(20) DEFAULT NULL,
  `Id_status` varchar(20) DEFAULT NULL,
  `nominal_inv` int(11) DEFAULT NULL,
  `transport` int(11) DEFAULT NULL,
  `nilai_ppn` int(11) DEFAULT NULL,
  `tgl_inv` date DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tgl_tempo` date DEFAULT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `id_sales` varchar(20) DEFAULT NULL,
  `bulan_inv` varchar(20) DEFAULT NULL,
  `proyek` varchar(150) DEFAULT NULL,
  `ket` varchar(50) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `total_inv` int(11) DEFAULT NULL,
  `sisa_bayar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "invoice"
#

INSERT INTO `invoice` VALUES ('694tJOUmKJOC64dbWApP','pua 01','/ee2','pua 01/ee2','JzR8Wh7oXFMEuILH6sJ4',400000,20000,0,'2019-07-26','2019-07-29','2019-08-28','NON PPN','cKz5npSmt682aNgV8PZk','July/2019','PT BARU','Sudah Dikirim','2019-07-30',420000,0),('9DjonzyqrzbsVEnA6vSA','masni22','/d2','masni22/d2','PyJz5grOcjnEr3AMCx62',890000,0,500000,'2019-07-28','2019-07-29','2019-08-27','PPN','mXadUpmuCrRqB8vE8fZG','July/2019','PT SELESAI','Sudah Dikirim','2019-07-30',1390000,176000),('igT6GHOwJzjJYlUFhfVI','sada','/w21','sada/w21','PyJz5grOcjnEr3AMCx62',9200000,0,20000,'2019-07-29','2019-07-31','2019-08-22','PPN','cKz5npSmt682aNgV8PZk','July/2019','PT OKE','Sudah Dikirim','2019-07-31',9220000,5211000),('ORhO4cFqm6w5RT2LKJ3X','tes use2','/d21','tes use2/d21','lCOTWMhxEVhGHh3w3vat',400000,10000,20000,'2019-07-28','2019-07-29','2019-08-18','PPN','mXadUpmuCrRqB8vE8fZG','July/2019','PT JADI','Sudah Dikirim','2019-07-30',430000,430000),('yIx1roMACHYw26gKUrVc','anisss','/fs2','anisss/fs2','lCOTWMhxEVhGHh3w3vat',6700000,20000,0,'2019-07-29',NULL,NULL,'NON PPN','cKz5npSmt682aNgV8PZk','July/2019','PT SNI','Belum Dikirim','2019-07-31',6720000,6720000);

#
# Structure for table "kode_pembayaran"
#

DROP TABLE IF EXISTS `kode_pembayaran`;
CREATE TABLE `kode_pembayaran` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `kode_bayar` varchar(20) DEFAULT NULL,
  `id_inv` varchar(20) DEFAULT NULL,
  `nama_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "kode_pembayaran"
#

INSERT INTO `kode_pembayaran` VALUES ('c83BcMSza8QUJharQUIA','kb0000000002','9DjonzyqrzbsVEnA6vSA','Sudah Dibayar'),('kHX87DlzYdz7YJhVTjEw','kb0000000004','igT6GHOwJzjJYlUFhfVI','Sudah Dibayar'),('nSrgLf3luRimP1flZ2my','kb0000000003','ORhO4cFqm6w5RT2LKJ3X','belum dibayar'),('PZT8RRuTFoXMpxTBaNWp','kb0000000001','694tJOUmKJOC64dbWApP','Lunas');

#
# Structure for table "limit_cust"
#

DROP TABLE IF EXISTS `limit_cust`;
CREATE TABLE `limit_cust` (
  `Id_limit_cust` varchar(20) NOT NULL DEFAULT '',
  `cust_id` varchar(20) DEFAULT NULL,
  `batas_limit` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_limit_cust`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "limit_cust"
#

INSERT INTO `limit_cust` VALUES ('7M89WfwyVdEHQY7kjnUN','tes use2',920000000),('aPOoNmIrUQ9ODgGZoLNU','adasd',73000000),('aXg8sOPmW69pd9Fj9VzX','pua 02',500000000),('cjPCovmhjY8FOHZBC8iy','asda',32000000),('NS4MNkONJw4Pt4XglerW','pua 01',600000000),('TTQ4LAF7PTUbVdRBNZWm','anisss',20000000),('VFGC6LlvcIXgSjAD1H1g','masni22',6059000),('W9nNLgjHJHbDX3aHcQVg','sada',20000000);

#
# Structure for table "limit_group"
#

DROP TABLE IF EXISTS `limit_group`;
CREATE TABLE `limit_group` (
  `Id_limit_group` varchar(20) NOT NULL DEFAULT '',
  `Id_group` varchar(20) DEFAULT NULL,
  `batas_limit` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_limit_group`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "limit_group"
#

INSERT INTO `limit_group` VALUES ('4Rx4tZ1VP7VL6JZr3qct','QKHAFiaVQ3nVyI4xyL2p',90000000),('6SRoWRlSmf6aEDBUMh9x','miEOnf4cKqZMaQmnmT1H',89000000),('nWgfh9BIC83R6a6jsiNc','qXGE7ZL1mg1WNhZcCQ28',21900000),('pkG5B2UgRWrId1MVgapv','zJR1wFKzP9esE77RcQoj',700000000),('TpxJVibiNKu1zuVrBm5G','miEOnf4cKqZMaQmnmT1H',200000000);

#
# Structure for table "m_group"
#

DROP TABLE IF EXISTS `m_group`;
CREATE TABLE `m_group` (
  `Id` varchar(20) NOT NULL DEFAULT '',
  `nama_group` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_group"
#

INSERT INTO `m_group` VALUES ('auInysy5lEtjhHc7FjW1','Tidak Ada'),('miEOnf4cKqZMaQmnmT1H','MUTIARA GEMILANG PER1'),('QKHAFiaVQ3nVyI4xyL2p','IQBAL BAPAK'),('qXGE7ZL1mg1WNhZcCQ28','PT MAJU MUNDUR KENA'),('tkIykXwJXkgLCjcQgOrP','MUTIARA GEMILANG PERKASA'),('zJR1wFKzP9esE77RcQoj','nama group aja');

#
# Structure for table "pembayaran"
#

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `Id` varchar(20) NOT NULL DEFAULT '',
  `id_inv` varchar(20) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `diskon_pph` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT '0',
  `tgl_bayar` date DEFAULT NULL,
  `cara_bayar` varchar(20) DEFAULT NULL,
  `m_byr` varchar(20) DEFAULT NULL,
  `pph_wapu` int(11) DEFAULT NULL,
  `pph` int(11) DEFAULT NULL,
  `dibuat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pembayaran"
#

INSERT INTO `pembayaran` VALUES ('9wyFkCBuxyfLrwsePvtb','694tJOUmKJOC64dbWApP',300000,20000,362000,'2019-07-30','BCA','July/2019',20000,22000,'dyKpWx4jkrOiP85Q6bix'),('AEwPT9CanTbLVKrN5nfU','9DjonzyqrzbsVEnA6vSA',20000,0,20000,'2019-07-28','BCA','July/2019',0,0,'dyKpWx4jkrOiP85Q6bix'),('Cdr8TniKOovNhMcpLLDP','694tJOUmKJOC64dbWApP',49990,2000,58000,'2019-07-30','NIAGA','July/2019',4010,2000,'dyKpWx4jkrOiP85Q6bix'),('H9z87Fwf6dwJC3fnic4s','igT6GHOwJzjJYlUFhfVI',289000,90000,4009000,'2019-07-30','CEK','July/2019',700000,2930000,'dyKpWx4jkrOiP85Q6bix'),('JurAydAkQI7K2De5RnZO','9DjonzyqrzbsVEnA6vSA',20000,304000,404000,'2019-07-31','BCA','July/2019',20000,60000,'dyKpWx4jkrOiP85Q6bix'),('Vd6uPaloTqYfPeQVXEXA','9DjonzyqrzbsVEnA6vSA',400000,50000,790000,'2019-07-30','CEK BCA','July/2019',290000,50000,'dyKpWx4jkrOiP85Q6bix');

#
# Structure for table "profile"
#

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `Id_profil` varchar(20) NOT NULL DEFAULT '',
  `cust_id` varchar(20) DEFAULT NULL,
  `nama_customer` varchar(100) DEFAULT NULL,
  `group_cust` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `no_tlp` int(11) DEFAULT NULL,
  `termin` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "profile"
#

INSERT INTO `profile` VALUES ('3SL2YDiDW696GPmrOdEw','tes use2','tes usss','miEOnf4cKqZMaQmnmT1H','sasda',324234,20,'admin'),('CsrOQVPsAAePQH5soUHA','anisss','anis21','miEOnf4cKqZMaQmnmT1H','jalananan',92199,20,'admin'),('eoDftHZlZgAEPDbRYLc8','pua 02','pusaka anugrah','tkIykXwJXkgLCjcQgOrP','jakarta',1234567,30,'admin'),('gMbosJjDkFLesF2HqOTa','tes cust oke','cust tes aja oke','QKHAFiaVQ3nVyI4xyL2p','jauh aja oke',2199922,22,'admin'),('hNKjlOcYzV6PYmdiaYw9','pua 01','pusaka anugrah','qXGE7ZL1mg1WNhZcCQ28','jakarta',1234567,30,'admin'),('kC3DywRKRkUZAKTVOMoJ','sada','sads','QKHAFiaVQ3nVyI4xyL2p','saf',1312,22,'admin'),('LzPppCvjONlbeEgGpHAb','adasd','safsf','tkIykXwJXkgLCjcQgOrP','jalan',123124,20,'admin'),('OecJcjm1JbSZqQ5tvKbx','masni22','manis','tkIykXwJXkgLCjcQgOrP','jalan\r\n',2193,29,'admin');

#
# Structure for table "status"
#

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `Id_status` varchar(20) NOT NULL DEFAULT '',
  `nama_status` varchar(50) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `type_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "status"
#

INSERT INTO `status` VALUES ('17rymG2txgLCS7BCQ73a','Lunas','#f5ff7b',1),('9mscwveTGxBv7mQEuayx','Belum Dibayar','#e83d3e',1),('hmitYlemMrSkn4OrVfZ5','Sudah Dikirim','#00bb55',1),('JzR8Wh7oXFMEuILH6sJ4','Claim','#c9b239',2),('lCOTWMhxEVhGHh3w3vat','sewa','#00aabb',2),('mhrjHrZuruh2f1SFCyAP','No Limit','#04a614',1),('noaTKbW3gIZjkFfDH2sY','limit','#00aabb',1),('PyJz5grOcjnEr3AMCx62','Jual','#f59b6a',2),('qMuOTQ1AWt5Tq3RODGMG','Belum Dikirim','#00aabb',1),('VpD6KePysDOxgMd8u51j','Sudah Dibayar','#00aabb',1);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` varchar(20) NOT NULL DEFAULT '',
  `username` varchar(50) DEFAULT '',
  `password` varchar(50) DEFAULT '',
  `hak_level` varchar(50) DEFAULT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES ('87MPfXSReAdSgw5dIPJV','budi','1234','admin3','id0000000005'),('admin','admin','admin','admin','admin'),('C3bu1VEJCPLH5NTjRoeb','admin4','123','admin4','id0000000004'),('dyKpWx4jkrOiP85Q6bix','manis','123','admin2','id0000000004');

#
# Structure for table "user_sales"
#

DROP TABLE IF EXISTS `user_sales`;
CREATE TABLE `user_sales` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `nm_sales` varchar(100) DEFAULT NULL,
  `id_sales` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "user_sales"
#

INSERT INTO `user_sales` VALUES ('cKz5npSmt682aNgV8PZk','dhyan','ids0000000003'),('mXadUpmuCrRqB8vE8fZG','ABIE','ids0000000001'),('Ph3Vwr3yeM2xrCzuw6rD','sales','ids0000000005'),('Psbbj5hC8OIxNyAF1bOP','sales 3','ids0000000004'),('RxybLa2EsX1OSL48GbQa','coba aja sales','ids0000000006'),('YQ79evRtcMbXfEeLgUSs','sales 1','ids0000000002');
