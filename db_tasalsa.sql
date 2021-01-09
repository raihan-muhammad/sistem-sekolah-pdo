-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2020 pada 05.24
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tasalsa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guruwali`
--

CREATE TABLE `tb_guruwali` (
  `id_guruwali` int(4) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama_guruwali` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `perwalian` enum('Tik','Teknik Mesin','Elektro','Otomotif') DEFAULT 'Tik',
  `telepon` varchar(15) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_guruwali`
--

INSERT INTO `tb_guruwali` (`id_guruwali`, `nip`, `nama_guruwali`, `alamat`, `perwalian`, `telepon`, `created`, `modified`) VALUES
(2, '20012939911231', 'Intan Puja Ningrum', 'Jalan jalan kesana kemari', 'Teknik Mesin', '0896544421444', '2020-11-29 14:07:31', '2020-11-29 14:07:31'),
(3, '0003291866661', 'Farrah Arisqa', 'Jalan tanjungrejo gang 6 / XII', 'Tik', '0897132512311', '2020-11-29 14:07:54', '2020-11-29 14:07:54'),
(4, '299716255155511', 'Aziizah Bashir', 'Jalan kayutangan heritage pembangunan', 'Elektro', '0897552135511', '2020-11-29 14:08:16', '2020-11-29 14:08:16'),
(5, '9921376666611', 'Nina Aryi', 'Jalan bedalisodo gang satu coban glotak', 'Otomotif', '08532137666111', '2020-11-29 14:08:42', '2020-11-29 14:08:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembimbing`
--

