-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: 192.168.25.219    Database: db_slipgaji
-- ------------------------------------------------------
-- Server version	5.6.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_upload_dipo`
--

DROP TABLE IF EXISTS `tbl_upload_char`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_upload_char` (
  `upload_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `periode_date` date DEFAULT NULL,
  `nik` varchar(10) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `team` varchar(40) DEFAULT NULL,
  `work_days` bigint(10) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `basic_sallary` varchar(50) DEFAULT NULL,
  `sallary_prorate` varchar(50) DEFAULT NULL,
  `tunjangan_jabatan` varchar(50) DEFAULT NULL,
  `over_time` varchar(50) DEFAULT NULL,
  `commision_taxi` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `commision` varchar(50) DEFAULT NULL,
  `reward` varchar(50) DEFAULT NULL,
  `rapelan_jan_mar` varchar(50) DEFAULT NULL,
  `rapelan_ot_jan_mar` varchar(50) DEFAULT NULL,
  `bpjs_tenaga_kerja_1` varchar(50) DEFAULT NULL COMMENT 'bpjs hsbc',
  `bpjs_pensiun_1` varchar(50) DEFAULT NULL COMMENT 'bpjs hsbc',
  `bpjs_kesehatan_1` varchar(50) DEFAULT NULL COMMENT 'bpjs hsbc',
  `total_gaji_bruto` varchar(50) DEFAULT NULL,
  `pph_pasal_21` varchar(50) DEFAULT NULL COMMENT 'deduction',
  `bpjs_tenaga_kerja_2` varchar(50) DEFAULT NULL COMMENT 'deduction',
  `bpjs_pensiun_2` varchar(50) DEFAULT NULL,
  `bpjs_kesehatan_2` varchar(50) DEFAULT NULL COMMENT 'deduction',
  `potongan_outing` varchar(50) DEFAULT NULL,
  `potongan_parkir` varchar(50) DEFAULT NULL,
  `thp` varchar(50) DEFAULT NULL,
  `user_upload_id` int(11) DEFAULT NULL,
  `upload_date` datetime DEFAULT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_upload_dipo`
--

LOCK TABLES `tbl_upload_dipo` WRITE;
/*!40000 ALTER TABLE `tbl_upload_dipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_upload_dipo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-18 10:51:50
