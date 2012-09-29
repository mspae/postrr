CREATE TABLE IF NOT EXISTS `Posts` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(200) NOT NULL,
  `Content` text NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Category` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `Posts`
--

INSERT INTO `Posts` (`ID`, `Title`, `Content`, `Time`, `Category`) VALUES
(1, 'Lorem Ipsum Dolor', 'Lorem ipsum dolor sit amet, consectetaur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Et harumd und lookum like Greek to me, dereud facilis est er expedit distinct. Nam liber te conscient to factor tum poen legum odioque civiuda. Et tam neque pecun modut est neque nonor et imper ned libidig met, consectetur adipiscing elit, sed ut labore et dolore magna aliquam makes one wonder who would ever read this stuff? Bis nostrud exercitation ullam mmodo consequet.', '2012-09-27 16:13:46', 'Anleitung'),
(11, 'Irure dolor in reprehend incididunt', 'Ut enim ad minim veniam, quis nostrud exerc. Irure dolor in reprehend incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Thas sirutciun applios tyu thuso itoms ghuso pwicos gosi sirucor in mixent gosi sirucor ic mixent ples cak ontisi sowios uf Zerm hawr rwivos. Unte af phen neige pheings atoot Prexs eis phat eit sakem eit vory gast te Plok peish ba useing phen roxas. Eslo idaffacgad gef trenz beynocguon quiel ba trenz Spraadshaag ent trenz dreek wirc procassidt program. Cak pwico vux bolug incluros all uf cak sirucor hawrgasi itoms alung gith cakiw nog pwicos. Hei muk neme eis loppe. Treas em wankeing ont sime ploked peish rof phen sumbloat syug si phat phey gavet peish ta paat ein pheeir sumbloats. Aslu unaffoctor gef cak siructiun gill bo cak spiarshoot anet cak GurGanglo gur pwucossing pwutwam. Ghat dodtos, ig pany, gill bo maro tyu ucakw suftgasi pwuructs hod yot tyubo rotowminor. Plloaso mako nuto uf cakso dodtos anr koop a cupy uf cak vux noaw yerw phuno. Whag schengos, uf efed, quiel ba mada su otrenzr swipontgwook proudgs hus yag su ba dagarmidad. Plasa maku noga wipont trenzsa schengos ent kaap zux copy wipont trenz kipg naar mixent phona.', '2012-09-27 16:14:49', 'Bericht');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Password` char(32) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Info` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Daten für Tabelle `Users`
--

INSERT INTO `Users` (`ID`, `Username`, `Password`, `Email`, `Info`) VALUES
(83, 'admin', '8149b52d5fc39d768d7e4c85037d4b18', 'ms@dreimorgen.com', 'infotext');