CREATE TABLE `tb_pembimbing` (
  `id_pembimbing` int(4) NOT NULL,
  `fk_perusahaan` int(4) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama_pembimbing` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`id_pembimbing`, `fk_perusahaan`, `nip`, `nama_pembimbing`, `alamat`, `telepon`, `created`, `modified`) VALUES
(3, 3, '998772666131', 'Sigit Waseso', 'Jalan Sukun Gang V', '0896555521511', '2020-11-29 16:13:30', '2020-11-29 16:13:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penempatan`
--

CREATE TABLE `tb_penempatan` (
  `id_penempatan` int(4) NOT NULL,
  `fk_siswa` int(4) DEFAULT NULL,
  `fk_pembimbing` int(4) DEFAULT NULL,
  `tanggal_pelaksanaan` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penempatan`
--

INSERT INTO `tb_penempatan` (`id_penempatan`, `fk_siswa`, `fk_pembimbing`, `tanggal_pelaksanaan`, `created`, `modified`) VALUES
(2, 2, 3, '2020-10-10', '2020-11-29 20:14:51', '2020-11-29 20:14:51'),
(4, 3, 3, '2020-11-01', '2020-11-29 20:15:32', '2020-11-29 20:15:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id_pengembalian` int(4) NOT NULL,
  `fk_siswa` int(4) DEFAULT NULL,
  `fk_perusahaan` int(4) DEFAULT NULL,
  `lama_prakerin` varchar(20) DEFAULT NULL,
  `alasan_pengembalian` text DEFAULT NULL,
  `evaluasi` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`id_pengembalian`, `fk_siswa`, `fk_perusahaan`, `lama_prakerin`, `alasan_pengembalian`, `evaluasi`, `created`, `modified`) VALUES
(2, 3, 7, '7 Bulan', 'Sering bolos dan tidak mengerjakan tugas', 'Mohon ditingkatkan lagi tanggung jawabnya', '2020-11-29 20:32:45', '2020-11-29 20:32:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` enum('Admin','User') DEFAULT 'Admin',
  `gambar` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `email`, `username`, `password`, `level`, `gambar`, `created`, `modified`) VALUES
(1, 'Moehammad Rizki Karianata', 'natarizky884@gmail.com', 'RizkiKarianata', 'NIFA11102', 'Admin', 'avatar5.png', '2020-11-29 10:44:16', '2020-11-29 10:44:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id_perusahaan` int(4) NOT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `telepon`, `created`, `modified`) VALUES
(3, 'Heasoft Indonesia', 'Jalan Merganraya gang 19 Blok E', '08965441441231', '2020-11-29 14:17:31', '2020-11-29 14:17:31'),
(4, 'Retgoo Sentris Informa', 'Jalan suhat no 888 pinggir jalan', '0341992138123', '2020-11-29 14:17:52', '2020-11-29 14:17:52'),
(5, 'RSUD Saiful Anwar', 'Jalan dekat kayutangan', '03412771236611', '2020-11-29 14:18:12', '2020-11-29 14:18:12'),
(6, 'Bea Cukai Malang', 'Jalan gatau dimana', '0896534144211', '2020-11-29 14:18:30', '2020-11-29 14:18:30'),
(7, 'DILO Kayutangan', 'Jalan kayutangan dekat gramedia', '0341273666121', '2020-11-29 14:18:52', '2020-11-29 14:18:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(4) NOT NULL,
  `fk_guruwali` int(4) DEFAULT NULL,
  `fk_perusahaan` int(4) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` enum('Perempuan','Laki - Laki') DEFAULT 'Perempuan',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `fk_guruwali`, `fk_perusahaan`, `nis`, `nama_siswa`, `kelas`, `jurusan`, `alamat`, `jenis_kelamin`, `created`, `modified`) VALUES
(2, 3, 6, '2003881882001', 'Giusti Immanuel Laudes', '12', 'Rekayasa Perangkat Lunak', 'Jalan kebonagung gang 2', 'Laki - Laki', '2020-11-29 17:02:20', '2020-11-29 17:02:20'),
(3, 2, 4, '2003881882002', 'Nirma Mawar Sari', '12', 'Teknik Kendaraan Ringan', 'Jalan jalan ke kota padang', 'Perempuan', '2020-11-29 17:02:47', '2020-11-29 17:02:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_guruwali`
--
ALTER TABLE `tb_guruwali`
  ADD PRIMARY KEY (`id_guruwali`);

--
-- Indeks untuk tabel `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`),
  ADD KEY `FK_tb_pembimbing_tb_perusahaan` (`fk_perusahaan`);

--
-- Indeks untuk tabel `tb_penempatan`
--
ALTER TABLE `tb_penempatan`
  ADD PRIMARY KEY (`id_penempatan`),
  ADD KEY `FK_tb_penempatan_tb_siswa` (`fk_siswa`),
  ADD KEY `FK_tb_penempatan_tb_pembimbing` (`fk_pembimbing`);

--
-- Indeks untuk tabel `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `FK_tb_pengembalian_tb_siswa` (`fk_siswa`),
  ADD KEY `FK_tb_pengembalian_tb_perusahaan` (`fk_perusahaan`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `FK_tb_siswa_tb_guruwali` (`fk_guruwali`),
  ADD KEY `FK_tb_siswa_tb_perusahaan` (`fk_perusahaan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_guruwali`
--
ALTER TABLE `tb_guruwali`
  MODIFY `id_guruwali` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  MODIFY `id_pembimbing` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_penempatan`
--
ALTER TABLE `tb_penempatan`
  MODIFY `id_penempatan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id_pengembalian` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id_perusahaan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  ADD CONSTRAINT `FK_tb_pembimbing_tb_perusahaan` FOREIGN KEY (`fk_perusahaan`) REFERENCES `tb_perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_penempatan`
--
ALTER TABLE `tb_penempatan`
  ADD CONSTRAINT `FK_tb_penempatan_tb_pembimbing` FOREIGN KEY (`fk_pembimbing`) REFERENCES `tb_pembimbing` (`id_pembimbing`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_penempatan_tb_siswa` FOREIGN KEY (`fk_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD CONSTRAINT `FK_tb_pengembalian_tb_perusahaan` FOREIGN KEY (`fk_perusahaan`) REFERENCES `tb_perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_pengembalian_tb_siswa` FOREIGN KEY (`fk_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `FK_tb_siswa_tb_guruwali` FOREIGN KEY (`fk_guruwali`) REFERENCES `tb_guruwali` (`id_guruwali`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_siswa_tb_perusahaan` FOREIGN KEY (`fk_perusahaan`) REFERENCES `tb_perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
