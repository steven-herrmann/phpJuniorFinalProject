--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `ID` int(5) NOT NULL auto_increment,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `RouteID` int(5) default NULL,
  PRIMARY KEY  (`ID`),
  KEY `RouteID` (`RouteID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `ID` int(5) NOT NULL auto_increment,
  `FirstName` varchar(100) character set utf8 collate utf8_bin NOT NULL,
  `LastName` varchar(100) character set utf8 collate utf8_bin NOT NULL,
  `Position` varchar(20) character set utf8 collate utf8_bin NOT NULL,
  `Salary` int(10) NOT NULL,
  `ManagerID` int(5) default NULL,
  `PassengerID` int(5) default NULL,
  PRIMARY KEY  (`ID`),
  KEY `ManagerID` (`ManagerID`),
  KEY `PassengerID` (`PassengerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `ID` int(5) NOT NULL auto_increment,
  `DateInvoiced` datetime NOT NULL,
  `EmployeeID` int(5) default NULL,
  `ClientID` int(5) NOT NULL,
  `PaymentID` int(5) NOT NULL,
  PRIMARY KEY  (`ID`),
  KEY `EmployeeID` (`EmployeeID`),
  KEY `ClientID` (`ClientID`),
  KEY `PaymentID` (`PaymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `ID` int(5) NOT NULL default '0',
  `EmployeeID` int(5) NOT NULL,
  `RouteID` int(5) NOT NULL,
  PRIMARY KEY  (`ID`),
  KEY `EmployeeID` (`EmployeeID`),
  KEY `RouteID` (`RouteID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `ID` int(5) NOT NULL auto_increment,
  `Type` enum('Debit','Credit','Check','Cash') character set utf8 collate utf8_bin NOT NULL,
  `StripeClientID` int(16) default NULL,
  `DateAdded` datetime NOT NULL,
  `ClientID` int(5) NOT NULL,
  PRIMARY KEY  (`ID`),
  KEY `ClientID` (`ClientID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `ID` int(5) NOT NULL auto_increment,
  `RouteName` varchar(5) character set utf8 collate utf8_bin NOT NULL,
  `TruckID` int(5) NOT NULL,
  PRIMARY KEY  (`ID`),
  KEY `TruckID` (`TruckID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE IF NOT EXISTS `truck` (
  `ID` int(5) NOT NULL auto_increment,
  `Model` varchar(100) NOT NULL,
  `License` varchar(7) NOT NULL,
  `VIN` varchar(17) NOT NULL,
  `PurchaseDate` datetime NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `License` (`License`,`VIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `route` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`RouteID`) REFERENCES `route` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`ManagerID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`PassengerID`) REFERENCES `passenger` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_4` FOREIGN KEY (`PaymentID`) REFERENCES `payment` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `passenger`
--
ALTER TABLE `passenger`
  ADD CONSTRAINT `passenger_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `passenger_ibfk_2` FOREIGN KEY (`RouteID`) REFERENCES `route` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_4` FOREIGN KEY (`TruckID`) REFERENCES `truck` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;