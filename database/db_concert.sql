-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 03:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_concert`
--

-- --------------------------------------------------------

--
-- Table structure for table `concert`
--

CREATE TABLE `concert` (
  `concertID` int(11) NOT NULL,
  `concertPicture` varchar(255) NOT NULL,
  `concertName` varchar(255) NOT NULL,
  `band` varchar(255) NOT NULL,
  `showPlace` varchar(255) NOT NULL,
  `showTime` datetime NOT NULL,
  `ticketPrice` int(11) NOT NULL,
  `availableTicket` int(11) NOT NULL,
  `description` text NOT NULL,
  `concertStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concert`
--

INSERT INTO 'users'('userID','firstName','lastName','userName','password','email','phone','role')
VALUES 
('1','Farhaz','Nurjananto','Farhaz','123','farhaznurjananto052@gmail.com','081331611696','user'),
('2','Farlin','Nurjananti','Farlin','1234','farlinnurjananti@gmail.com','081331611698','user'),
('3','Farlon','Diska','Lon','12345','farlon@gmail.com','081331611691','user'),
('4','Farhiz','Alan','Hiz','123456','farhiz@gmail.com','081331611692','user'),
('5','Ana','Anisa','Ana','1234567','ana@gmail.com','081331611693','user'),
('6','Fafan','Putra','Fafan','12345678','fafan@gmail.com','081331611694','user'),
('7','Lili','Lipan','Lili','123456789','lili@gmail.com','081331611695','user'),
('8','Fayza','Permata','Fay','12341','fay@gmail.com','081331611697','user'),
('9','Agus','Aulia','Agus','12342','agus@gmail.com','081331611698','user'),
('10','Hepik','Afifah','Hepik','12343','hepik@gmail.com','081331611699','user'),
('11','Cece','Putri','Cece','12344','cece@gmail.com','081331611681','user'),
('11','Arman','Maulana','Arman','12345','arman@gmail.com','081331611682','user'),
('12','Ronan','Putra','Ronan','12346','ronan@gmail.com','081331611683','user'),
('13','Gita','Saputri','Gita','1231','gita@gmail.com','081331611684','user'),
('14','Laili','aca','Laili','1232','laili@gmail.com','081331611685','user'),
('15','Laila','Nur','Laila','1233','laila@gmail.com','081331611686','user'),
('16','Aulia','Augusta','Aulia','1234','aulia@gmail.com','081331611687','user'),
('17','Ardin','Nugraha','Ardin','1235','ardin@gmail.com','081331611688','user'),
('18','Johan','Mahendra','Johan','1236','johan@gmail.com','081331611689','user'),
('19','Ridwan','Kamil','Ridwan','1237','ridwan@gmail.com','081331611671','user'),
('20','Keysha','Putri','Key','1238','keysha@gmail.com','081331611672','user'),
('21','Bima','Pangestu','Bima','1239','bima@gmail.com','081331611673','user'),
('22','Wud','Putra','Wud','123451','wuddy@gmail.com','081331611674','user'),
('23','Amanda','Vania','Manda','123452','vania@gmail.com','081331611675','user'),
('24','Hefril','Nur','Hefril','123453','hefril@gmail.com','081331611676','user'),
('25','Aisya','Alinski','Ais','123454','aisha@gmail.com','081331611677','user'),
('27','Annisa','Kinanti','Nisa','123455','Annisa@gmail.com','081331611678','user'),
('28','Hakim','Rahman','Hakim','123456','hakim@gmail.com','081331611679','user'),
('29','Adi','wibowo','Adi','123457','adi@gmail.com','081331611661','user'),
('30','Kevin','Putra','Kevin','123458','kevin@gmail.com','081331611662','user'),
('31','Jose','Halel','Jose','123459','jose@gmail.com','081331611663','user'),
('32','Ave','Devin','Ave','1234561','ave@gmail.com','081331611664','user'),
('33','Nurun','Hamidah','Nurun','1234562','nurun@gmail.com','081331611665','user'),
('34','Fida','Alinski','Fida','1234563','fida@gmail.com','081331611666','user'),
('35','Ito','Putra','Ito','1234564','ito@gmail.com','081331611667','user'),
('36','Fahrian','Rahman','Fahrian','1234565','fahrian@gmail.com','081331611668','user'),
('37','Stef','Felisia','Stef','1234567','stefani@gmail.com','081541611611','user'),
('38','Yoda','Arief','Yoda','1234568','yoda@gmail.com','081331611601','user'),
('39','Brian','Steve','Brian','1234569','brian@gmail.com','081331611602','user'),
('40','Fadhli','Himawan','Fadhli','123451','fadhli@gmail.com','081331611603','user'),
('41','Zidni','Ikhsan','Zidni','123452','zidni@gmail.com','081331611604','user'),
('42','Wahyu','Agus','Wahyu','123453','wahyu@gmail.com','081331611605','user'),
('43','Sofy','Masykur','Sofy','123454','sofy@gmail.com','081331611606','user'),
('44','Veri','Aditya','Veri','123455','veri@gmail.com','081331611607','user'),
('45','Izaaz','Putra','Izaaz','123456','izaaz@gmail.com','081331611608','user'),
('46','Okta','Allita','Okta','123457','allita@gmail.com','081312611659','user'),
('47','Widya','Putri','Widya','123458','widya@gmail.com','081322611641','user'),
('48','Arya','Agusta','Arya','123459','arya@gmail.com','081332411642','user'),
('49','Savana','Aliva','Savana','121','vana@gmail.com','081333411643','user'),
('50','Faith','Putra','Faith','122','faith@gmail.com','081331191644','user'),
('51','Basori','Akbar','Basori','124','basori@gmail.com','081330111695','user'),
('52','Adel','Putri','Adel','125','adel@gmail.com','0813316102695','user'),
('53','Lion','Dirgantara','Lion','126','lion@gmail.com','081301611695','user'),
('54','Aprillia','Putri','Lia','127','april@gmail.com','081331211695','user'),
('55','Fairuz','Nabil','Fairuz','128','fairuz@gmail.com','081346611695','user'),
('56','Wahyu','Agus','Wahyu','129','wahyu@gmail.com','081331650695','user'),
('57','Fatma','Ela','Fatma','131','fatma@gmail.com','081331421695','user'),
('58','Putfat','Fatimah','Putfat','132','putfat@gmail.com','081320611695','user'),
('59','Indana','Alya','Indana','133','indana@gmail.com','081331211695','user'),
('60','Nuraini','Arwinda','Ain','134','ainul@gmail.com','081331201695','user'),
('61','Upin','Devanto','Upin','135','upin@gmail.com','08133190695','user'),
('62','Ipin','Devanto','Ipin','136','ipin@gmail.com','081339111695','user'),
('62','Intan','Cahyani','Intan','137','intan@gmail.com','081331921695','user'),
('63','Dini','Dwi','Dini','138','dini@gmail.com','081339311695','user'),
('64','Dina','Dwi','Dina','139','dina@gmail.com','081331871695','user'),
('65','Dita','Dwi','Dita','140','dita@gmail.com','081331682695','user'),
('66','Dila','Dwi','Dila','141','dila@gmail.com','081331687695','user'),
('67','Ashfi','Azkiya','Ashfi','142','ashfi@gmail.com','081309611609','user'),
('68','Azkal','Azkiya','Azkal','143','ashfi@gmail.com','0823446788911','user'),
('69','Akmal','Azkiya','Akmal','144','ashfi@gmail.com','0823446788912','user'),
('70','Afif','Azkiya','Afif','145','ashfi@gmail.com','0823446788913','user'),
('71','Panji','Punjiano','Panji','146','panji@gmail.com','0823446788946','user'),
('72','Ahmad','Azkiya','Ahmad','147','ahmad@gmail.com','0823446788945','user'),
('73','Andi','Andiyani','Andi','148','andi@gmail.com','0823446788944','user'),
('74','Ando','Andiyani','Ando','149','ando@gmail.com','0823446788943','user'),
('75','Firza','Brahmuda','Firza','1431','firza@gmail.com','0823446788942','user'),
('76','Maul','Maulana','Maul','1432','maul@gmail.com','0823446788941','user'),
('77','Alvin','Mumtaz','Alvin','1433','alvin@gmail.com','0823446788940','user'),
('78','Alvan','Alfino','Alvan','1434','alvan@gmail.com','0823446788939','user'),
('79','Yanto','Yanti','Yanto','1435','yanto@gmail.com','0823446788938','user'),
('80','Yanti','Yanto','Yanti','1436','yanti@gmail.com','0823446788937','user'),
('81','Aski','Askiya','Aski','1437','aski@gmail.com','0823446788936','user'),
('82','Aska','Askiya','Aska','1438','aska@gmail.com','0823446788935','user'),
('83','Akbar','Akila','Akbar','1439','akbar@gmail.com','0823446788934','user'),
('84','Diast','Putra','Diast','14312','diast@gmail.com','0823446788933','user'),
('85','Yanu','Maulid','Yanu','14313','yanu@gmail.com','0823446788931','user'),
('86','Januar','Alfiansyah','Januar','14314','januar@gmail.com','0823446788930','user'),
('87','Nanda','Nando','Nanda','14315','nanda@gmail.com','0823446788929','user'),
('88','Dinul','Aulia','Dinul','14316','dinul@gmail.com','0823446788928','user'),
('89','Abelta','Biska','Abelta','14317','abelta@gmail.com','0823446788927','user'),
('90','Ainur','Rachman','Ainur','14318','ainur@gmail.com','0823446788926','user'),
('91','Eka','Akbar','Eka','14319','eka@gmail.com','0823446788925','user'),
('91','Krisna','Putra','Krisna','14320','krisna@gmail.com','0823446788924','user'),
('92','Bayin','Putra','Bayin','14321','bayin@gmail.com','0823446788923','user'),
('93','Shinta','Albas','Shinta','14322','shinta@gmail.com','0823446788922','user'),
('94','Sherly','Dwi','Sherly','14323','sherly@gmail.com','0823446788921','user'),
('95','Sindi','Dewi','Sindi','14324','sindi@gmail.com','0823446788920','user'),
('96','Aurora','Pisci','Aurora','14325','aurora@gmail.com','0823446788919','user'),
('97','Dios','Putri','Dios','14326','dios@gmail.com','0823446788918','user'),
('98','Edo','Tri','Edo','1438','edo@gmail.com','0823446788916','user'),
('99','Pruis','Shinta','Pruis','14329','pruis@gmail.com','0823446788915','user'),
('100','Reza','Albas','Reza','14390','reza@gmail.com','0823446788914','user'),
('101','admin','admin','admin','admin','admin@gmail.com','0823446788914','user');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `incomeID` int(11) NOT NULL,
  `IDusers` int(11) NOT NULL,
  `numberOfTicket` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `pictureOrder` varchar(255) NOT NULL,
  `ticketPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`incomeID`, `IDusers`, `numberOfTicket`, `orderDate`, `pictureOrder`, `ticketPrice`) VALUES
