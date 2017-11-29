-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2017 at 02:37 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
(13, 13, 1, '2017-08-16 05:38:32');

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
  `as_sifat` varchar(30) NOT NULL,
  `as_perihal` text NOT NULL,
  `as_diteruskan` varchar(50) NOT NULL,
  `as_ket` varchar(50) NOT NULL,
  `as_catatan` text NOT NULL,
  `as_file` text NOT NULL,
  `as_search_index` text NOT NULL,
  `as_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `as_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`as_id`),
  KEY `as_dari` (`as_dari`,`as_no_surat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_arsip_surat`
--

INSERT INTO `tbl_arsip_surat` (`as_id`, `as_dari`, `as_no_surat`, `as_tgl_surat`, `as_tgl_diterima`, `as_no_agenda`, `as_sifat`, `as_perihal`, `as_diteruskan`, `as_ket`, `as_catatan`, `as_file`, `as_search_index`, `as_datetime`, `as_status`) VALUES
(4, 'Bupati Minahasa', '102/ABC/MINSEL/VII - 2017', '2017-08-02', '2017-08-02', '102/ABC/MINSEL/VII - 2017', 'Sangat Segera', 'Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa', 'Sekretaris', 'Tanggapan dan Saran', 'Oke.', '/assets/img/sa-scan-file/20170810085319000000.jpg', '{"dari":"Bupati Minahasa","nomor surat":"102\\/ABC\\/MINSEL\\/VII - 2017","tanggal surat":"2017-08-02","1tanggal surat":"02 Agustus 2017","tanggal diterima":"2017-08-02","1tanggal diterima":"02 Agustus 2017","agenda":"102\\/ABC\\/MINSEL\\/VII - 2017","sifat":"Sangat Segera","perihal":"Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa","diteruskan":"Sekretaris","keterangan":"Tanggapan dan Saran","catatan":"Oke."}', '2017-08-21 17:01:06', 1),
(5, 'Bupati Minahasa', '102/ABC/MINSEL/VII - 2017', '2017-08-02', '2017-08-02', '102/ABC/MINSEL/VII - 2017', 'Sangat Segera', 'Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa', 'Sekretaris', 'Tanggapan dan Saran', 'Oke.', '/assets/img/sa-scan-file/20170810090040000000.jpg', '{"dari":"Bupati Minahasa","nomor surat":"102\\/ABC\\/MINSEL\\/VII - 2017","tanggal surat":"2017-08-02","1tanggal surat":"02 Agustus 2017","tanggal diterima":"2017-08-02","1tanggal diterima":"02 Agustus 2017","agenda":"102\\/ABC\\/MINSEL\\/VII - 2017","sifat":"Sangat Segera","perihal":"Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa","diteruskan":"Sekretaris","keterangan":"Tanggapan dan Saran","catatan":"Oke."}', '2017-08-21 17:01:06', 1),
(6, 'Bupati Minahasa', '102/ABC/MINSEL/VII - 2017', '2017-08-02', '2017-08-02', '102/ABC/MINSEL/VII - 2017', 'Sangat Segera', 'Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa', 'Sekretaris', 'Tanggapan dan Saran', 'Oke.', '/assets/img/sa-scan-file/20170810090134000000.jpg', '{"dari":"Bupati Minahasa","nomor surat":"102\\/ABC\\/MINSEL\\/VII - 2017","tanggal surat":"2017-08-02","1tanggal surat":"02 Agustus 2017","tanggal diterima":"2017-08-02","1tanggal diterima":"02 Agustus 2017","agenda":"102\\/ABC\\/MINSEL\\/VII - 2017","sifat":"Sangat Segera","perihal":"Perihal pemberitahuan kegiatan yang akan diadakan di Kantor bupati minahasa","diteruskan":"Sekretaris","keterangan":"Tanggapan dan Saran","catatan":"Oke."}', '2017-08-21 17:01:06', 1),
(7, 'Bupati Minahasa', '102/ABC/MINSEL/VII - 2017', '2014-04-04', '2017-07-24', '102/ABC/MINSEL/VII - 2017', 'Rahasia', 'Perihal', 'Kabid Aset', 'Tanggapan dan Saran', 'Catatan', '/assets/img/sa-scan-file/20170810092051000000.jpg', '{"dari":"Bupati Minahasa","nomor surat":"102\\/ABC\\/MINSEL\\/VII - 2017","tanggal surat":"2014-04-04","1tanggal surat":"04 April 2014","tanggal diterima":"2017-07-24","1tanggal diterima":"24 Juli 2017","agenda":"102\\/ABC\\/MINSEL\\/VII - 2017","sifat":"Rahasia","perihal":"Perihal","diteruskan":"Kabid Aset","keterangan":"Tanggapan dan Saran","catatan":"Catatan"}', '2017-08-21 17:01:06', 1),
(8, 'Bupati Minahasa', '102/ABC/MINSEL/VII - 2017', '2014-04-04', '2017-07-24', '102/ABC/MINSEL/VII - 2017', 'Rahasia', 'Perihal', 'Kabid Aset', 'Tanggapan dan Saran', 'Catatan', '/assets/img/sa-scan-file/20170810092514000000.jpg', '{"dari":"Bupati Minahasa","nomor surat":"102\\/ABC\\/MINSEL\\/VII - 2017","tanggal surat":"2014-04-04","1tanggal surat":"04 April 2014","tanggal diterima":"2017-07-24","1tanggal diterima":"24 Juli 2017","agenda":"102\\/ABC\\/MINSEL\\/VII - 2017","sifat":"Rahasia","perihal":"Perihal","diteruskan":"Kabid Aset","keterangan":"Tanggapan dan Saran","catatan":"Catatan"}', '2017-08-21 17:01:06', 1),
(9, 'Dinas Pendidikan Edit', '102/DEC/2017/002/VII - 2007', '2017-08-13', '2017-08-15', '222/333/ABC/2039/2008', 'Sangat Segera', 'Pemberitahuan kunjungan siswa-siswi SMP ke BPKAD Minahasa Selatan', 'Sekretaris', 'Tanggapan dan Saran', 'Oke. lanjutkan', '/assets/img/sa-scan-file/20170815124105000000.jpg', '{"dari":"Dinas Pendidikan Edit","nomor surat":"102\\/DEC\\/2017\\/002\\/VII - 2007","tanggal surat":"2017-08-13","1tanggal surat":"13 Agustus 2017","tanggal diterima":"2017-08-15","1tanggal diterima":"15 Agustus 2017","agenda":"222\\/333\\/ABC\\/2039\\/2008","sifat":"Sangat Segera","perihal":"Pemberitahuan kunjungan siswa-siswi SMP ke BPKAD Minahasa Selatan","diteruskan":"Sekretaris","keterangan":"Tanggapan dan Saran","catatan":"Oke. lanjutkan"}', '2017-08-21 17:01:06', 1),
(12, 'Dinas Pendidikan test edit', '102/DEC/2017/002/VII - 2007', '2017-08-14', '2017-08-15', '222/333/ABC/2039/2009', 'Sangat Segera', 'Pemberitahuan kunjungan siswa-siswi SMP ke BPKAD Minahasa Selatan', 'Sekretaris', 'Lain-lain ...', 'Oke. lanjutkan', '/assets/img/sa-scan-file/20170815122415000000.jpg', '{"dari":"Dinas Pendidikan test edit","nomor surat":"102\\/DEC\\/2017\\/002\\/VII - 2007","tanggal surat":"2017-08-14","1tanggal surat":"14 Agustus 2017","tanggal diterima":"2017-08-15","1tanggal diterima":"15 Agustus 2017","agenda":"222\\/333\\/ABC\\/2039\\/2009","sifat":"Sangat Segera","perihal":"Pemberitahuan kunjungan siswa-siswi SMP ke BPKAD Minahasa Selatan","diteruskan":"Sekretaris","keterangan":"Lain-lain ...","catatan":"Oke. lanjutkan"}', '2017-08-21 17:01:06', 1),
(13, 'surat', '2165796431546', '2017-08-15', '2017-08-15', '56487131', 'Rahasia', 'Perihal surat', 'Sekretaris', 'Tanggapan dan Saran', 'catatan', '/assets/img/sa-scan-file/20170816053831000000.jpg', '{"dari":"surat","nomor surat":"2165796431546","tanggal surat":"2017-08-15","1tanggal surat":"15 Agustus 2017","tanggal diterima":"2017-08-15","1tanggal diterima":"15 Agustus 2017","agenda":"56487131","sifat":"Rahasia","perihal":"Perihal surat","diteruskan":"Sekretaris","keterangan":"Tanggapan dan Saran","catatan":"catatan"}', '2017-08-21 17:01:06', 1),
(14, 'surat suratan test edit', '2165796431546', '2017-08-15', '2017-08-16', '56487131', 'Rahasia', 'Perihal surat', 'Dio Ratar', 'Tanggapan dan Saran', 'catatan', '/assets/img/sa-scan-file/20170816053528000000.jpg', '{"dari":"surat suratan test edit","nomor surat":"2165796431546","tanggal surat":"2017-08-15","1tanggal surat":"15 Agustus 2017","tanggal diterima":"2017-08-16","1tanggal diterima":"16 Agustus 2017","agenda":"56487131","sifat":"Rahasia","perihal":"Perihal surat","diteruskan":"Dio Ratar","keterangan":"Tanggapan dan Saran","catatan":"catatan"}', '2017-08-21 13:17:34', 1);

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
  `ta_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`ta_id`),
  UNIQUE KEY `ta_nip_2` (`ta_nip`),
  KEY `ta_nip` (`ta_nip`),
  KEY `ta_status` (`ta_status`),
  KEY `tlj_id` (`tlj_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `tbl_asn`
--

INSERT INTO `tbl_asn` (`ta_id`, `ta_nip`, `ta_nama`, `ta_pangkat`, `ta_jabatan`, `tlj_id`, `ta_status`) VALUES
(1, '19621126 199003 1 010', 'D. P. KAAWOAN, SE., M.Si', 'PEMBINA UTAMA MUDA (IV/c)', 'KEPALA BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 1, 1),
(2, '19791209 199810 1 001', 'MELKY, SSTP', 'PEMBINA  (IV/a)', 'SEKRETARIS BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 2, 1),
(3, '19740119 199703 1 003\r', 'F. H. PANDEYNUWU,SE\r', 'PENATA TK. I (III/d)\r', 'KEPALA BIDANG ASET BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, 1),
(4, '19720814 199903 1 008\r', 'BRAMMY PANDEY, SE, MSA\r', 'PENATA TK. I (III/d)\r', 'KEPALA BIDANG ANGGARAN BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, 1),
(5, '19810613 200801 1 008\r', 'HENRY SIMBAR, SE\r', 'PENATA TK. I (III/d)\r', 'KEPALA BIDANG AKUNTANSI BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, 1),
(6, '19820131 200903 2 001\r', 'ANGELITA L. MANTIRI, SE, Msi\r', 'PENATA TK. I (III/d)\r', 'KEPALA BIDANG PERBENDAHARAAN BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 3, 1),
(7, '19730503 199503 2 007\r', 'MEISYE LOMBOGIA, SE\r', 'PENATA TK. I  (III/d)\r', 'KEPALA SUB. BAGIAN KEPEGAWAIAN BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 4, 1),
(8, '19800912 201102 1 002\r', 'RONNY JUSUF KUMAJAS, SE\r', 'PENATA  (III/c)\r', 'KEPALA SUB. BAGIAN UMUM BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 4, 1),
(9, '19601221 198003 2 002\r', 'ELISABETH  MAWEIKERE, BA\r', 'PENATA TKT I (III/d)\r', 'KASUBID PELAPORAN DAN PERENCANAAN ASET BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 1),
(10, '19751223 200802 1 001\r', 'TEDY CHRISTIAN TUMURANG, SE\r', 'PENATA  (III/c)\r', 'KASUBID PENILAIAN PEMANFAATAN DAN PEMINDAHTANGANAN ASET BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 1),
(11, '19670809 200604 1 002\r', 'SALVATORE T.WEWENGKANG S.Sos\r', 'PENATA MUDA TK 1 (III/b)\r', 'KASUBID PENGAMANAN PENYIMPANAN DAN MONITORING ASET BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 1),
(12, '19770616 200604 1 004\r', 'JOHEL WALANGITAN, SE\r', 'PENATA (III/c)\r', 'KASUBID PERENCANAAN PENYUSUNAN ANGGARAN PENELITIAN DPA DAN ANGGARAN KAS BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 1),
(13, '19840106 200903 1 001\r', 'ERICK ADOLF LONTOKAN, SE\r', 'PENATA  (III/c)\r', 'KASUBID PENGENDALIAN DAN OTORISASI SPD BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 1),
(14, '19780924 201001 2 008\r', 'YOSEPHINE IMELDA MANDEI, SP\r', 'PENATA  (III/c)\r', 'KASUBID PEMBINAAN DAN PENGELOLAAN KEUANGAN DESA BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 1),
(15, '19780220 200604 2 016\r', 'LEIDYA MANONGKO, SE\r', 'PENATA  (III/c)\r', 'KASUBID AKUNTANSI BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 1),
(16, '19770221 200604 2 005\r', 'ISCHAAL LILIES BANGKI, SE\r', 'PENATA  (III/c)\r', 'KASUBID PENYUSUNAN LAPORAN KEUANGAN PEMERINTAH DAERAH BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 1),
(17, '19740512 200604 1 007\r', 'FENDIE Y. WERUPANGKEY, SE\r', 'PENATA  (III/c)\r', 'KASUBID PENERIMAAN BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 1),
(18, '19740624 200604 1 008\r', 'ELFIS TUAR, SE\r', 'PENATA  (III/c)\r', 'KASUBID PENELITIAN DAN PENERBITAN SP2D BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 5, 1),
(19, '19630314 198304 2 007\r', 'SENY SIWU, SE\r', 'PEMBINA  (IV/a)\r', 'PELAKSANA\r', 6, 1),
(20, '19630719 199503 2 001\r', 'HIAN MARENTEK, SE\r', 'PENATA (III/c)\r', 'PELAKSANA\r', 6, 1),
(21, '19820930 200604 2 020\r', 'STEVI T. TUMBELAKA, SE\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, 1),
(22, '19810118 200803 1 010', 'AFAN SINGAL, SP', 'PENATA MUDA TK I (III/b)', 'PELAKSANA', 6, 1),
(23, '19840110 200903 1 001\r', 'JHON F. WUNGOW, SE\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, 1),
(24, '19840709 200903 2 004\r', 'REINY YULLY KAMAGI, SE\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, 1),
(25, '19820429 201001 2 004\r', 'JANSYE LELY TANGKERE, SE\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, 1),
(26, '19821027 201102 1 001\r', 'MORRIS D. R. KOJOH, S.Sos\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, 1),
(27, '19860302 201102 1 001\r', 'RONALD FERDINANDUS, SE.\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, 1),
(28, '19860721 201102 1 001\r', 'CHRISTIAN KORENGKENG,S.Kom \r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, 1),
(29, '19841226 200701 2 003', 'LIZA C. SONAMBELA, SE', 'PENATA MUDA TK 1 (III/b)', 'PELAKSANA\r', 6, 1),
(30, '19830919 200604 1 006\r', 'ROGGER J. R. REPI, SE\r', 'PENATA MUDA TK 1 (III/b)\r', 'PELAKSANA\r', 6, 1),
(31, '19880210 2007011 001\r', 'VEIBY MANDEY, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, 1),
(32, '19770812 200903 2 001\r', 'ANSYE ADELINA.SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, 1),
(33, '19860628 200903 1 001\r', 'INDRA S. MERENTEK, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, 1),
(34, '19820420 201411 2 001', 'CELLY MINTJE, SH', 'PENATA MUDA (III/a)', 'PELAKSANA\r', 6, 1),
(35, '19840531 201001 1 019\r', 'MARIO GEOVANI POLI, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, 1),
(36, '19860131 201102 1 001\r', 'JEREMMY J. J. DIMAN, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, 1),
(37, '19841101 201001 1 014\r', 'SHANDY ALLAN MAINDOKA, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, 1),
(38, '19850307 201408 1 001\r', 'MARIO F. REPI, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, 1),
(39, '19840515 201001 2 012\r', 'VIANE FLORA KUMAYAS, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, 1),
(40, '19791212 201408 1 002\r', 'BRAMY D. TUMANKEN, SE\r', 'PENATA MUDA (III/a)\r', 'PELAKSANA\r', 6, 1),
(41, '19820522 200604 2 012\r', 'MERRY G. L SUMANTI\r', 'PENGATUR (II/c)\r', 'PELAKSANA\r', 6, 1),
(42, '19830717 200701 2 003\r', 'HAIDY WAGEY\r', 'PENGATUR (II/c)\r', 'PELAKSANA\r', 6, 1),
(43, '19790909 201001 2 028\r', 'SISKE V. SARAJAR\r', 'PENGATUR MUDA TK. I  (II/b)\r', 'PELAKSANA\r', 6, 1),
(44, '19800510 201001 1 032\r', 'MELDY ANDREE\r', 'PENGATUR MUDA TK. I  (II/b)\r', 'PELAKSANA\r', 6, 1),
(45, '19740401 201408 2 001\r', 'ALCE R. M. SONDAKH, Ama\r', 'PENGATUR MUDA TK. I  (II/b)\r', 'PELAKSANA\r', 6, 1),
(46, '19790701 201001 1 016\r', 'JUSTREE Y. TOAR\r', 'PENGATUR MUDA (II/a)\r', 'PELAKSANA\r', 6, 1),
(47, '19820730 201001 1 022\r', 'YANTY STEVEN Y. LUMI\r', 'PENGATUR MUDA (II/a)\r', 'PELAKSANA\r', 6, 1),
(48, '19650727 201408 2 001\r', 'JENNY M. POLI\r', 'PENGATUR MUDA (II/a)\r', 'PELAKSANA\r', 6, 1),
(49, '19840415 201411 2 001\r', 'IVANE F. WONGKAR\r', 'PENGATUR MUDA (II/a)\r', 'PELAKSANA\r', 6, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

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
(37, 16, '', 6, 1, '2017-08-29 11:33:56');

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
  `tspt_maksud` varchar(255) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_spt`
--

INSERT INTO `tbl_spt` (`tspt_id`, `tspt_nomor`, `tspt_tanggal`, `tspt_jmlh_hari`, `tspt_tgl_berangkat`, `tspt_tgl_kembali`, `tspt_maksud`, `tspt_tujuan`, `tspt_tpt_berangkat`, `tspt_pengesahan_spt`, `tspt_pengesahan_spd`, `tspt_tgl_spd`, `tspt_jenis`, `tspt_pengesahan_lbr3`, `tspt_transport`, `tspt_jumlah_orang`, `tspt_pptk`, `tspt_datetime`, `tspt_status`) VALUES
(1, '15/BPKAD/ST/VIII/2017', '2017-08-21', 1, '2017-08-22', '2017-08-22', 'Monitoring dan Evaluasi Penggunaan Dana Desa', 'Kecamatan Maesaan', 'Amurang', 6, 3, '2017-08-21', 1, 1, 'Darat', 4, 1, '2017-08-24 14:17:18', 0),
(7, '', '2017-08-25', 5, '2017-08-28', '2017-09-01', 'Studi banding penggunaan Sistem Informasi di BPKAD tingkat kabupaten', 'Kabupaten Banyuwangi, Provinsi Jawa Timur', 'Amurang', 1, 2, '2017-08-25', 1, 2, 'Darat, Udara', 3, 1, '2017-08-25 13:37:22', 0),
(8, '', '2017-08-25', 5, '2017-08-28', '2017-09-01', 'Bertugas untuk sosialisasi penggunaan sistem informasi kabupaten disetiap kecamatan minahasa selatan', 'Kecamatan Motoling', 'Amurang', 1, 2, '2017-09-01', 1, 2, 'Darat', 5, 2, '2017-08-25 13:43:50', 0),
(9, '', '2017-08-25', 5, '2017-08-28', '2017-09-01', 'Bertugas untuk sosialisasi penggunaan sistem informasi kabupaten disetiap kecamatan minahasa selatan', 'Kecamatan Motoling', 'Amurang', 1, 2, '2017-09-01', 1, 2, 'Darat', 5, 2, '2017-08-25 13:44:11', 0),
(10, '', '2017-08-25', 5, '2017-08-28', '2017-09-01', 'Bertugas untuk sosialisasi penggunaan sistem informasi kabupaten disetiap kecamatan minahasa selatan', 'Kecamatan Motoling', 'Amurang', 1, 2, '2017-09-01', 1, 2, 'Darat', 5, 2, '2017-08-25 13:44:33', 0),
(11, '', '2017-08-25', 1, '2017-08-25', '2017-08-25', 'Penyampaian Ranperda pertanggung jawaban APBD TA. 2016', 'BPKBMD Propinsi SULUT', 'Amurang', 2, 2, '2017-08-25', 1, 2, 'Darat', 3, 5, '2017-08-28 17:30:11', 1),
(12, '', '2017-08-29', 1, '2017-08-29', '2017-08-29', 'Penyampaian Ranperda pertanggung jawaban APBD TA. 2016 dan laporan semester pertama TA. 2017', 'BPKBMD Propinsi SULUT', 'Amurang', 2, 2, '2017-08-29', 1, 2, 'Darat', 4, 5, '2017-08-28 17:39:28', 1),
(13, '', '2017-08-29', 1, '2017-08-29', '2017-08-29', 'Monitoring dan Evaluasi Penggunaan Dana Desa', 'Kec.Tumpaan Dan Kec.Tatapaan', 'Amurang', 1, 2, '2017-08-29', 1, 2, 'Darat', 3, 4, '2017-08-29 10:55:46', 1),
(16, '', '2017-08-29', 1, '2017-08-29', '2017-08-29', 'test', 'test', 'Amurang', 1, 2, '2017-08-29', 1, 2, 'Darat', 1, 6, '2017-08-29 11:33:56', 0);

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
-- Constraints for table `tbl_spd`
--
ALTER TABLE `tbl_spd`
  ADD CONSTRAINT `tbl_spd_ibfk_1` FOREIGN KEY (`tspt_id`) REFERENCES `tbl_spt` (`tspt_id`),
  ADD CONSTRAINT `tbl_spd_ibfk_2` FOREIGN KEY (`ta_id`) REFERENCES `tbl_asn` (`ta_id`);
