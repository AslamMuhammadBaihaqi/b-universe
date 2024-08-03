-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 09:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b_universe`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id` int(11) NOT NULL,
  `acara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id`, `acara`) VALUES
(1, 'Deltaa'),
(2, 'Berita Satu Siang'),
(3, 'Berita Satu Sore'),
(4, 'Berita Satu Malam'),
(5, 'Berita Satu Pagi'),
(6, 'Asal Usul'),
(7, 'Berita Viral'),
(8, 'Figur Publik'),
(9, 'REV'),
(10, 'Endeus'),
(11, 'Film Pendek Indonesia'),
(12, 'Mitos'),
(13, 'Jendela Dunia'),
(14, 'One Vault 2021'),
(15, 'Obrolan Malam Bersatu Kawal Pemilu'),
(16, 'Sportainment'),
(17, 'Nyari Makan'),
(18, 'Jalan Dakwah Bersama Gus Miftah'),
(19, 'Serial Drama Multivision'),
(20, 'Serial Komedi Multivision'),
(21, 'Bioskop Multivision'),
(22, 'Saksi Mata'),
(23, 'Supercar C\'ship Series 2023'),
(24, 'Catatan Kriminal'),
(26, 'Euromax');

-- --------------------------------------------------------

--
-- Table structure for table `detail_lowongan`
--

