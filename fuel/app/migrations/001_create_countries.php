<?php
/**
 * Spark Fuel Package By Ben Corlett
 * 
 * Spark - Set your fuel on fire!
 * 
 * The Spark Fuel Package is an open-source
 * fuel package consisting of several 'widgets'
 * engineered to make developing various
 * web-based systems easier and quicker.
 * 
 * @package    Fuel
 * @subpackage Spark
 * @version    1.0
 * @author     Ben Corlett (http://www.bencorlett.com)
 * @license    MIT License
 * @copyright  (c) 2011 Ben Corlett
 * @link       http://spark.bencorlett.com
 */
namespace Fuel\Migrations;

class Create_Countries {
	
	public function up()
	{
		\DB::query("
		
			DROP TABLE IF EXISTS `countries`;

		")->execute();
		
		\DB::query("
		
			CREATE TABLE `countries` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `code` varchar(255) DEFAULT NULL,
			  `name` varchar(255) DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM AUTO_INCREMENT=248 DEFAULT CHARSET=utf8;
		
		")->execute();
		
		\DB::query("
		
			INSERT INTO `countries` (`id`, `code`, `name`)
			VALUES
				(1,'AD','Andorra'),
				(2,'AE','United Arab Emirates'),
				(3,'AF','Afghanistan'),
				(4,'AG','Antigua and Barbuda'),
				(5,'AI','Anguilla'),
				(6,'AL','Albania'),
				(7,'AM','Armenia'),
				(8,'AN','Netherlands Antilles'),
				(9,'AO','Angola'),
				(10,'AQ','Antarctica'),
				(11,'AR','Argentina'),
				(12,'AS','American Samoa'),
				(13,'AT','Austria'),
				(14,'AU','Australia'),
				(15,'AW','Aruba'),
				(16,'AX','Åland Islands'),
				(17,'AZ','Azerbaijan'),
				(18,'BA','Bosnia and Herzegovina'),
				(19,'BB','Barbados'),
				(20,'BD','Bangladesh'),
				(21,'BE','Belgium'),
				(22,'BF','Burkina Faso'),
				(23,'BG','Bulgaria'),
				(24,'BH','Bahrain'),
				(25,'BI','Burundi'),
				(26,'BJ','Benin'),
				(27,'BL','Saint Barthélemy'),
				(28,'BM','Bermuda'),
				(29,'BN','Brunei'),
				(30,'BO','Bolivia'),
				(31,'BR','Brazil'),
				(32,'BS','Bahamas'),
				(33,'BT','Bhutan'),
				(34,'BV','Bouvet Island'),
				(35,'BW','Botswana'),
				(36,'BY','Belarus'),
				(37,'BZ','Belize'),
				(38,'CA','Canada'),
				(39,'CC','Cocos [Keeling] Islands'),
				(40,'CD','Congo - Kinshasa'),
				(41,'CF','Central African Republic'),
				(42,'CG','Congo - Brazzaville'),
				(43,'CH','Switzerland'),
				(44,'CI','Côte d’Ivoire'),
				(45,'CK','Cook Islands'),
				(46,'CL','Chile'),
				(47,'CM','Cameroon'),
				(48,'CN','China'),
				(49,'CO','Colombia'),
				(50,'CR','Costa Rica'),
				(51,'CU','Cuba'),
				(52,'CV','Cape Verde'),
				(53,'CX','Christmas Island'),
				(54,'CY','Cyprus'),
				(55,'CZ','Czech Republic'),
				(56,'DE','Germany'),
				(57,'DJ','Djibouti'),
				(58,'DK','Denmark'),
				(59,'DM','Dominica'),
				(60,'DO','Dominican Republic'),
				(61,'DZ','Algeria'),
				(62,'EC','Ecuador'),
				(63,'EE','Estonia'),
				(64,'EG','Egypt'),
				(65,'EH','Western Sahara'),
				(66,'ER','Eritrea'),
				(67,'ES','Spain'),
				(68,'ET','Ethiopia'),
				(69,'FI','Finland'),
				(70,'FJ','Fiji'),
				(71,'FK','Falkland Islands'),
				(72,'FM','Micronesia'),
				(73,'FO','Faroe Islands'),
				(74,'FR','France'),
				(75,'GA','Gabon'),
				(76,'GB','United Kingdom'),
				(77,'GD','Grenada'),
				(78,'GE','Georgia'),
				(79,'GF','French Guiana'),
				(80,'GG','Guernsey'),
				(81,'GH','Ghana'),
				(82,'GI','Gibraltar'),
				(83,'GL','Greenland'),
				(84,'GM','Gambia'),
				(85,'GN','Guinea'),
				(86,'GP','Guadeloupe'),
				(87,'GQ','Equatorial Guinea'),
				(88,'GR','Greece'),
				(89,'GS','South Georgia and the South Sandwich Islands'),
				(90,'GT','Guatemala'),
				(91,'GU','Guam'),
				(92,'GW','Guinea-Bissau'),
				(93,'GY','Guyana'),
				(94,'HK','Hong Kong SAR China'),
				(95,'HM','Heard Island and McDonald Islands'),
				(96,'HN','Honduras'),
				(97,'HR','Croatia'),
				(98,'HT','Haiti'),
				(99,'HU','Hungary'),
				(100,'ID','Indonesia'),
				(101,'IE','Ireland'),
				(102,'IL','Israel'),
				(103,'IM','Isle of Man'),
				(104,'IN','India'),
				(105,'IO','British Indian Ocean Territory'),
				(106,'IQ','Iraq'),
				(107,'IR','Iran'),
				(108,'IS','Iceland'),
				(109,'IT','Italy'),
				(110,'JE','Jersey'),
				(111,'JM','Jamaica'),
				(112,'JO','Jordan'),
				(113,'JP','Japan'),
				(114,'KE','Kenya'),
				(115,'KG','Kyrgyzstan'),
				(116,'KH','Cambodia'),
				(117,'KI','Kiribati'),
				(118,'KM','Comoros'),
				(119,'KN','Saint Kitts and Nevis'),
				(120,'KP','North Korea'),
				(121,'KR','South Korea'),
				(122,'KW','Kuwait'),
				(123,'KY','Cayman Islands'),
				(124,'KZ','Kazakhstan'),
				(125,'LA','Laos'),
				(126,'LB','Lebanon'),
				(127,'LC','Saint Lucia'),
				(128,'LI','Liechtenstein'),
				(129,'LK','Sri Lanka'),
				(130,'LR','Liberia'),
				(131,'LS','Lesotho'),
				(132,'LT','Lithuania'),
				(133,'LU','Luxembourg'),
				(134,'LV','Latvia'),
				(135,'LY','Libya'),
				(136,'MA','Morocco'),
				(137,'MC','Monaco'),
				(138,'MD','Moldova'),
				(139,'ME','Montenegro'),
				(140,'MF','Saint Martin'),
				(141,'MG','Madagascar'),
				(142,'MH','Marshall Islands'),
				(143,'MK','Macedonia'),
				(144,'ML','Mali'),
				(145,'MM','Myanmar [Burma]'),
				(146,'MN','Mongolia'),
				(147,'MO','Macau SAR China'),
				(148,'MP','Northern Mariana Islands'),
				(149,'MQ','Martinique'),
				(150,'MR','Mauritania'),
				(151,'MS','Montserrat'),
				(152,'MT','Malta'),
				(153,'MU','Mauritius'),
				(154,'MV','Maldives'),
				(155,'MW','Malawi'),
				(156,'MX','Mexico'),
				(157,'MY','Malaysia'),
				(158,'MZ','Mozambique'),
				(159,'NA','Namibia'),
				(160,'NC','New Caledonia'),
				(161,'NE','Niger'),
				(162,'NF','Norfolk Island'),
				(163,'NG','Nigeria'),
				(164,'NI','Nicaragua'),
				(165,'NL','Netherlands'),
				(166,'NO','Norway'),
				(167,'NP','Nepal'),
				(168,'NR','Nauru'),
				(169,'NU','Niue'),
				(170,'NZ','New Zealand'),
				(171,'OM','Oman'),
				(172,'PA','Panama'),
				(173,'PE','Peru'),
				(174,'PF','French Polynesia'),
				(175,'PG','Papua New Guinea'),
				(176,'PH','Philippines'),
				(177,'PK','Pakistan'),
				(178,'PL','Poland'),
				(179,'PM','Saint Pierre and Miquelon'),
				(180,'PN','Pitcairn Islands'),
				(181,'PR','Puerto Rico'),
				(182,'PS','Palestinian Territories'),
				(183,'PT','Portugal'),
				(184,'PW','Palau'),
				(185,'PY','Paraguay'),
				(186,'QA','Qatar'),
				(187,'RE','Réunion'),
				(188,'RO','Romania'),
				(189,'RS','Serbia'),
				(190,'RU','Russia'),
				(191,'RW','Rwanda'),
				(192,'SA','Saudi Arabia'),
				(193,'SB','Solomon Islands'),
				(194,'SC','Seychelles'),
				(195,'SD','Sudan'),
				(196,'SE','Sweden'),
				(197,'SG','Singapore'),
				(198,'SH','Saint Helena'),
				(199,'SI','Slovenia'),
				(200,'SJ','Svalbard and Jan Mayen'),
				(201,'SK','Slovakia'),
				(202,'SL','Sierra Leone'),
				(203,'SM','San Marino'),
				(204,'SN','Senegal'),
				(205,'SO','Somalia'),
				(206,'SR','Suriname'),
				(207,'ST','São Tomé and Príncipe'),
				(208,'SV','El Salvador'),
				(209,'SY','Syria'),
				(210,'SZ','Swaziland'),
				(211,'TC','Turks and Caicos Islands'),
				(212,'TD','Chad'),
				(213,'TF','French Southern Territories'),
				(214,'TG','Togo'),
				(215,'TH','Thailand'),
				(216,'TJ','Tajikistan'),
				(217,'TK','Tokelau'),
				(218,'TL','Timor-Leste'),
				(219,'TM','Turkmenistan'),
				(220,'TN','Tunisia'),
				(221,'TO','Tonga'),
				(222,'TR','Turkey'),
				(223,'TT','Trinidad and Tobago'),
				(224,'TV','Tuvalu'),
				(225,'TW','Taiwan'),
				(226,'TZ','Tanzania'),
				(227,'UA','Ukraine'),
				(228,'UG','Uganda'),
				(229,'UM','U.S. Minor Outlying Islands'),
				(230,'US','United States'),
				(231,'UY','Uruguay'),
				(232,'UZ','Uzbekistan'),
				(233,'VA','Vatican City'),
				(234,'VC','Saint Vincent and the Grenadines'),
				(235,'VE','Venezuela'),
				(236,'VG','British Virgin Islands'),
				(237,'VI','U.S. Virgin Islands'),
				(238,'VN','Vietnam'),
				(239,'VU','Vanuatu'),
				(240,'WF','Wallis and Futuna'),
				(241,'WS','Samoa'),
				(242,'YE','Yemen'),
				(243,'YT','Mayotte'),
				(244,'ZA','South Africa'),
				(245,'ZM','Zambia'),
				(246,'ZW','Zimbabwe');
		
		")->execute();
	}
	
	public function down()
	{
		\DBUtil::drop_table('countries');
	}
}