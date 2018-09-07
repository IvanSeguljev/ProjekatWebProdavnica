-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 11:45 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekatdb`
--

--
-- Dumping data for table `kategorijas`
--

INSERT INTO `kategorijas` (`id`, `naziv`, `created_at`, `updated_at`) VALUES
(1, 'Otpornici', NULL, NULL),
(2, 'Diode', NULL, NULL),
(3, 'Transformatori', NULL, NULL),
(4, 'Knjige', NULL, NULL),
(5, 'Lemna oprema i pribor', '2018-07-25 10:06:05', '2018-07-25 10:06:05'),
(6, 'Intregrisana kola', '2018-07-25 10:10:27', '2018-07-25 10:10:27');

--
-- Dumping data for table `korpas`
--

INSERT INTO `korpas` (`id`, `user_id`, `proizvod_id`, `kolicina`, `created_at`, `updated_at`) VALUES
(11, 6, 1, 3, '2018-07-26 18:50:02', '2018-07-26 18:50:02'),
(12, 6, 5, 20, '2018-07-26 18:50:12', '2018-07-26 18:50:12'),
(13, 6, 9, 1, '2018-07-26 18:50:18', '2018-07-26 18:50:18'),
(14, 6, 11, 5, '2018-07-26 18:50:30', '2018-07-26 18:50:41');

--
-- Dumping data for table `proizvods`
--

INSERT INTO `proizvods` (`id`, `slika`, `naziv`, `opis`, `kategorija_id`, `kolicina`, `cenaPoKomadu`, `created_at`, `updated_at`) VALUES
(1, '1532519869.jpg', 'Otpornik 1Kohm 3W', 'Snaga: 3W\r\nOtpornost: 1Kohm', 1, 462, 2, '2018-07-25 09:57:49', '2018-07-26 18:50:02'),
(2, '1532520027.jpg', 'Transformator', 'primar: 230V 50HZ\r\nSekundar: 12V 2A', 3, 0, 400, '2018-07-25 10:00:27', '2018-07-25 10:13:31'),
(3, '1532520092.gif', 'Zabavni LED projekti', 'Knjiga o zanimljivim projektima sa LE diodama', 4, 4, 600, '2018-07-25 10:01:32', '2018-07-26 18:33:19'),
(4, '1532520139.jpg', 'LED crvena', 'Crvena LED', 2, 700, 20, '2018-07-25 10:02:19', '2018-07-25 10:02:19'),
(5, '1532520169.jpg', 'LED zelena', 'Zelena LED', 2, 659, 20, '2018-07-25 10:02:49', '2018-07-26 18:50:12'),
(6, '1532520212.jpg', 'Plava LED', 'Plava LED', 2, 700, 20, '2018-07-25 10:03:32', '2018-07-25 10:03:32'),
(7, '1532520253.gif', 'Elektronika za neupucene', 'Knjiga o osnovama elektronike za pocetnike', 4, 0, 800, '2018-07-25 10:04:13', '2018-07-25 10:11:42'),
(8, '1532520319.jpg', 'Dioda 2n4007', 'Najpopularnija dioda', 2, 80, 5, '2018-07-25 10:05:19', '2018-07-26 18:21:09'),
(9, '1532520416.jpg', 'Lemilica ersa', 'Snaga: 40w', 5, 2, 3000, '2018-07-25 10:06:56', '2018-07-26 18:50:18'),
(10, '1532520518.jpg', 'Kalaj', 'Kalaj/Olovo - 40/60\r\nduzina: 20m\r\npoluprecnik: 0.5mm', 5, 6, 799, '2018-07-25 10:08:38', '2018-07-26 18:51:30'),
(11, '1532520595.jpg', 'Pertinaks perforirani', 'Perforirana pertinaks ploca dimenzija 20cmX30cm', 5, 9, 120, '2018-07-25 10:09:55', '2018-07-26 18:50:41'),
(12, '1532520675.jpg', 'NE555', 'Tajmersko integrisano kolo', 6, 0, 50, '2018-07-25 10:11:15', '2018-07-25 10:11:15');

--
-- Dumping data for table `racuns`
--

INSERT INTO `racuns` (`id`, `ukupanIznos`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 640, 8, '2018-07-26 16:37:26', '2018-07-26 16:37:26'),
(2, 520, 6, '2018-07-26 18:33:22', '2018-07-26 18:33:22'),
(3, 949, 6, '2018-07-26 18:34:06', '2018-07-26 18:34:06');

--
-- Dumping data for table `stavka_racunas`
--

INSERT INTO `stavka_racunas` (`id`, `racun_id`, `iznos`, `nazivProizvoda`, `kolicina`, `proizvod_id`, `created_at`, `updated_at`) VALUES
(1, 1, 40, 'Otpornik 1Kohm 3W', 20, 1, '2018-07-26 16:37:26', '2018-07-26 16:37:26'),
(2, 1, 600, 'Zabavni LED projekti', 1, 3, '2018-07-26 16:37:26', '2018-07-26 16:37:26'),
(3, 2, 400, 'LED zelena', 20, 5, '2018-07-26 18:33:22', '2018-07-26 18:33:22'),
(4, 2, 20, 'Otpornik 1Kohm 3W', 10, 1, '2018-07-26 18:33:22', '2018-07-26 18:33:22'),
(5, 2, 100, 'Dioda 2n4007', 20, 8, '2018-07-26 18:33:22', '2018-07-26 18:33:22'),
(6, 3, 20, 'LED zelena', 1, 5, '2018-07-26 18:34:06', '2018-07-26 18:34:06'),
(7, 3, 10, 'Otpornik 1Kohm 3W', 5, 1, '2018-07-26 18:34:06', '2018-07-26 18:34:06'),
(8, 3, 799, 'Kalaj', 1, 10, '2018-07-26 18:34:06', '2018-07-26 18:34:06'),
(9, 3, 120, 'Pertinaks perforirani', 1, 11, '2018-07-26 18:34:06', '2018-07-26 18:34:06');

--
-- Dumping data for table `transakcijas`
--

INSERT INTO `transakcijas` (`id`, `iznos`, `komentar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2000, 'Korisnik uplatio novac na racun', 8, '2018-07-26 16:37:17', '2018-07-26 16:37:17'),
(2, 640, 'korisnik platio racun 1', 8, '2018-07-26 16:37:26', '2018-07-26 16:37:26'),
(3, 500, 'Korisnik uplatio novac na racun', 6, '2018-07-26 18:20:14', '2018-07-26 18:20:14'),
(4, 2000, 'Korisnik uplatio novac na racun', 6, '2018-07-26 18:20:20', '2018-07-26 18:20:20'),
(5, 500, 'Korisnik uplatio novac na racun', 6, '2018-07-26 18:20:28', '2018-07-26 18:20:28'),
(6, 520, 'korisnik platio racun 2', 6, '2018-07-26 18:33:22', '2018-07-26 18:33:22'),
(7, 949, 'korisnik platio racun 3', 6, '2018-07-26 18:34:06', '2018-07-26 18:34:06');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `stanjeNaRacunu`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Ivan', 'ivan.seguljev@yahoo.com', '$2y$10$qJH57mhUoXFwIETC813naeeOnPQZHmL64gWQxn5TgiQxjlE/CF8S.', 'Korisnik', 1531, 'CJtAtQDipsQRK1qGIbX0mcndgMro1WVpe8XjtNpMfQdD6QqzoXCOrMgRcZiG', NULL, '2018-07-26 18:34:06'),
(7, 'Pera', 'pera@mail.com', '$2y$10$CZDBGE6EWRTsIp1fo8cwB.P0DWc.2zlJI9gxsaHoIGDi6RXtfEafy', 'Korisnik', 0, NULL, NULL, NULL),
(8, 'Admin', 'admin@mail.com', '$2y$10$1YtKAseq0gwpdb422XgQyudmAP06mTqBQJoXhl6hbzd18vfGjiWGi', 'Administrator', 1360, 'Bng42v3hZKtyB0ew9ph0eoDv1BVmKmmEa1AN3bD7NSeHtZQLF1lNmFHINTNv', NULL, '2018-07-26 16:37:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
