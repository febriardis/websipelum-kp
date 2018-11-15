-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 17 Mar 2018 pada 06.40
-- Versi Server: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 5.6.31-4+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `country`, `zip`) VALUES
(1, 'Plato Floydo', '424-5255', 'neque.vitae@purussapiengravida.ca', 'Canada', '60289'),
(2, 'Sawyer Gonzalez', '183-5014', 'Aliquam.rutrum@auctorvitaealiquet.edu', 'Northern Mariana Islands', '55373'),
(3, 'Zachary Schmidt', '331-1971', 'pharetra.ut@nisisem.ca', 'Paraguay', '07675-182'),
(4, 'Cyrus Mason', '762-9762', 'risus.at@arcuSed.ca', 'Dominican Republic', '32432'),
(5, 'Julian Houston', '761-8798', 'mauris.Suspendisse@semconsequatnec.com', 'Sierra Leone', '23498'),
(6, 'Kane Mcdowell', '707-4157', 'ac.feugiat@id.co.uk', 'Cyprus', '996879'),
(7, 'Isaac Fowler', '1-863-774-4301', 'neque.sed.sem@et.ca', 'Tuvalu', '2593'),
(8, 'Galvin Austin', '444-4604', 'iaculis@ridiculusmus.net', 'Cambodia', '9665'),
(9, 'Thor Cabrera', '202-5120', 'vestibulum.lorem@Donecnon.co.uk', 'Greece', '9206'),
(10, 'Kieran Foster', '1-708-317-3861', 'eget.dictum.placerat@Maurisvelturpis.co.uk', 'Chad', '12184-540'),
(11, 'Norman Stephens', '622-8554', 'commodo.hendrerit.Donec@montes.edu', 'Ukraine', '9027'),
(12, 'Ulric Richard', '304-8041', 'dapibus@velturpis.edu', 'Saint Vincent and The Grenadines', '51516'),
(13, 'Cyrus Lee', '1-522-635-3160', 'varius.et.euismod@Nulla.edu', 'Burkina Faso', '5729'),
(14, 'Lucas Acosta', '822-1931', 'primis.in@anteblanditviverra.org', 'Northern Mariana Islands', 'A9T 2X0'),
(15, 'Damian Gutierrez', '1-794-152-3131', 'mauris.Integer@molestiein.net', 'Marshall Islands', '40666'),
(16, 'Declan Gray', '843-5246', 'Sed.eu.eros@arcu.ca', 'Heard Island and Mcdonald Islands', 'V0J 0AN'),
(17, 'Trevor Koch', '1-557-742-5299', 'malesuada.ut.sem@euturpis.ca', 'Liechtenstein', '826527'),
(18, 'Odysseus Reese', '1-825-117-1197', 'quam.quis@etultricesposuere.com', 'Sierra Leone', '441358'),
(19, 'Thomas Willis', '1-181-779-7026', 'leo.in.lobortis@Aliquamgravida.ca', 'Nigeria', '6883'),
(20, 'Gary Mercado', '755-8929', 'mi.felis.adipiscing@nibhsitamet.ca', 'Pitcairn Islands', 'P4E 3T7'),
(21, 'Roth Carver', '1-700-665-3529', 'mollis@pedenecante.com', 'Cambodia', '9656'),
(22, 'Ryan Ashley', '454-8350', 'placerat.orci.lacus@Fuscealiquetmagna.net', 'Niger', '86406'),
(23, 'Quentin Berger', '1-444-597-1147', 'tincidunt@urnanecluctus.edu', 'Kuwait', '72748'),
(24, 'Griffin Cervantes', '1-280-743-6194', 'sit.amet.consectetuer@utpellentesque.com', 'Turks and Caicos Islands', '14661-170'),
(25, 'Cade Mckee', '596-4158', 'Mauris.vel@arcu.ca', 'Burkina Faso', '66504'),
(26, 'Martin Erickson', '1-143-240-1529', 'nisi.a@esttempor.net', 'Philippines', '78677'),
(27, 'Tanner Hale', '1-275-631-0515', 'risus.varius@convalliserat.com', 'Nauru', 'A8Y 5ZA'),
(28, 'Dillon Levine', '1-421-552-9790', 'Aenean.euismod@ipsumnon.co.uk', 'Hong Kong', '48936'),
(29, 'Bevis West', '342-9346', 'Quisque.varius.Nam@nuncsitamet.ca', 'Nigeria', '80-002'),
(30, 'Giacomo Hensley', '1-825-752-1251', 'Integer@justonec.ca', 'Timor-Leste', '09-228'),
(31, 'Palmer Gross', '279-1643', 'tincidunt@Pellentesque.net', 'Mauritius', '6804'),
(32, 'Castor Vance', '534-0954', 'amet.dapibus@massarutrummagna.co.uk', 'Belarus', '102236'),
(33, 'Warren Case', '724-8695', 'Nunc.lectus@vulputate.edu', 'Samoa', 'EM98 3HS'),
(34, 'Dalton Tillman', '1-363-183-2965', 'leo.Vivamus.nibh@Fusce.net', 'Mayotte', '841215'),
(35, 'Hu Clayton', '1-103-448-8707', 'et.euismod@at.org', 'Gibraltar', '31779-698'),
(36, 'Sylvester Nolan', '766-0405', 'Proin.velit@sagittissemperNam.com', 'Montenegro', '953376'),
(37, 'Harper Palmer', '795-4129', 'Nunc.sed@faucibus.ca', 'Saudi Arabia', '13926'),
(38, 'Zeph Washington', '1-438-421-1183', 'pretium.neque.Morbi@Nulla.org', 'Latvia', '92951'),
(39, 'Julian Neal', '667-3837', 'Nunc@diamvel.net', 'Congo, the Democratic Republic of the', '48047-942'),
(40, 'Hiram Newton', '338-0419', 'primis.in@sedorcilobortis.com', 'Kuwait', '669913'),
(41, 'August Banks', '896-1889', 'odio.Etiam@urna.org', 'Tajikistan', 'WE0 4UA'),
(42, 'Basil Garrison', '1-913-485-7917', 'elit@enimsit.edu', 'Congo (Brazzaville)', '81-919'),
(43, 'Buckminster Nelson', '1-435-773-9781', 'quis.turpis.vitae@adipiscing.com', 'Mayotte', '37338-489'),
(44, 'Lane Benjamin', '1-795-272-6414', 'aliquam@semper.net', 'Cuba', '3455'),
(45, 'Burke Gordon', '838-7357', 'ac@vulputateduinec.net', 'Fiji', '70556'),
(46, 'Logan Harris', '1-104-716-4832', 'gravida@Curabituregestas.edu', 'Bosnia and Herzegovina', '9658'),
(47, 'Barry Hansen', '1-111-784-9890', 'Donec.dignissim@ornarelectus.org', 'Mozambique', 'M3T 1N0'),
(48, 'Jared Mckenzie', '885-7853', 'ante.dictum@duiFusce.edu', 'Jersey', '3153'),
(49, 'Timon Bruce', '506-1261', 'neque.pellentesque@quistristiqueac.edu', 'American Samoa', '25504'),
(50, 'Jordan Gross', '131-9063', 'Proin.vel.arcu@felispurus.net', 'French Polynesia', '6990'),
(51, 'Rudyard Sparks', '787-9775', 'montes@maurisid.com', 'Marshall Islands', '13-862'),
(52, 'Abraham Wong', '1-750-246-8977', 'orci.Phasellus.dapibus@Proin.org', 'Turks and Caicos Islands', '85448'),
(53, 'Barrett Glenn', '655-7453', 'suscipit@nunc.ca', 'Kiribati', '9037'),
(54, 'Ciaran Snyder', '1-452-437-0003', 'ipsum@turpisAliquam.edu', 'Norway', '264951'),
(55, 'Carl Golden', '599-2392', 'Aliquam@atsem.co.uk', 'Israel', '167781'),
(56, 'Leroy Pollard', '579-7085', 'Etiam@loremipsumsodales.com', 'Sri Lanka', '3902'),
(57, 'Garth Burch', '1-886-597-2383', 'est.congue@Namconsequat.com', 'Tunisia', 'N00 2KB'),
(58, 'Lane Huff', '447-5237', 'malesuada.vel.venenatis@dolorDonec.co.uk', 'Argentina', '7100'),
(59, 'Gray Kirkland', '517-1816', 'et.eros.Proin@nonantebibendum.com', 'Guinea', '97251'),
(60, 'Bert Forbes', '800-5787', 'adipiscing@gravida.com', 'Mauritania', '39919'),
(61, 'Elvis Jenkins', '1-949-995-1788', 'arcu.Vivamus@aliquetvel.ca', 'Guyana', '03474'),
(62, 'Mark Knox', '773-7852', 'leo.Vivamus.nibh@arcuVestibulumut.net', 'Slovakia', '9852'),
(63, 'Lance Colon', '331-4761', 'congue@ipsumporta.org', 'Curaçao', '5572'),
(64, 'Vladimir Hansen', '1-123-468-5848', 'et.commodo@torquentperconubia.co.uk', 'Djibouti', '8508'),
(65, 'Wade Barton', '123-2351', 'nibh@DuisgravidaPraesent.co.uk', 'American Samoa', '11466'),
(66, 'Dante Molina', '494-2513', 'consectetuer.adipiscing@ipsumdolorsit.co.uk', 'Saint Barthélemy', 'X2J 1X6'),
(67, 'Charles Hudson', '957-7461', 'tempor@turpisnonenim.edu', 'Turkmenistan', '82193-669'),
(68, 'Elton Kane', '534-4250', 'Sed@luctusutpellentesque.co.uk', 'Netherlands', '5535ZX'),
(69, 'Abel Frank', '344-9871', 'posuere.vulputate.lacus@etmagnis.com', 'French Southern Territories', '113411'),
(70, 'Garrett Aguilar', '1-252-893-4375', 'aliquet.odio.Etiam@nibhdolornonummy.ca', 'Malta', '1182'),
(71, 'Lester Hendricks', '491-8905', 'mauris@ategestas.edu', 'Mauritius', '20912'),
(72, 'Elmo Franks', '1-593-219-5069', 'Sed.eu.nibh@venenatislacusEtiam.com', 'Holy See (Vatican City State)', '84765-876'),
(73, 'Randall Anderson', '1-602-518-6198', 'Mauris.vestibulum@sapien.ca', 'Mexico', '72961'),
(74, 'Jackson Buckley', '1-908-884-2334', 'dui.Cum.sociis@nonleoVivamus.edu', 'Mexico', '66477'),
(75, 'George Mercado', '144-2643', 'non.lacinia@sitamet.com', 'Cape Verde', '8663'),
(76, 'Prescott Bradley', '200-8182', 'a.odio@inconsectetuer.edu', 'Ethiopia', '42333'),
(77, 'Wallace Downs', '1-262-102-0510', 'odio.auctor@ornare.edu', 'Timor-Leste', '03929'),
(78, 'Vladimir Mcintosh', '1-471-906-1160', 'eget.massa@enimgravida.org', 'Taiwan', '786091'),
(79, 'Dennis Hull', '934-9410', 'Mauris.non.dui@leo.ca', 'Bahamas', '78700'),
(80, 'Keefe Short', '1-359-116-9849', 'fermentum.vel.mauris@Phasellusvitaemauris.org', 'South Sudan', '31311'),
(81, 'Xanthus Hampton', '1-903-542-7529', 'Sed@Etiam.com', 'Kazakhstan', 'K7B 7C5'),
(82, 'Gregory Bishop', '1-753-226-0863', 'magnis@Sedeget.com', 'Macedonia', '1712'),
(83, 'Basil Acosta', '1-910-135-7994', 'enim.diam.vel@purusactellus.net', 'United States', '1110'),
(84, 'Griffith Weiss', '487-9532', 'ante@rhoncusNullam.com', 'Bosnia and Herzegovina', '01190'),
(85, 'Nash Mcdowell', '781-6160', 'commodo@ante.ca', 'Guernsey', '57521'),
(86, 'Phelan Gilbert', '318-3186', 'natoque.penatibus.et@fames.com', 'Malaysia', '61754'),
(87, 'Devin Gregory', '1-780-473-6239', 'sed.hendrerit@bibendumDonecfelis.edu', 'Virgin Islands, United States', '12819'),
(88, 'Jelani Marquez', '1-756-676-2511', 'leo@mollis.ca', 'New Caledonia', '8982'),
(89, 'Kadeem Harper', '1-297-495-5859', 'sapien@enimEtiamimperdiet.net', 'Guernsey', '8494'),
(90, 'Shad Tyson', '1-717-517-3785', 'mauris@duiCum.net', 'Saint Helena, Ascension and Tristan da Cunha', '70985'),
(91, 'Nigel Cole', '110-3887', 'aliquet.odio.Etiam@dictumeu.net', 'Costa Rica', '39263'),
(92, 'Jerry Short', '1-984-981-6766', 'Nam@sitametconsectetuer.ca', 'Jersey', '2081'),
(93, 'Josiah Chase', '1-841-505-3651', 'Aenean.massa.Integer@in.net', 'Sri Lanka', '7863'),
(94, 'Chaim Alvarado', '1-372-952-3359', 'ultricies@varius.net', 'Sri Lanka', '99065'),
(95, 'Victor Manning', '122-4169', 'est.Mauris@blandit.ca', 'Singapore', '2053'),
(96, 'Caldwell Marks', '1-619-957-9122', 'a.nunc@amet.com', 'Panama', '958394'),
(97, 'Burke Colon', '1-412-420-3269', 'lacus.vestibulum.lorem@euelit.co.uk', 'South Africa', '3171'),
(98, 'Keane Molina', '1-637-251-4552', 'adipiscing.Mauris@dolornonummy.org', 'Iraq', '668109'),
(99, 'Theodore Hutchinson', '1-159-902-4323', 'id@dignissimmagna.edu', 'Saint Martin', '41347'),
(100, 'Griffin Gates', '1-740-323-5296', 'imperdiet.nec@Donec.net', 'Thailand', '51016'),
(107, 'Haerul Muttaqins', NULL, 'haerul@mail.com', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
