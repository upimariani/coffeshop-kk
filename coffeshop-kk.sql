-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2022 pada 03.25
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeshop-kk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(125) DEFAULT NULL,
  `username` varchar(125) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'marisaedit', 'marisamia', 'miamarisa'),
(3, 'Mia Marisa', 'Mia', 'Marisa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_boking`
--

CREATE TABLE `detail_boking` (
  `id_detail_boking` int(11) NOT NULL,
  `id_transaksi` varchar(30) DEFAULT NULL,
  `id_tempat` int(11) NOT NULL,
  `tgl_boking` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_boking`
--

INSERT INTO `detail_boking` (`id_detail_boking`, `id_transaksi`, `id_tempat`, `tgl_boking`) VALUES
(1, '20211006ONXJOIHS', 1, '2021-10-14'),
(4, '20211225B7CXDZQW', 4, '2021-12-31'),
(5, '20211225CIXVO31N', 3, '2022-01-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_transaksi` varchar(30) DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp(),
  `bayar` varchar(50) DEFAULT NULL,
  `kembali` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id_pembayaran`, `id_transaksi`, `time`, `bayar`, `kembali`) VALUES
(1, '20211006ONXJOIHS', '2021-10-06 12:12:06', '0', 0),
(2, '20211006AUZIXNWB', '2021-10-06 13:33:17', '70000', 8000),
(3, '20211112OPQJGSEJ', '2021-11-13 05:11:09', '30000', 5000),
(4, '20211225B7CXDZQW', '2021-12-25 07:20:34', '0', 0),
(5, '20211225CIXVO31N', '2021-12-25 07:35:02', 'img1131.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesan`
--

CREATE TABLE `detail_pesan` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(30) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesan`
--

INSERT INTO `detail_pesan` (`id_detail`, `id_transaksi`, `id_produk`, `qty`) VALUES
(1, '20211006ONXJOIHS', 26, 1),
(2, '20211006ONXJOIHS', 27, 1),
(3, '20211006AUZIXNWB', 17, 2),
(4, '20211006AUZIXNWB', 27, 1),
(5, '20211112OPQJGSEJ', 17, 1),
(6, '20211225B7CXDZQW', 16, 1),
(7, '20211225CIXVO31N', 26, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Coffe'),
(8, 'Makanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik`
--

CREATE TABLE `kritik` (
  `id_kritik` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `isi_kritik` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kritik`
--

INSERT INTO `kritik` (`id_kritik`, `id_pelanggan`, `isi_kritik`, `time`) VALUES
(1, 13, 'hai', '0000-00-00 00:00:00'),
(2, 13, 'tes', '0000-00-00 00:00:00'),
(3, 13, 'tes lagi', '2021-10-06 04:13:41'),
(4, 13, 'coffe nya recommended banget', '2021-10-06 04:29:32'),
(5, 12, 'enak bangetttt', '2021-10-06 04:30:37'),
(6, 13, 'recommed banger tempatnya', '2021-10-06 06:29:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `alamat` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `no_telp`, `email`, `password`, `alamat`) VALUES
(1, 'upi', '789654122302a', 'marisa2@gmail.com', 'marisa2', 'sdsds'),
(2, 'Upi Mariani', '2147483647', 'upimariani.uniku17@gmail.com', 'tiki', ''),
(3, 'Upi Mariani', '2147483647', 'upimariani.uniku17@gmail.com', 'ahmas', 'asasasasa'),
(4, 'Rizki', '2147483647', 'muhammad@gmail.com', 'nur', 'asasasasa'),
(5, 'Tiara', '585', 'tiara@gmail.com', 'tiara', 'Ciwaru'),
(6, 'Baju', '2147483647', 'upimariani.uniku17@gmail.com', 'upimariani.uniku17@gmail.com', 'bvbv'),
(7, 'Upi Mariani', '2147483647', 'lusy@gmail.com', 'pos', 'dfdfd'),
(8, 'Baju', '0982345678987', 'upimariani.uniku17@gmail.com', 'upimariani.uniku17@gmail.com', 'pouyy'),
(9, 'Upi Mariani', '085156727368', 'muhammad@gmail.com', 'ahmasaria*', 'ciawi'),
(10, 'Intan', '085156727368', 'intan@gmail.com', 'intan', 'Ciniru'),
(11, 'Bambang', '085632145548', 'bambang@gmail.com', 'bambang', 'Kuningan'),
(12, 'Sintia', '085156727368', 'sintia@gmail.com', 'sintia', 'Kuningan'),
(13, 'Intan', '085156727368', 'intan@gmail.com', '12345', 'Ciniru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(125) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `harga`, `gambar`) VALUES
(11, 3, 'Coffe Late Dingin', 'terbuat dari susu', 25000, 'cappucino_dingin2.jpg'),
(16, 3, 'Cappucino Dingin', 'sungguh enak banget', 50000, 'caffucino_panas.jpg'),
(17, 3, 'Matcha Latte Hangat', 'sungguh enak banget', 25000, 'matcha_latte_panas.jpg'),
(18, 3, 'Red Velvet Panas', 'sungguh enak banget', 50000, 'red_Velvet_panas.jpg'),
(19, 3, 'Red Velvet DIngin', 'sungguh enak banget', 30000, 'red_Velvet_dingin.jpg'),
(20, 3, 'V60', 'sungguh enak banget', 50000, 'coffe2.jpg'),
(22, 8, 'Mie Goreng', 'anget anget', 12000, 'mie1.jpg'),
(25, 3, 'Miruku 30mL', '2 btl', 35000, 'coffe.jpg'),
(26, 8, 'Aci Kriuk', 'sungguh enak banget', 50000, 'aci1.jpg'),
(27, 8, 'Baso Aci', 'sungguh enak banget', 12000, 'baso_aci2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` int(11) NOT NULL,
  `nama_kursi` varchar(125) DEFAULT NULL,
  `no_kursi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_kursi`, `no_kursi`) VALUES
(1, 'Leter L', 1),
(2, 'Stranger', 2),
(3, 'Heart', 4),
(4, 'Berdua', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(30) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `atas_nama` varchar(125) NOT NULL,
  `tgl_pesan` datetime NOT NULL DEFAULT current_timestamp(),
  `no_telpn` varchar(15) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `pembayaran` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `atas_nama`, `tgl_pesan`, `no_telpn`, `total_bayar`, `catatan`, `pembayaran`) VALUES
('20211006AUZIXNWB', 13, 'Marisa', '2021-10-06 13:33:17', '085523369874', 62000, 'sa', 0),
('20211006ONXJOIHS', 13, 'Upi Mariani', '2021-10-06 12:12:06', '085523369874', 62000, 'assas', 0),
('20211112OPQJGSEJ', 1, 'Upi Mariani', '2021-11-13 05:11:09', '085523369874', 25000, 'tidak ada', 0),
('20211225B7CXDZQW', 1, 'Upi Mariani', '2021-12-25 07:20:34', '085523369874', 50000, 'e', 1),
('20211225CIXVO31N', 1, 'coba', '2021-12-25 07:35:02', '085523369874', 150000, 'coba', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_boking`
--
ALTER TABLE `detail_boking`
  ADD PRIMARY KEY (`id_detail_boking`);

--
-- Indeks untuk tabel `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kritik`
--
ALTER TABLE `kritik`
  ADD PRIMARY KEY (`id_kritik`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_boking`
--
ALTER TABLE `detail_boking`
  MODIFY `id_detail_boking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_pesan`
--
ALTER TABLE `detail_pesan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kritik`
--
ALTER TABLE `kritik`
  MODIFY `id_kritik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
