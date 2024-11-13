-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2022 pada 14.47
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jingga_kreatif`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggaran`
--

CREATE TABLE `tb_anggaran` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `anggaran_tambahan` bigint(20) NOT NULL,
  `detail_anggaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_anggaran`
--

INSERT INTO `tb_anggaran` (`id`, `id_pengajuan`, `anggaran_tambahan`, `detail_anggaran`) VALUES
(2, 10, 200000, 'uploads/Modul Praktikum (1).docx.docx.docx.docx'),
(3, 13, 2000000, 'uploads/Modul Praktikum (1).docx.docx.docx (1).docx.docx'),
(4, 16, 5000000, 'uploads/Modul Praktikum (1).docx.docx.docx (3).docx.docx'),
(5, 0, 0, 'uploads/.'),
(6, 0, 0, 'uploads/.'),
(7, 17, 1000000, 'uploads/Modul Praktikum (1).docx.docx.docx (3).docx.docx.docx'),
(12, 18, 550000, 'uploads/pem2.pdf.pdf'),
(13, 19, 60000, 'uploads/M. WIRA PERDANA 2021.xlsx.xlsx'),
(14, 21, 10000000, 'uploads/Doc1.docx.docx'),
(15, 22, 5000000, 'uploads/UNIVERSITAS ISLAM KALIMANTAN __.pdf.pdf'),
(16, 23, 5000000, 'uploads/Jadwal Sidang Skripsi SESI Ke-2 Kel.6-10 No.76-150 Mhs (1).xlsx.xlsx'),
(17, 0, 0, 'uploads/.'),
(19, 24, 10000000, 'uploads/Jadwal Sidang Skripsi SESI Ke-2 Kel.6-10 No.76-150 Mhs (1).xlsx.xlsx.xlsx'),
(20, 26, 100000000, 'uploads/Jadwal Sidang Skripsi SesiI Ke-6 Kel.26-30 No.376-450.xlsx.xlsx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `no_rek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bank`
--

INSERT INTO `tb_bank` (`id`, `nama`, `atas_nama`, `no_rek`) VALUES
(2, 'BRI', 'Galih', '2010039211232'),
(3, 'BNI', 'Tya', '7642897645588');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_caraousel`
--

CREATE TABLE `tb_caraousel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_caraousel`
--

INSERT INTO `tb_caraousel` (`id`, `judul`, `keterangan`, `gambar`) VALUES
(4, 'JINGGA KREATIF', 'Wedding Organizer', 'uploads/2-cappadocia-wedding-photography-turkey-hot-airballoons.jpg.jpg'),
(5, 'JINGGA KREATIF', 'Wedding Organizer', 'uploads/Will-Patrick-Surrey-Wedding-Photographer-0002.jpg.jpg'),
(6, 'JINGGA KREATIF', 'Wedding Organizer', 'uploads/Zanda+Auckland+wedding+photographer+New+Zealand+Kauri+bay+boomrock-758-2.jpg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_equipment`
--

CREATE TABLE `tb_equipment` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `jenis` enum('LIGHTING','SOUND','','') NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_equipment`
--

INSERT INTO `tb_equipment` (`id`, `nama`, `harga`, `jenis`, `detail`) VALUES
(1, 'JPMedia', 18000000, 'SOUND', '<div>The best Sound System</div>'),
(2, 'LUMENS', 15000000, 'LIGHTING', '<div>Experience di bidang lighting tentunya udah ga diragukan ya. bener2 menyempurnakan dekor kita. foto juga warnanya jadi bagus dengan adanya lighting, ga bikin muka keliatan gelap. Team lumens juga profesioanl banget dan bisa sesuain keinginan kita, hasilnya venue aku ambience nya bener2 romantic sesuai kaya apa yang kita inginkan.</div>'),
(4, ' Twinbrother Production', 15000000, 'SOUND', '<div>Twinbrother production adalah perusahan yg bergerak di bidang jasa penyewaan sound system, lighting, genzet, screen dan effect untuk segala macam event dari event wedding, gathering, meeting, party, dan lain-lain. Dengan harga yang terjangkau dan kualitas yang utama adalah Motto utama kami.</div>'),
(5, 'Lightworks', 25000000, 'LIGHTING', '<div>Founded in 2008, Lightworks was born with a vision of being an answer for the need of event lightings in the vast-moving modern world. Our team has years of experience in the field and ready to use the power of lighting to enhance your wedding. We know how to use different instruments, technical installation, and special effects to create an ambiance that influences the mood of the entire wedding.</div>'),
(6, 'Lasika Production', 25000000, 'LIGHTING', '<div>Vendor Lampu yang paling Top.<br>Luar biasa termasuk biayanya.<br>ini adalah sarana wajib bila ingin membuat pesta terlihat Wah.</div>'),
(7, 'Mega Sound Sytem', 16000000, 'SOUND', '<div>Great Sound</div>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar_equipment`
--

CREATE TABLE `tb_gambar_equipment` (
  `id` int(11) NOT NULL,
  `id_equipment` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gambar_equipment`
--

INSERT INTO `tb_gambar_equipment` (`id`, `id_equipment`, `gambar`) VALUES
(11, 2, 'uploads/51507_ztKig6.jpg.jpg'),
(12, 5, 'uploads/36414-p63wna8mmh5j.jpg.jpg'),
(13, 6, 'uploads/34099-Lasika-Production.jpg.jpg'),
(14, 4, 'uploads/86009-dhx3bom00uc8.jpg.jpg'),
(15, 1, 'uploads/51751_LVdqd4.jpg.jpg'),
(16, 7, 'uploads/61327_XJIbfm.jpg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar_konsep`
--

CREATE TABLE `tb_gambar_konsep` (
  `id` int(11) NOT NULL,
  `id_konsep` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gambar_konsep`
--

INSERT INTO `tb_gambar_konsep` (`id`, `id_konsep`, `gambar`) VALUES
(15, 1, 'uploads/741-kof6iut2hcie.jpg.jpg'),
(16, 1, 'uploads/57075-m62tlx7kje4h.jpg.jpg'),
(17, 3, 'uploads/741-ptkw5banm2ok.jpg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar_produksi`
--

CREATE TABLE `tb_gambar_produksi` (
  `id` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gambar_produksi`
--

INSERT INTO `tb_gambar_produksi` (`id`, `id_produksi`, `gambar`) VALUES
(32, 11, 'uploads/88139-ae7hxkjwwryt.jpg.jpg'),
(33, 12, 'uploads/82615-jneq2utgg0ie.jpg.jpg'),
(34, 13, 'uploads/57075-m62tlx7kje4h.jpg.jpg'),
(35, 14, 'uploads/58185-ei8lconbbvdx.jpg.jpg'),
(36, 10, 'uploads/87747-fjam15occ8ey.jpg.jpg'),
(37, 9, 'uploads/unnamed.png.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar_talent`
--

CREATE TABLE `tb_gambar_talent` (
  `id` int(11) NOT NULL,
  `id_talent` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gambar_talent`
--

INSERT INTO `tb_gambar_talent` (`id`, `id_talent`, `gambar`) VALUES
(21, 5, 'uploads/avenged-sevenfold_20161014_215131.jpg.jpg'),
(22, 3, 'uploads/247756.jpg.jpg'),
(23, 6, 'uploads/047cff736d6551187ae56e909e93cdda.jpg.jpg'),
(24, 1, 'uploads/images.png.png'),
(25, 7, 'uploads/images.jpg.jpg'),
(26, 8, 'uploads/14930-danang-dan-onadio-leonardo.jpg.jpg'),
(27, 4, 'uploads/images (2).jpg.jpg'),
(28, 9, 'uploads/download.jpg.jpg'),
(29, 10, 'uploads/images (3).jpg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil_kerja`
--

CREATE TABLE `tb_hasil_kerja` (
  `id` int(11) NOT NULL,
  `link_yt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hasil_kerja`
--

INSERT INTO `tb_hasil_kerja` (`id`, `link_yt`) VALUES
(2, '1-GLrbJzG3A'),
(3, '9ihBlf4rxEM'),
(4, 'ezLkY4WgzKs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id`, `nama`) VALUES
(2, 'Director'),
(3, 'Designer'),
(4, 'Admin'),
(5, 'Accounting'),
(6, 'Co Director'),
(8, 'dsdsdsxx'),
(9, 'trrtrrtrttrtr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal_meeting`
--

CREATE TABLE `tb_jadwal_meeting` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `jadwal_meeting_1` timestamp NULL DEFAULT NULL,
  `riwayat_meeting_1` text DEFAULT NULL,
  `jadwal_meeting_2` timestamp NULL DEFAULT NULL,
  `riwayat_meeting_2` text DEFAULT NULL,
  `jadwal_meeting_3` datetime DEFAULT NULL,
  `riwayat_meeting_3` text DEFAULT NULL,
  `tempat_meeting_1` varchar(255) NOT NULL,
  `jam_meeting_1` varchar(255) NOT NULL,
  `tempat_meeting_2` varchar(255) NOT NULL,
  `jam_meeting_2` varchar(255) NOT NULL,
  `tempat_meeting_3` varchar(255) NOT NULL,
  `jam_meeting_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jadwal_meeting`
--

INSERT INTO `tb_jadwal_meeting` (`id`, `id_pengajuan`, `jadwal_meeting_1`, `riwayat_meeting_1`, `jadwal_meeting_2`, `riwayat_meeting_2`, `jadwal_meeting_3`, `riwayat_meeting_3`, `tempat_meeting_1`, `jam_meeting_1`, `tempat_meeting_2`, `jam_meeting_2`, `tempat_meeting_3`, `jam_meeting_3`) VALUES
(31, 17, '2022-08-06 01:00:00', 'membahas anggaran', NULL, NULL, NULL, NULL, 'kafe a', '', '', '', '', ''),
(35, 0, '2022-08-01 02:00:00', NULL, NULL, NULL, NULL, NULL, 'Kafe', '', '', '', '', ''),
(36, 0, '2022-08-01 02:00:00', NULL, NULL, NULL, NULL, NULL, 'Kafe', '', '', '', '', ''),
(37, 18, '2022-08-01 02:00:00', NULL, '2022-08-30 16:00:00', NULL, NULL, NULL, 'Kafe', '', 'kafe', '', '', ''),
(38, 19, '2022-09-02 15:24:00', NULL, NULL, NULL, NULL, NULL, 'Kafe', '', '', '', '', ''),
(39, 21, '2022-08-24 04:00:00', 'Membahas anggran', NULL, NULL, NULL, NULL, 'Starbuck Coffee BJB', '', '', '', '', ''),
(40, 22, '2022-08-20 15:41:00', 'Membhas tentang Layout tempat pelaminan', NULL, NULL, NULL, NULL, 'kafe abc', '', '', '', '', ''),
(41, 23, '2022-08-27 15:28:00', 'membahas anggaran', '2022-08-28 13:33:00', NULL, NULL, NULL, 'kafe b', '', 'via zoom', '', '', ''),
(42, 24, '2022-08-19 00:35:00', 'Membahas anggaran', NULL, NULL, NULL, NULL, 'Kebab Koe mtp', '', '', '', '', ''),
(43, 26, '2022-08-14 16:05:00', 'oke oke', NULL, NULL, NULL, NULL, 'kafe', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `tmt` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id`, `id_jabatan`, `nik`, `nama`, `no_telp`, `tmt`, `foto`) VALUES
(2, 2, '325235423', 'Obladi', '0813475138888', '2018-07-22', 'uploads/b9376faf4b07d9394afbd0ab728a1c04.jpg.jpg'),
(5, 4, '333332222', 'Razor', '911111111111', '2022-07-13', 'uploads/68227cf488a40fc271e832e51b330d9b.jpg.jpg'),
(7, 3, '2222222', 'Muhammad Syafiq', '0813475138888', '2022-06-17', 'uploads/324be8e662f98d16fcebff86539dfa3a.jpg.jpg'),
(8, 6, '23232556676', 'Younk', '9111111111112', '2022-04-13', 'uploads/270843cf4191921ddaa5871b69fdec90.jpg.jpg'),
(9, 5, '676767676', 'Xava', '567576767', '2022-04-22', 'uploads/914e2d6f625ca3aeb1190325fa0be6ae.jpg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_klien`
--

CREATE TABLE `tb_klien` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tanggal_terdaftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_lengkap` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('Aktif','Pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_klien`
--

INSERT INTO `tb_klien` (`id`, `id_user`, `nik`, `tanggal_terdaftar`, `nama_lengkap`, `nomor_telepon`, `email`, `status`) VALUES
(41, 43, '1212121212', '2022-08-02 01:24:07', 'Ruli gt', '0909090909', 'gustyrully30@gmail.com', 'Aktif'),
(42, 44, '121212', '2022-08-02 01:35:18', 'Iqbal r', '45454', 'iqbalhamdani2000@gmail.com', 'Aktif'),
(43, 45, '5454545454', '2022-08-03 01:23:53', 'Andry', '9686756858', 'lorahot151@gmail.com', 'Aktif'),
(44, 46, '121212121', '2022-08-04 10:24:13', 'Daus', '978787878', 'firdausnazula.bbm2@gmail.com', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kode_verif`
--

CREATE TABLE `tb_kode_verif` (
  `id` int(11) NOT NULL,
  `id_klien` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konsep`
--

CREATE TABLE `tb_konsep` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_konsep`
--

INSERT INTO `tb_konsep` (`id`, `nama`, `detail`) VALUES
(1, 'TRADISIONAL', '<div>Pernikahan tradisional biasanya dilaksanakan oleh mereka yang memiliki darah keturunan dominan atau bahkan tidak ada campuran dari suku yang lainnya. Misalnya keturunan Batak, Palembang, Minang, Sunda, Bali, Jawa, Toraja, Flores, Papua dan lainnya. Suku-suku tersebut biasanya menjalani prosesi adat di setiap tahapan kehidupan seperti melahirkan anak, pernikahan maupun kematian. Atas dasar menghormati leluhur maka mereka melaksanakan pernikahan dengan menjalani prosesi adat. Bahkan di beberapa suku, Batak atau Toraja misalnya, apabila seseorang tidak menjalani pernikahan dengan prosesi adat maka keturunannya memiliki konsekuensi tidak bisa “diadati” dengan adat leluhur jika kelak menikah nanti.</div><div><br></div>'),
(3, 'MODERN', '<div>Illustrasi tema modern</div>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_latihan`
--

CREATE TABLE `tb_latihan` (
  `id` int(11) NOT NULL,
  `latihan_1` varchar(255) NOT NULL,
  `latihan_2` varchar(255) NOT NULL,
  `latihan_3` varchar(255) NOT NULL,
  `latihan_4` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_latihan_relasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_latihan`
--

INSERT INTO `tb_latihan` (`id`, `latihan_1`, `latihan_2`, `latihan_3`, `latihan_4`, `foto`, `id_latihan_relasi`) VALUES
(6, 'a g vdfgrt gryrs', 'b grgrs', 'c grsfgsfg', 'd gsfrgerwgr', 'uploads/Bull-Shark-Background-PNG.png.png', '3'),
(10, 'etrrsgdfsg', 'fsgdfsgdfg', 'dfggdfgdfg', 'dfgdfgdf', 'uploads/WhatsApp Image 2022-06-17 at 20.13.42 (1).jpg.jpg', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_latihan_relasi`
--

CREATE TABLE `tb_latihan_relasi` (
  `id` int(11) NOT NULL,
  `latihan_relasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_latihan_relasi`
--

INSERT INTO `tb_latihan_relasi` (`id`, `latihan_relasi`) VALUES
(2, 'fgh'),
(3, 'afsfdfddf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket_wedding`
--

CREATE TABLE `tb_paket_wedding` (
  `id` int(11) NOT NULL,
  `konsep` int(11) NOT NULL,
  `dekorasi` int(11) NOT NULL,
  `dokumentasi` int(11) NOT NULL,
  `lighting` int(11) NOT NULL,
  `sound` int(11) NOT NULL,
  `band` int(11) NOT NULL,
  `mc` int(11) NOT NULL,
  `mua` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket_wedding`
--

INSERT INTO `tb_paket_wedding` (`id`, `konsep`, `dekorasi`, `dokumentasi`, `lighting`, `sound`, `band`, `mc`, `mua`, `nama`, `keterangan`, `gambar`) VALUES
(2, 1, 9, 10, 2, 1, 3, 1, 4, '1', 'zxc', 'uploads/Screenshot (100).png.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `id_anggaran` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `file_bukti_pembayaran` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('Terverifikasi','Menunggu Verifikasi','Ditolak') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_verifikasi` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id`, `id_anggaran`, `id_bank`, `file_bukti_pembayaran`, `keterangan`, `status`, `tanggal`, `tanggal_verifikasi`) VALUES
(3, 16, 2, 'uploads/WhatsApp Image 2022-07-30 at 11.39.11.jpeg.jpeg', 'aaa', 'Terverifikasi', '2022-08-04 10:03:24', '2022-08-04 10:03:39'),
(4, 18, 3, 'uploads/WhatsApp Image 2022-07-30 at 11.39.11 (1).jpeg.jpeg', 'okeee', 'Terverifikasi', '2022-08-04 10:40:43', '2022-08-04 10:41:14'),
(5, 19, 3, 'uploads/WhatsApp Image 2022-07-30 at 11.39.11.jpeg.jpeg', 'oke', 'Terverifikasi', '2022-08-05 15:16:32', '2022-08-05 15:18:50'),
(6, 20, 2, 'uploads/WhatsApp Image 2022-07-30 at 11.39.11.jpeg.jpeg', 'okeeee', 'Terverifikasi', '2022-08-09 02:07:39', '2022-08-09 02:09:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id` int(11) NOT NULL,
  `id_klien` int(11) NOT NULL,
  `konsep` int(11) NOT NULL,
  `dekorasi` int(11) NOT NULL,
  `dokumentasi` int(11) NOT NULL,
  `lighting` int(11) NOT NULL,
  `sound` int(11) NOT NULL,
  `band` int(11) NOT NULL,
  `mc` int(11) NOT NULL,
  `mua` int(11) NOT NULL,
  `nik_l` varchar(255) NOT NULL,
  `nama_l` varchar(255) NOT NULL,
  `nama_ayah_l` varchar(255) NOT NULL,
  `nama_ibu_l` varchar(255) NOT NULL,
  `tempat_lahir_l` varchar(255) NOT NULL,
  `tanggal_lahir_l` date NOT NULL,
  `nomor_telepon_l` varchar(255) NOT NULL,
  `foto_l` varchar(255) NOT NULL,
  `nik_p` varchar(255) NOT NULL,
  `nama_p` varchar(255) NOT NULL,
  `nama_ayah_p` varchar(255) NOT NULL,
  `nama_ibu_p` varchar(255) NOT NULL,
  `tempat_lahir_p` varchar(255) NOT NULL,
  `tanggal_lahir_p` date NOT NULL,
  `nomor_telepon_p` varchar(255) NOT NULL,
  `foto_p` varchar(255) NOT NULL,
  `tempat_wedding` varchar(255) NOT NULL,
  `tanggal_wedding` date NOT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_disetujui` timestamp NULL DEFAULT NULL,
  `status` enum('Pending','Ditolak','Disetujui','') NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id`, `id_klien`, `konsep`, `dekorasi`, `dokumentasi`, `lighting`, `sound`, `band`, `mc`, `mua`, `nik_l`, `nama_l`, `nama_ayah_l`, `nama_ibu_l`, `tempat_lahir_l`, `tanggal_lahir_l`, `nomor_telepon_l`, `foto_l`, `nik_p`, `nama_p`, `nama_ayah_p`, `nama_ibu_p`, `tempat_lahir_p`, `tanggal_lahir_p`, `nomor_telepon_p`, `foto_p`, `tempat_wedding`, `tanggal_wedding`, `tanggal_pengajuan`, `tanggal_disetujui`, `status`, `keterangan`) VALUES
(21, 41, 1, 11, 14, 2, 1, 5, 1, 9, '131242334', 'Ruli', 'Ayah R', 'Ibu R', 'Martapura', '2000-12-07', '1212123453', 'uploads/270843cf4191921ddaa5871b69fdec90.jpg.jpg', '2423423', 'Indi', 'Ayah I', 'Ibu I', 'Banjarbaru', '2000-03-05', '23232567567', 'uploads/914e2d6f625ca3aeb1190325fa0be6ae.jpg.jpg', 'Gedung', '2022-09-10', '2022-08-02 01:27:02', '2022-08-01 19:28:30', 'Disetujui', 'pengajuan amda kami terima, silahkan tunggu jadwal meeting dari admin'),
(22, 42, 3, 11, 10, 6, 4, 3, 7, 9, '23423432', 'iqbal r', 'ayah iqbal', 'ibu iqbal', 'Martapura', '2000-12-06', '23423423', 'uploads/68227cf488a40fc271e832e51b330d9b.jpg.jpg', '23423423', 'Yuni', 'manto', 'surti', 'Banjarbaru', '2000-05-02', '42342323', 'uploads/b9376faf4b07d9394afbd0ab728a1c04.jpg.jpg', 'Rumah', '2022-09-10', '2022-08-01 19:39:33', '2022-08-01 19:40:31', 'Disetujui', 'Selamat, silahkan tunggu jadwal meet dari admin'),
(23, 43, 3, 11, 14, 2, 7, 5, 7, 4, '121312323', 'Andry', 'abah ana', 'ibu ani', 'Martapura', '2000-12-19', '08134751334', 'uploads/270843cf4191921ddaa5871b69fdec90.jpg.jpg', '5342524523', 'Surti', 'baba', 'bboo', 'Banjarbaru', '2000-06-04', '081347513865', 'uploads/95fe42750a160065aa67290d8a6cb8bb.jpg.jpg', 'Gedung', '2022-09-10', '2022-08-04 01:27:06', '2022-08-03 19:27:53', 'Disetujui', 'silahkan tunggu jadwal meet dari admin'),
(24, 44, 3, 11, 14, 6, 1, 3, 1, 4, '1212121212', 'Firdaus Nazula', 'Mahmud', 'Yuli', 'Martapura', '2000-05-15', '908080808', 'uploads/photo_6296367450178039949_x.jpg.jpg', '1313131313', 'Firda Aulia', 'Manto', 'Ina', 'Banjarmasin', '2000-12-26', '243124231', 'uploads/photo_6296367450178039946_y.jpg.jpg', 'Pantai Kuta Bali', '2022-09-17', '2022-08-05 15:10:27', '2022-08-05 15:11:54', 'Disetujui', 'okai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_portfolio_crew`
--

CREATE TABLE `tb_portfolio_crew` (
  `id` int(11) NOT NULL,
  `prinsip_kami` text NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_portfolio_crew`
--

INSERT INTO `tb_portfolio_crew` (`id`, `prinsip_kami`, `alamat`, `email`) VALUES
(1, '“Kepentingan utama kami terletak pada kepuasan klien kami terhadap layanan yang kami berikan”.', 'Jl. Ir. PM. Noor Kel. Sungai Ulin Kecamatan Banjarbaru utara Kota Banjarbaru - 70714', 'jinggakreatif@gmail.com\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_portfolio_home`
--

CREATE TABLE `tb_portfolio_home` (
  `id` int(11) NOT NULL,
  `profil` text NOT NULL,
  `alasan_pengguna` text NOT NULL,
  `kelebihan1` text NOT NULL,
  `kelebihan2` text NOT NULL,
  `kelebihan3` text NOT NULL,
  `kelebihan4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_portfolio_home`
--

INSERT INTO `tb_portfolio_home` (`id`, `profil`, `alasan_pengguna`, `kelebihan1`, `kelebihan2`, `kelebihan3`, `kelebihan4`) VALUES
(3, 'Jingga Kreatif  adalah suatu perusahaan yang bergerak dibidang Jasa Pelayanan Wedding Organizer (WO). Jingga Kreatif di dukung oleh high quality concept dan professionally skilled & highlymotivated developing team, Jingga Kreatif berusaha untuk memberikan yang terbaik guna memenuhi komitmen dalam hal jasa pelayanan di bidang penyelenggaraan seperti, acara wedding, acara promosi, launching, pameran, seminar ataupun konvensi.', 'Kenapa ya? coba kita baca sama-sama alasannya pada bagian bawah ini', 'Wedding Organizer memiliki tim yang akan siap mengurus semua hal yang dibutuhkan saat acara pernikahan kamu nantinya. Mulai dari mengkonsep acara sampai mengkordinasikan semua pihak yang terlibat didalam acara pernikahan. Sehingga hal ini akan menghemat tenaga dan waktu yang kamu miliki.', 'Keuntungan lainnya dari memakai jasa Wedding Organizer adalah kamu bisa menyesuaikan pesta sesuai dengan budget yang dimiliki. Besarnya budget yang telah di tentukan akan membuat tim wedding organizer akan mencarikan vendor sesuai dengan budget yang tersedia.', 'Wedding Organizer adalah jasa yang dibentuk untuk mempermudah pengantin bertemu dengan banyak pilihan vendor, sehingga tentunya wedding organizer ini telah mempersiapkan vendor-vendor terbaik agar tidak mengecewakan costumer nya.', 'Tim Wedding Organizer akan memberikan kinerja terbaiknya, yaitu mulai dari mengonsep acara, membuat budget plan, mengkoordinasikan semua pihak yang terlibat dalam acara, mencarikan vendor terbaik seperti catering, gedung, busana, fotographer dan lainnya, hingga membuat rundown agar acara pernikahan kamu berjalan dengan lancar dan teratur sampai selesai.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_portfolio_vendor`
--

CREATE TABLE `tb_portfolio_vendor` (
  `id` int(11) NOT NULL,
  `profil` text NOT NULL,
  `vendor_terbaik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_portfolio_vendor`
--

INSERT INTO `tb_portfolio_vendor` (`id`, `profil`, `vendor_terbaik`) VALUES
(1, 'Dikutip dari Investopedia, vendor adalah pihak dalam rantai pasok yang dibayar untuk menyediakan barang dan jasa bagi pihak lain. Vendor bisa berarti produsen atau bisa diartikan pula distributor.', 'Kami menghadirkan Vendor-Vendor terbaik dari yang terbaik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produksi`
--

CREATE TABLE `tb_produksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `jenis` enum('DEKORASI','DOKUMENTASI','','') NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produksi`
--

INSERT INTO `tb_produksi` (`id`, `nama`, `harga`, `jenis`, `detail`) VALUES
(9, 'CLOVER', 45000000, 'DEKORASI', '<div><strong>Detail</strong></div><div>Wedding Package&nbsp;</div><ul><li>Backdrop 10 x 3,5 M</li><li>Akad nikah table &amp; 6 unit Olivia chairs</li><li>4 spot Mini garden &amp; 6 unit Standing flower for Aisle</li><li>Entrance gate</li><li>3 unit Angpao table with simple flower arrangement</li><li>Photo gallery (3 photos)</li><li>Photo booth 2,5 x 2,5 M</li><li>Welcome signage</li><li>Hand bouquet</li><li>4 unit Mini centerpiece for VIP area</li></ul>'),
(10, 'Lemia Project', 22000000, 'DOKUMENTASI', '<div><strong>Detail</strong></div><div>We are a group of experienced photographers and videographers who are<br>also fine art and cinemart enthusiasts. We love exploring to new places and<br>combining our skills and interests to create a story—your story, precisely.<br>We love to get close with you in order to learn about your life, hopes, or<br>simply things that excite you. We do this because we want our relationship<br>with you to be a kind of collaboration—the collaboration between us and<br>you to create your vision.</div>'),
(11, 'Galathia Decor', 50000000, 'DEKORASI', '<ul><li>Wedding backdrop up to 12 meter</li><li>one set of sofa</li><li>Carpet coverage for stage</li><li>Mini garden</li><li>Standing flower artificial 6 pcs</li><li>Rose petal carpet</li><li>Wedding gate (2 pillar)</li><li>Black/white melaminto dance floor 4x4 meter</li><li>Flowers garden for dance floor area</li><li>Round table centerpiece max. 15 table</li><li>Bridal table centerpiece 6 seater</li><li>Accessories for bridal table</li><li>Angpao backdrop curtains</li><li>Standing angpao max. 3 pcs</li><li>Backdrop photo gallery</li><li>Frame screen (if any)</li><li>Wedding signage</li><li>Standard lighting ambiance</li></ul><div><br></div>'),
(12, 'Cassia Decoration', 17000000, 'DEKORASI', '<ul><li>Backdrop 6 x 3 meter</li><li>Akad nikah table &amp; 6 units of Olivia chairs</li><li>3 Units of mini centerpiece for guest area</li><li>1 Unit angpao table</li><li>Entrance gate</li><li>Welcome signage</li></ul><div><br></div>'),
(13, 'Buana&Co', 24000000, 'DOKUMENTASI', '<ul><li>12 hours coverage</li><li>2 Photographer by team</li><li>2 Videographer</li><li>200 Edited files</li><li>2 Canvas print 60x40 spanram</li><li>1 Semi premium album 20x30 40 pages</li><li>60sc Teaser wedding video</li><li>Up to 10 minutes cinematic video output</li><li>All files raw and edited by Google Drive</li></ul>'),
(14, 'Hope Portraiture', 20000000, 'DOKUMENTASI', '<div>We are a group of creative and passionate</div><div>young people who loves to capture love stories</div><div>with its beautiful emotions and portray them</div><div>in pictures that will stand the test of time.</div><div>We believe that beauty can be found in</div><div>the most subtle of gestures and genuine</div><div>interactions.</div><div>We are there to perfectly capture those moment.</div>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_talent`
--

CREATE TABLE `tb_talent` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `jenis` enum('BAND','MC','MUA','') NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_talent`
--

INSERT INTO `tb_talent` (`id`, `nama`, `harga`, `jenis`, `detail`) VALUES
(1, 'Vincent & Desta', 40000000, 'MC', '<div>bla bla<br>nbnaigiua<br>klhdjkashd<br>lkdfgajks</div>'),
(3, 'The Beatles', 50000000, 'BAND', '<div><strong>The Beatles</strong> adalah kelompok pemusik Inggris beraliran rock, dibentuk di Liverpool pada tahun 1960, sering kali dianggap sebagai pemusik tersukses secara komersial dan paling banyak mendapat pujian dalam musik populer.</div>'),
(4, 'Claudia Vanessa MUA', 10000000, 'MUA', '<ul><li>Airbrush makeup and hairdo for the Bride by Claudia (include retouch)</li><li>1x Test makeup and hairdo (may be reserved for engagement - Bandung only)</li><li>Free simple wedding nail art</li><li>Free rent accessories</li></ul>'),
(5, 'Avanged Sevenfold', 40000000, 'BAND', '<div><strong>Avenged Sevenfold</strong> (sering juga ditulis <strong>A7X</strong>) adalah&nbsp;</div>'),
(6, 'System Of Down', 30000000, 'BAND', '<div>System of a Down adalah sebuah grup musik heavy metal Armenia-Amerika yang dibentuk di Glendale, California, pada tahun 1994. Saat ini terdiri dari anggota Serj Tankian, Daron Malakian, Shavo Odadjian, dan John Dolmayan, yang menggantikan drummer asli Andy Khachaturian pada 1997.</div>'),
(7, 'Coki & Muslim', 30000000, 'MC', '<div>cascascascc asfdasdasdsdasd<br>chuuaak</div>'),
(8, 'Onad & Danang', 25000000, 'MC', '<div>adsasDdDSDDSD<br>SdsDASDSADASDWAQDdfasdasdasds</div>'),
(9, 'The Make', 9000000, 'MUA', '<div>dsdasdsadasd<br>dasdasdasdasdasd</div>'),
(10, 'Glow', 8000000, 'MUA', '<div>fwdfgdsdsds<br>dfsdsfdsfdsfdsfdsf</div>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('ADMIN','KLIEN') NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `foto`) VALUES
(1, 'Muhammad Syafiq', 'admin', 'admin', 'ADMIN', ''),
(43, 'Ruli gt', 'ruli', 'ruli1234567', 'KLIEN', NULL),
(44, 'Iqbal r', 'iqbal', 'iqbal1234567', 'KLIEN', NULL),
(45, 'Andry', 'andry', 'andry12345', 'KLIEN', NULL),
(46, 'Daus', 'daus', 'daus12345', 'KLIEN', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_caraousel`
--
ALTER TABLE `tb_caraousel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_equipment`
--
ALTER TABLE `tb_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_gambar_equipment`
--
ALTER TABLE `tb_gambar_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_gambar_konsep`
--
ALTER TABLE `tb_gambar_konsep`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_gambar_produksi`
--
ALTER TABLE `tb_gambar_produksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indeks untuk tabel `tb_gambar_talent`
--
ALTER TABLE `tb_gambar_talent`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_hasil_kerja`
--
ALTER TABLE `tb_hasil_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jadwal_meeting`
--
ALTER TABLE `tb_jadwal_meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_klien`
--
ALTER TABLE `tb_klien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kode_verif`
--
ALTER TABLE `tb_kode_verif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_konsep`
--
ALTER TABLE `tb_konsep`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_latihan`
--
ALTER TABLE `tb_latihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_latihan_relasi`
--
ALTER TABLE `tb_latihan_relasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_paket_wedding`
--
ALTER TABLE `tb_paket_wedding`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konsep` (`konsep`),
  ADD KEY `dekorasi` (`dekorasi`),
  ADD KEY `dokumentasi` (`dokumentasi`),
  ADD KEY `lighting` (`lighting`),
  ADD KEY `sound` (`sound`),
  ADD KEY `band` (`band`),
  ADD KEY `mc` (`mc`),
  ADD KEY `mua` (`mua`),
  ADD KEY `id_klien` (`id_klien`);

--
-- Indeks untuk tabel `tb_portfolio_crew`
--
ALTER TABLE `tb_portfolio_crew`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_portfolio_home`
--
ALTER TABLE `tb_portfolio_home`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_portfolio_vendor`
--
ALTER TABLE `tb_portfolio_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_produksi`
--
ALTER TABLE `tb_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_talent`
--
ALTER TABLE `tb_talent`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_caraousel`
--
ALTER TABLE `tb_caraousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_equipment`
--
ALTER TABLE `tb_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_gambar_equipment`
--
ALTER TABLE `tb_gambar_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_gambar_konsep`
--
ALTER TABLE `tb_gambar_konsep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_gambar_produksi`
--
ALTER TABLE `tb_gambar_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_gambar_talent`
--
ALTER TABLE `tb_gambar_talent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil_kerja`
--
ALTER TABLE `tb_hasil_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal_meeting`
--
ALTER TABLE `tb_jadwal_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_klien`
--
ALTER TABLE `tb_klien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tb_kode_verif`
--
ALTER TABLE `tb_kode_verif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_konsep`
--
ALTER TABLE `tb_konsep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_latihan`
--
ALTER TABLE `tb_latihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_latihan_relasi`
--
ALTER TABLE `tb_latihan_relasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_paket_wedding`
--
ALTER TABLE `tb_paket_wedding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_portfolio_crew`
--
ALTER TABLE `tb_portfolio_crew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_portfolio_home`
--
ALTER TABLE `tb_portfolio_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_portfolio_vendor`
--
ALTER TABLE `tb_portfolio_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_produksi`
--
ALTER TABLE `tb_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_talent`
--
ALTER TABLE `tb_talent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_gambar_produksi`
--
ALTER TABLE `tb_gambar_produksi`
  ADD CONSTRAINT `tb_gambar_produksi_ibfk_1` FOREIGN KEY (`id_produksi`) REFERENCES `tb_produksi` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD CONSTRAINT `tb_pengajuan_ibfk_1` FOREIGN KEY (`konsep`) REFERENCES `tb_konsep` (`id`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_2` FOREIGN KEY (`dekorasi`) REFERENCES `tb_produksi` (`id`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_3` FOREIGN KEY (`dokumentasi`) REFERENCES `tb_produksi` (`id`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_4` FOREIGN KEY (`lighting`) REFERENCES `tb_equipment` (`id`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_5` FOREIGN KEY (`sound`) REFERENCES `tb_equipment` (`id`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_6` FOREIGN KEY (`band`) REFERENCES `tb_talent` (`id`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_7` FOREIGN KEY (`mc`) REFERENCES `tb_talent` (`id`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_8` FOREIGN KEY (`mua`) REFERENCES `tb_talent` (`id`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_9` FOREIGN KEY (`id_klien`) REFERENCES `tb_klien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
