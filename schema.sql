SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `ID` int(5) NOT NULL auto_increment,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `RouteID` int(5) default NULL,
  `InvoiceID` int(5) default NULL,
  PRIMARY KEY  (`ID`),
  KEY `RouteID` (`RouteID`,`InvoiceID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `ID` int(5) NOT NULL auto_increment,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Salary` int(10) NOT NULL,
  `ManagerID` int(5) default NULL,
  `InvoiceID` int(5) default NULL,
  `RouteID` int(5) default NULL,
  PRIMARY KEY  (`ID`),
  KEY `ManagerID` (`ManagerID`,`InvoiceID`,`RouteID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  KEY `EmployeeID` (`EmployeeID`,`ClientID`,`PaymentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `ID` int(5) NOT NULL auto_increment,
  `Type` enum('Debit','Credit','Check','Cash') NOT NULL,
  `StripeClientID` int(16) default NULL,
  `DateAdded` datetime NOT NULL,
  `InvoiceID` int(5) default NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `CreditCard` (`StripeClientID`),
  KEY `InvoiceID` (`InvoiceID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `ID` int(5) NOT NULL auto_increment,
  `RouteName` varchar(5) NOT NULL,
  `TruckID` int(5) NOT NULL,
  `EmployeeID` int(5) NOT NULL,
  `ClientID` int(5) NOT NULL,
  PRIMARY KEY  (`ID`),
  KEY `TruckID` (`TruckID`,`EmployeeID`,`ClientID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `RouteID` int(5) default NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `License` (`License`,`VIN`),
  KEY `RouteID` (`RouteID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
