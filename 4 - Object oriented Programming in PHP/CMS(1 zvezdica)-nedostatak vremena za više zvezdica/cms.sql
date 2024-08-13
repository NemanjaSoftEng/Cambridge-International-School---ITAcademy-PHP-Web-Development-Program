-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 08, 2024 at 01:27 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `idC` int NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_change` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int NOT NULL,
  PRIMARY KEY (`idC`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`idC`, `comment`, `time_create`, `time_change`, `deleted`) VALUES
(1, 'Ovo obavezno pročitajte. Mnogo je dobro. Prenesite drugima.', '2024-03-07 03:09:20', '0000-00-00 00:00:00', 0),
(2, 'Svakako ću pročitati. Zaista je zanimljivo.', '2024-03-07 03:42:23', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logged`
--

DROP TABLE IF EXISTS `logged`;
CREATE TABLE IF NOT EXISTS `logged` (
  `idL` int NOT NULL AUTO_INCREMENT,
  `idU` int NOT NULL,
  PRIMARY KEY (`idL`,`idU`),
  KEY `idU` (`idU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `idN` int NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `headline` varchar(500) NOT NULL,
  `text` text NOT NULL,
  `time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_change` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int NOT NULL,
  PRIMARY KEY (`idN`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`idN`, `category`, `headline`, `text`, `time_create`, `time_change`, `deleted`) VALUES
(1, 'Nauka', 'Prenatalna psihologija - Muzika koju fetus voli', 'Na žalost, živimo u jako teškom vremenu, gde je sistem vrednosti izvrnut naopako, gde se bogoprotivne i protivprirodne zajednice nameću kao zamena za brak i porodicu, gde nastavnici više nemaju nikakvog autoriteta nad decom, gde su roditelji toliko obespravljeni da ne smeju čak ni ton da povise na dete, jer im se preti oduzimanjem dece, gde su svi čuli za rijaliti učesnike, a niko nije čuo za npr. divnog vladiku Jovana Vraniškovskog, gde prodaja knjiga rapidno raste, ali čitanje istih rapidno opada, jer ih danas niko ne čita, zapravo niko ne čita ništa duže od 5 redova teksta u izuzetnim slučajevima pročitaju celu stranu, a oni koji pak pročitaju po koju knjigu mahom se ne posvećuju dovoljno pa donose pogrešne zaključke i vrlo često idu putem popločanim najboljim namerama koji vodi pravo u pakao(čak su neki smislili napitak i nazvali ga HELL; ne može biti očiglednije, ali ako želite nešto da sakrijete od ljudi stavite im to ispred nosa).\r\n\r\nO ovoj temi bi se moglo mnogo pričati. Preporučujem da istražite temu prenatalne psihologije, nove grane medicine, uvedene 70-ih godina prošlog veka o kojoj nemam mogućnosti da sada govorim detaljno, ali čiji su dometi fantastični. Daću jedan kraći primer koji sam čuo od akademika Vladete Jerotića, koji je bio jedan od trojice za koje znam da se u Srbiji bavio ovom fantastičnom naučnom disciplinom. On je ovaj podatak pročitao u jednom naučnom stručnom časopisu kao naučni rad. Primer 1: majka je rodila dete; dete odbija da doji; prihvata sve druge dojilje osim svoje majke gde se mršti i kreće da plače; posle duže psihoanalize majka u suzama priznaje strašnu istinu: do 5. meseca trudnoće razmišljala je o abortusu. Primer 2: trudnice pušači koje su pristale na eksperiment na ulazu u kliniku bile su obavezne da ostave cigare i da ih ne konzumiraju naredna tri dana; za to vreme lekari, putem ultra zvuka i drugih analiza prate stanje fetusa; sasvim neočekivano, pred kraj drugog dana eksperimenta dolazi lekar koji ga vodi i prekida eksperiment donevši cigarete i rekavši im da slobodno mogu uzeti ako to žele, a ako ne žele da izdrže do kraja eksperimenta; u trenutku kada je jedna od trudnica posegnula za cigaretama ultrazvuk je zabeležio da je fetus doživeo stres, dakle od same loše namere, jer ih žena još nije bila ni dotakla već je samo krenula ka poslužovniku na kome su stajale; Iskoristiću priliku da kažem i jedan podatak koji su jedva dozvolili da se objavi, a koji je jako važan: najvažniji dan trudnoće je 24. dan od dana začeća(savet: pričestite se tog dana; vodite računa da taj dan bude praznik ili crveno slovo). Naučno je utvrđeno da se tog dana formira tiroidna žlezda koja će biti vladalac metabolizna celog života. Inače, (vezano za primer 1), prenatalna psihologija poznaje četiri vrste majke:\r\n\r\nidealna majka\r\n• svesno i podsvesno želi dete\r\nkatastrofalna majka\r\n• svesno i podsvesno ne želi dete\r\nhladna majka\r\n• svesno ne želi, a podsvesvno želi dete\r\nambivalentan majka\r\n• svesno želi, a podsvesno ne želi dete\r\nKako iskoristiti ovo saznanje? Keže Sigmund Frojd da su snovi carski put u nesvesno. Pa ako je tako ne dozvolite da se dete u vama začne dok god ne sanjate sebe kao majku ili na neki pozitivan način ne vidite dete u snu. Jedino tako ćete biti sigurni da možete biti idealna majka. Zašto je sad to važno? Veoma je važno, jer je prenatalna psihologija dokazala da ukoliko majka iz bilo kog razloga svesno ili nesvesno i najmanje ne voli plod u njegovoj tananoj duši stvaraju se traume koje će dete pratiti do groba. Te takozvane, urođene traume dete neće moći da eliminiše bilo kakvom psihoterapijom. Ono sa čime rodimo sa tim i odlazimo. Odgovornost je majke da o tome brine i ekstremna odgovornost oca koji treba da bude trpeljiv više nego inače i koji treba svoju ženu da pazi kao malo vode na dlanu. Zato, najbolja deca se rađaju iz ljubavi, ne iz požude, već iz ljubavi i ponekad(nije pravilo) takva deca imaju veoma izražen talenat. Jedan takav primer je Kemal Monteno, koji je za sebe govorio daje dete velike ljubavi. Još da pomenem knjigu, po rečima akademika Vladete Jerotića, najboljeg pedagoga XX veka, čuvene Marije Montesori koja nosi naslov „Upijajući um“, koja košta manje od 1000 dinara i možete je kupiti u Vulkanovim ili nekim drugim knjižarama(imaju i Laguna i Delfi; možda čak i koji dinar jeftinije). I da ne zaboravim, jako važnu stvar: idite na svetu liturgiju, naročito kad budete u blagoslovenom stanju, ali oboje što je češće moguće. Prenatalna psihologija je utvrdila neverovatno veliki sijaset dobrih posledica po fetus nakon liturgije. Najvrednija stvar je što se pričešćivanjem majke, pričešćuje i dete gde se Sveti Duh useljava u iako još nerođeno itekako živo i svesno biće, koje treba da gradi svoju zajednicu sa Hristom još u stomaku, a kad poraste da ide za Gospodom upravo zbog onoga što piše u navedenom citatu iz Jevanjđelja po Jovanu.\r\n\r\nDa bih na neki način,makar i kroz ovaj sajt izrazio svoj protest protiv ovakvih anomalija, koje nam je u Otkrovenju najavio Sveti Jovan Bogoslov, te da bih makar i na ovaj način skrenuo pažnju na one na kojima zaista treba da bude kad su u pitanju životni uzori, dajem kraći prikaz o tri velika uzora, tri prava čoveka, jer na kraju svi mi, što kaže naš Sveti Sava: „Kratak je put kojim tečemo. Život je naš dim, para, zemlja i prah. Za malo se javlja i brzo nestaje zato je sve vaistinu sujeta. Kad i sav svet stečemo, onda se u grob selimo gde su zajedno i carevi i ubogi.“ Umesto što svakog dana, kako kaže ava Justin Popović raspinjemo Svetog Savu na Terazijama gde on gleda sa krsta i moli Boga da nam oprosti, jer ne znamo šta činimo, potrudimo se da živimo život tako, da se kada dođe vreme nađemo s\' desne strane slave Božije.', '2024-03-07 02:58:50', '0000-00-00 00:00:00', 0),
(2, 'Religija', 'Sveti Jovan Zlatousti - veliki ugodnik Božiji', 'Jovan Zlatousti rodio se u Antiohiji sirijskoj oko 347. godine posle Hrista. Otac mu je bio vojvoda. Bilo je to u vreme kada je vec bila proklamovana sloboda hrišćanske veroispovesti. Otac Sekud i majka Antusa prešli su u hrišćanstvo kad se Jovan rodio, a Melentije, antiohijski patrijarh, krstio je najpre dete, pa onda roditelje. Kao dete Jovan je bio smeran, krotak i stidljiv. Otac mu je rano umro, ali se njegova majka starala o njegovom školovanju i zato ga je poslala u Atinu, gde su, u to doba, bile najviše škole.\r\n\r\nTu se sva mudrost svetska učila. Jovan je u Atini proveo više godina, učio je filosofiju i dostigao najviši stepen krasnorečivosti - lepog besedenja. Po završetku školovanja Jovan se vratio u Antiohiju i postao advokat, gde je nekoliko godina radio, zastupajući i braneći besplatno siromahe. Imao je želju da stupi u monaški red, ali mu majka, da ne bi ostala samohrana, nije dozvoljavala da to učini za njenog života.\r\n\r\nNo, čim mu je majka umrla, Jovan ode u manastir i primi monaški čin. Nakon četiri godine, uzme ga patrijarh k sebi i proizvede za sveštenika i propovednika u antiohijskoj crkvi, i od tada počinje Jovanova delatnost u Hristovom vinogradu. Svake nedelje i praznika Jovan je držao poucne govore u crkvi i brzo se pročuo, te su mnogi ljudi dolazili da ga slušaju. Jovan je kao sveštenik antiohijske crkve proveo dvanaest godina.\r\n\r\nU to vreme umro je carigradski patrijarh Nektarije i Arhijerejski sabor izabere za patrijarha prestonog grada Jovana. Znajući da se Jovan neće primiti tog visokog položaja, niti će ga antiohijski građani pustiti, car Arkadije pribegne lukavstu: carev poslanik dođe u Antiohiju i zamoli da mu Jovan pokaže sve grobove mučenika koji su izginuli za vreme proganjanja. Kad su seli u kola, poslanik naredi da se u najbržem kasu vozi za Carigrad i na taj način je Jovan silom doveden u Carigrad i proizveden u vaseljenskog patrijarha.\r\n\r\nJovan je kao patrijarh na prestolu proveo 13 godina, propovedajući svojim krasnorečivim besedama i učeći hrišćane bogougodnom životu. Slušaoci su njegove reči pažljivo slušali, a mnogi su ih i beležili, i to ne samo hrišćani već i mnogobošći. Zbog tih govora Jovan je i dobio nadimak Zlatousti. Sastavio je oko 800 beseda i protumačio mnoge knjige Svetog pisma.\r\n\r\nJovan je slao svoje propovednike u udaljene pokrajine, da mnogobošće preobraćaju u hrišćanstvo, među njima i Slovene. Napisao je mnogo crkvenih knjiga, a sastavio je i liturgiju koja se i danas služi, sa malim izuzecima, svim nedeljama i praznicima, i koja se zove „Liturgija Zlatoustova“. Poznato mu je delo „Šest knjiga o sveštenstvu“.\r\n\r\nJovan je, međutim, došao u sukob sa caricom Jevdosijom, ponosnom Grkinjom i taj mu je sukob doneo mnoge neprijatnosti, progonstvo, a na kraju i smrt. Onog dana kad je Jovan umro, na Krstovdan, 14. septembra 407. godine, u 62. godini njegova života u Carigradu pade jaka kiša s\' gradom, a posle četiri dana umre i carica Jevdokija. Od dana caričine sahrane, često su se dešavali zemljotresi, što su mnogi smatrali za Božju kaznu. Zato, posle 35 godina, car Teodosije mlađi, sin Arkadijev i Jevdoksijin, naredi da se telo svetog Jovana prenese iz Komana u Carigrad. Ovaj prenos bio je izvršen s takvom svečanošću kakvu Carigrad do tada nije video. No, desi se čudnovat događaj: kada je lađa sa moštima bila u Bosforskom moreuzu, dune jak vetar i zanese lađu ka obali, gde je u blizini bio vinograd one udovice, zbog koje je svetitelj i počeo stradati. Tu su njegove mošti iskrcali s\' lađe i uneli u crkvu, pred kojom je car klekao i pomolio se da oprosti njegovoj grešnoj majci. Od tog vremena, kažu, prestao je zemljotres.\r\n\r\nPomen svetom Jovanu Zlatoustom drži se 26. novembra (13. novembra), a spomen prenosa moštiju, 9. februara (27. januara). Međutim, na dan Tri Jerarha, 12. februara (30. januara) svečano se proslavlja sa Svetim Vasilijem Velikim i Svetim Grigorijem Bogoslovom. Na ikoni se sveti Jovan Zlatousti predstavlja u potpunom arhijerejskom ornatu. Ko ovog dana prekine nit (žicu) prekinuo je i svoj život - zato se ne upotrebljavaju igle za šivenje i pletenje i razboj za tkanje.\r\nCarica otme od jedne sirote žene vinograd, i ta se žena obrati patrijarhu da se zauzme za njenu stvar. Patrijarh ode u dvor da se objasni sa caricom, ali se ona uvredi zbog onog što joj je Jovan kazao pa naredi da se patrijarh istera iz dvora. Uskoro dođe Krstovdan, i kad je carica htela da uđe u crkvu da se moli Bogu, vratar je, po patrijarhovom naređenju, ne htede pustiti u crkvu. Carica se naljuti i smisli da se osveti patrijarhu.\r\n\r\nI tada je, kao i svagda, bilo sveštenika i vladika koji su zavideli Jovanovoj slavi, pa ih carica lako pobuni, i oni se sastanu i optuže patrijarha da strogo kažnjava neispravne sveštenike, da je jedno dete krstio posle podne, da se kod kuće ne moli Bogu, da caricu Jevdoksiju naziva Jezaveljom, ženom poročnog cara Ahava i slično. Patrijarh se četiri puta nije odazvao pozivu ovog odbora da se opravda, zato što je smatrao da je odgovoran samo Vaseljenskom Saboru, te ga ovaj odbor osudi na lišenje arhijerejskog čina i da ga car kazni zato što je vređao caricu. Kad je Jovan čuo za ovu osudu, rekao je: „Crkva Hristova niti je samnom započeta, niti će samnom završiti“. Po carevoj naredbi, Jovana pošalju u zatočenje.\r\n\r\nKada građani Carigrada saznaše da je Jovan poslat u zatočenje, podigoše veliku bunu, a utom se u Carigradu desi i zemljotres koji mnogi smatraše kaznom za takvo postupanje sa svetiteljem, pa sama carica bi prinuđena pisati patrijarhu i moliti ga da se vrati.\r\n\r\nDoček Jovanov u Carigradu bio je veličanstven: mnoštvo sveta izašlo je lađama da ga dočeka, i klicanjem ga dopratiše do crkve Svetih Apostola.\r\n\r\nNo, nije prošlo ni dva meseca, a Jovan se ponovo sukobi sa caricom. Jovan je u crkvi prekorevao one koji su držali pozorišne predstave pred caričinom statuom i ometali bogosluženje u obližnjoj crkvi. Kada je Jovan, na Usekovanje, držao u crkvi govor, više puta je ponavljao reči: „Opet Irodijada besni!“ i „Opet ište Jovanovu glavu“, a carica držeci da nju pod Irodijadom podrazumeva, sakupi opet onaj isti crkveni odbor, koji Jovana, kao i pre, osudi na zatočenje.\r\n\r\nU največoj tišini i pod stražom, Jovana pošalju u gradić Kukus u Armeniji, gde je proveo tri godine. Jovan, međutim, ne beše prekinuo veze sa Carigradom i vrlo često se dopisivao s prijateljima, zbog čega car naredi da se Jovan odvede u zatočenje na samu granicu carstva, u gradić Pitijunt, nedaleko od Crnog mora. Dva vojnika, koji su ga sprovodili, dobili su zadatak da ga usput muče i zlostavljaju, ne bi li na putu i skončao. Po najvećoj pripeči, gladan i žedan, morao je stari patrijarh ići pešice i gologlav, te stiže do mesta Komana, gde svrati u jednu crkvicu da se pomoli Bogu i tu se od umora i napora razboli. Vojnici ga međutim počeše goniti i dalje, ali kad su videli da više ne može ići, ostave ga na miru.\r\n\r\nJovan se obuče u arhijerejsko odelo, pričesti se i umre. Ovo se dogodilo na Krstovdan, 14. septembra 407. godine, u 62. godini njegova života.', '2024-03-07 03:02:08', '0000-00-00 00:00:00', 0),
(3, 'Da li ste znali?', 'VIDEO: Bogomoljka mužjaku odseče glavu, a on nastavi sa parenjem', 'Tokom parenja ženke bogomoljki često ubijaju svoje partnere otkidajući im glavu, ali to ne mora da znači i kraj seksualnom odnosa.Video-snimak iz emisije Deep Look televizije PBS, pokazuje da mužjak, čak i bez glave nastavlja svoju reproduktivnu ulogu.Tokom faze udvaranja ženka otkida glavu mužjaku, ali on nastavlja sa parenjem i u nju ispušta spermu koja će oploditi jaja. Kao što se objašnjava na snimku, mužjakovo telo još neko vreme kontrolišu nervi u abdomenu. Biolozi ovakvo ponašanje opisuju kao \"seksualni kanibalizam\", a ženka bogomoljke ovo ne radi bez razloga.\r\n \r\nProšlogodišnje istraživanje pokazalo je da mužjaci koji budu pojedeni zapravo imaju reproduktivnu prednost.\r\n \r\nIz perspektive \"sebičnih gena\", ovo je zapravo dobra vest za mužjaka, jer je studija pokazala da ženke, koje pojedu mužjaka, mogu da proizvedu više od dva puta više jaja nego one koje puste svog partnera da živi.', '2024-03-07 03:07:56', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `refers`
--

DROP TABLE IF EXISTS `refers`;
CREATE TABLE IF NOT EXISTS `refers` (
  `idC` int NOT NULL,
  `idN` int NOT NULL,
  PRIMARY KEY (`idC`,`idN`),
  KEY `idN` (`idN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `refers`
--

INSERT INTO `refers` (`idC`, `idN`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idU` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timme_change` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int NOT NULL,
  PRIMARY KEY (`idU`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idU`, `name`, `surname`, `password`, `status`, `time_create`, `timme_change`, `deleted`) VALUES
(1, 'Nemanja', 'Karapetrović', '123-aBc-456', 1, '2024-03-07 02:34:08', '0000-00-00 00:00:00', 0),
(2, 'Ivan', 'Jezdović', '456-Master-789', 2, '2024-03-07 02:34:08', '0000-00-00 00:00:00', 0),
(3, 'Marko', 'Carić', '852-Marko-456', 2, '2024-03-07 02:35:27', '0000-00-00 00:00:00', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `users` (`idU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logged`
--
ALTER TABLE `logged`
  ADD CONSTRAINT `logged_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `users` (`idU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`idN`) REFERENCES `users` (`idU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `refers`
--
ALTER TABLE `refers`
  ADD CONSTRAINT `refers_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `comments` (`idC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `refers_ibfk_2` FOREIGN KEY (`idN`) REFERENCES `news` (`idN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
