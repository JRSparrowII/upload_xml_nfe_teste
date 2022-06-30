-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.18-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para teste_upload_xml
CREATE DATABASE IF NOT EXISTS `teste_upload_xml` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `teste_upload_xml`;

-- Copiando estrutura para tabela teste_upload_xml.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela teste_upload_xml.nfe
CREATE TABLE IF NOT EXISTS `nfe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_nf` int(11) DEFAULT NULL,
  `data_emissao` timestamp NULL DEFAULT NULL,
  `valor_nf` decimal(10,2) DEFAULT NULL,
  `dest_cnpj` varchar(14) DEFAULT NULL,
  `dest_nome` varchar(200) DEFAULT NULL,
  `dest_ie` varchar(100) DEFAULT NULL,
  `dest_logradouro` varchar(200) DEFAULT NULL,
  `dest_numero` varchar(10) DEFAULT NULL,
  `dest_bairro` varchar(200) DEFAULT NULL,
  `dest_cod_municipio` varchar(100) DEFAULT NULL,
  `dest_municipio` varchar(100) DEFAULT NULL,
  `dest_uf` varchar(2) DEFAULT NULL,
  `dest_cep` varchar(20) DEFAULT NULL,
  `dest_cod_pais` varchar(50) DEFAULT NULL,
  `dest_fone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
