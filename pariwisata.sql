-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 09:56 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ctg_id` int(11) NOT NULL,
  `ctg_name` varchar(100) NOT NULL,
  `ctg_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ctg_id`, `ctg_name`, `ctg_desc`) VALUES
(1, 'Budaya', 'Wisata budaya adalah jenis-jenis pariwisata yang pertama. Pariwisata jenis ini tidak kalah dengan pariwisata lainnya, bahkan sering dijadikan agenda untuk kunjungan dari sekolah-sekolah. Wisata budaya adalah perjalanan yang dilakukan karena keinginan untuk memperluas pandangan hidup seseorang dengan cara mengadakan kunjungan atau peninjauan ketempat baru yang mengandung budaya. Wisata ini akan diisi dengan mempelajari keadaan rakyat, kebiasaan adat istiadat, cara hidup, seni dan budaya dari rakyat setempat.'),
(2, 'Maritim atau Bahari', 'Wisata bahari adalah kegiatan yang bersifat rekreasi dan dilakukan di laut, pantai, pulau, atau sekitarnya. Wisata ini diisi dengan aktivitas yang menantang keberanian, ketenangan, histori, dan yang paling penting bisa lebih mencintai alam dan lingkungan yang ada.'),
(3, 'Cagar Alam', 'Wisata cagar alam banyak dilakukan oleh pecinta alam atau yang gemar memotret beragam binatang atau marga satwa serta beragam fauna. Cagar alam adalah sebuah kawasan dimana makhluk hidup baik itu tumbuhan atau hewan hidup secara lestari. Keberadaannya di kawasan hutan dilindungi oleh Undang-Undang dari risiko bahaya kepunahannya.'),
(4, 'Konvensi', 'Jenis pariwisata selanjutnya adalah wisata konvensi. Berbagai negara saat ini membangun wisata konvensi ini dengan menyediakan fasilitas bangunan dengan ruangan-ruangan tempat bersidang bagi para peserta, untuk konfrensi, musyawarah, atau pertemuan-pertemuan yang bersifat nasional maupun internasional. Seperti Philipina mempunyai PICC (Philippine Internasional Convention Center) di Manila, atau Indonesia mempunyai Balai Sidang Senayan di Jakarta untuk tempat penyelenggaraan sidang pertemuan besar yang dilengkapi dengan perlengkapan modern.'),
(5, 'Pertanian', 'Jenis pariwisata pertanian adalah pengorganisasian perjalanan yang dilakukan ke proyek-proyek pertanian, perkebunan, ladang pembibitan dan sebagainya. Wisata ini memungkinkan wisatawan dapat mengadakan kunjungan dan peninjauan untuk tujuan studi atau hanya melihat-lihat untuk menikmati suasana. Potensi wisata pertanian sangat bagus jika dikelola, karena Indonesia memiliki letak geografis dan iklim yang sangat mendukung.'),
(6, 'Buru', 'Wisata ini banyak dilakukan di tempat yang memiliki daerah atau hutan berburu yang diizinkan oleh pemerintah. Wisata buru ini diatur dan ditetapkan oleh pemerintah dari setiap negara, sehingga pemburuan tidak dilakukan dengan sembarang. Misalnya di India, ada daerah-daerah yang memang disediakan untuk berburu macan, badak dan sebagainya. Sedangkan di Indonesia, pemerintah membuka wisata buru untuk daerah Jawa, seperti Garut.');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `loc_id` int(11) NOT NULL,
  `loc_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `loc_name`) VALUES
(1, 'semarang'),
(2, 'denpasar'),
(3, 'bandung'),
(4, 'surabaya'),
(5, 'batam'),
(6, 'yogyakarta'),
(7, 'padang'),
(8, 'makassar'),
(9, 'balikpapan');

-- --------------------------------------------------------

--
-- Table structure for table `pariwisata`
--

CREATE TABLE `pariwisata` (
  `pr_id` int(11) NOT NULL,
  `pr_img` varchar(100) NOT NULL,
  `pr_name` varchar(100) NOT NULL,
  `pr_desc` text NOT NULL,
  `pr_tiket` int(255) NOT NULL,
  `ctg_id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `is_delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pariwisata`
--

INSERT INTO `pariwisata` (`pr_id`, `pr_img`, `pr_name`, `pr_desc`, `pr_tiket`, `ctg_id`, `loc_id`, `is_delete`) VALUES
(3, 'parangtritis.webp', 'Pantai Parangtritis', 'tempat wisata yang terletak di Desa Parangtritis, Kretek, Kabupaten Bantul, Daerah Istimewa Yogyakarta. Jaraknya kurang lebih 27 km dari pusat Kota Yogyakarta. Pantai ini salah satu destinasi wisata di Yogyakarta bahkan Pantai Parangtritis telah menjadi ikon pariwisata di Yogyakarta. Pantai Parangtritis mempunyai nilai simbolis yang merupakan garis yang bersifat magis yang menghubungkan Panggung Krapyak, Keraton Yogyakarta, Tugu Yogyakarta dan Gunung Merapi yang dikenal sebagai Garis Imajiner Yogyakarta.', 30000, 3, 6, 0),
(4, 'lawangsewu.webp', 'Lawang Sewu', 'landmark di Semarang, Jawa Tengah, Indonesia, yang dibangun sebagai kantor pusat Perusahaan Kereta Api Hindia Belanda. Bangunan era kolonial terkenal sebagai rumah berhantu dan lokasi syuting, meskipun pemerintah kota Semarang telah berusaha mengubah citra itu.', 30000, 1, 1, 0),
(5, '61a108896f29e.webp', 'Sam Poo Kong', 'Kelenteng Gedung Kuno Sam Poo Tong yaitu bekas tempat persinggahan dan pendaratan pertama seorang Laksamana Tiongkok beragama Islam yang bernama Zheng He/Cheng Ho. Tidak semua anak buah kapal beragama Islam. Kompleks Sam Po Tong berada di daerah Simongan, sebelah barat daya Kota Semarang. Tanda yang menunjukan sebagai bekas petilasan yang berciri keislaman dengan ditemukannya tulisan berbunyi Marilah kita mengheningkan cipta dengan mendengarkan bacaan Al Quran.', 20000, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `username`, `name`, `role`) VALUES
(1, 'yaffalhakim@gmail.com', 'eWFmZmFsaGFraW0=', 'yaffalhakim', 'Muhammad Yafi Alhakim', 'ADMIN'),
(2, 'yafiuser@gmail.com', 'YWt1bnVzZXI=', 'akunuser', 'yafi-chan', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `pariwisata`
--
ALTER TABLE `pariwisata`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `loc_id` (`loc_id`),
  ADD KEY `pariwisata_ibfk_2` (`ctg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pariwisata`
--
ALTER TABLE `pariwisata`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pariwisata`
--
ALTER TABLE `pariwisata`
  ADD CONSTRAINT `pariwisata_ibfk_2` FOREIGN KEY (`ctg_id`) REFERENCES `category` (`ctg_id`),
  ADD CONSTRAINT `pariwisata_ibfk_3` FOREIGN KEY (`loc_id`) REFERENCES `location` (`loc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
