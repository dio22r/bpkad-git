-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2017 at 11:08 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sekretariat_bpkad`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_arsip_surat_thumb`
--

CREATE TABLE IF NOT EXISTS `log_arsip_surat_thumb` (
  `las_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_id` int(11) NOT NULL,
  `las_status` tinyint(4) NOT NULL,
  `las_tgl_generate` datetime NOT NULL,
  PRIMARY KEY (`las_id`),
  KEY `as_id` (`as_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `log_arsip_surat_thumb`
--

INSERT INTO `log_arsip_surat_thumb` (`las_id`, `as_id`, `las_status`, `las_tgl_generate`) VALUES
(1, 12, 1, '2017-08-15 12:33:03'),
(2, 9, 1, '2017-08-15 12:41:10'),
(3, 8, 1, '2017-08-15 12:33:05'),
(4, 7, 1, '2017-08-15 12:33:06'),
(5, 6, 1, '2017-08-15 12:33:07'),
(6, 5, 1, '2017-08-15 12:33:08'),
(7, 4, 1, '2017-08-15 12:33:09'),
(12, 14, 1, '2017-08-23 09:22:57'),
(13, 13, 1, '2017-08-16 05:38:32'),
(14, 15, 1, '2017-09-08 04:20:45'),
(15, 16, 1, '2017-09-08 04:56:09'),
(16, 17, 1, '2017-09-22 05:56:14'),
(17, 18, 1, '2017-09-22 05:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip_surat`
--

CREATE TABLE IF NOT EXISTS `tbl_arsip_surat` (
  `as_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_dari` varchar(225) NOT NULL,
  `as_no_surat` varchar(255) NOT NULL,
  `as_tgl_surat` date NOT NULL,
  `as_tgl_diterima` date NOT NULL,
  `as_no_agenda` varchar(255) NOT NULL,
  `as_sifat` varchar(50) NOT NULL,
  `as_perihal` text NOT NULL,
  `as_diteruskan` varchar(255) NOT NULL,
  `as_ket` varchar(255) NOT NULL,
  `as_catatan` text NOT NULL,
  `as_file` text NOT NULL,
  `as_search_index` text NOT NULL,
  `as_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `as_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`as_id`),
  KEY `as_dari` (`as_dari`,`as_no_surat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_arsip_surat`
--

INSERT INTO `tbl_arsip_surat` (`as_id`, `as_dari`, `as_no_surat`, `as_tgl_surat`, `as_tgl_diterima`, `as_no_agenda`, `as_sifat`, `as_perihal`, `as_diteruskan`, `as_ket`, `as_catatan`, `as_file`, `as_search_index`, `as_datetime`, `as_status`) VALUES
(4, 'Bupati Minahasa', '102/ABC/MINSEL/VII - 2017', '2017-08-02', '2017-08-02', '102/ABC/MINSEL/VII - 2017', 'Sangat Segera', 'Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa', 'Sekretaris', 'Tanggapan dan Saran', 'Oke.', '/assets/img/sa-scan-file/20170810085319000000.jpg', '{"dari":"Bupati Minahasa","nomor surat":"102\\/ABC\\/MINSEL\\/VII - 2017","tanggal surat":"2017-08-02","1tanggal surat":"02 Agustus 2017","tanggal diterima":"2017-08-02","1tanggal diterima":"02 Agustus 2017","agenda":"102\\/ABC\\/MINSEL\\/VII - 2017","sifat":"Sangat Segera","perihal":"Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa","diteruskan":"Sekretaris","keterangan":"Tanggapan dan Saran","catatan":"Oke."}', '2017-09-08 11:05:22', 0),
(5, 'Bupati Minahasa', '102/ABC/MINSEL/VII - 2017', '2017-08-02', '2017-08-02', '102/ABC/MINSEL/VII - 2017', 'Sangat Segera', 'Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa', 'Sekretaris', 'Tanggapan dan Saran', 'Oke.', '/assets/img/sa-scan-file/20170810090040000000.jpg', '{"dari":"Bupati Minahasa","nomor surat":"102\\/ABC\\/MINSEL\\/VII - 2017","tanggal surat":"2017-08-02","1tanggal surat":"02 Agustus 2017","tanggal diterima":"2017-08-02","1tanggal diterima":"02 Agustus 2017","agenda":"102\\/ABC\\/MINSEL\\/VII - 2017","sifat":"Sangat Segera","perihal":"Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa","diteruskan":"Sekretaris","keterangan":"Tanggapan dan Saran","catatan":"Oke."}', '2017-09-08 11:05:22', 0),
(6, 'Bupati Minahasa', '102/ABC/MINSEL/VII - 2017', '2017-08-02', '2017-08-02', '102/ABC/MINSEL/VII - 2017', 'Sangat Segera', 'Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa', 'Sekretaris', 'Tanggapan dan Saran', 'Oke.', '/assets/img/sa-scan-file/20170810090134000000.jpg', '{"dari":"Bupati Minahasa","nomor surat":"102\\/ABC\\/MINSEL\\/VII - 2017","tanggal surat":"2017-08-02","1tanggal surat":"02 Agustus 2017","tanggal diterima":"2017-08-02","1tanggal diterima":"02 Agustus 2017","agenda":"102\\/ABC\\/MINSEL\\/VII - 2017","sifat":"Sangat Segera","perihal":"Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa","diteruskan":"Sekretaris","keterangan":"Tanggapan dan Saran","catatan":"Oke."}', '2017-09-08 11:05:22', 0),
(7, 'Bupati Minahasa', '102/ABC/MINSEL/VII - 2017', '2014-04-04', '2017-07-24', '102/ABC/MINSEL/VII - 2017', 'Rahasia', 'Perihal', 'Kabid Aset', 'Tanggapan dan Saran', 'Catatan', '/assets/img/sa-scan-file/20170810092051000000.jpg', '{"dari":"Bupati Minahasa","nomor surat":"102\\/ABC\\/MINSEL\\/VII - 2017","tanggal surat":"2014-04-04","1tanggal surat":"04 April 2014","tanggal diterima":"2017-07-24","1tanggal diterima":"24 Juli 2017","agenda":"102\\/ABC\\/MINSEL\\/VII - 2017","sifat":"Rahasia","perihal":"Perihal","diteruskan":"Kabid Aset","keterangan":"Tanggapan dan Saran","catatan":"Catatan"}', '2017-09-08 11:05:22', 0),
(8, 'Bupati Minahasa', '102/ABC/MINSEL/VII - 2017', '2014-04-04', '2017-07-24', '102/ABC/MINSEL/VII - 2017', 'Rahasia', 'Perihal', 'Kabid Aset', 'Tanggapan dan Saran', 'Catatan', '/assets/img/sa-scan-file/20170810092514000000.jpg', '{"dari":"Bupati Minahasa","nomor surat":"102\\/ABC\\/MINSEL\\/VII - 2017","tanggal surat":"2014-04-04","1tanggal surat":"04 April 2014","tanggal diterima":"2017-07-24","1tanggal diterima":"24 Juli 2017","agenda":"102\\/ABC\\/MINSEL\\/VII - 2017","sifat":"Rahasia","perihal":"Perihal","diteruskan":"Kabid Aset","keterangan":"Tanggapan dan Saran","catatan":"Catatan"}', '2017-09-08 11:05:22', 0),
(9, 'Dinas Pendidikan Edit', '102/DEC/2017/002/VII - 2007', '2017-08-13', '2017-08-15', '222/333/ABC/2039/2008', 'Sangat Segera', 'Pemberitahuan kunjungan siswa-siswi SMP ke BPKAD Minahasa Selatan', 'Sekretaris', 'Tanggapan dan Saran', 'Oke. lanjutkan', '/assets/img/sa-scan-file/20170815124105000000.jpg', '{"dari":"Dinas Pendidikan Edit","nomor surat":"102\\/DEC\\/2017\\/002\\/VII - 2007","tanggal surat":"2017-08-13","1tanggal surat":"13 Agustus 2017","tanggal diterima":"2017-08-15","1tanggal diterima":"15 Agustus 2017","agenda":"222\\/333\\/ABC\\/2039\\/2008","sifat":"Sangat Segera","perihal":"Pemberitahuan kunjungan siswa-siswi SMP ke BPKAD Minahasa Selatan","diteruskan":"Sekretaris","keterangan":"Tanggapan dan Saran","catatan":"Oke. lanjutkan"}', '2017-09-08 11:05:22', 0),
(12, 'Dinas Pendidikan test edit', '102/DEC/2017/002/VII - 2007', '2017-08-14', '2017-08-15', '222/333/ABC/2039/2009', 'Sangat Segera', 'Pemberitahuan kunjungan siswa-siswi SMP ke BPKAD Minahasa Selatan', 'Sekretaris', 'Lain-lain ...', 'Oke. lanjutkan', '/assets/img/sa-scan-file/20170815122415000000.jpg', '{"dari":"Dinas Pendidikan test edit","nomor surat":"102\\/DEC\\/2017\\/002\\/VII - 2007","tanggal surat":"2017-08-14","1tanggal surat":"14 Agustus 2017","tanggal diterima":"2017-08-15","1tanggal diterima":"15 Agustus 2017","agenda":"222\\/333\\/ABC\\/2039\\/2009","sifat":"Sangat Segera","perihal":"Pemberitahuan kunjungan siswa-siswi SMP ke BPKAD Minahasa Selatan","diteruskan":"Sekretaris","keterangan":"Lain-lain ...","catatan":"Oke. lanjutkan"}', '2017-09-08 11:05:22', 0),
(13, 'surat', '2165796431546', '2017-08-15', '2017-08-15', '56487131', 'Rahasia', 'Perihal surat', 'Sekretaris', 'Tanggapan dan Saran', 'catatan', '/assets/img/sa-scan-file/20170816053831000000.jpg', '{"dari":"surat","nomor surat":"2165796431546","tanggal surat":"2017-08-15","1tanggal surat":"15 Agustus 2017","tanggal diterima":"2017-08-15","1tanggal diterima":"15 Agustus 2017","agenda":"56487131","sifat":"Rahasia","perihal":"Perihal surat","diteruskan":"Sekretaris","keterangan":"Tanggapan dan Saran","catatan":"catatan"}', '2017-09-08 11:05:22', 0),
(14, 'surat suratan test edit', '2165796431546', '2017-08-15', '2017-08-16', '56487131', 'Rahasia', 'Perihal surat', 'Dio Ratar', 'Tanggapan dan Saran', 'catatan', '/assets/img/sa-scan-file/20170816053528000000.jpg', '{"dari":"surat suratan test edit","nomor surat":"2165796431546","tanggal surat":"2017-08-15","1tanggal surat":"15 Agustus 2017","tanggal diterima":"2017-08-16","1tanggal diterima":"16 Agustus 2017","agenda":"56487131","sifat":"Rahasia","perihal":"Perihal surat","diteruskan":"Dio Ratar","keterangan":"Tanggapan dan Saran","catatan":"catatan"}', '2017-09-08 11:05:22', 0),
(15, 'asdfasdf', 'asdfasdf', '2017-09-07', '2017-09-07', 'asfdasdf', 'Sangat Segera', 'asdfasdf', '["Kabid Anggaran","Kabid Aset"]', '["Tanggapan dan Saran","Proses lebih lanjut"]', '', '["\\/assets\\/img\\/sa-scan-file\\/20170907091951000000.jpg","\\/assets\\/img\\/sa-scan-file\\/201709070919510000001.jpg"]', '{"dari":"asdfasdf","nomor surat":"asdfasdf","tanggal surat":"2017-09-07","1tanggal surat":"07 September 2017","tanggal diterima":"2017-09-07","1tanggal diterima":"07 September 2017","agenda":"asfdasdf","sifat":"Sangat Segera","perihal":"asdfasdf","diteruskan":"[\\"Kabid Anggaran\\",\\"Kabid Aset\\"]","keterangan":"[\\"Tanggapan dan Saran\\",\\"Proses lebih lanjut\\"]","catatan":""}', '2017-09-08 11:05:22', 0),
(16, 'Sekretariat Daerah', '668/910/sekr-86.LAK/IX-2017', '2017-09-06', '2017-09-06', ' ', 'Sangat Segera', 'Pergeseran Anggran pada Sekretariat Derah Kab. Minahasa Selatan TA. 2017', '["Sekretaris","Kabid Anggaran"]', '["Tanggapan dan Saran","Proses lebih lanjut"]', '', '["\\/assets\\/img\\/sa-scan-file\\/20170908045607000000.jpg","\\/assets\\/img\\/sa-scan-file\\/201709080456070000001.jpg"]', '{"dari":"Sekretariat Daerah","nomor surat":"668\\/910\\/sekr-86.LAK\\/IX-2017","tanggal surat":"2017-09-06","1tanggal surat":"06 September 2017","tanggal diterima":"2017-09-06","1tanggal diterima":"06 September 2017","agenda":" ","sifat":"Sangat Segera","perihal":"Pergeseran Anggran pada Sekretariat Derah Kab. Minahasa Selatan TA. 2017","diteruskan":["Sekretaris","Kabid Anggaran"],"keterangan":["Tanggapan dan Saran","Proses lebih lanjut"],"catatan":""}', '2017-09-08 11:05:33', 1),
(17, 'Dinas Pariwisata', '900/089/DBPAR/IX-2017', '2017-09-19', '2017-09-19', '638/BPKAD/SM/IX-2017', 'Sangat Segera', 'Permohonan Persetujuan Tambahan Uang Kegiatan Festival Teluk Amurang', '["Sekretaris","Kabid Anggaran","Kabid Perbendaharan"]', '["Tanggapan dan Saran","Proses lebih lanjut"]', '', '["\\/assets\\/img\\/sa-scan-file\\/20170922051358000000.jpg"]', '{"dari":"Dinas Pariwisata","nomor surat":"900\\/089\\/DBPAR\\/IX-2017","tanggal surat":"2017-09-19","1tanggal surat":"19 September 2017","tanggal diterima":"2017-09-19","1tanggal diterima":"19 September 2017","agenda":"638\\/BPKAD\\/SM\\/IX-2017","sifat":"Sangat Segera","perihal":"Permohonan Persetujuan Tambahan Uang Kegiatan Festival Teluk Amurang","diteruskan":["Sekretaris","Kabid Anggaran","Kabid Perbendaharan"],"keterangan":["Tanggapan dan Saran","Proses lebih lanjut"],"catatan":""}', '2017-09-22 11:56:12', 1),
(18, 'PT. Minahasa Brantas Energi', '21/MBE-OPS/IX/2017', '2017-09-14', '2017-09-19', '639', 'Sangat Segera', 'Data Basic Price dan Unit Price Kab. Minahasa Selatan Prov. Sulawesi Utara', '["Sekretaris","Kabid Aset"]', '["Tanggapan dan Saran","Proses lebih lanjut"]', '', '["\\/assets\\/img\\/sa-scan-file\\/20170922055800000000.jpg"]', '{"dari":"PT. Minahasa Brantas Energi","nomor surat":"21\\/MBE-OPS\\/IX\\/2017","tanggal surat":"2017-09-14","1tanggal surat":"14 September 2017","tanggal diterima":"2017-09-19","1tanggal diterima":"19 September 2017","agenda":"639","sifat":"Sangat Segera","perihal":"Data Basic Price dan Unit Price Kab. Minahasa Selatan Prov. Sulawesi Utara","diteruskan":["Sekretaris","Kabid Aset"],"keterangan":["Tanggapan dan Saran","Proses lebih lanjut"],"catatan":""}', '2017-09-22 11:58:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asn`
--

CREATE TABLE IF NOT EXISTS `tbl_asn` (
  `ta_id` int(11) NOT NULL AUTO_INCREMENT,
  `ta_nip` varchar(50) NOT NULL,
  `ta_nama` varchar(100) NOT NULL,
  `ta_pangkat` varchar(50) NOT NULL,
  `ta_jabatan` varchar(255) NOT NULL,
  `tlj_id` int(11) NOT NULL,
  `ta_photo` varchar(255) NOT NULL,
  `ta_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`ta_id`),
  KEY `ta_nip` (`ta_nip`),
  KEY `ta_status` (`ta_status`),
  KEY `tlj_id` (`tlj_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `tbl_asn`
--

INSERT INTO `tbl_asn` (`ta_id`, `ta_nip`, `ta_nama`, `ta_pangkat`, `ta_jabatan`, `tlj_id`, `ta_photo`, `ta_status`) VALUES
(1, '19621126 199003 1 010', 'D. P. KAAWOAN, SE., M.Si', 'PEMBINA UTAMA MUDA', 'KEPALA BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 1, '/img/pasfoto/kaban.png', 1),
(2, '19791209 199810 1 001', 'MELKY, SSTP', 'PEMBINA', 'SEKRETARIS BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 2, '/img/pasfoto/sekretaris.png', 1),
(3, '19740119 199703 1 003', 'F. H. PANDEYNUWU,SE', 'PENATA TK. I', 'KEPALA BIDANG ASET BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, '', 0),
(4, '19720814 199903 1 008', 'BRAMMY PANDEY, SE, MSA', 'PENATA TK. I', 'KEPALA BIDANG ANGGARAN BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, '/img/pasfoto/04.png', 1),
(5, '19810613 200801 1 008', 'HENRY SIMBAR, SE', 'PENATA TK. I', 'KEPALA BIDANG AKUNTANSI BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, '/img/pasfoto/5.png', 1),
(6, '19820131 200903 2 001', 'ANGELITA L. MANTIRI, SE, Msi', 'PENATA TKT. I (III/d)', 'KEPALA BIDANG PERBENDAHARAAN BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, '/img/pasfoto/6.png', 1),
(7, '19730503 199503 2 007', 'MEISYE LOMBOGIA, SE', 'PENATA TK. I  (III/d)', 'KEPALA SUB. BAGIAN KEUANGAN', 4, '/img/pasfoto/7.png', 1),
(8, '19800912 201102 1 002', 'RONNY JUSUF KUMAJAS, SE', 'PENATA (III/c)', 'KEPALA SUB. BAGIAN UMUM BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 4, '/img/pasfoto/8.png', 1),
(9, '19601221 198003 2 002', 'ELISABETH  MAWEIKERE, BA', 'PENATA TKT I (III/d)', 'KASUBID PELAPORAN DAN PERENCANAAN ASET BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, '/img/pasfoto/9.png', 1),
(10, '19751223 200802 1 001', 'TEDY CHRISTIAN TUMURANG, SE', 'PENATA  (III/c)', 'KASUBID PENGAMANAN, PENYIMPANAN DAN MONITORING ASET', 5, '/img/pasfoto/10.png', 1),
(11, '19670809 200604 1 002', 'SALVATORE T.WEWENGKANG S.Sos', 'PENATA MUDA TK 1 (III/b)', 'KASUBID PENGAMANAN PENYIMPANAN DAN MONITORING ASET BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, '', 0),
(12, '19770616 200604 1 004', 'JOHEL WALANGITAN, SE', 'PENATA (III/c)', 'KASUBID PERENCANAAN PENYUSUNAN ANGGARAN PENELITIAN DPA DAN ANGGARAN KAS BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, '/img/pasfoto/12.png', 1),
(13, '19840106 200903 1 001', 'ERICK ADOLF LONTOKAN, SE', 'PENATA  (III/c)', ' KASUBID PENGENDALIAN DAN OTORISASI SPD', 5, '/img/pasfoto/13.png', 1),
(14, '19780924 201001 2 008', 'YOSEPHINE IMELDA MANDEI, SP', 'PENATA  (III/c)', 'KASUBID PEMBINAAN DAN PENGELOLAAN KEUANGAN DESA BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, '/img/pasfoto/14.png', 1),
(15, '19780220 200604 2 016', 'LEIDYA MANONGKO, SE', 'PENATA  (III/c)', 'KASUBID AKUNTANSI BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, '/img/pasfoto/15.png', 1),
(16, '19770221 200604 2 005', 'ISCHAAL LILIES BANGKI, SE', 'PENATA', 'KEPALA BIDANG ASET BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, '/img/pasfoto/16.png', 1),
(17, '19740512 200604 1 007', 'FENDIE Y. WERUPANGKEY, SE', 'PENATA  (III/c)', 'KASUBID PENERIMAAN, PENGELUARAN DAN PELAPORAN PADA BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, '/img/pasfoto/17.png', 1),
(18, '19740624 200604 1 008', 'ELFIS TUAR, SE', 'PENATA  (III/d)', 'KASUBID PENELITIAN DAN PENERBITAN SP2D BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, '/img/pasfoto/18.png', 1),
(19, '19630314 198304 2 007\r', 'SENY SIWU, SE\r', 'PEMBINA  (IV/a)\r', 'PELAKSANA\r', 6, '', 1),
(20, '19630719 199503 2 001\r', 'HIAN MARENTEK, SE\r', 'PENATA (III/c)\r', 'PELAKSANA\r', 6, '', 1),
(21, '19820930 200604 2 020\r', 'STEVI T. TUMBELAKA, SE\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, '', 1),
(22, '19810118 200803 1 010', 'AFAN SINGAL, SP', 'PENATA MUDA TK I (III/b)', 'PELAKSANA', 6, '', 1),
(23, '19840110 200903 1 001\r', 'JHON F. WUNGOW, SE\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, '', 1),
(24, '19840709 200903 2 004\r', 'REINY YULLY KAMAGI, SE\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, '', 1),
(25, '19820429 201001 2 004\r', 'JANSYE LELY TANGKERE, SE\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, '', 1),
(26, '19821027 201102 1 001', 'MORRIS D. R. KOJOH, S.Sos', 'PENATA MUDA TK 1 (III/b)', 'KASUBID PENILAIAN, PEMANFAATAN DAN PEMINDAHTANGANAN ASET', 5, '/img/pasfoto/26.png', 1),
(27, '19860302 201102 1 001', 'RONALD FERDINANDUS, SE.', 'PENATA MUDA TK 1 (III/b)', 'KASUBID PENYUSUNAN LAPORAN KEUANGAN PEMERINTAH DAERAH', 5, '/img/pasfoto/27.png', 1),
(28, '19860721 201102 1 001', 'CHRISTIAN KORENGKENG,S.Kom ', 'PENATA MUDA TK 1 (III/b)', 'KEPALA SUB. BAGIAN KEPEGAWAIAN', 4, '/img/pasfoto/28.png', 1),
(29, '19841226 200701 2 003', 'LIZA C. SONAMBELA, SE', 'PENATA MUDA TK 1 (III/b)', 'PELAKSANA\r', 6, '', 1),
(30, '19830919 200604 1 006\r', 'ROGGER J. R. REPI, SE\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, '', 1),
(31, '19880210 2007011 001\r', 'VEIBY MANDEY, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, '', 1),
(32, '19770812 200903 2 001\r', 'ANSYE ADELINA.SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, '', 1),
(33, '19860628 200903 1 001\r', 'INDRA S. MERENTEK, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, '', 1),
(34, '19820420 201411 2 001', 'CELLY MINTJE, SH', 'PENATA MUDA (III/a)', 'PELAKSANA\r', 6, '', 1),
(35, '19840531 201001 1 019\r', 'MARIO GEOVANI POLI, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, '', 1),
(36, '19860131 201102 1 001\r', 'JEREMMY J. J. DIMAN, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, '', 1),
(37, '19841101 201001 1 014\r', 'SHANDY ALLAN MAINDOKA, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, '', 1),
(38, '19850307 201408 1 001\r', 'MARIO F. REPI, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, '', 1),
(39, '19840515 201001 2 012\r', 'VIANE FLORA KUMAYAS, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, '', 1),
(40, '19791212 201408 1 002\r', 'BRAMY D. TUMANKEN, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, '', 1),
(41, '19820522 200604 2 012\r', 'MERRY G. L SUMANTI\r', 'PENGATUR (II/c)\r', 'PELAKSANA\r', 6, '', 1),
(42, '19830717 200701 2 003\r', 'HAIDY WAGEY\r', 'PENGATUR (II/c)\r', 'PELAKSANA\r', 6, '', 1),
(43, '19790909 201001 2 028\r', 'SISKE V. SARAJAR\r', 'PENGATUR MUDA TK. I  (II/b)\r', 'PELAKSANA\r', 6, '', 1),
(44, '19800510 201001 1 032\r', 'MELDY ANDREE\r', 'PENGATUR MUDA TK. I  (II/b)\r', 'PELAKSANA\r', 6, '', 1),
(45, '19740401 201408 2 001\r', 'ALCE R. M. SONDAKH, Ama\r', 'PENGATUR MUDA TK. I  (II/b)\r', 'PELAKSANA\r', 6, '', 1),
(46, '19790701 201001 1 016\r', 'JUSTREE Y. TOAR\r', 'PENGATUR MUDA (II/a)\r', 'PELAKSANA\r', 6, '', 1),
(47, '19820730 201001 1 022\r', 'YANTY STEVEN Y. LUMI\r', 'PENGATUR MUDA (II/a)\r', 'PELAKSANA\r', 6, '', 1),
(48, '19650727 201408 2 001\r', 'JENNY M. POLI\r', 'PENGATUR MUDA (II/a)\r', 'PELAKSANA\r', 6, '', 1),
(49, '19840415 201411 2 001\r', 'IVANE F. WONGKAR\r', 'PENGATUR MUDA (II/a)\r', 'PELAKSANA\r', 6, '', 1),
(50, '-', 'ENJELITA V. KALALO, SE', '-', 'Operator Dana Desa', 6, '', 1),
(52, '19770221 200604 2 005', 'ISCHAAL LILIES BANGKI, SE', 'PENATA  (III/c)', 'KASUBID PENYUSUNAN LAPORAN KEUANGAN PEMERINTAH DAERAH', 5, '', 0),
(53, '19860302 201102 1 001', 'RONALD FERDINANDUS, SE.', 'PENATA MUDA TK 1 (III/b)', 'PELAKSANA', 6, '', 0),
(54, '19860721 201102 1 001', 'CHRISTIAN KORENGKENG,S.Kom ', 'PENATA MUDA TK 1 (III/b)', 'PELAKSANA', 6, '', 0),
(55, '19581023 198103 1 012', 'Drs. DANNY H. RINDENGAN, M.Si', 'PEMBINA UTAMA MADYA, IV/d', 'SEKRETARIS DAERAH', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asn_jabatan`
--

CREATE TABLE IF NOT EXISTS `tbl_asn_jabatan` (
  `taj_id` int(11) NOT NULL AUTO_INCREMENT,
  `taj_nama` varchar(255) NOT NULL,
  `taj_level` int(11) NOT NULL,
  `taj_biaya` varchar(2) NOT NULL,
  `taj_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`taj_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_asn_jabatan`
--

INSERT INTO `tbl_asn_jabatan` (`taj_id`, `taj_nama`, `taj_level`, `taj_biaya`, `taj_status`) VALUES
(1, 'KEPALA BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 1, 'B', 1),
(2, 'SEKRETARIS BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 2, 'C', 1),
(3, 'KEPALA BIDANG ASET BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, 'C', 1),
(4, 'KEPALA BIDANG ANGGARAN BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, 'C', 1),
(5, 'KEPALA BIDANG AKUNTANSI BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, 'C', 1),
(6, 'KEPALA BIDANG PERBENDAHARAAN BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, 'C', 1),
(7, 'KEPALA SUB. BAGIAN KEUANGAN BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 4, 'D', 1),
(8, 'KEPALA SUB. BAGIAN UMUM BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 4, 'D', 1),
(9, 'KEPALA SUB. BAGIAN KEPEGAWAIAN BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 4, 'D', 1),
(10, 'KASUBID PELAPORAN DAN PERENCANAAN ASET BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 'D', 1),
(11, 'KASUBID PENGAMANAN, PENYIMPANAN DAN MONITORING ASET', 5, 'D', 1),
(12, 'KASUBID PENILAIAN, PEMANFAATAN DAN PEMINDAHTANGANAN ASET', 5, 'D', 1),
(13, 'KASUBID PERENCANAAN PENYUSUNAN ANGGARAN PENELITIAN DPA DAN ANGGARAN KAS BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 'D', 1),
(14, 'KASUBID PENGENDALIAN DAN OTORISASI SPD BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 'D', 1),
(15, 'KASUBID PEMBINAAN DAN PENGELOLAAN KEUANGAN DESA BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 'D', 1),
(16, 'KASUBID AKUNTANSI BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 'D', 1),
(17, 'KASUBID PENERIMAAN BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 'D', 1),
(18, 'KASUBID PENELITIAN DAN PENERBITAN SP2D BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 'D', 1),
(19, 'KASUBID PENYUSUNAN LAPORAN KEUANGAN PEMERINTAH DAERAH', 5, 'D', 1),
(20, 'PELAKSANA', 6, 'D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asn_jabatan_trans`
--

CREATE TABLE IF NOT EXISTS `tbl_asn_jabatan_trans` (
  `tajt_id` int(11) NOT NULL AUTO_INCREMENT,
  `ta_id` int(11) NOT NULL,
  `taj_id` int(11) NOT NULL,
  `tajt_date_start` date NOT NULL,
  `tajt_date_end` date NOT NULL,
  `tajt_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tajt_id`),
  KEY `ta_id` (`ta_id`,`taj_id`),
  KEY `taj_id` (`taj_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `tbl_asn_jabatan_trans`
--

INSERT INTO `tbl_asn_jabatan_trans` (`tajt_id`, `ta_id`, `taj_id`, `tajt_date_start`, `tajt_date_end`, `tajt_status`) VALUES
(1, 1, 1, '0000-00-00', '0000-00-00', 1),
(2, 2, 2, '0000-00-00', '0000-00-00', 1),
(3, 4, 4, '0000-00-00', '0000-00-00', 1),
(4, 5, 5, '0000-00-00', '0000-00-00', 1),
(5, 6, 6, '0000-00-00', '0000-00-00', 1),
(6, 8, 8, '0000-00-00', '0000-00-00', 1),
(7, 9, 10, '0000-00-00', '0000-00-00', 1),
(8, 10, 11, '0000-00-00', '0000-00-00', 1),
(9, 12, 13, '0000-00-00', '0000-00-00', 1),
(10, 14, 15, '0000-00-00', '0000-00-00', 1),
(11, 15, 16, '0000-00-00', '0000-00-00', 1),
(12, 16, 3, '0000-00-00', '0000-00-00', 1),
(13, 17, 17, '0000-00-00', '0000-00-00', 1),
(14, 18, 18, '0000-00-00', '0000-00-00', 1),
(15, 22, 20, '0000-00-00', '0000-00-00', 1),
(16, 26, 12, '0000-00-00', '0000-00-00', 1),
(17, 27, 19, '0000-00-00', '0000-00-00', 1),
(18, 28, 9, '0000-00-00', '0000-00-00', 1),
(19, 7, 7, '0000-00-00', '0000-00-00', 1),
(20, 13, 14, '0000-00-00', '0000-00-00', 1),
(21, 19, 20, '0000-00-00', '0000-00-00', 1),
(22, 20, 20, '0000-00-00', '0000-00-00', 1),
(23, 21, 20, '0000-00-00', '0000-00-00', 1),
(24, 22, 20, '0000-00-00', '0000-00-00', 1),
(25, 23, 20, '0000-00-00', '0000-00-00', 1),
(26, 24, 20, '0000-00-00', '0000-00-00', 1),
(27, 25, 20, '0000-00-00', '0000-00-00', 1),
(28, 29, 20, '0000-00-00', '0000-00-00', 1),
(29, 30, 20, '0000-00-00', '0000-00-00', 1),
(30, 31, 20, '0000-00-00', '0000-00-00', 1),
(31, 32, 20, '0000-00-00', '0000-00-00', 1),
(32, 33, 20, '0000-00-00', '0000-00-00', 1),
(33, 34, 20, '0000-00-00', '0000-00-00', 1),
(34, 35, 20, '0000-00-00', '0000-00-00', 1),
(35, 36, 20, '0000-00-00', '0000-00-00', 1),
(36, 37, 20, '0000-00-00', '0000-00-00', 1),
(37, 38, 20, '0000-00-00', '0000-00-00', 1),
(38, 39, 20, '0000-00-00', '0000-00-00', 1),
(39, 40, 20, '0000-00-00', '0000-00-00', 1),
(40, 41, 20, '0000-00-00', '0000-00-00', 1),
(41, 42, 20, '0000-00-00', '0000-00-00', 1),
(42, 43, 20, '0000-00-00', '0000-00-00', 1),
(43, 44, 20, '0000-00-00', '0000-00-00', 1),
(44, 45, 20, '0000-00-00', '0000-00-00', 1),
(45, 46, 20, '0000-00-00', '0000-00-00', 1),
(46, 47, 20, '0000-00-00', '0000-00-00', 1),
(47, 48, 20, '0000-00-00', '0000-00-00', 1),
(48, 49, 20, '0000-00-00', '0000-00-00', 1),
(49, 53, 20, '0000-00-00', '0000-00-00', 1),
(50, 54, 20, '0000-00-00', '0000-00-00', 1),
(51, 50, 20, '0000-00-00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asn_pangkat`
--

CREATE TABLE IF NOT EXISTS `tbl_asn_pangkat` (
  `tap_id` int(11) NOT NULL AUTO_INCREMENT,
  `tap_jenis_pangkat` varchar(255) NOT NULL,
  `tap_golongan` varchar(5) NOT NULL,
  `tap_ruang` varchar(1) NOT NULL,
  `tap_gabungan` varchar(255) NOT NULL,
  `tap_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tap_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_asn_pangkat`
--

INSERT INTO `tbl_asn_pangkat` (`tap_id`, `tap_jenis_pangkat`, `tap_golongan`, `tap_ruang`, `tap_gabungan`, `tap_status`) VALUES
(1, 'Pembina Utama', 'IV', 'e', '', 1),
(2, 'Pembina Utama Madya', 'IV', 'd', '', 1),
(3, 'Pembina Utama Muda', 'IV', 'c', '', 1),
(4, 'Pembina Tingkat I', 'IV', 'b', '', 1),
(5, 'Pembina', 'IV', 'a', '', 1),
(6, 'Penata Tingkat I', 'III', 'd', '', 1),
(7, 'Penata', 'III', 'c', '', 1),
(8, 'Penata Muda Tingkat I', 'III', 'b', '', 1),
(9, 'Penata Muda', 'III', 'a', '', 1),
(10, 'Pengatur Tingkat I', 'II', 'd', '', 1),
(11, 'Pengatur', 'II', 'c', '', 1),
(12, 'Pengatur Muda Tingkat I', 'II', 'b', '', 1),
(13, 'Pengatur Muda', 'II', 'a', '', 1),
(14, 'Juru Tingkat I', 'I', 'd', '', 1),
(15, 'Juru', 'I', 'c', '', 1),
(16, 'Juru Muda Tingkat I', 'I', 'b', '', 1),
(17, 'Juru Muda', 'I', 'a', '', 1),
(18, 'Operator/Tenaga Kontrak', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asn_pangkat_trans`
--

CREATE TABLE IF NOT EXISTS `tbl_asn_pangkat_trans` (
  `tapt_id` int(11) NOT NULL AUTO_INCREMENT,
  `ta_id` int(11) NOT NULL,
  `tap_id` int(11) NOT NULL,
  `tapt_date_start` date NOT NULL,
  `tapt_date_end` date NOT NULL,
  `tapt_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tapt_id`),
  KEY `ta_id` (`ta_id`,`tap_id`),
  KEY `tap_id` (`tap_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tbl_asn_pangkat_trans`
--

INSERT INTO `tbl_asn_pangkat_trans` (`tapt_id`, `ta_id`, `tap_id`, `tapt_date_start`, `tapt_date_end`, `tapt_status`) VALUES
(1, 1, 3, '2017-01-01', '0000-00-00', 1),
(2, 2, 5, '2017-01-01', '0000-00-00', 1),
(3, 4, 6, '2017-01-01', '0000-00-00', 1),
(4, 5, 6, '0000-00-00', '0000-00-00', 1),
(5, 6, 6, '0000-00-00', '0000-00-00', 1),
(6, 7, 6, '0000-00-00', '0000-00-00', 1),
(7, 8, 7, '0000-00-00', '0000-00-00', 1),
(8, 9, 6, '0000-00-00', '0000-00-00', 1),
(9, 10, 7, '0000-00-00', '0000-00-00', 1),
(10, 12, 7, '0000-00-00', '0000-00-00', 1),
(11, 13, 7, '0000-00-00', '0000-00-00', 1),
(12, 14, 7, '0000-00-00', '0000-00-00', 1),
(13, 15, 7, '0000-00-00', '0000-00-00', 1),
(14, 16, 7, '0000-00-00', '0000-00-00', 1),
(15, 17, 7, '0000-00-00', '0000-00-00', 1),
(16, 18, 6, '0000-00-00', '0000-00-00', 1),
(17, 19, 5, '0000-00-00', '0000-00-00', 1),
(18, 20, 7, '0000-00-00', '0000-00-00', 1),
(19, 21, 8, '0000-00-00', '0000-00-00', 1),
(20, 22, 8, '0000-00-00', '0000-00-00', 1),
(21, 23, 8, '0000-00-00', '0000-00-00', 1),
(22, 24, 8, '0000-00-00', '0000-00-00', 1),
(23, 25, 8, '0000-00-00', '0000-00-00', 1),
(24, 26, 8, '0000-00-00', '0000-00-00', 1),
(25, 27, 8, '0000-00-00', '0000-00-00', 1),
(26, 28, 8, '0000-00-00', '0000-00-00', 1),
(27, 29, 8, '0000-00-00', '0000-00-00', 1),
(28, 30, 8, '0000-00-00', '0000-00-00', 1),
(29, 31, 9, '0000-00-00', '0000-00-00', 1),
(30, 32, 9, '0000-00-00', '0000-00-00', 1),
(31, 33, 9, '0000-00-00', '0000-00-00', 1),
(32, 34, 9, '0000-00-00', '0000-00-00', 1),
(33, 35, 9, '0000-00-00', '0000-00-00', 1),
(34, 36, 9, '0000-00-00', '0000-00-00', 1),
(35, 37, 9, '0000-00-00', '0000-00-00', 1),
(36, 38, 9, '0000-00-00', '0000-00-00', 1),
(37, 39, 9, '0000-00-00', '0000-00-00', 1),
(38, 40, 9, '0000-00-00', '0000-00-00', 1),
(39, 41, 11, '0000-00-00', '0000-00-00', 1),
(40, 42, 11, '0000-00-00', '0000-00-00', 1),
(41, 43, 12, '0000-00-00', '0000-00-00', 1),
(42, 44, 12, '0000-00-00', '0000-00-00', 1),
(43, 45, 12, '0000-00-00', '0000-00-00', 1),
(44, 46, 13, '0000-00-00', '0000-00-00', 1),
(45, 47, 13, '0000-00-00', '0000-00-00', 1),
(46, 48, 13, '0000-00-00', '0000-00-00', 1),
(47, 49, 13, '0000-00-00', '0000-00-00', 1),
(48, 50, 18, '0000-00-00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_jabatan`
--

CREATE TABLE IF NOT EXISTS `tbl_list_jabatan` (
  `tlj_id` int(11) NOT NULL AUTO_INCREMENT,
  `tlj_nama` varchar(30) NOT NULL,
  `tlj_level` int(11) NOT NULL,
  `tlj_biaya` varchar(1) NOT NULL,
  `tlj_status` tinyint(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tlj_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_list_jabatan`
--

INSERT INTO `tbl_list_jabatan` (`tlj_id`, `tlj_nama`, `tlj_level`, `tlj_biaya`, `tlj_status`) VALUES
(1, 'KEPALA', 1, 'B', 1),
(2, 'SEKRETARIS', 2, 'C', 1),
(3, 'KEPALA BIDANG', 3, 'C', 1),
(4, 'KEPALA SUB BAGIAN', 4, 'D', 1),
(5, 'KEPALA SUB BIDANG', 5, 'D', 1),
(6, 'PELAKSANA', 6, 'D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spd`
--

CREATE TABLE IF NOT EXISTS `tbl_spd` (
  `tspd_id` int(11) NOT NULL AUTO_INCREMENT,
  `tspt_id` int(11) NOT NULL,
  `tspd_nomor` varchar(100) NOT NULL,
  `ta_id` int(11) NOT NULL,
  `tspd_status` tinyint(4) NOT NULL DEFAULT '1',
  `tspd_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tspd_id`),
  KEY `tspt_id` (`tspt_id`,`ta_id`),
  KEY `ta_id` (`ta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=204 ;

--
-- Dumping data for table `tbl_spd`
--

INSERT INTO `tbl_spd` (`tspd_id`, `tspt_id`, `tspd_nomor`, `ta_id`, `tspd_status`, `tspd_datetime`) VALUES
(1, 1, '', 14, 1, '2017-08-24 14:19:11'),
(2, 1, '', 30, 1, '2017-08-24 14:19:11'),
(3, 1, '', 3, 1, '2017-08-24 14:19:56'),
(4, 1, '', 36, 1, '2017-08-24 14:19:56'),
(5, 7, '', 8, 1, '2017-08-25 13:37:22'),
(6, 7, '', 36, 1, '2017-08-25 13:37:22'),
(7, 7, '', 45, 1, '2017-08-25 13:37:22'),
(8, 8, '', 8, 1, '2017-08-25 13:43:50'),
(9, 8, '', 42, 1, '2017-08-25 13:43:50'),
(10, 8, '', 41, 1, '2017-08-25 13:43:50'),
(11, 8, '', 38, 1, '2017-08-25 13:43:50'),
(12, 8, '', 45, 1, '2017-08-25 13:43:50'),
(13, 9, '', 8, 1, '2017-08-25 13:44:12'),
(14, 9, '', 42, 1, '2017-08-25 13:44:12'),
(15, 9, '', 41, 1, '2017-08-25 13:44:12'),
(16, 9, '', 38, 1, '2017-08-25 13:44:12'),
(17, 9, '', 45, 1, '2017-08-25 13:44:12'),
(18, 10, '', 8, 1, '2017-08-25 13:44:33'),
(19, 10, '', 42, 1, '2017-08-25 13:44:33'),
(20, 10, '', 41, 1, '2017-08-25 13:44:33'),
(21, 10, '', 38, 1, '2017-08-25 13:44:33'),
(22, 10, '', 45, 1, '2017-08-25 13:44:33'),
(23, 11, '', 15, 1, '2017-08-28 17:30:11'),
(24, 11, '', 16, 1, '2017-08-28 17:30:11'),
(25, 11, '', 39, 1, '2017-08-28 17:30:11'),
(26, 12, '', 15, 1, '2017-08-28 17:39:28'),
(27, 12, '', 16, 1, '2017-08-28 17:39:28'),
(28, 12, '', 39, 1, '2017-08-28 17:39:28'),
(29, 12, '', 23, 1, '2017-08-28 17:39:28'),
(30, 13, '', 14, 1, '2017-08-29 10:55:46'),
(31, 13, '', 17, 1, '2017-08-29 10:55:46'),
(32, 13, '', 36, 1, '2017-08-29 10:55:46'),
(37, 16, '', 6, 1, '2017-08-29 11:33:56'),
(38, 17, '', 5, 1, '2017-08-30 10:11:58'),
(39, 17, '', 15, 1, '2017-08-30 10:11:58'),
(40, 17, '', 16, 1, '2017-08-30 10:11:58'),
(41, 17, '', 23, 1, '2017-08-30 10:11:58'),
(42, 17, '', 39, 1, '2017-08-30 10:11:58'),
(43, 18, '', 6, 1, '2017-09-04 13:51:07'),
(44, 18, '', 17, 1, '2017-09-04 13:51:07'),
(45, 19, '', 5, 1, '2017-09-07 10:12:35'),
(46, 19, '', 15, 1, '2017-09-07 10:12:35'),
(47, 19, '', 41, 1, '2017-09-07 10:12:35'),
(48, 19, '', 38, 1, '2017-09-07 10:12:35'),
(49, 19, '', 39, 1, '2017-09-07 10:12:35'),
(50, 20, '', 5, 1, '2017-09-07 10:26:07'),
(51, 20, '', 15, 1, '2017-09-07 10:26:07'),
(52, 20, '', 27, 1, '2017-09-07 10:26:07'),
(53, 20, '', 39, 1, '2017-09-07 10:26:07'),
(54, 21, '', 17, 1, '2017-09-11 14:22:08'),
(55, 21, '', 27, 1, '2017-09-11 14:22:08'),
(56, 21, '', 18, 1, '2017-09-11 14:22:08'),
(57, 22, '', 17, 1, '2017-09-11 14:24:22'),
(58, 22, '', 27, 1, '2017-09-11 14:24:22'),
(59, 22, '', 18, 1, '2017-09-11 14:24:22'),
(60, 23, '', 17, 1, '2017-09-11 14:24:30'),
(61, 23, '', 27, 1, '2017-09-11 14:24:30'),
(62, 23, '', 18, 1, '2017-09-11 14:24:30'),
(63, 24, '', 16, 1, '2017-09-13 09:44:40'),
(64, 24, '', 26, 1, '2017-09-13 09:44:40'),
(65, 24, '', 35, 1, '2017-09-13 09:44:40'),
(66, 24, '', 37, 1, '2017-09-13 09:44:40'),
(67, 24, '', 44, 1, '2017-09-13 09:44:40'),
(68, 25, '', 16, 1, '2017-09-13 10:21:42'),
(69, 25, '', 26, 1, '2017-09-13 10:21:42'),
(70, 25, '', 35, 1, '2017-09-13 10:21:42'),
(71, 26, '', 37, 1, '2017-09-13 10:30:15'),
(72, 26, '', 34, 1, '2017-09-13 10:30:15'),
(73, 26, '', 44, 1, '2017-09-13 10:30:15'),
(74, 27, '', 15, 1, '2017-09-13 10:43:52'),
(75, 27, '', 39, 1, '2017-09-13 10:43:52'),
(76, 27, '', 41, 1, '2017-09-13 10:43:52'),
(77, 27, '', 27, 1, '2017-09-13 10:57:17'),
(78, 28, '', 15, 1, '2017-09-13 19:56:22'),
(79, 29, '', 15, 1, '2017-09-13 20:03:56'),
(80, 30, '', 7, 1, '2017-09-14 11:49:17'),
(81, 31, '', 17, 1, '2017-10-02 08:00:51'),
(82, 31, '', 50, 1, '2017-10-02 08:00:51'),
(83, 32, '', 2, 1, '2017-10-03 08:33:47'),
(84, 32, '', 6, 1, '2017-10-03 08:33:47'),
(85, 32, '', 14, 1, '2017-10-03 08:33:47'),
(86, 32, '', 54, 1, '2017-10-03 08:33:47'),
(87, 33, '', 16, 1, '2017-10-03 09:56:21'),
(88, 33, '', 10, 1, '2017-10-03 09:56:21'),
(89, 33, '', 26, 1, '2017-10-03 09:56:21'),
(90, 33, '', 37, 1, '2017-10-03 09:56:21'),
(91, 33, '', 44, 1, '2017-10-03 09:56:21'),
(92, 34, '', 16, 1, '2017-10-03 10:25:16'),
(93, 34, '', 10, 1, '2017-10-03 10:25:16'),
(94, 34, '', 26, 1, '2017-10-03 10:25:16'),
(95, 34, '', 37, 1, '2017-10-03 10:25:16'),
(96, 34, '', 44, 1, '2017-10-03 10:25:16'),
(97, 35, '', 16, 1, '2017-10-03 10:42:11'),
(98, 35, '', 10, 1, '2017-10-03 10:42:11'),
(99, 35, '', 37, 1, '2017-10-03 10:42:11'),
(100, 35, '', 44, 1, '2017-10-03 10:42:11'),
(101, 36, '', 26, 1, '2017-10-03 11:20:56'),
(102, 36, '', 42, 1, '2017-10-03 11:20:56'),
(103, 37, '', 5, 1, '2017-10-03 15:46:59'),
(104, 37, '', 52, 1, '2017-10-03 15:46:59'),
(105, 37, '', 15, 1, '2017-10-03 15:46:59'),
(106, 37, '', 23, 1, '2017-10-03 15:46:59'),
(107, 37, '', 53, 1, '2017-10-03 15:46:59'),
(108, 37, '', 39, 1, '2017-10-03 15:46:59'),
(109, 37, '', 41, 1, '2017-10-03 15:46:59'),
(110, 37, '', 38, 1, '2017-10-03 15:46:59'),
(111, 38, '', 2, 1, '2017-10-10 09:53:15'),
(112, 38, '', 18, 1, '2017-10-10 09:53:15'),
(113, 38, '', 22, 1, '2017-10-10 09:53:15'),
(114, 38, '', 32, 1, '2017-10-10 15:41:15'),
(115, 39, '', 16, 1, '2017-10-12 17:11:13'),
(116, 39, '', 10, 1, '2017-10-12 17:11:13'),
(117, 39, '', 26, 1, '2017-10-12 17:11:13'),
(118, 39, '', 44, 1, '2017-10-12 17:11:13'),
(119, 39, '', 37, 1, '2017-10-12 17:11:13'),
(120, 40, '', 16, 1, '2017-10-17 13:37:11'),
(121, 40, '', 42, 1, '2017-10-17 13:37:11'),
(122, 41, '', 29, 1, '2017-10-18 18:23:21'),
(123, 41, '', 25, 1, '2017-10-18 18:23:21'),
(124, 42, '', 27, 1, '2017-10-19 11:18:06'),
(125, 42, '', 44, 1, '2017-10-19 11:18:06'),
(126, 43, '', 5, 1, '2017-10-19 12:13:31'),
(127, 44, '', 5, 1, '2017-10-19 15:46:48'),
(128, 45, '', 6, 1, '2017-10-20 12:20:01'),
(129, 46, '', 6, 1, '2017-10-23 15:59:28'),
(130, 46, '', 17, 1, '2017-10-23 15:59:28'),
(131, 41, '', 24, 1, '2017-10-25 16:09:02'),
(132, 47, '', 38, 1, '2017-10-26 11:08:30'),
(133, 48, '', 2, 1, '2017-10-27 13:27:09'),
(134, 48, '', 26, 1, '2017-10-27 13:27:09'),
(135, 48, '', 17, 1, '2017-10-27 13:27:09'),
(136, 49, '', 15, 1, '2017-10-31 09:37:00'),
(137, 49, '', 27, 1, '2017-10-31 09:37:00'),
(138, 49, '', 39, 1, '2017-10-31 09:37:00'),
(139, 49, '', 41, 1, '2017-10-31 09:37:00'),
(140, 50, '', 10, 1, '2017-10-31 14:14:53'),
(141, 50, '', 44, 1, '2017-10-31 14:14:53'),
(142, 51, '', 22, 1, '2017-11-01 11:10:28'),
(143, 52, '', 10, 1, '2017-11-01 14:04:36'),
(144, 53, '', 6, 1, '2017-11-01 14:08:32'),
(145, 53, '', 10, 1, '2017-11-01 14:08:32'),
(146, 53, '', 23, 1, '2017-11-01 14:08:32'),
(147, 54, '', 13, 1, '2017-11-01 16:39:53'),
(148, 55, '', 8, 1, '2017-11-02 15:31:19'),
(149, 55, '', 28, 1, '2017-11-02 15:31:19'),
(150, 55, '', 27, 1, '2017-11-02 15:31:19'),
(151, 56, '', 6, 1, '2017-11-03 11:54:07'),
(152, 56, '', 42, 1, '2017-11-03 11:54:07'),
(153, 57, '', 25, 1, '2017-11-03 11:58:32'),
(154, 57, '', 45, 1, '2017-11-03 11:58:32'),
(155, 58, '', 22, 1, '2017-11-07 08:33:29'),
(156, 59, '', 2, 1, '2017-11-07 16:02:33'),
(157, 60, '', 2, 1, '2017-11-07 17:20:50'),
(158, 60, '', 8, 1, '2017-11-07 17:20:50'),
(159, 60, '', 31, 1, '2017-11-07 17:20:50'),
(160, 60, '', 36, 1, '2017-11-07 17:20:50'),
(161, 60, '', 44, 1, '2017-11-07 18:03:10'),
(162, 61, '', 4, 1, '2017-11-08 11:22:31'),
(163, 61, '', 13, 1, '2017-11-08 11:22:31'),
(164, 61, '', 14, 1, '2017-11-08 11:22:31'),
(165, 61, '', 30, 1, '2017-11-08 11:22:31'),
(166, 62, '', 2, 1, '2017-11-14 08:15:51'),
(167, 62, '', 6, 1, '2017-11-14 08:15:51'),
(168, 63, '', 20, 1, '2017-11-14 10:05:05'),
(169, 63, '', 32, 1, '2017-11-14 10:05:05'),
(170, 63, '', 48, 1, '2017-11-14 10:05:05'),
(171, 62, '', 17, 1, '2017-11-14 14:45:22'),
(172, 62, '', 8, 1, '2017-11-14 14:45:22'),
(173, 64, '', 16, 1, '2017-11-14 16:38:19'),
(174, 64, '', 44, 1, '2017-11-14 16:38:19'),
(175, 64, '', 45, 1, '2017-11-14 16:38:19'),
(176, 64, '', 37, 1, '2017-11-14 16:38:19'),
(177, 65, '', 36, 1, '2017-11-14 17:03:43'),
(178, 65, '', 31, 1, '2017-11-14 17:03:43'),
(179, 66, '', 28, 1, '2017-11-14 18:08:03'),
(180, 66, '', 27, 1, '2017-11-14 18:08:03'),
(181, 67, '', 18, 1, '2017-11-15 08:16:03'),
(182, 68, '', 38, 1, '2017-11-16 08:25:17'),
(183, 69, '', 15, 1, '2017-11-16 10:16:35'),
(184, 69, '', 39, 1, '2017-11-16 10:16:35'),
(185, 69, '', 24, 1, '2017-11-16 10:18:06'),
(186, 70, '', 1, 1, '2017-11-16 14:39:19'),
(187, 71, '', 2, 1, '2017-11-20 12:57:32'),
(188, 71, '', 7, 1, '2017-11-20 12:57:32'),
(189, 71, '', 36, 1, '2017-11-20 12:57:32'),
(190, 72, '', 29, 1, '2017-11-20 17:08:18'),
(191, 72, '', 49, 1, '2017-11-20 17:08:18'),
(192, 73, '', 16, 1, '2017-11-20 18:44:13'),
(193, 73, '', 26, 1, '2017-11-20 18:44:13'),
(194, 73, '', 37, 1, '2017-11-20 18:44:13'),
(195, 74, '', 10, 1, '2017-11-20 18:47:57'),
(196, 74, '', 44, 1, '2017-11-20 18:47:57'),
(197, 75, '', 1, 1, '2017-11-24 10:34:22'),
(198, 76, '', 29, 1, '2017-11-27 12:41:46'),
(199, 76, '', 49, 1, '2017-11-27 12:41:46'),
(200, 77, '', 6, 1, '2017-11-27 14:02:24'),
(201, 77, '', 18, 1, '2017-11-27 14:02:24'),
(202, 77, '', 17, 1, '2017-11-27 14:02:24'),
(203, 77, '', 8, 1, '2017-11-27 14:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spt`
--

CREATE TABLE IF NOT EXISTS `tbl_spt` (
  `tspt_id` int(11) NOT NULL AUTO_INCREMENT,
  `tspt_nomor` varchar(100) NOT NULL,
  `tspt_tanggal` date NOT NULL,
  `tspt_jmlh_hari` int(11) NOT NULL,
  `tspt_tgl_berangkat` date NOT NULL,
  `tspt_tgl_kembali` date NOT NULL,
  `tspt_maksud` text NOT NULL,
  `tspt_tujuan` varchar(255) NOT NULL,
  `tspt_tpt_berangkat` varchar(100) NOT NULL,
  `tspt_pengesahan_spt` int(11) NOT NULL,
  `tspt_pengesahan_spd` int(11) NOT NULL,
  `tspt_tgl_spd` date NOT NULL,
  `tspt_jenis` int(11) NOT NULL,
  `tspt_pengesahan_lbr3` int(11) NOT NULL,
  `tspt_transport` varchar(50) NOT NULL,
  `tspt_jumlah_orang` int(11) NOT NULL,
  `tspt_pptk` int(11) NOT NULL,
  `tspt_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tspt_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`tspt_id`),
  KEY `tspt_pengesahan_spd` (`tspt_pengesahan_spd`),
  KEY `tspt_pengesahan_spt` (`tspt_pengesahan_spt`),
  KEY `tspt_pptk` (`tspt_pptk`),
  KEY `tspt_pengesahan_lbr3` (`tspt_pengesahan_lbr3`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `tbl_spt`
--

INSERT INTO `tbl_spt` (`tspt_id`, `tspt_nomor`, `tspt_tanggal`, `tspt_jmlh_hari`, `tspt_tgl_berangkat`, `tspt_tgl_kembali`, `tspt_maksud`, `tspt_tujuan`, `tspt_tpt_berangkat`, `tspt_pengesahan_spt`, `tspt_pengesahan_spd`, `tspt_tgl_spd`, `tspt_jenis`, `tspt_pengesahan_lbr3`, `tspt_transport`, `tspt_jumlah_orang`, `tspt_pptk`, `tspt_datetime`, `tspt_status`) VALUES
(1, '15/BPKAD/ST/VIII/2017', '2017-08-21', 1, '2017-08-22', '2017-08-22', 'Monitoring dan Evaluasi Penggunaan Dana Desa', 'Kecamatan Maesaan', 'Amurang', 6, 3, '2017-08-21', 1, 1, 'Darat', 4, 1, '2017-08-24 14:17:18', 0),
(7, '', '2017-08-25', 5, '2017-08-28', '2017-09-01', 'Studi banding penggunaan Sistem Informasi di BPKAD tingkat kabupaten', 'Kabupaten Banyuwangi, Provinsi Jawa Timur', 'Amurang', 1, 2, '2017-08-25', 1, 2, 'Darat, Udara', 3, 1, '2017-08-25 13:37:22', 0),
(8, '', '2017-08-25', 5, '2017-08-28', '2017-09-01', 'Bertugas untuk sosialisasi penggunaan sistem informasi kabupaten disetiap kecamatan minahasa selatan', 'Kecamatan Motoling', 'Amurang', 1, 2, '2017-09-01', 1, 2, 'Darat', 5, 2, '2017-08-25 13:43:50', 0),
(9, '', '2017-08-25', 5, '2017-08-28', '2017-09-01', 'Bertugas untuk sosialisasi penggunaan sistem informasi kabupaten disetiap kecamatan minahasa selatan', 'Kecamatan Motoling', 'Amurang', 1, 2, '2017-09-01', 1, 2, 'Darat', 5, 2, '2017-08-25 13:44:11', 0),
(10, '', '2017-08-25', 5, '2017-08-28', '2017-09-01', 'Bertugas untuk sosialisasi penggunaan sistem informasi kabupaten disetiap kecamatan minahasa selatan', 'Kecamatan Motoling', 'Amurang', 1, 2, '2017-09-01', 1, 2, 'Darat', 5, 2, '2017-08-25 13:44:33', 0),
(11, '242/BPKAD/ST/VIII/2017', '2017-08-25', 1, '2017-08-25', '2017-08-25', 'Penyampaian Ranperda pertanggung jawaban APBD TA. 2016', 'BPKBMD Propinsi SULUT', 'Amurang', 2, 2, '2017-08-25', 1, 2, 'Darat', 3, 5, '2017-08-28 17:30:11', 1),
(12, '472/BPKAD/ST/VIII/2017', '2017-08-29', 1, '2017-08-29', '2017-08-29', 'Penyampaian Ranperda pertanggung jawaban APBD TA. 2016 dan laporan semester pertama TA. 2017', 'BPKBMD Propinsi SULUT', 'Amurang', 2, 2, '2017-08-29', 1, 2, 'Darat', 4, 5, '2017-08-28 17:39:28', 1),
(13, '', '2017-08-29', 1, '2017-08-29', '2017-08-29', 'Monitoring dan Evaluasi Penggunaan Dana Desa', 'Kec.Tumpaan Dan Kec.Tatapaan', 'Amurang', 1, 2, '2017-08-29', 1, 2, 'Darat', 3, 4, '2017-08-29 10:55:46', 1),
(16, '', '2017-08-29', 1, '2017-08-29', '2017-08-29', 'test', 'test', 'Amurang', 1, 2, '2017-08-29', 1, 2, 'Darat', 1, 6, '2017-08-29 11:33:56', 0),
(17, '415/BPKAD/ST/VIII/2017', '2017-08-18', 1, '2017-08-21', '2017-08-21', 'Penyampaian Ranperda dan Ranperbup Tentang Pertanggungjawaban Pelaksanaan APBD TA. 2016', 'BPKBMD Provinsi Sulawesi Utara di Manado', 'Amurang', 2, 2, '2017-08-18', 1, 2, 'Darat', 5, 5, '2017-08-30 10:11:58', 1),
(18, '', '2017-09-04', 4, '2017-09-05', '2017-09-08', 'Mengikuti kegiatan rekonsiliasi tunjangan guru melalui DAK non fisik T.A 2016/2017 dan evaluasi penyaluran tahun sebelumnya.', 'Grand Clarion Hotel, Jln. A.P. Pettarani No. 3, Makasar, Sulawesi Selatan', 'Amurang', 1, 2, '2017-09-04', 1, 2, 'Darat, Udara', 2, 6, '2017-09-04 13:51:07', 1),
(19, '', '2017-09-06', 1, '2017-09-06', '2017-09-06', 'Konsultasi Hasil Evaluasi Laporan RANPERDA dan RANPERBUP Tentang Pertanggung jawaban APBD TA. 2016', 'BPKBMD Propinsi Sulawesi Utara', 'Amurang', 1, 1, '2017-09-06', 1, 2, 'Darat', 5, 5, '2017-09-07 10:12:35', 1),
(20, '', '2017-09-08', 1, '2017-09-08', '2017-09-08', 'Konsultasi Hasil Evaluasi Laporan RANPERDA dan RANPERBUP Tentang Pertanggung jawaban APBD TA. 2016', 'BPKBMD Propinsi Sulawesi Utara', 'Amurang', 1, 1, '2017-09-08', 1, 2, 'Darat', 4, 5, '2017-09-07 10:26:07', 1),
(21, '', '2017-09-11', 2, '2017-09-13', '2017-09-15', 'Maksud', 'Tujuan', 'Amurang', 1, 2, '2017-09-12', 0, 2, 'Darat, Udara', 3, 6, '2017-09-11 14:22:08', 0),
(22, '', '2017-09-11', 2, '2017-09-13', '2017-09-15', 'Maksud', 'Tujuan', 'Amurang', 1, 2, '2017-09-12', 0, 2, 'Darat, Udara', 3, 6, '2017-09-11 14:24:22', 0),
(23, '', '2017-09-11', 2, '2017-09-13', '2017-09-15', 'Maksud', 'Tujuan', 'Amurang', 1, 2, '2017-09-12', 0, 2, 'Darat, Udara', 3, 6, '2017-09-11 14:24:30', 0),
(24, '', '2017-09-13', 3, '2017-09-18', '2017-09-20', '(1) Konsultasi Pemanfaatan Aset dan Mekanisme Sewa untuk Bank Sulut sesuai dengan Permendagri no. 19 tahun 2016\r\n(2) Konsultasi SIMBDA BMD', '(1) Kementrian Dalam Negeri RI\r\n(2) Kantor BPKP RI', 'Amurang', 1, 2, '2017-09-13', 0, 2, 'Darat', 5, 16, '2017-09-13 09:44:40', 0),
(25, '', '2017-09-13', 3, '2017-09-18', '2017-09-20', 'Konsultasi Pemanfaatan Aset dan Mekanisme Sewa untuk Bank SULUT Sesuai Dengn Permendagri no. 19 Tahun 2016', 'Kementrian Dalam Negeri RI', 'Amurang', 1, 2, '2017-09-13', 0, 2, 'Darat, Udara', 3, 16, '2017-09-13 10:21:42', 1),
(26, '', '2017-09-13', 3, '2017-09-18', '2017-09-20', 'Konsultasi SIMDA BMD', 'Kantor BPKP RI', 'Amurang', 1, 2, '2017-09-13', 0, 2, 'Darat, Udara', 3, 16, '2017-09-13 10:30:15', 1),
(27, '', '2017-09-13', 1, '2017-09-14', '2017-09-14', 'Rapat Evaluasi Pelaksanaan Pelaporan Tahap B06 dan Sosilisasi Tahap B09 Aksi PPK Pemda Tahun 2017', 'Bappeda Prov. Sulut', 'Amurang', 1, 2, '2017-09-13', 0, 2, 'Darat', 3, 5, '2017-09-13 10:43:52', 1),
(28, '', '2017-09-13', 3, '2017-09-14', '2017-09-16', 'Membawa Laporan Sertifikasi Guru dan Konsultasi DAK non-fisik di Kementrian Keuangan dan Kementrian Dalam Negeri RI', 'Jakarta', 'Amurang', 1, 1, '2017-09-13', 0, 1, 'Darat, Udara', 1, 5, '2017-09-13 19:56:22', 1),
(29, '', '2017-09-13', 3, '2017-09-17', '2017-09-19', 'Mengikuti Bimtek dan Rekonsiliasi Data Anggaran TKDD Sem. 1 TA 2017, Kementrian Keuangan', 'Jakarta', 'Amurang', 1, 1, '2017-09-13', 0, 1, 'Darat, Udara', 1, 5, '2017-09-13 20:03:56', 1),
(30, '', '2017-09-14', 1, '2017-09-15', '2017-09-08', 'Maksud edit', 'Tujuan', 'Amurang', 1, 2, '2017-09-14', 0, 2, 'Darat, Laut, Udara, Luar angkasa', 1, 2, '2017-09-14 11:49:17', 0),
(31, '', '2017-10-02', 1, '2017-10-02', '2017-10-02', 'Rapat Koordinasi Penyaluran Dana Desa Tahun 2017', 'Mini TLC KPPN Manado', 'Amurang', 1, 2, '2017-10-02', 0, 2, 'Darat', 2, 6, '2017-10-02 08:00:51', 1),
(32, '', '2017-03-17', 16, '2017-03-20', '2017-04-04', 'Penyusunan Laporan Keuangan', 'PROVINSI SULAWESI UTARA', 'Amurang', 1, 2, '2017-03-17', 0, 2, 'Darat', 4, 2, '2017-10-03 08:33:47', 1),
(33, '', '2017-10-03', 1, '2017-10-04', '2017-10-04', 'Konsultasi SIMDA BMD', 'BPKP Perwakilan Sulawesi Utara', 'Amurang', 1, 2, '2017-10-03', 0, 2, 'Darat', 5, 16, '2017-10-03 09:56:21', 0),
(34, '', '2017-10-03', 1, '2017-10-04', '2017-10-04', 'Konsultasi Laporan Keuangan', 'BPK RI Perwakilan Sulawesi Utara', 'Amurang', 1, 2, '2017-10-03', 0, 2, 'Darat', 5, 16, '2017-10-03 10:25:16', 0),
(35, '', '2017-10-03', 1, '2017-10-04', '2017-10-04', '- Konsultasi Laporan Keuangan\r\n- Konsultasi SIMDA BMD', '- BPK RI Perwakilan Sulawesi Utara\r\n- BPKP Perwakilan Sulawesi Utara', 'Amurang', 1, 2, '2017-10-03', 0, 2, 'Darat', 4, 16, '2017-10-03 10:42:10', 1),
(36, '', '2017-10-03', 1, '2017-10-04', '2017-10-04', 'Konsultasi Penilaian', 'KPKNL, Manado', 'Amurang', 1, 2, '2017-10-03', 0, 2, 'Darat', 2, 16, '2017-10-03 11:20:56', 1),
(37, '', '2017-03-19', 16, '2017-03-20', '2017-04-04', 'Penyusunan Laporan Keuangan', 'Provinsi Sulawesi Utara', 'Amurang', 1, 2, '2017-03-19', 0, 2, 'Darat', 8, 2, '2017-10-03 15:46:59', 1),
(38, '492/BPKAD/ST/X/2017', '2017-10-10', 3, '2017-10-11', '2017-10-13', 'Mengikuti Evaluasi SIMGAJI', 'Bandung', 'Amurang', 1, 2, '2017-10-10', 0, 2, 'Darat, Udara', 3, 6, '2017-10-10 09:53:15', 1),
(39, '', '2017-10-13', 1, '2017-10-16', '2017-10-16', 'Mengikuti Rekonsiliasi Data Hasil Inventarisasi Aset Daerah Akibat Peralihan Urusan dan Kewenangan Pemerintah Daerah', 'Manado', 'Amurang', 1, 2, '2017-10-13', 0, 2, 'Darat', 5, 16, '2017-10-12 17:11:13', 1),
(40, '', '2017-10-17', 3, '2017-10-18', '2017-10-20', 'Bimbingan Teknis Barang Milik Daerah Terkait Investasi', 'Hotel Mercure Convention Center Ancol, Jakarta', 'Amurang', 1, 2, '2017-10-17', 0, 2, 'Darat, Udara', 2, 16, '2017-10-17 13:37:11', 1),
(41, '433/BPKAD/ST/IX/2017', '2017-09-05', 3, '2017-09-06', '2017-09-08', 'Konsultasi mengenai pengelolaan keuangan dan aset di Dinas Pendapatan, Pengelolaan Keuangan dan Aset Provinsi Daerah Istimewa Yogyakarta.', 'Dinas Pendapatan, Pengelolaan Keuangan dan Aset Provinsi Daerah Istimewa Yogyakarta', 'Amurang', 2, 2, '2017-09-06', 0, 2, 'Darat, Udara', 2, 8, '2017-10-18 18:23:21', 1),
(42, '', '2017-10-19', 1, '2017-10-20', '2017-10-20', 'Mengikuti Kegiatan Workshop Pengelolaan Sistem Informasi Keuangan dan Barang Milik Daerah', 'Hotel Aryaduta, Manado', 'Amurang', 2, 2, '2017-10-19', 0, 2, 'Darat', 2, 16, '2017-10-19 11:18:06', 1),
(43, '', '2017-10-19', 1, '2017-10-19', '2017-10-19', 'Test', 'Test', 'Amurang', 2, 2, '2017-10-19', 0, 2, 'darat', 1, 8, '2017-10-19 12:13:31', 0),
(44, '', '2017-10-19', 1, '2017-10-20', '2017-10-20', 'Mengikuti Kegiatan Workshop Pengelolaan Sistem Informasi Keuangan dan Barang Milik Daerah', 'Hotel Aryaduta, Manado', 'Amurang', 2, 2, '2017-10-19', 0, 2, 'Darat', 1, 5, '2017-10-19 15:46:48', 1),
(45, '', '2017-10-20', 1, '2017-10-23', '2017-10-23', '- Membawa LKT bulan Juli s/d. September 2017\r\n- Membawa Laporan Bagi Hasil', '- KPPN\r\n- BP2RD', 'Amurang', 1, 2, '2017-10-20', 0, 2, 'Darat', 1, 6, '2017-10-20 12:20:01', 1),
(46, '', '2017-10-23', 1, '2017-10-24', '2017-10-24', 'Mengikuti Rapat Koordinasi Tentang Optimalisasi Penerimaan Negara di Akhir Tahun Anggaran 2017', 'Aula KPPN Manado', 'Amurang', 1, 2, '2017-10-23', 0, 2, 'Darat', 2, 6, '2017-10-23 15:59:28', 1),
(47, '', '2017-10-26', 1, '2017-10-26', '2017-10-26', 'Konsultasi Bantuan Keuangan Kabupaten Kepada Provinsi', 'Badan Pengelola Keuangan dan Aset Daerah Provinsi Sulawesi Utara', 'Amurang', 1, 2, '2017-10-26', 0, 2, 'Darat', 1, 5, '2017-10-26 11:08:29', 1),
(48, '', '2017-10-28', 1, '2017-10-28', '2017-10-28', 'Maksud', 'Tujuan', 'amurang', 1, 1, '2017-10-28', 0, 1, 'darat', 3, 2, '2017-10-27 13:27:08', 0),
(49, '', '2017-10-31', 4, '2017-11-01', '2017-11-04', '- Penyampaian Peraturan Daerah dan Peraturan Bupati Tentang Pertanggungjawaban Laporan Keuangan T.A. 2016\r\n- Mengikuti BIMTEKSistem Dan Informasi Pengelolaan Keuangan Daerah Tahun 2017\r\n- Mengikuti kegiatan Verifikasi dan BIMTEK Data Realisasi APBD TA 2017', '- Kementerian Dalam Negeri, Jakarta\r\n- Kementerian Keuangan (DJPK), Jakarta', 'Amurang', 2, 2, '2017-10-31', 0, 2, 'Darat, Udara', 4, 5, '2017-10-31 09:37:00', 1),
(50, '', '2017-10-31', 1, '2017-11-02', '2017-11-02', 'Mengikuti Bimbingan Teknis Pengelolaan Keuangan Daerah Bidang Non Perpajakan', 'Hotel Four Points Manado', 'Amurang', 2, 2, '2017-10-31', 0, 2, 'Darat', 2, 16, '2017-10-31 14:14:53', 1),
(51, '', '2017-11-01', 1, '2017-11-02', '2017-11-02', 'Mengikuti Rapat Koordinasi Pengamanan Penerimaan Pajak di Akhir Tahun', 'Aula KPP Pratam Kotamobagu', 'Amurang', 2, 2, '2017-11-01', 0, 2, 'Darat', 1, 6, '2017-11-01 11:10:28', 1),
(52, '', '2017-11-01', 1, '2017-11-02', '2017-11-02', 'Bimbingan Teknis Pengelolaan Keuangan Daerah Bidang Non-Perpajakan', 'Manado', 'Amurang', 2, 2, '2017-11-01', 0, 2, 'Darat', 1, 16, '2017-11-01 14:04:36', 1),
(53, '', '2017-11-01', 1, '2017-11-02', '2017-11-02', 'Bimbingan Teknis Pengelolaan Keuangan Daerah Bidang Non-Perpajakan', 'Manado', 'Amurang', 2, 2, '2017-11-01', 0, 2, 'Darat', 3, 8, '2017-11-01 14:08:31', 1),
(54, '', '2017-11-01', 1, '2017-11-02', '2017-11-02', 'Bimbingan Teknis Pengelolaan Keuangan Daerah Bidang Non-Perpajakan', 'Manado', 'Amurang', 2, 2, '2017-11-01', 0, 2, 'Darat', 1, 8, '2017-11-01 16:39:53', 1),
(55, '', '2017-11-02', 1, '2017-11-03', '2017-11-03', 'maksud', 'tujuan', 'Amurang', 2, 2, '2017-11-02', 0, 0, 'Darat', 3, 0, '2017-11-02 15:31:18', 0),
(56, '', '2017-11-03', 3, '2017-11-06', '2017-11-08', 'Konsultasi DAK Pendidikan', 'Direktorat Jendral Perbendaharaan, Jakarta', 'Amurang', 1, 2, '2017-11-03', 0, 2, 'Darat, Udara', 2, 6, '2017-11-03 11:54:07', 1),
(57, '', '2017-11-03', 3, '2017-11-06', '2017-11-08', 'Membawa Laporan BOK', 'Kementrian Keuangn, Jakarta', 'Amurang', 1, 2, '2017-11-03', 0, 2, 'Darat, Udara', 2, 6, '2017-11-03 11:58:32', 1),
(58, '', '2017-11-07', 1, '2017-11-07', '2017-11-07', 'Rekonsiliasi Data Iuran IWP Bulan November 2017', 'TASPEN MANADO', 'Amurang', 1, 2, '2017-11-07', 0, 2, 'Darat', 1, 6, '2017-11-07 08:33:29', 1),
(59, '', '0000-00-00', 3, '2017-11-09', '2017-11-11', 'Konsultasi Dana Sertifikasi Guru TW. IV', 'Kementrian Keuangan RI, Jakarta', 'Amurang', 1, 1, '2017-11-07', 0, 2, 'Darat, Udara', 1, 8, '2017-11-07 16:02:33', 1),
(60, '', '0000-00-00', 3, '2017-11-09', '2017-11-11', 'Konsultasi Aplikasi Simda BMD 2.0.7.9', 'BPKP Pusat, Jakarta', 'Amurang', 1, 2, '0000-00-00', 0, 2, 'Darat, Udara', 4, 2, '2017-11-07 17:20:50', 1),
(61, '', '2017-11-10', 3, '2017-11-12', '2017-11-14', 'Penyusunan Laporan Keuangan', 'Jakarta', 'Amurang', 2, 2, '2017-11-10', 0, 2, 'Darat, Udara', 4, 4, '2017-11-08 11:22:31', 1),
(62, '', '0000-00-00', 3, '2017-11-15', '2017-11-17', 'Konsultasi penyaluran dana tunjangan profesi guru T.A. 2017', 'Kementrian Pendidikan dan Kementrian Keuangan, Jakarta', 'Amurang', 1, 2, '0000-00-00', 0, 2, 'Darat, Udara', 4, 8, '2017-11-14 08:15:51', 1),
(63, '', '2017-11-14', 1, '2017-11-14', '2017-11-14', 'Mengecek dana bagi hasil provinsi Sulawesi Utara', 'Manado', 'Amurang', 1, 2, '2017-11-14', 0, 2, 'Darat', 3, 8, '2017-11-14 10:05:05', 1),
(64, '', '2017-11-14', 3, '2017-11-16', '2017-11-18', 'Konsultasi Aplikasi Simda BMD 2.0.7.9', 'Jakarta', 'Amurang', 1, 2, '2017-11-14', 0, 2, 'Darat Udara', 4, 16, '2017-11-14 16:38:19', 1),
(65, '', '0000-00-00', 3, '2017-11-15', '2017-11-17', 'Membawa Surat Setoran Bukan Pajak (SSBP) dari bulan Mei s/d September 2017 dan Rekonsiliasi Data Iuran Taperum-PNS, di Bapertarum-PNS', 'Jakarta', 'Amurang', 1, 2, '0000-00-00', 0, 2, 'Darat, Udara', 2, 8, '2017-11-14 17:03:43', 1),
(66, '', '2017-11-15', 1, '2017-11-16', '2017-11-16', 'Koordinasi ', 'Manado', 'Amurang', 2, 2, '2017-11-15', 0, 2, 'Darat', 2, 5, '2017-11-14 18:08:03', 1),
(67, '', '2017-11-15', 1, '2017-11-16', '2017-11-16', 'Mengikuti Seminar Hukum Keuangan Negara', 'Manado', 'Amurang', 1, 2, '2017-11-15', 0, 2, 'Darat', 1, 6, '2017-11-15 08:16:03', 1),
(68, '', '2017-11-16', 1, '2017-11-17', '2017-11-17', 'Membawa Laporan Bantuan Keuangan Kabupaten kepada Provinsi', 'BPKAD Prov. SULUT di Manado', 'Amurang', 1, 1, '2017-11-16', 0, 1, 'Darat', 1, 5, '2017-11-16 08:25:17', 1),
(69, '', '2017-11-16', 1, '2017-11-16', '2017-11-16', 'Untuk Membawa Berita Acara Penerimaan Dokumen Evaluasi Ranperda dan Ranperbup pertanggung jawaban pelaksanaan APBD TA. 2016', 'BPKAD Provinsi Sulawesi Utara, Manado', 'Amurang', 1, 1, '2017-11-16', 0, 1, 'Darat', 2, 5, '2017-11-16 10:16:35', 1),
(70, '', '0000-00-00', 1, '2017-11-16', '2017-11-16', 'Maksud Test', 'Tujuan Test', 'Amurang', 1, 1, '0000-00-00', 0, 1, 'Darat', 1, 8, '2017-11-16 14:39:18', 1),
(71, '', '0000-00-00', 0, '0000-00-00', '0000-00-00', 'Rapat Pembahasan RKA T.A. 2018 BPKAD', 'Amurang Barat', 'Amurang', 1, 2, '0000-00-00', 0, 2, 'Darat', 3, 8, '2017-11-20 12:57:32', 1),
(72, '', '2017-11-20', 1, '2017-11-21', '2017-11-21', 'Rekonsiliasi Penyaluran DBH per 15 November 2017', 'Manado', 'Amurang', 1, 2, '2017-11-20', 0, 2, 'Darat', 2, 6, '2017-11-20 17:08:18', 1),
(73, '', '2017-11-20', 1, '2017-11-21', '2017-11-21', 'Konsultasi Penyerahan Aset ke Provinsi', 'Manado', 'Amurang', 1, 2, '2017-11-20', 0, 2, 'Darat', 3, 16, '2017-11-20 18:44:13', 1),
(74, '', '2017-11-20', 1, '2017-11-21', '2017-11-21', 'Konsultasi SIMDA BMD', 'BPKP Perwakilan Provinsi, Manado', 'Amurang', 1, 2, '2017-11-20', 0, 2, 'Darat', 2, 16, '2017-11-20 18:47:57', 1),
(75, '', '0000-00-00', 1, '2017-11-24', '2017-11-24', 'Pendampingan Penyusunan Laporan Keuangan', 'Badan Pengelola Keuangan dan Aset Daerah Provinsi Sulawesi Utara', 'Amurang', 1, 1, '0000-00-00', 0, 2, 'Darat', 1, 1, '2017-11-24 10:34:22', 1),
(76, '', '0000-00-00', 3, '2017-11-28', '2017-11-30', '- Workshop Penyusunan Rancangan Peraturan Kepala Daerah mengenai Tata Cara Penghitungan Pembagian dan Penetapan Rincian Dana Desa TA. 2018,\r\n- Membawa SPJ pengembalian sisa lebih dana Bantuan Operasional Sekolah TA. 2011', '- Hotel Redtop, Jalan Pecenongan No. 72 Jakarta Pusat\r\n- Kementrian Keuangan, Jakarta', 'Amurang', 1, 2, '0000-00-00', 0, 2, 'Darat, Udara', 2, 6, '2017-11-27 12:41:46', 1),
(77, '', '0000-00-00', 1, '2017-11-28', '2017-11-28', 'Mengikuti Forum komunikasi dan kerjasama antara unit pengelola pendapatan', 'Kantor Dinas Kesehatan Kabupaten Bolaang Mongondow Utara', 'Amurang', 1, 2, '0000-00-00', 0, 2, 'Darat', 3, 6, '2017-11-27 14:02:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_username` varchar(50) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_display_name` varchar(50) NOT NULL,
  `u_previlage` tinyint(4) NOT NULL,
  `u_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_username`, `u_password`, `u_display_name`, `u_previlage`, `u_status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_asn_jabatan_trans`
--
ALTER TABLE `tbl_asn_jabatan_trans`
  ADD CONSTRAINT `tbl_asn_jabatan_trans_ibfk_1` FOREIGN KEY (`ta_id`) REFERENCES `tbl_asn` (`ta_id`),
  ADD CONSTRAINT `tbl_asn_jabatan_trans_ibfk_2` FOREIGN KEY (`taj_id`) REFERENCES `tbl_asn_jabatan` (`taj_id`);

--
-- Constraints for table `tbl_asn_pangkat_trans`
--
ALTER TABLE `tbl_asn_pangkat_trans`
  ADD CONSTRAINT `tbl_asn_pangkat_trans_ibfk_1` FOREIGN KEY (`ta_id`) REFERENCES `tbl_asn` (`ta_id`),
  ADD CONSTRAINT `tbl_asn_pangkat_trans_ibfk_2` FOREIGN KEY (`tap_id`) REFERENCES `tbl_asn_pangkat` (`tap_id`);

--
-- Constraints for table `tbl_spd`
--
ALTER TABLE `tbl_spd`
  ADD CONSTRAINT `tbl_spd_ibfk_1` FOREIGN KEY (`tspt_id`) REFERENCES `tbl_spt` (`tspt_id`),
  ADD CONSTRAINT `tbl_spd_ibfk_2` FOREIGN KEY (`ta_id`) REFERENCES `tbl_asn` (`ta_id`);