CREATE TABLE `detail_lowongan` (
  `id` int(255) NOT NULL,
  `id_divisi` int(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `tanggung_jawab` mediumtext NOT NULL,
  `persyaratan` mediumtext NOT NULL,
  `status` int(5) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_lowongan`
--

INSERT INTO `detail_lowongan` (`id`, `id_divisi`, `posisi`, `lokasi`, `tipe`, `publisher`, `tanggung_jawab`, `persyaratan`, `status`, `create_at`) VALUES
(2, 4, 'Sales Group Head', 'Jakarta Selatan', 'Magang', 'B-Universe', '<ul style=\"\"><li style=\"\">Providing support for clients by learning about and satisfying their needs</li><li style=\"\">Make an attractive advertising price package offer according to client needs</li><li style=\"\">Submitting event proposals to clients </li><li style=\"\">Presenting the proposals and the budget to clients (negotiate and rearrange the proposals if needed)</li><li style=\"\">Supervise and coordinate the creative team so that advertisements are according to plans, deadlines and budgets</li><li style=\"\">Maintain relationships with clients during the project and resolve problems that arise immediately</li><li style=\"\">Follow up payments from clients after advertising is complete</li><li style=\"\">Strategic consultant for brand campaign</li><li style=\"\">Find leads and manage agency and direct client for monthly billing</li><li style=\"\">Weekly direct report to Chief Commercial Officer</li></ul>', '<ul style=\"\"><li style=\"\">Candidate must possess at least Bachelor\'s Degree in Marketing, Mass Communications or equivalent.</li><li style=\"\">At least 2 years of working experience as account executive in media/marketing agency (have experience in Digital Media, and Pemda on a big scale would be preffered)</li><li style=\"\">Knowledge of market research, business process, sales, client problems, and needs for a digital campaign.</li><li style=\"\">Strongly passionate about this field.</li></ul>', 1, '2023-11-06 13:49:42'),
(3, 2, 'Staf Akutansi', 'Jakarta Selatan', 'Kerja Lepas', 'B-Universe', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\">Hi, Jobseekers</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\">Greetings from B-Universe (formerly BeritaSatu Media Holdings)</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\">This is a great opportunity for someone that is looking to gain experience, gain more responsibility and be part of a fast-growing Broadcast Media.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\">We are looking for an immediate start, so please only apply if you are available now and willing to work&nbsp;<span style=\"font-weight: bolder;\">on-site.</span></p><ul style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\"><li style=\"\">Candidate must possess at least Bachelor\'s Degree in Accounting</li><li style=\"\">At least 2 Year(s) of working experience as a Tax Accountant or similar role</li><li style=\"\">Good knowledge of Enterprise accounting & tax policy, costing, financial management, internal control, plant operation, goal management and production</li><li style=\"\">Proficient with Ms. Office and Google Sheets especially all formulas related to Ms. Excel</li><li style=\"\">Strong analytical skill required to identify risks and opportunities in the business</li><li style=\"\">In-depth knowledge of accounting and bookkeeping processes.</li><li style=\"\">Strong attention to detail with excellent analytical skills.</li><li style=\"\">Outstanding written and verbal communication skills.</li><li style=\"\">Certified in Brevet A & B</li><li style=\"\">Certified in SAP will be plus.</li></ul>', '<ul style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\"><li style=\"\">Maintaining and reviewing financial records.</li><li style=\"\">Ensuring compliance with accounting and tax laws.</li><li style=\"\">Preparing budgets regularly.</li><li style=\"\">Monitoring expenditure and profits and providing reports.</li><li style=\"\">Evaluating internal management systems, procedures, and risks in order to provide recommendations.</li><li style=\"\">Managing business accounts and preparing financial statements.</li></ul>                ', 1, '2023-11-07 13:50:40'),
(4, 6, 'Human Capital', 'Jakarta Selatan', 'Penuh Waktu', 'B-Universe', '<ul style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\"><li style=\"\">&nbsp;Keep up with all the economy local and global happening</li><li style=\"\">Cover a wide variety of stories</li><li style=\"\">Conduct and schedule interviews</li><li style=\"\">Track influencers\' work</li><li style=\"\">Plan, edit, and write stories and atricles</li><li style=\"\">Verify information provided by interviewees</li><li style=\"\">Keep up with deadlines as timeliness is extremely important</li><li style=\"\">Follow news events and other media sources to stay informed</li></ul>', '<ul style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\"><li style=\"\">Bachelor degree in any major (preferable from economy with a GPA minimum 3.0 out of 4.0 scale)</li><li style=\"\">Excellent in English (written and oral) is a must</li><li style=\"\">Have experiences in writing articles in English&nbsp; & Bahasa</li><li style=\"\">Have min. 2 years experience as a Economy Reporter</li><li style=\"\">Have general knowledge (especially about Business, Economy, and Market Share news)</li><li style=\"\">Able to interview and analyze</li><li style=\"\">Have a big interested on economy & bussiness topics</li><li style=\"\">Good communication and interpersonal skill</li><li style=\"\">Able to work with team</li></ul>                ', 1, '2023-11-07 14:01:55'),
(8, 1, 'Accountant Executive', 'Jakarta Selatan', 'Kontrak', 'B-Universe', '<ul style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\"><li style=\"\">Providing support for clients by learning about and satisfying their needs</li><li style=\"\">Make an attractive advertising price package offer according to client needs</li><li style=\"\">Submitting event proposals to clients&nbsp;</li><li style=\"\">Presenting the proposals and the budget to clients (negotiate and rearrange the proposals if needed)</li><li style=\"\">Supervise and coordinate the creative team so that advertisements are according to plans, deadlines and budgets</li><li style=\"\">Maintain relationships with clients during the project and resolve problems that arise immediately</li><li style=\"\">Follow up payments from clients after advertising is complete</li><li style=\"\">Strategic consultant for brand campaign</li><li style=\"\">Find leads and manage agency and direct client for monthly billing</li><li style=\"\">Weekly direct report to Chief Commercial Officer</li></ul>', '<ul style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\"><li style=\"\">Candidate must possess at least Bachelor\'s Degree in Marketing, Mass Communications or equivalent.</li><li style=\"\">At least 2 years of working experience as account executive in media/marketing agency (have experience in Digital Media, and Pemda on a big scale would be preffered)</li><li style=\"\">Knowledge of market research, business process, sales, client problems, and needs for a digital campaign.</li><li style=\"\">Strongly passionate about this field.</li></ul>                ', 0, '2023-11-07 13:27:51'),
(9, 3, 'Management Accountant', 'Jakarta Selatan', 'Kontrak', 'B-Universe', '<ul style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\"><li style=\"\">Bachelor degree in any major (preferable from economy with a GPA minimum 3.0 out of 4.0 scale)</li><li style=\"\">Excellent in English (written and oral) is a must</li><li style=\"\">Have 3-5 years experience as a Economy News Presenter & Producer</li><li style=\"\">Have general knowledge (especially about Business, Economy, and Market Share news)</li><li style=\"\">Have experiences in writing articles in English  & Bahasa</li><li style=\"\">Have a big interested on economy & bussiness topics</li><li style=\"\">Have research capability</li><li style=\"\">Good communication and interpersonal skill</li><li style=\"\">Able to work with team</li><li style=\"\">Able to work under pressure and on a tight deadline</li><li style=\"\">Good communication and interpersonal skill</li></ul>', '<ul style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\"><li style=\"\">Manage Economy TV news broadcasts</li><li style=\"\">Plan, prepare and produce news economic broadcasts to be broadcasted with high standards.</li><li style=\"\">Plan, prepare and control Talk Show/dialogues</li><li style=\"\">Coordinate activities of the news production team.</li><li style=\"\">Oversee the type and order of news stories to create a cohesive show.</li><li style=\"\">Ensure productions run on time and on budget.</li><li style=\"\">Monitor news broadcasts and be on hand to solve problems as neededJob</li><li style=\"\">Evaluate news program to get improvement</li><li style=\"\">Ensure your appearance properly represents the face of the network</li><li style=\"\">Quality check each story to ensure grammatical correctness, accurancy, and clarity</li><li style=\"\">Revising scripts and preparing them well to be delivered</li><li style=\"\">Conduct interviews with experts and or sources who can provide additional information or opinions</li></ul>                ', 1, '2023-11-07 15:12:09'),
(11, 6, 'Human Resource Development', 'Jakarta Selatan', 'Penuh Waktu', 'B-Universe', '<ul style=\"font-family: \"Open Sans\", sans-serif;\"><li style=\"\"><font color=\"#000000\" style=\"\">Execute direction management for all digital platforms</font></li><li style=\"\"><font color=\"#000000\" style=\"\">Develop digital strategy for all B-Universe campaigns</font></li><li style=\"\"><font color=\"#000000\" style=\"\">Analyzing upcoming and ongoing campaigns</font></li><li style=\"\"><font color=\"#000000\" style=\"\">Developing content plans, budgeting, as well as supervising each campaign</font></li><li style=\"\"><font color=\"#000000\" style=\"\">Supervision for each digital output (image, video, caption)</font></li><li style=\"\"><font color=\"#000000\" style=\"\">Prepare reports for each campaign that has been carried out</font></li><li style=\"\"><font color=\"#000000\" style=\"\">Responsible directly to the GM Digital Social Media and Business Developement & Digital Business Director</font></li></ul>', '<ul style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", sans-serif;\"><li style=\"\">Bachelor\'s degree majoring in Marketing, Social Media, Communication would be an advantage</li><li style=\"\">At least 3+ years of proven experience with managing social media accounts in notable media companies both in English and Bahasa Indonesia. </li><li style=\"\">Demonstrated track record in achieving objectives and working in a highly collaborative environment and cross-functional setting </li><li style=\"\">Proven expertise in managing multiple social channels (LinkedIn, FB/IG, TikTok, Twitter, Youtube) and keeping up with latest trends. </li><li style=\"\">High familiarity with social media management and analytics tools (e.g HootSuite, SproutSocial, Crowdtangle) </li><li style=\"\">Excellent copywriting skills and visual intelligence </li><li style=\"\">Comfortable with numbers and data-driven</li></ul>                ', 1, '2023-11-08 13:48:49'),
(12, 7, 'Producer', 'Jakarta Selatan', 'Paruh Waktu', 'B-Universe', '<div><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px;\">Hi, Jobseekers</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px;\">Greetings from B-Universe (formerly BeritaSatu Media Holdings)</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px;\">This is a great opportunity for someone that is looking to gain experience, gain more responsibility and be part of a fast-growing Broadcast Media.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px;\">We are looking for an immediate start, so please only apply if you are available now and willing to work on-site.</p></div><ul><li style=\"\">Bachelor degree in any major from a reputable university with a GPA minimum 3.0 out of 4.0 scale</li><li style=\"\">Minimum 2&nbsp;years of experience segment production/news gathering</li><li style=\"\">Excellent in English (written and oral) is a must</li><li style=\"\">Have experiences in writing articles in English & Bahasa</li><li style=\"\">Have min 2&nbsp;years experience as a Producer News / News Gathering</li><li style=\"\">Have research capability</li><li style=\"\">Should be able to adapt quickly to changs and perform well in a dynamic environment</li><li style=\"\">Able to work under pressure and on a tight deadline</li><li style=\"\">Good communication and interpersonal skill</li><li style=\"\">Have a good leadership</li><li style=\"\">Computer literate</li><li style=\"\">Prior&nbsp;experience as a Producer in a top news market, national platform & business</li><li style=\"\">Strong editorial judgment is essential</li></ul>', '<ul><li style=\"\">Create attractive coverage content plans with high standards</li><li style=\"\">Coordinate all reporting activities for program needs</li><li style=\"\">Organize the mobilization of the gathering team and control the coverage process for program needs.</li><li style=\"\">Maintain coverage and program performance so that it can generate ratings and good revenue with measurable long-term planning</li><li style=\"\">Evaluate the coverage to match the target program needs</li><li style=\"\">Build networks and access wider coverage</li><li style=\"\">Participate in coaching and training the team</li></ul>                ', 1, '2023-11-08 13:57:53'),
(13, 6, 'General Affair', 'Jakarta Selatan', 'Paruh Waktu', 'B-Universe', '<ul open=\"\" sans\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(0, 0, 0);\"><li>&nbsp;Keep up with all the economy local and global happening</li><li>Cover a wide variety of stories</li><li>Conduct and schedule interviews</li><li>Track influencers\' work</li><li>Plan, edit, and write stories and atricles</li><li>Verify information provided by interviewees</li><li>Keep up with deadlines as timeliness is extremely important</li><li>Follow news events and other media sources to stay informed</li></ul>', '<ul open=\"\" sans\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(0, 0, 0);\"><li>Bachelor degree in any major (preferable from economy with a GPA minimum 3.0 out of 4.0 scale)</li><li>Excellent in English (written and oral) is a must</li><li>Have experiences in writing articles in English&nbsp; & Bahasa</li><li>Have min. 2 years experience as a Economy Reporter</li><li>Have general knowledge (especially about Business, Economy, and Market Share news)</li><li>Able to interview and analyze</li><li>Have a big interested on economy & bussiness topics</li><li>Good communication and interpersonal skill</li><li>Able to work with team</li></ul>                ', 1, '2023-11-08 20:06:16'),
(14, 1, 'Growth Department Head', 'Jakarta Selatan', 'Penuh Waktu', 'B-Universe', '<p>Hai para pencari kerja</p><p>Salam dari B-Universe (sebelumnya BeritaSatu Media Holdings)</p><p>Ini adalah peluang besar bagi seseorang yang ingin mendapatkan pengalaman, mendapatkan lebih banyak tanggung jawab, dan menjadi bagian dari Media Penyiaran yang berkembang pesat.</p><p>Kami sedang mencari peluang untuk segera memulai, jadi mohon hanya melamar jika Anda bersedia sekarang dan bersedia bekerja di lokasi.</p><p>Uraian Tugas:</p><ul><li>Tentukan rencana pertumbuhan perusahaan</li><li>Strategi; membangun dan mengomunikasikan rencana pemasaran pertumbuhan yang komprehensif untuk membantu bisnis mencapai sasaran pendapatannya.</li><li>Pengelolaan; memimpin, mengembangkan, dan menginspirasi tim pemasar pertumbuhan.</li><li>Bertanggung jawab untuk mengoordinasikan dan melaksanakan rencana pertumbuhan yang ditetapkan dalam tanggung jawab pertama</li><li>Riset; menganalisis strategi akuisisi dan retensi kami saat ini, meneliti pesaing, dan berbicara dengan pelanggan kami untuk membantu menginformasikan strategi Anda.</li><li>Bertanggung jawab untuk mengoptimalkan saluran pendapatan</li><li>Konversi Pelanggan; miliki dan tingkatkan cara kami mengubah prospek menjadi pelanggan</li><li>Manajemen pemangku kepentingan; bekerja dengan berbagai pemangku kepentingan di bidang penjualan, keuangan, pemasaran, pengembangan, operasi, dan kesuksesan pelanggan untuk memastikan rencana dan proyek dikomunikasikan dengan tepat.</li><li>Analisis; gunakan GA, Google Tag Manager, dan Mixpanel untuk mengukur dan meningkatkan CAC, MRR, dan LTV.</li></ul>', '<ul><li>Gelar sarjana di bidang Bisnis</li><li>Memiliki pengalaman minimal 8 tahun sebagai pemimpin dalam peran pemasaran pertumbuhan, atau seseorang yang bertanggung jawab penuh atas pertumbuhan di perusahaannya</li><li>Kemampuan dalam mengembangkan hubungan dengan pelanggan dan kemitraan dengan pemangku kepentingan</li><li>Kompetensi dalam manajemen proyek</li><li>Pengalaman yang dapat dibuktikan dalam mempengaruhi pertumbuhan.</li><li>Pendekatan yang mengutamakan data.</li><li>Pengguna alat analisis tingkat lanjut - Google Analytics, Google Pengelola Tag, Mixpanel</li><li>Keterampilan komunikasi yang sangat baik dan kemampuan untuk bekerja dengan tim yang beragam.</li></ul>                ', 1, '2023-11-14 11:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama`, `status`, `image`) VALUES
(1, 'Business Development', 1, '655f071c4c98a.svg'),
(2, 'Finance', 1, 'finance.svg'),
(3, 'Management', 1, 'management.svg'),
(4, 'Sales Marketing', 1, 'salesMarketing.svg'),
(6, 'GA / HRD', 1, '6549b0303da74.svg'),
(7, 'Operation', 1, '6549f85c085ce.svg');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi_event`
--

CREATE TABLE `dokumentasi_event` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokumentasi_event`
--

INSERT INTO `dokumentasi_event` (`id`, `judul`, `image`) VALUES
(1, 'Semesta Harley', '655f02a2539b3.jpg'),
(3, 'Head In The Clouds', '65533984e8c16.png');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `judul`, `slogan`, `deskripsi`, `image`, `lokasi`, `link`, `tanggal_awal`, `tanggal_akhir`) VALUES
(4, 'Semesta Berpesta', 'Nantikan Andmesh di Karawang 12 - 13 Agustus 2023', '<p>Ulang tahun MNC Group ke-33 akan digelar pada 2 November dengan mengusung tema “3ERBAGI & 3ERKARYA”. Acara bertajuk Anniversary Celebration MNC Group 33 ini ditayangkan langsung di RCTI serta live streaming di aplikasi RCTI+ dan Vision+. Pada perayaan HUT MNC Group ke-33 ini akan menghadirkan penampilan spektakuler dari beberapa artis dan musisi papan atas Indonesia seperti Weird Genius, Farel Prayoga, Fabio Asher, Novia Bachmid, 2nd Chance, Pasheman’90, Wehustle, Cassidy, dan Fritzy.Artikel ini telah tayang di www.inews.id dengan judul \" Anniversary Celebration MNC Group Ke-33, Saksikan Keseruannya hanya di RCTI! \", Klik untuk baca: https://www.inews.id/lifestyle/seleb/anniversary-celebration-mnc-group-ke-33-saksikan-keseruannya-hanya-di-rcti.Download aplikasi Inews.id untuk akses berita lebih mudah dan cepat:https://www.inews.id/apps</p>', '65461e47d9130.png', 'Lapangan Galuh Mas, Karawang', 'https://maps.app.goo.gl/UvhVnXaWVaCyPb16A', '2023-09-12', '2023-09-13'),
(5, 'MUSIC FOR ALL FEST', 'LMAC Music For All Fest 2023 Digelar di Bogor Besok, Ada Sejarah Unik yang Bakal Tercipta!', '<p>LMAC Music Forall Fest 2023 adalah sebuah acara musik festival yang sangat dinantikan, yang berlangsung selama dua hari pada tanggal 8-9 September 2023. Acara ini diselenggarakan oleh MNC Media & Entertainment dan menawarkan pengalaman musik outdoor yang spektakuler dengan latar belakang pemandangan pegunungan yang memukau. Selama dua hari tersebut, para penonton akan merasakan sensasi festival musik yang tak terlupakan sambil menikmati berbagai kuliner lezat yang ada di sekitar venue. Acara ini akan berlangsung di Lido Music & Arts Center yang terletak di Bogor, Jawa Barat. Lokasi ini menawarkan suasana yang sangat indah dan nyaman untuk menikmati suguhan musik dari musisi-musisi favorit Anda.Baca selengkapnya di artikel \"Jam Open Gate LMAC Music Forall Fest 2023.</p><p>Line Up LMAC Music Forall Fest 2023 LMAC Music Forall Fest 2023 juga akan menghadirkan sejumlah bintang tamu terkenal dalam industri musik. Pada hari pertama, yaitu tanggal 8 September, Anda dapat menikmati penampilan dari artis-artis sebagai berikut:&nbsp; Taeyang, Secret Number, Mahalini, Rizky Febian, Fourtwnty, DJ Dipha.</p>', '65462abfa6fdd.png', 'Music Art Center, Bogor', 'https://maps.app.goo.gl/UvhVnXaWVaCyPb16A', '2023-08-14', '2023-08-15'),
(6, 'PESTA OKE', 'Pemain Sinetron Ikatan Cinta Siap Ramaikan Pesta Oke RCTI34 di Tangerang', '<p>Setelah mendatangi Jakarta, Bogor dan Bekasi, kini Pesta Oke RCTI34 hadir di Bojong Renged, Kabupaten Tangerang. Masih dengan euforia HUT RCTI ke-34 dengan datang langsung ke tengah masyarakat. Pesta Oke RCTI34 di Tangerang ini akan diramaikan oleh meet & greet para pemain sinetron RCTI kesayangan masyarakat, Ikatan Cinta yaitu Chika Waode, Binyo Rombot dan Jantuk. Tak hanya meet & greet, akan ada games olahraga seperti juggling bola dan tendang bola lomba dalam rangka medukung timnas sepak bola Indonesia di Asian Games yang akan tayang di RCTI. Selain itu juga akan ada menghias tumpeng, musik oke, games oke serta doorprize menarik yang siap dibagikan untuk para warga Kabupaten Tangerang. Saksikan Pesta Oke RCTI34 langsung di Area Gudang Hj. Wira, jln. Pintu Kapuk, kantor Desa Bojong Renged, kab Tangerang pada Sabtu, 16 September 2023 pukul 14.30 WIB gratis tanpa dipungut biaya. Saksikan program terbaik RCTI di kanal digital 28 UHF untuk pemirsa Jabodetabek. Apabila ada kendala dalam penayangan siaran digital, scan ulang Set Top Box kamu, lalu cek kembali sambungan kabel Set Top Box dan kabel antena sudah terpasang dengan baik dan pastikan arah antena kamu sudah benar.<br></p>', '6546369f12ee1.png', 'BKT Pulo Gebang, Jakarta', 'https://maps.app.goo.gl/UvhVnXaWVaCyPb16A', '2023-10-20', '2023-10-20'),
(10, 'BMTH Konser Jakarta', 'Apapun yang terjadi BMTH harga mati', '<p>BMTH bersama Ravel Enternainment selaku promotor mengumumkan secara resmi konser ban metal tersebut dengan mengusung tema \"Church of Genxsis\" yang akan dilaksanakan pada 10 November 2023 mendatang, dengan special guest I PREVIAIL. BMTH bersama Ravel Enternainment selaku promotor mengumumkan secara resmi konser ban metal tersebut dengan mengusung tema \"Church of Genxsis\" yang akan dilaksanakan pada 10 November 2023 mendatang, dengan special guest I PREVIAIL.</p><p>Harga :</p><ol><li>Festival A (Standing) : Rp 2.750.000</li><li>Festival B (Standing) : 2.550.000</li><li>Cat 1 (Seating) : Rp 2.250.000</li><li>Cat 2 (Seating) : Rp 1.500.000</li><li>Cat 3 (Seating) : Rp 1.250.000</li></ol>', '6555b4a263c80.jpg', 'Beach City International Stadium Ancol Jakarta', 'https://maps.app.goo.gl/LDBiAQDrv3Th2gHg8', '2023-11-10', '2023-11-11'),
(11, 'Ed Sheeran Konser Jakarta', 'Ed Sheeran Jaya Jaya Jaya', '<p><i>Wajib hadir! Semesta Berpesta kembali hadir pada 12-13 Agustus 2023,</i> di Karawang. Perhelatan ini akan berlokasi di Lapangan Galuh Mas Karawang dengan berbagai experience yang tidak boleh dilewati. 3 Pilar utama Semesta Berpesta mulai dari musik, kuliner dan fashion siap menyuguhkan hiburan asik bagi para warga Karawang. Beragam kegiatan menarik juga akan memberikan hiburan seru untuk kamu-kamu yang bingung weekend mau ngapain!\r\nEvent dari RAM Entertainment ini akan diwarnai oleh artis-artis seperti Armada, Nella Kharisma pada hari pertama. Hari kedua panggung Semesta Berpesta akan menghadirkan Andmesh, Ndarboy Genk\r\nSelain festival musik, event ini juga memberikan experience lainnya, seperti food truck festival, fashion, costume and cosplay runway dan berbagai kompetisi yang dapat diikuti seperti breakdance competition, karaoke competition, photography competition. Di Semesta Berpesta penonton juga dapat menikmati berbagai spot photo dengan dekorasi yang instagramable di area landmark dan galaxy swings.\r\nUntuk informasi lebih lanjut kunjungi Instagram resmi kami @semestaberpesta untuk mendapatkan informasi terbaru mengenai Semesta Berpesta.</p><p>harga : </p><ol><li>paling depan : 1.000.000.000.00</li><li>tengah : 2.000</li><li>belakang : 15.000.000.00</li><li>di luar : 99999999999999</li></ol>', '6555b5e98db87.jpg', 'Stadion Gelora  Bung Karno', 'https://maps.app.goo.gl/9KDv1Vye5Uea6xms6', '2024-03-03', '2024-03-03'),
(12, 'Coldplay Konser Jakarta', 'Coldplay semakin di depan', '<p>Selaku promotor, PK Entertainment telah merilis harga tiket konser Coldplay Jakarta 2023 melalui akun Instagram-nya. Untuk lebih dari 50 ribu tiket yang tersedia, harganya sendiri dipatok mulai dari Rp 800 ribu hingga Rp 11 juta per orang. Selaku promotor, PK Entertainment telah merilis harga tiket konser Coldplay Jakarta 2023 melalui akun Instagram-nya. Untuk lebih dari 50 ribu tiket yang tersedia, harganya sendiri dipatok mulai dari Rp 800 ribu hingga Rp 11 juta per orang Selaku promotor, PK Entertainment telah merilis harga tiket konser Coldplay Jakarta 2023 melalui akun Instagram-nya. Untuk lebih dari 50 ribu tiket yang tersedia, harganya sendiri dipatok mulai dari Rp 800 ribu hingga Rp 11 juta per orang. Selaku promotor, PK Entertainment telah merilis harga tiket konser Coldplay Jakarta 2023 melalui akun Instagram-nya. Untuk lebih dari 50 ribu tiket yang tersedia, harganya sendiri dipatok mulai dari Rp 800 ribu hingga Rp 11 juta per orang</p>\r\n<p>Lebih rinci, berikut daftar harga tiket konser Coldplay Jakarta 2023:</p><ul><li>Ultimate Experience: Rp 11.000.000</li><li>My Universe (Festival): Rp Rp 5.700.000</li><li>Cat 1 (Numbered Seating): Rp 5.000.000</li><li>Festival (Free Standing): Rp 3.500.000</li><li>Cat 2 (Numbered Seating): Rp 4.000.000</li><li>Cat 3 (Numbered Seating): Rp 3.250.000</li><li>Cat 4 (Numbered Seating): Rp 2.500.000</li><li>Cat 5 (Numbered Seating): Rp 1.750.000</li><li>Cat 6 (Numbered Seating): Rp 1.250.000<br></li><li>Cat 7 (Numbered Seating): Rp 1.250.000 (Restricted View)</li><li>Cat 8 (Numbered Seating): Rp 800.000 (Restricted View)</li></ul>', '6555bf5165074.jpeg', 'Stadion Gelora  Bung Karno', 'https://maps.app.goo.gl/9KDv1Vye5Uea6xms6', '2023-11-15', '2023-11-15'),
(15, 'PESTA TAHUN BARU', 'Daripada di rumah lebih baik ikut event PESTA TAHUN BARU', '<p dir=\"ltr\" style=\"margin: 20px 0px;\">Deskripsi<br>Pesta Tahun Baru adalah perayaan pergantian tahun persembahan Jakarta International Expo dan Boss Creator. Diselenggarakan selama 2 hari di Hall B3 & C3 Jiexpo.<br></p><p dir=\"ltr\" style=\"margin: 20px 0px;\">Sambut tahun yang baru dengan hati riang gembira. Bernyanyi bersama di Pesta Tahun Baru!<br><br>Syarat & Ketentuan<br>PERSYARATAN DAN KETENTUAN TIKET PESTA TAHUN BARU PRESENTED BY JAKARTA INTERNATIONAL EXPO & BOSS CREATOR :</p><ol style=\"margin: 20px 0px; padding-left: 15px;\"><li aria-level=\"1\" dir=\"ltr\" style=\"padding-left: 10px;\"><p dir=\"ltr\" role=\"presentation\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px;\">Untuk mendapatkan tiket, Pembeli harus sudah divaksin minimal tahap kedua. terintegrasi dengan aplikasi peduli lindungi dan akan dicek sebelum masuk venue.</p></li><li aria-level=\"1\" dir=\"ltr\" style=\"padding-left: 10px;\"><p dir=\"ltr\" role=\"presentation\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px;\">Tiket yang sah adalah tiket yang dibeli melalui official ticketing partner Loket.</p></li><li aria-level=\"1\" dir=\"ltr\" style=\"padding-left: 10px;\"><p dir=\"ltr\" role=\"presentation\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px;\">Satu transaksi yang menggunakan satu data attendee, berlaku untuk pembelian maksimal empat tiket.</p></li><li aria-level=\"1\" dir=\"ltr\" style=\"padding-left: 10px;\"><p dir=\"ltr\" role=\"presentation\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px;\">Untuk transaksi berikutnya, data yang sudah pernah diinput dapat digunakan kembali pada nomor transaksi yang berbeda.</p></li><li aria-level=\"1\" dir=\"ltr\" style=\"padding-left: 10px;\"><p dir=\"ltr\" role=\"presentation\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px;\">Panitia dan Promotor tidak bertanggung jawab atas pembelian tiket melalui calo/tempat/kanal/platform/ yang bukan mitra resmi penjualan tiket Pesta Tahun Baru.<br><br>a. Penyelenggara memiliki hak untuk :<br>b. Melarang masuk pengunjung jika tiket telah dipergunakan oleh orang lain.<br>c. Melarang masuk pengunjung ke area venue jika tiket yang digunakan tidak valid.<br>d. Memproses atau mengajukan hukum, baik perdata atau kriminal kepada pengunjung yang mendapatkan tiket dengan illegal termasuk memalsukan dan menggandakan tiket yang sah atau mendapatkan tiket dengan cara yang tidak sesuai prosedur.<br>e. Dalam keadaan Force Majeure seperti bencana alam, kerusuhan, perang, wabah, dan semua keadaan darurat yang diumumkan secara resmi oleh Pemerintah, terkait kenaikan wabah covid. Panitia/penyelenggara/promotor berhak untuk membatalkan dan/atau merubah waktu acara dan tata letak tempat dengan pemberitahuan sebelumnya.</p></li><li aria-level=\"1\" dir=\"ltr\" style=\"padding-left: 10px;\"><p dir=\"ltr\" role=\"presentation\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px;\">Pesta Tahun Baru presented by Jakarta International Expo & Boss Creator adalah pertunjukkan yang diselenggarakan dengan menerapkan protokol kesehatan yang ketat sesuai standar CHSE (Cleanliness, Health, Safety, Environment Sustainability).</p></li><li aria-level=\"1\" dir=\"ltr\" style=\"padding-left: 10px;\"><p dir=\"ltr\" role=\"presentation\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px;\">Harap mematuhi protokol kesehatan yang diterapkan penyelenggara di area venue, mencuci tangan, menggunakan masker, dan menjaga jarak (3M).</p></li><li aria-level=\"1\" dir=\"ltr\" style=\"padding-left: 10px;\"><p dir=\"ltr\" role=\"presentation\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px;\">Pihak penyelenggara menindak tegas, dan berhak mengeluarkan pengunjung apabila tidak mematuhi protokol kesehatan yang telah diterapkan.</p></li><li aria-level=\"1\" dir=\"ltr\" style=\"padding-left: 10px;\"><p dir=\"ltr\" role=\"presentation\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px;\">Pihak penyelenggara menindak tegas, dan berhak mengeluarkan pengunjung apabila tidak mematuhi peraturan untuk penonton, Do & Donâ€™ts, menimbulkan kerusuhan, atau melanggar ketertiban umum.</p></li><li aria-level=\"1\" dir=\"ltr\" style=\"padding-left: 10px;\"><p dir=\"ltr\" role=\"presentation\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px;\">Penonton wajib menempati posisi yang telah ditentukan oleh pihak penyelenggara sesuai dengan kategori tiket.</p></li></ol>', '6564bd16f38f5.jpg', 'Jiexpo Kemayoran Hall B3 &amp; C3', 'https://maps.app.goo.gl/JRmqRkFX7wysEfHSA', '2023-11-29', '2023-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `form_apply`
--

CREATE TABLE `form_apply` (
  `id` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cover_letter` text NOT NULL,
  `application_letter` varchar(12) NOT NULL,
  `cv` varchar(12) NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_apply`
--

INSERT INTO `form_apply` (`id`, `posisi`, `divisi`, `fullname`, `email`, `cover_letter`, `application_letter`, `cv`, `create_at`) VALUES
(1, 'Sales Online', 'Sales Marketing', 'Ardiansyah', 'ardi@gmail.com', 'saya merupakan pribadi', '654c58399ec1', '654c58399f1a', '2023-11-09'),
(6, 'Accountant Executive', 'Business Development', 'Abimana Aryasatya', 'abi@gmail.com', 'Test 12345678910', '6552345e5df9', '6552345e5e77', '2023-11-13'),
(8, 'Staf Akutansi', 'Finance', 'Thio', 'rizkythio60@gmail.com', 'test 12345', '655592967340', '6555929673b4', '2023-11-16'),
(9, 'Staf Akutansi', 'Finance', 'Thio', 'rizkythio60@gmail.com', 'test 12345', '655594f36191', '655594f36238', '2023-11-16'),
(10, 'Staf Akutansi', 'Finance', 'Thio', 'rizkythio60@gmail.com', 'test 12345', '6555951984b7', '655595198553', '2023-11-16'),
(11, 'Staf Akutansi', 'Finance', 'Thio', 'rizkythio60@gmail.com', 'test 12345', '655595b22dda', '655595b22e38', '2023-11-16'),
(12, 'Accountant Executive', 'Business Development', 'Rey Hando', 'rey@b-universe.id', 'TEsting', '655595db077e', '655595db07b8', '2023-11-16'),
(13, 'Accountant Executive', 'Business Development', 'Rey Hando', 'rey@b-universe.id', 'TEsting', '6555987a7526', '6555987a755c', '2023-11-16'),
(14, 'Accountant Executive', 'Business Development', 'Rey Hando', 'rey@b-universe.id', 'TEsting', '6555988de4c8', '6555988de503', '2023-11-16'),
(15, 'Accountant Executive', 'Business Development', 'Rey Hando', 'rey@b-universe.id', 'TEsting', '655598a5df26', '655598a5df61', '2023-11-16'),
(16, 'Accountant Executive', 'Business Development', 'Rey Hando', 'rey@b-universe.id', 'TEsting', '655598b274e7', '655598b27552', '2023-11-16'),
(17, 'Accountant Executive', 'Business Development', 'Rey Hando', 'rey@b-universe.id', 'TEsting', '655598e591d5', '655598e59223', '2023-11-16'),
(18, 'Accountant Executive', 'Business Development', 'Rey Hando', 'rey@b-universe.id', 'TEsting', '655598f656bd', '655598f656fa', '2023-11-16'),
(19, 'Accountant Executive', 'Business Development', 'Rey Hando', 'rey@b-universe.id', 'TEsting', '65559a9c6b21', '65559a9c6b60', '2023-11-16'),
(20, 'Accountant Executive', 'Business Development', 'rey2', 'testing@testing.com', 'Testing', '65559acd3142', '65559acd316b', '2023-11-16'),
(21, 'Accountant Executive', 'Business Development', 'rey3', 'rey@testing.com', 'testing', '65559b6223f5', '65559b622458', '2023-11-16'),
(22, 'Accountant Executive', 'Business Development', 'rey3', 'rey@testing.com', 'testing', '65559b841845', '65559b841887', '2023-11-16'),
(23, 'Accountant Executive', 'Business Development', 'rey4', 'rey@testing.com', 'testing', '65559b99eba7', '65559b99ebd6', '2023-11-16'),
(24, 'Accountant Executive', 'Business Development', 'rey4', 'rey@testing.com', 'testing', '65559bd636d5', '65559bd63712', '2023-11-16'),
(25, 'Accountant Executive', 'Business Development', 'rey5', 'rey@testing.com', 'testing', '65559c15e33f', '65559c15e3c3', '2023-11-16'),
(26, 'Staf Akutansi', 'Finance', 'Muhammad Rifcha', 'rifcha@testing.com', 'testing 123456', '655b55e0ddf4', '655b55e0de6b', '2023-11-20'),
(27, 'Staf Akutansi', 'Finance', 'Muhammad Rifcha', 'rifcha@testing.com', 'testing 123456', '655b56328544', '655b56328587', '2023-11-20'),
(28, 'General Affair', 'GA / HRD', 'Muhammad Rifcha', 'rifcha@testing.com', 'testing 123', '655b569b5bf2', '655b569b5c67', '2023-11-20'),
(29, 'Human Resource Development', 'GA / HRD', 'rifcha2', 'rifcha@testing.com', 'testing1234', '655b586688de', '655b5866893b', '2023-11-20'),
(30, 'Management Accountant', 'Management', 'rifcha6', 'rifcha@testing.com', 'testing123456', '655b61328abb', '655b61328b19', '2023-11-20'),
(35, 'General Affair', 'GA / HRD', 'Testing', 'testing@testing.com', 'covertletter123456', '656f3f517edb', '656f3f517f3d', '2023-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `deskripsi`, `image1`, `image2`, `image3`, `image4`) VALUES
(7, 'Semesta berpesta', 'Semesta Berpesta adalah sebuah acara hiburan yang diselenggarakan oleh RAM Entertainment. Acara ini menggabungkan berbagai elemen hiburan dalam satu tempat dan memberikan kesempatan bagi masyarakat untuk merasakan pengalaman yang unik dan seru.', 'unsplash_gMsnXqILjp4.png', 'unsplash_gMsnXqILjp42.png', '65661416b61a9.jpg', 'unsplash_gMsnXqILjp4.png'),
(8, 'B-Universe Day Out', 'B-Universe day out merupakan salah satu kegiatan yang rutin di lakukan oleh B-Universe dalam melakukan upgrading dan team bonding untuk meningkatkan keaktifan dan keikutsertaan karyawan dalam melakukan kegiatan rutin yang diadakan B-Universe.', '6568505122319.jpg', '2021-12-04 (1).png', '2022-02-05.png', 'unsplash_gMsnXqILjp04.png'),
(9, 'Weekly meeting', 'Potret kegiatan rutin dari divisi IT yang melakukan weekly meeting untuk membahas progress on going, kendala, dan inovasi kedepan dalam memberikan layanan kepada pelanggan atau penonton setia dari BTV ', '6568522af0df6.jpg', 'unsplash_gMsnXqILjp4213.png', 'unsplash_gMsnXqILjp41231.png', NULL),
(18, 'Semesta GenZ', 'test123456', '65662430dbf95.png', '656615fa75246.jpg', '656616dd49136.png', '65662430dc48c.png');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_acara` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_acara`, `hari`, `jam`) VALUES
(1, 1, 'Senin', '00.30-01.30'),
(3, 2, 'Senin', '01.30-02.30'),
(4, 3, 'Senin', '02.30-03.30'),
(5, 4, 'Senin', '03.30-04.30'),
(6, 5, 'Senin', '04.30-06.30'),
(7, 6, 'Senin', '06.30-07.30'),
(8, 7, 'Senin', '07.30-08.30'),
(9, 8, 'Senin', '08.30-09.30'),
(10, 9, 'Senin', '08.30-10.30'),
(11, 10, 'Senin', '10.30-11.30'),
(12, 11, 'Senin', '11.30-12.30'),
(14, 1, 'Senin', '12.30-13.30'),
(15, 2, 'Senin', '13.30-14.30'),
(16, 6, 'Senin', '14.30-15.30'),
(17, 3, 'Senin', '15.30-16.30'),
(18, 11, 'Senin', '16.30-19.30'),
(19, 18, 'Senin', '19.30-21.30'),
(20, 4, 'Senin', '21.30-22.30'),
(21, 8, 'Senin', '22.30-23.00'),
(22, 24, 'Senin', '23.00-00.00'),
(23, 14, 'Selasa', '00.00-01.00'),
(24, 1, 'Selasa', '01.00-02.00'),
(25, 4, 'Selasa', '02.00-03.00'),
(26, 9, 'Selasa', '03.00-04.00'),
(27, 18, 'Selasa', '04.00-06.00'),
(28, 5, 'Selasa', '06.00-07.00'),
(29, 17, 'Selasa', '07.00-08.00'),
(30, 23, 'Selasa', '09.00-10.00'),
(31, 16, 'Selasa', '10.00-11.00'),
(32, 26, 'Selasa', '11.00-12.00'),
(33, 2, 'Selasa', '12.00-13.00'),
(34, 19, 'Selasa', '13.00-16.00'),
(35, 3, 'Selasa', '16.00-17.00'),
(36, 23, 'Selasa', '17.00-19.30'),
(37, 20, 'Selasa', '19.30-21.30'),
(38, 4, 'Selasa', '21.30-22.30'),
(39, 12, 'Selasa', '22.30-23.00'),
(40, 14, 'Selasa', '23.00-00.00'),
(41, 1, 'Rabu', '00.00-01.00'),
(42, 2, 'Rabu', '01.00-02.00'),
(43, 6, 'Rabu', '02.00-03.00'),
(44, 26, 'Rabu', '03.00-04.00'),
(45, 18, 'Rabu', '04.00-06.00'),
(46, 5, 'Rabu', '06.00-07.00'),
(47, 17, 'Rabu', '07.00-08.00'),
(48, 26, 'Rabu', '08.00-09.00'),
(49, 21, 'Rabu', '09.00-10.00'),
(50, 26, 'Rabu', '10.00-11.00'),
(51, 9, 'Rabu', '11.00-12.00'),
(52, 2, 'Rabu', '12.00-13.00'),
(53, 19, 'Rabu', '13.00-16.00'),
(54, 3, 'Rabu', '16.00-17.00'),
(55, 21, 'Rabu', '17.00-19.30'),
(56, 15, 'Rabu', '19.30-21.30'),
(57, 4, 'Rabu', '21.30-22.30'),
(58, 12, 'Rabu', '22.30-23.00'),
(59, 11, 'Rabu', '23.00-00.00'),
(60, 16, 'Kamis', '00.00-01.00'),
(61, 1, 'Kamis', '01.00-02.00'),
(62, 22, 'Kamis', '02.00-03.00'),
(63, 14, 'Kamis', '03.00-04.00'),
(64, 18, 'Kamis', '04.00-06.00'),
(65, 5, 'Kamis', '06.00-07.00'),
(66, 17, 'Kamis', '07.00-08.00'),
(67, 16, 'Kamis', '08.00-09.00'),
(68, 11, 'Kamis', '09.00-10.00'),
(69, 7, 'Kamis', '10.00-11.00'),
(70, 2, 'Kamis', '12.00-13.00'),
(71, 19, 'Kamis', '13.00-16.00'),
(72, 3, 'Kamis', '16.00-17.00'),
(73, 21, 'Kamis', '17.00-19.30'),
(74, 15, 'Kamis', '19.30-21.30'),
(75, 4, 'Kamis', '19.30-21.30'),
(76, 4, 'Kamis', '21.30-22.30'),
(77, 12, 'Kamis', '22.30-23.00'),
(78, 22, 'Kamis', '23.00-00.00'),
(79, 6, 'Jumat', '00.00-01.00'),
(80, 8, 'Jumat', '01.00-02.00'),
(81, 9, 'Jumat', '02.00-03.00'),
(82, 6, 'Jumat', '03.00-04.00'),
(83, 18, 'Jumat', '04.00-06.00'),
(84, 5, 'Jumat', '06.00-07.00'),
(85, 17, 'Jumat', '08.00-09.00'),
(86, 20, 'Jumat', '09.00-10.00'),
(87, 22, 'Jumat', '10.00-11.00'),
(88, 2, 'Jumat', '12.00-13.00'),
(89, 19, 'Jumat', '13.00-16.00'),
(90, 3, 'Jumat', '16.00-17.00'),
(91, 21, 'Jumat', '17.00-20.00'),
(92, 15, 'Jumat', '20.00-22.30'),
(93, 4, 'Jumat', '22.30-23.00'),
(94, 12, 'Jumat', '23.00-00.00'),
(95, 11, 'Sabtu', '00.00-01.00'),
(96, 10, 'Sabtu', '01.00-02.00'),
(97, 22, 'Sabtu', '02.00-03.00'),
(98, 24, 'Sabtu', '03.00-04.00'),
(99, 18, 'Sabtu', '04.00-06.00'),
(100, 5, 'Sabtu', '06.00-07.00'),
(101, 17, 'Sabtu', '07.00-08.00'),
(102, 16, 'Sabtu', '08.00-09.00'),
(103, 14, 'Sabtu', '09.00-10.00'),
(104, 20, 'Sabtu', '10.00-11.00'),
(105, 2, 'Sabtu', '11.00-12.00'),
(106, 8, 'Sabtu', '12.00-13.00'),
(107, 19, 'Sabtu', '13.00-16.00'),
(108, 3, 'Sabtu', '16.00-17.00'),
(109, 21, 'Sabtu', '17.00-19.30'),
(110, 15, 'Sabtu', '19.30-21.30'),
(111, 4, 'Sabtu', '21.30-22.30'),
(112, 23, 'Sabtu', '22.30-23.00'),
(113, 26, 'Sabtu', '23.00-00.00'),
(114, 1, 'Minggu', '00.00-01.00'),
(115, 4, 'Minggu', '01.00-02.00'),
(116, 13, 'Minggu', '02.00-03.00'),
(117, 9, 'Minggu', '03.00-04.00'),
(118, 18, 'Minggu', '04.00-06.00'),
(119, 5, 'Minggu', '06.00-07.00'),
(120, 17, 'Minggu', '07.00-08.00'),
(121, 16, 'Minggu', '08.00-09.00'),
(122, 11, 'Minggu', '09.00-10.00'),
(123, 13, 'Minggu', '10.00-11.00'),
(124, 2, 'Minggu', '11.00-12.00'),
(125, 20, 'Minggu', '12.00-13.00'),
(126, 19, 'Minggu', '13.00-16.00'),
(127, 8, 'Minggu', '16.00-17.00'),
(128, 21, 'Minggu', '17.00-19.30'),
(129, 15, 'Minggu', '19.30-21.30'),
(130, 4, 'Minggu', '21.30-22.30'),
(131, 12, 'Minggu', '22.30-23.00'),
(132, 23, 'Minggu', '23.00-00.00');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor` varchar(13) NOT NULL,
  `pesan` text NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `nomor`, `pesan`, `create_at`) VALUES
(4, 'Andi', 'andi@gmail.com', '0821312876320', 'semoga sukses dan bahagia selalu saya selalu suppor B-Universe', '2023-10-20'),
(6, 'Aryo', 'aryobasto@gmail.com', '0813212389123', 'Semoga B-Universe selalu bertumbuh dan menjadi perusahaan yang semakin terkemuka. Tetap menjadi perusahaan yang selalu memberikan kesempatan baik kepada banyak orang. Terus pertahankan kultur perusahaan yang hangat, yang tidak hanya mengutamakan bekerja, tetapi juga saling peduli seperti keluarga. Semoga perusahaan dan teman-teman semua terus bertumbuh dan sukses selalu.', '2023-10-20'),
(8, 'Andik', 'andi@gmail.com', '0812398127', 'Menjadi bagian dari perusahaan ini adalah pengalaman yang tak terlupakan untuk saya. Banyak pengalaman baik dan berkesan untuk saya kenang bahkan hingga saya tua nanti. Terima kasih atas kesempatan berharga yang diberikan kepada saya untuk bergabung di perusahaan ini.Semoga perusahaan ini dan seluruh rekan semua sukses selalu. Jangan lupa untuk menjaga kesehatan ya, teman-teman semua.', '2023-10-20'),
(12, 'Ronaldo', 'ado@gmail.com', '081239812379', 'Test program ', '2023-11-07'),
(13, 'Rifcha', 'rifcha@gmail.com', '0821381923812', 'Saya berharap agar..', '2023-11-09'),
(14, 'Management', 'rifcha@testing.com', '081232131123', 'sukses selalu', '2023-11-27'),
(15, 'Testing', 'rifcha@testing.com', '0812312817', 'Semoga sukses terus B-Universe dan selalu jaya.', '2023-12-05'),
(16, 'Testing', 'rifcha@testing.com', '0812312817', 'Semoga sukses terus B-Universe dan selalu jaya.', '2023-12-05'),
(17, 'Testing', 'rifcha@testing.com', '081238127126', 'Semoga sukses dan jaya selalu b-universe.', '2023-12-05'),
(18, 'Management', 'rifcha@testing.com', '081238129321', 'testing123456', '2023-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `program_unggulan`
--

CREATE TABLE `program_unggulan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `jadwal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_unggulan`
--

INSERT INTO `program_unggulan` (`id`, `judul`, `deskripsi`, `image`, `jadwal`) VALUES
(3, 'Nyari makan', 'Anindya Salsabila, akan jalan-jalan dan icip-icip makanan serta minuman enak yang pastinya bisa jadi referensi baru menu kulineran kalian nih.', '653fbba3c8878.png', 'Setiap Senin - Jumat Pukul 09:30'),
(6, 'Jalan Dakwah Bersama Gus Miftah', 'Terjalinnya persatuan dan persaudaraan antarumat beragama akan menciptakan ketenangan hidup dan perdamaian dalam bernegara.Gus Miftah akan menjabarkannya lebih dalam di program Jalan Dakwah siang ini.', '65409de9453b5.png', 'Setiap Selasa - Minggu Pukul 12:00'),
(7, 'Asal-Usul', 'Tren hiburan yang bisa jadi alternatif baru untuk menghilangkan penat dan sedang hype di kalangan milenial saat ini adalah podcast. Dikenal dengan sebutan “radio zaman now”                            ', '6540b22e3fc87.png', 'Setiap Senin - Jumat Pukul 19:15');

-- --------------------------------------------------------

--
-- Table structure for table `shorts`
--

CREATE TABLE `shorts` (
  `id` int(11) NOT NULL,
  `video_id` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shorts`
--

INSERT INTO `shorts` (`id`, `video_id`, `judul`, `deskripsi`) VALUES
(1, '6sUEsaaNMlc', 'Can You Find A Needle?', 'Cara mencari jarum di dalam jerami'),
(3, 'l9_8_pDTmis', 'MrBeast', 'MrBeast challenge'),
(4, 'gvocDKs_Sno', 'Oreo Roll Roulette!', 'Oreo Roll Roulette '),
(5, 'lHLIxLc6GuQ', 'Rating Strangers Shots (Crazy Fail)', 'Rating Strangers Shots (Crazy Fail)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_lowongan`
--
ALTER TABLE `detail_lowongan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumentasi_event`
--
ALTER TABLE `dokumentasi_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_apply`
--
ALTER TABLE `form_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acara` (`id_acara`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_unggulan`
--
ALTER TABLE `program_unggulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shorts`
--
ALTER TABLE `shorts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `detail_lowongan`
--
ALTER TABLE `detail_lowongan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dokumentasi_event`
--
ALTER TABLE `dokumentasi_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `form_apply`
--
ALTER TABLE `form_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `program_unggulan`
--
ALTER TABLE `program_unggulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shorts`
--
ALTER TABLE `shorts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_lowongan`
--
ALTER TABLE `detail_lowongan`
  ADD CONSTRAINT `detail_lowongan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_acara`) REFERENCES `acara` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
