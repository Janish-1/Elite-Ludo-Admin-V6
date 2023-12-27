-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table ludo.tournament_tables
CREATE TABLE IF NOT EXISTS `tournament_tables` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tournament_id` varchar(255) NOT NULL,
  `table_id` varchar(255) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `player_id1` varchar(255) DEFAULT NULL,
  `player_id2` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `winner` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=latin1;

-- Dumping data for table ludo.tournament_tables: ~84 rows (approximately)
REPLACE INTO `tournament_tables` (`id`, `tournament_id`, `table_id`, `game_name`, `player_id1`, `player_id2`, `status`, `winner`, `updated_at`, `created_at`) VALUES
	(173, 'T1J', '1', 'newform 1', 'LUDO999001', 'LUDO999002', '2/2', 'LUDO999002', '2023-12-27 12:15:05', '2023-12-27 11:43:30'),
	(174, 'T1J', '2', 'newform 2', 'LUDO999003', 'LUDO999004', '2/2', 'LUDO999004', '2023-12-27 12:15:08', '2023-12-27 11:43:30'),
	(175, 'T1J', '3', 'newform 3', 'LUDO999005', 'LUDO999006', '2/2', 'LUDO999006', '2023-12-27 12:15:12', '2023-12-27 11:43:30'),
	(176, 'T1J', '4', 'newform 4', 'LUDO999007', 'LUDO999008', '2/2', 'LUDO999008', '2023-12-27 12:15:15', '2023-12-27 11:43:30'),
	(177, 'T1J', '5', 'newform 5', 'LUDO999009', 'LUDO999010', '2/2', 'LUDO999010', '2023-12-27 12:15:21', '2023-12-27 11:43:30'),
	(178, 'T1J', '6', 'newform 6', 'LUDO999011', 'LUDO999012', '2/2', 'LUDO999012', '2023-12-27 12:15:26', '2023-12-27 11:43:30'),
	(179, 'T1J', '7', 'newform 7', 'LUDO999013', 'LUDO999014', '2/2', 'LUDO999014', '2023-12-27 12:15:31', '2023-12-27 11:43:30'),
	(180, 'T1J', '8', 'newform 8', 'LUDO999015', 'LUDO999016', '2/2', 'LUDO999016', '2023-12-27 12:15:37', '2023-12-27 11:43:30'),
	(181, 'T1J', '9', 'newform 9', 'LUDO999017', 'LUDO999018', '2/2', 'LUDO999018', '2023-12-27 12:15:44', '2023-12-27 11:43:30'),
	(182, 'T1J', '10', 'newform 10', 'LUDO999019', 'LUDO999020', '2/2', 'LUDO999020', '2023-12-27 12:15:47', '2023-12-27 11:43:30'),
	(183, 'T1J', '11', 'newform 11', 'LUDO999021', 'LUDO999022', '2/2', 'LUDO999022', '2023-12-27 12:15:59', '2023-12-27 11:43:30'),
	(184, 'T1J', '12', 'newform 12', 'LUDO999023', 'LUDO999024', '2/2', 'LUDO999024', '2023-12-27 12:16:01', '2023-12-27 11:43:30'),
	(185, 'T1J', '13', 'newform 13', 'LUDO999025', 'LUDO999026', '2/2', 'LUDO999026', '2023-12-27 12:16:04', '2023-12-27 11:43:30'),
	(186, 'T1J', '14', 'newform 14', 'LUDO999027', 'LUDO999028', '2/2', 'LUDO999028', '2023-12-27 12:16:07', '2023-12-27 11:43:30'),
	(187, 'T1J', '15', 'newform 15', 'LUDO999029', 'LUDO999030', '2/2', 'LUDO999030', '2023-12-27 12:16:11', '2023-12-27 11:43:30'),
	(188, 'T1J', '16', 'newform 16', 'LUDO999031', 'LUDO999032', '2/2', 'LUDO999032', '2023-12-27 12:16:22', '2023-12-27 11:43:30'),
	(189, 'T1J', '17', 'newform 17', 'LUDO999033', 'LUDO999034', '2/2', 'LUDO999034', '2023-12-27 12:16:24', '2023-12-27 11:43:30'),
	(190, 'T1J', '18', 'newform 18', 'LUDO999035', 'LUDO999036', '2/2', 'LUDO999036', '2023-12-27 12:16:27', '2023-12-27 11:43:30'),
	(191, 'T1J', '19', 'newform 19', 'LUDO999037', 'LUDO999038', '2/2', 'LUDO999038', '2023-12-27 12:16:30', '2023-12-27 11:43:30'),
	(192, 'T1J', '20', 'newform 20', 'LUDO999039', 'LUDO999040', '2/2', 'LUDO999040', '2023-12-27 12:16:34', '2023-12-27 11:43:30'),
	(193, 'T1J', '21', 'newform 21', 'LUDO999041', 'LUDO999042', '2/2', 'LUDO999042', '2023-12-27 12:16:37', '2023-12-27 11:43:30'),
	(194, 'T1J', '22', 'newform 22', 'LUDO999043', 'LUDO999044', '2/2', 'LUDO999044', '2023-12-27 12:16:42', '2023-12-27 11:43:30'),
	(195, 'T1J', '23', 'newform 23', 'LUDO999045', 'LUDO999046', '2/2', 'LUDO999046', '2023-12-27 12:16:57', '2023-12-27 11:43:30'),
	(196, 'T1J', '24', 'newform 24', 'LUDO999047', 'LUDO999048', '2/2', 'LUDO999048', '2023-12-27 12:17:01', '2023-12-27 11:43:30'),
	(197, 'T1J', '25', 'newform 25', 'LUDO999049', 'LUDO999050', '2/2', 'LUDO999050', '2023-12-27 12:17:08', '2023-12-27 11:43:30'),
	(198, 'T1J', '26', 'newform 26', 'LUDO999051', 'LUDO999052', '2/2', 'LUDO999052', '2023-12-27 12:17:15', '2023-12-27 11:43:30'),
	(199, 'T1J', '27', 'newform 27', 'LUDO999053', 'LUDO999054', '2/2', 'LUDO999054', '2023-12-27 12:17:18', '2023-12-27 11:43:31'),
	(200, 'T1J', '28', 'newform 28', 'LUDO999055', 'LUDO999056', '2/2', 'LUDO999056', '2023-12-27 12:17:21', '2023-12-27 11:43:31'),
	(201, 'T1J', '29', 'newform 29', 'LUDO999057', 'LUDO999058', '2/2', 'LUDO999058', '2023-12-27 12:17:24', '2023-12-27 11:43:31'),
	(202, 'T1J', '30', 'newform 30', 'LUDO999059', 'LUDO999060', '2/2', 'LUDO999060', '2023-12-27 12:17:28', '2023-12-27 11:43:31'),
	(203, 'T1J', '31', 'newform 31', 'LUDO999061', 'LUDO999062', '2/2', 'LUDO999062', '2023-12-27 12:17:32', '2023-12-27 11:43:31'),
	(204, 'T1J', '32', 'newform 32', 'LUDO999063', 'LUDO999064', '2/2', 'LUDO999064', '2023-12-27 12:17:35', '2023-12-27 11:43:31'),
	(205, 'T1J', '33', 'newform 33', 'LUDO999065', 'LUDO999066', '2/2', 'LUDO999066', '2023-12-27 12:17:39', '2023-12-27 11:43:31'),
	(206, 'T1J', '34', 'newform 34', 'LUDO999067', 'LUDO999068', '2/2', 'LUDO999068', '2023-12-27 12:17:42', '2023-12-27 11:43:31'),
	(207, 'T1J', '35', 'newform 35', 'LUDO999069', 'LUDO999070', '2/2', 'LUDO999070', '2023-12-27 12:17:47', '2023-12-27 11:43:31'),
	(208, 'T1J', '36', 'newform 36', 'LUDO999071', 'LUDO999072', '2/2', 'LUDO999072', '2023-12-27 12:17:53', '2023-12-27 11:43:31'),
	(209, 'T1J', '37', 'newform 37', 'LUDO999073', 'LUDO999074', '2/2', 'LUDO999074', '2023-12-27 12:17:55', '2023-12-27 11:43:31'),
	(210, 'T1J', '38', 'newform 38', 'LUDO999075', 'LUDO999076', '2/2', 'LUDO999076', '2023-12-27 12:17:59', '2023-12-27 11:43:31'),
	(211, 'T1J', '39', 'newform 39', 'LUDO999077', 'LUDO999078', '2/2', 'LUDO999078', '2023-12-27 12:18:02', '2023-12-27 11:43:31'),
	(212, 'T1J', '40', 'newform 40', 'LUDO999079', 'LUDO999080', '2/2', 'LUDO999080', '2023-12-27 12:18:08', '2023-12-27 11:43:31'),
	(213, 'T1J', '41', 'newform 41', 'LUDO999081', 'LUDO999082', '2/2', 'LUDO999082', '2023-12-27 12:18:15', '2023-12-27 11:43:31'),
	(214, 'T1J', '42', 'newform 42', 'LUDO999083', 'LUDO999084', '2/2', 'LUDO999084', '2023-12-27 12:18:18', '2023-12-27 11:43:31'),
	(215, 'T1J', '43', 'newform 43', 'LUDO999085', 'LUDO999086', '2/2', 'LUDO999086', '2023-12-27 12:18:21', '2023-12-27 11:43:31'),
	(216, 'T1J', '44', 'newform 44', 'LUDO999087', 'LUDO999088', '2/2', 'LUDO999088', '2023-12-27 12:18:24', '2023-12-27 11:43:31'),
	(217, 'T1J', '45', 'newform 45', 'LUDO999089', 'LUDO999090', '2/2', 'LUDO999090', '2023-12-27 12:18:29', '2023-12-27 11:43:31'),
	(218, 'T1J', '46', 'newform 46', 'LUDO999091', 'LUDO999092', '2/2', 'LUDO999092', '2023-12-27 12:18:34', '2023-12-27 11:43:31'),
	(219, 'T1J', '47', 'newform 47', 'LUDO999093', 'LUDO999094', '2/2', 'LUDO999094', '2023-12-27 12:18:37', '2023-12-27 11:43:31'),
	(220, 'T1J', '48', 'newform 48', 'LUDO999095', 'LUDO999096', '2/2', 'LUDO999096', '2023-12-27 12:18:40', '2023-12-27 11:43:31'),
	(221, 'T1J', '49', 'newform 49', 'LUDO999097', 'LUDO999098', '2/2', 'LUDO999098', '2023-12-27 12:18:44', '2023-12-27 11:43:31'),
	(222, 'T1J', '50', 'newform 50', 'LUDO999099', 'LUDO999100', '2/2', 'LUDO999100', '2023-12-27 12:18:48', '2023-12-27 11:43:31'),
	(223, 'T1J', '51', 'newform 51', 'LUDO999101', 'LUDO999102', '2/2', 'LUDO999102', '2023-12-27 12:18:51', '2023-12-27 11:43:31'),
	(224, 'T1J', '52', 'newform 52', 'LUDO999103', 'LUDO999104', '2/2', 'LUDO999104', '2023-12-27 12:18:58', '2023-12-27 11:43:31'),
	(225, 'T1J', '53', 'newform 53', 'LUDO999105', 'LUDO999106', '2/2', 'LUDO999106', '2023-12-27 12:19:05', '2023-12-27 11:43:31'),
	(226, 'T1J', '54', 'newform 54', 'LUDO999107', 'LUDO999108', '2/2', 'LUDO999108', '2023-12-27 12:19:12', '2023-12-27 11:43:31'),
	(227, 'T1J', '55', 'newform 55', 'LUDO999109', 'LUDO999110', '2/2', 'LUDO999110', '2023-12-27 12:19:32', '2023-12-27 11:43:31'),
	(228, 'T1J', '56', 'newform 56', 'LUDO999111', 'LUDO999112', '2/2', 'LUDO999112', '2023-12-27 12:19:27', '2023-12-27 11:43:31'),
	(229, 'T1J', '57', 'newform 57', 'LUDO999113', 'LUDO999114', '2/2', 'LUDO999114', '2023-12-27 12:19:35', '2023-12-27 11:43:31'),
	(230, 'T1J', '58', 'newform 58', 'LUDO999115', 'LUDO999116', '2/2', 'LUDO999116', '2023-12-27 12:19:38', '2023-12-27 11:43:31'),
	(231, 'T1J', '59', 'newform 59', 'LUDO999117', 'LUDO999118', '2/2', 'LUDO999118', '2023-12-27 12:19:45', '2023-12-27 11:43:31'),
	(232, 'T1J', '60', 'newform 60', 'LUDO999119', 'LUDO999120', '2/2', 'LUDO999120', '2023-12-27 12:19:49', '2023-12-27 11:43:31'),
	(233, 'T1J', '61', 'newform 61', 'LUDO999121', 'LUDO999122', '2/2', 'LUDO999122', '2023-12-27 12:20:04', '2023-12-27 11:43:31'),
	(234, 'T1J', '62', 'newform 62', 'LUDO999123', 'LUDO999124', '2/2', 'LUDO999124', '2023-12-27 12:20:07', '2023-12-27 11:43:31'),
	(235, 'T1J', '63', 'newform 63', 'LUDO999125', 'LUDO999126', '2/2', 'LUDO999126', '2023-12-27 12:20:10', '2023-12-27 11:43:31'),
	(236, 'T1J', '64', 'newform 64', 'LUDO999127', 'LUDO999128', '2/2', 'LUDO999128', '2023-12-27 12:20:15', '2023-12-27 11:43:32');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