(7, 2, 12, '2022-11-27 00:00:00', 'back-02-01.png', 0),
(8, 2, 2, '2022-11-27 00:00:00', 'back-02-01.png', 0),
(9, 2, 2, '2022-11-27 00:00:00', 'back-02-01.png', 2462),
(10, 2, 10, '2022-11-27 00:00:00', 'back-02-01.png', 10),
(11, 2, 2, '2022-11-27 00:00:00', 'back-02-01.png', 19998),
(12, 2, 2, '2022-11-27 00:00:00', 'back-02-01.png', 19998),
(13, 2, 4, '2022-11-27 00:00:00', 'back-01.png', 39996),
(14, 2, 1, '2022-11-27 00:00:00', 'back-01.png', 1231),
(15, 2, 200, '2022-11-27 00:00:00', 'mine-01.png', 2462600),
(16, 2, 3, '2022-11-27 00:00:00', 'back-02-01.png', 3),
(17, 2, 1000, '2022-11-27 00:00:00', 'mine-01.png', 12313000),
(18, 2, 12, '2022-11-27 00:00:00', 'Asset 9.png', 147756);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordersID` int(11) NOT NULL,
  `IDusers` int(11) NOT NULL,
  `IDconcert` int(11) NOT NULL,
  `numberOfTicket` int(11) NOT NULL,
  `orderDate` date NOT NULL DEFAULT current_timestamp(),
  `pictureOrder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordersID`, `IDusers`, `IDconcert`, `numberOfTicket`, `orderDate`, `pictureOrder`) VALUES
(51, 2, 4, 12, '2022-11-27', 'Asset 7.png'),
(52, 2, 4, 12, '2022-11-27', 'Asset 8.png'),
(53, 2, 4, 123, '2022-11-27', 'Asset 8.png'),
(54, 2, 4, 213, '2022-11-27', 'Asset 8.png'),
(55, 2, 4, 12, '2022-11-27', 'Asset 8.png'),
(56, 2, 4, 12, '2022-11-27', 'Asset 8.png'),
(57, 2, 4, 20, '2022-11-27', 'Asset 3.png'),
(58, 2, 4, 12, '2022-11-27', 'Asset 8.png'),
(59, 2, 4, 12, '2022-11-27', 'Asset 3.png'),
(60, 2, 4, 12, '2022-11-27', 'Asset 1.png'),
(61, 1, 4, 12, '2022-11-27', 'Asset 2.png'),
(62, 1, 4, 12, '2022-11-27', 'IMG20221017124401.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `userName`, `password`, `email`, `phone`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', '081331619800', 'admin'),
(2, 'farhaz', 'nurjananto', 'Nanto', '123', 'farhaznurjananto052@gmail.com', '08133161696', 'user'),
(3, 'farlin', 'nurjananti', 'farlin', '123', 'farhaznurjananto052@gmail.com', '081331611696', 'user'),
(4, 'arman', 'maulana', 'arman', '1234', 'farhaz_nurjananto@yahoo.com', '081331611696', 'user'),
(6, 'arya', 'gustian', 'arya', '123', 'life.is.game.channel@gmail.com', '12313213', 'user'),
(7, 'ardin', 'nugraha', 'ardin', '123', 'farhaz_nurjananto@yahoo.com', '081331611696', 'user'),
(8, 'ucok', 'baba', 'ucok', '123', 'ucok@gmail.cpm', '0000', 'user'),
(9, 'ais', 'sah', 'ais', '123', 'ais@gmail.com', '081331611696', 'user'),
(10, 'aa', 'aa', 'aa', '1234', 'aa@gmail.com', '081331611696', 'user'),
(11, 'a', 'a', 'aaa', '1234', 'aaa@gmail.com', '13223', 'user'),
(12, 'arfin', 'arfin', 'arfin', '123', 'farhaznurjananto052@gmail.com', '081331611696', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`concertID`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`incomeID`),
  ADD KEY `IDusers` (`IDusers`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordersID`),
  ADD KEY `IDusers` (`IDusers`),
  ADD KEY `IDconcert` (`IDconcert`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concert`
--
ALTER TABLE `concert`
  MODIFY `concertID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `incomeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`IDusers`) REFERENCES `users` (`userID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`IDusers`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`IDconcert`) REFERENCES `concert` (`concertID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
