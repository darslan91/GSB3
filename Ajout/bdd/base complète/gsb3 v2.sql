-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Mars 2019 à 22:09
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gsb3`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite_compl`
--

CREATE TABLE IF NOT EXISTS `activite_compl` (
  `AC_NUM` int(11) NOT NULL AUTO_INCREMENT,
  `AC_DATE` datetime DEFAULT NULL,
  `AC_LIEU` varchar(25) DEFAULT NULL,
  `AC_THEME` varchar(10) DEFAULT NULL,
  `AC_MOTIF` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`AC_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

CREATE TABLE IF NOT EXISTS `composant` (
  `CMP_CODE` varchar(4) NOT NULL,
  `CMP_LIBELLE` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CMP_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `constituer`
--

CREATE TABLE IF NOT EXISTS `constituer` (
  `MED_DEPOTLEGAL` varchar(10) NOT NULL,
  `CMP_CODE` varchar(4) NOT NULL,
  `CST_QTE` float DEFAULT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL`,`CMP_CODE`),
  KEY `CMP_CODE` (`CMP_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `dosage`
--

CREATE TABLE IF NOT EXISTS `dosage` (
  `DOS_CODE` varchar(10) NOT NULL,
  `DOS_QUANTITE` varchar(10) DEFAULT NULL,
  `DOS_UNITE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`DOS_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `engine_individu`
--

CREATE TABLE IF NOT EXISTS `engine_individu` (
  `TIN_CODE` varchar(5) NOT NULL,
  `TIN_LIBELLE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TIN_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `engine_praticien`
--

CREATE TABLE IF NOT EXISTS `engine_praticien` (
  `TYP_CODE` varchar(3) NOT NULL,
  `TYP_LIBELLE` varchar(25) DEFAULT NULL,
  `TYP_LIEU` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`TYP_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `engine_praticien`
--

INSERT INTO `engine_praticien` (`TYP_CODE`, `TYP_LIBELLE`, `TYP_LIEU`) VALUES
('MH', 'Médecin Hospitalier', 'Hopital ou clinique'),
('MV', 'Médecine de Ville', 'Cabinet'),
('PH', 'Pharmacien Hospitalier', 'Hopital ou clinique'),
('PO', 'Pharmacien Officine', 'Pharmacie'),
('PS', 'Personnel de santé', 'Centre paramédical');

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE IF NOT EXISTS `famille` (
  `FAM_CODE` varchar(3) NOT NULL,
  `FAM_LIBELLE` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`FAM_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `famille`
--

INSERT INTO `famille` (`FAM_CODE`, `FAM_LIBELLE`) VALUES
('AA', 'Antalgiques en association'),
('AAA', 'Antalgiques antipyrétiques en association'),
('AAC', 'Antidépresseur d''action centrale'),
('AAH', 'Antivertigineux antihistaminique H1'),
('ABA', 'Antibiotique antituberculeux'),
('ABC', 'Antibiotique antiacnéique local'),
('ABP', 'Antibiotique de la famille des béta-lactamines (pénicilline A)'),
('AFC', 'Antibiotique de la famille des cyclines'),
('AFM', 'Antibiotique de la famille des macrolides'),
('AH', 'Antihistaminique H1 local'),
('AIM', 'Antidépresseur imipraminique (tricyclique)'),
('AIN', 'Antidépresseur inhibiteur sélectif de la recapture de la sérotonine'),
('ALO', 'Antibiotique local (ORL)'),
('ANS', 'Antidépresseur IMAO non sélectif'),
('AO', 'Antibiotique ophtalmique'),
('AP', 'Antipsychotique normothymique'),
('AUM', 'Antibiotique urinaire minute'),
('CRT', 'Corticoïde, antibiotique et antifongique à  usage local'),
('HYP', 'Hypnotique antihistaminique'),
('PSA', 'Psychostimulant, antiasthénique');

-- --------------------------------------------------------

--
-- Structure de la table `formuler`
--

CREATE TABLE IF NOT EXISTS `formuler` (
  `MED_DEPOTLEGAL` varchar(10) NOT NULL,
  `PRE_CODE` varchar(2) NOT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL`,`PRE_CODE`),
  KEY `PRE_CODE` (`PRE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `interagir`
--

CREATE TABLE IF NOT EXISTS `interagir` (
  `MED_PERTURBATEUR` varchar(10) NOT NULL,
  `MED_MED_PERTURBE` varchar(10) NOT NULL,
  PRIMARY KEY (`MED_PERTURBATEUR`,`MED_MED_PERTURBE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inviter`
--

CREATE TABLE IF NOT EXISTS `inviter` (
  `AC_NUM` int(11) NOT NULL,
  `PRA_NUM` smallint(6) NOT NULL,
  `SPECIALISTEON` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`AC_NUM`,`PRA_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `labo`
--

CREATE TABLE IF NOT EXISTS `labo` (
  `LAB_CODE` varchar(2) NOT NULL,
  `LAB_NOM` varchar(10) DEFAULT NULL,
  `LAB_CHEFVENTE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`LAB_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `labo`
--

INSERT INTO `labo` (`LAB_CODE`, `LAB_NOM`, `LAB_CHEFVENTE`) VALUES
('BC', 'Bichat', 'Suzanne Terminus'),
('GY', 'Gyverny', 'Marcel MacDouglas'),
('SW', 'Swiss Kane', 'Alain Poutre');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE IF NOT EXISTS `medicament` (
  `MED_DEPOTLEGAL` varchar(10) NOT NULL,
  `MED_NOMCOMMERCIAL` varchar(25) DEFAULT NULL,
  `FAM_CODE` varchar(3) NOT NULL,
  `MED_COMPOSITION` varchar(255) DEFAULT NULL,
  `MED_EFFETS` varchar(255) DEFAULT NULL,
  `MED_CONTREINDIC` varchar(255) DEFAULT NULL,
  `MED_PRIXECHANTILLON` float DEFAULT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL`),
  KEY `FAM_CODE` (`FAM_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medicament`
--

INSERT INTO `medicament` (`MED_DEPOTLEGAL`, `MED_NOMCOMMERCIAL`, `FAM_CODE`, `MED_COMPOSITION`, `MED_EFFETS`, `MED_CONTREINDIC`, `MED_PRIXECHANTILLON`) VALUES
('3MYC7', 'TRIMYCINE', 'CRT', 'Triamcinolone (acétonide) + Néomycine + Nystatine', 'Ce médicament est un corticoïde à  activité forte ou très forte associé à  un antibiotique et un antifongique, utilisé en application locale dans certaines atteintes cutanées surinfectées.', 'Ce médicament est contre-indiqué en cas d''allergie à  l''un des constituants, d''infections de la peau ou de parasitisme non traités, d''acné. Ne pas appliquer sur une plaie, ni sous un pansement occlusif.', NULL),
('ADIMOL9', 'ADIMOL', 'ABP', 'Amoxicilline + Acide clavulanique', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d''allergie aux pénicillines ou aux céphalosporines.', NULL),
('AMOPIL7', 'AMOPIL', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d''allergie aux pénicillines. Il doit être administré avec prudence en cas d''allergie aux céphalosporines.', NULL),
('AMOX45', 'AMOXAR', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'La prise de ce médicament peut rendre positifs les tests de dépistage du dopage.', NULL),
('AMOXIG12', 'AMOXI Gé', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d''allergie aux pénicillines. Il doit être administré avec prudence en cas d''allergie aux céphalosporines.', NULL),
('APATOUX22', 'APATOUX Vitamine C', 'ALO', 'Tyrothricine + Tétracaïne + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d''allergie à  l''un des constituants, en cas de phénylcétonurie et chez l''enfant de moins de 6 ans.', NULL),
('BACTIG10', 'BACTIGEL', 'ABC', 'Erythromycine', 'Ce médicament est utilisé en application locale pour traiter l''acné et les infections cutanées bactériennes associées.', 'Ce médicament est contre-indiqué en cas d''allergie aux antibiotiques de la famille des macrolides ou des lincosanides.', NULL),
('BACTIV13', 'BACTIVIL', 'AFM', 'Erythromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d''allergie aux macrolides (dont le chef de file est l''érythromycine).', NULL),
('BITALV', 'BIVALIC', 'AAA', 'Dextropropoxyphène + Paracétamol', 'Ce médicament est utilisé pour traiter les douleurs d''intensité modérée ou intense.', 'Ce médicament est contre-indiqué en cas d''allergie aux médicaments de cette famille, d''insuffisance hépatique ou d''insuffisance rénale.', NULL),
('CARTION6', 'CARTION', 'AAA', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas de troubles de la coagulation (tendances aux hémorragies), d''ulcère gastroduodénal, maladies graves du foie.', NULL),
('CLAZER6', 'CLAZER', 'AFM', 'Clarithromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques. Il est également utilisé dans le traitement de l''ulcère gastro-duodénal, en association avec d''autres médicaments.', 'Ce médicament est contre-indiqué en cas d''allergie aux macrolides (dont le chef de file est l''érythromycine).', NULL),
('DEPRIL9', 'DEPRAMIL', 'AIM', 'Clomipramine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères, certaines douleurs rebelles, les troubles obsessionnels compulsifs et certaines énurésies chez l''enfant.', 'Ce médicament est contre-indiqué en cas de glaucome ou d''adénome de la prostate, d''infarctus récent, ou si vous avez reà§u un traitement par IMAO durant les 2 semaines précédentes ou en cas d''allergie aux antidépresseurs imipraminiques.', NULL),
('DIMIRTAM6', 'DIMIRTAM', 'AAC', 'Mirtazapine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères.', 'La prise de ce produit est contre-indiquée en cas de d''allergie à  l''un des constituants.', NULL),
('DOLRIL7', 'DOLORIL', 'AAA', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas d''allergie au paracétamol ou aux salicylates.', NULL),
('DORNOM8', 'NORMADOR', 'HYP', 'Doxylamine', 'Ce médicament est utilisé pour traiter l''insomnie chez l''adulte.', 'Ce médicament est contre-indiqué en cas de glaucome, de certains troubles urinaires (rétention urinaire) et chez l''enfant de moins de 15 ans.', NULL),
('EQUILARX6', 'EQUILAR', 'AAH', 'Méclozine', 'Ce médicament est utilisé pour traiter les vertiges et pour prévenir le mal des transports.', 'Ce médicament ne doit pas être utilisé en cas d''allergie au produit, en cas de glaucome ou de rétention urinaire.', NULL),
('EVILR7', 'EVEILLOR', 'PSA', 'Adrafinil', 'Ce médicament est utilisé pour traiter les troubles de la vigilance et certains symptomes neurologiques chez le sujet agé.', 'Ce médicament est contre-indiqué en cas d''allergie à  l''un des constituants.', NULL),
('INSXT5', 'INSECTIL', 'AH', 'Diphénydramine', 'Ce médicament est utilisé en application locale sur les piqûres d''insecte et l''urticaire.', 'Ce médicament est contre-indiqué en cas d''allergie aux antihistaminiques.', NULL),
('JOVAI8', 'JOVENIL', 'AFM', 'Josamycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d''allergie aux macrolides (dont le chef de file est l''érythromycine).', NULL),
('LIDOXY23', 'LIDOXYTRACINE', 'AFC', 'Oxytétracycline +Lidocaïne', 'Ce médicament est utilisé en injection intramusculaire pour traiter certaines infections spécifiques.', 'Ce médicament est contre-indiqué en cas d''allergie à  l''un des constituants. Il ne doit pas être associé aux rétinoïdes.', NULL),
('LITHOR12', 'LITHORINE', 'AP', 'Lithium', 'Ce médicament est indiqué dans la prévention des psychoses maniaco-dépressives ou pour traiter les états maniaques.', 'Ce médicament ne doit pas être utilisé si vous êtes allergique au lithium. Avant de prendre ce traitement, signalez à  votre médecin traitant si vous souffrez d''insuffisance rénale, ou si vous avez un régime sans sel.', NULL),
('PARMOL16', 'PARMOCODEINE', 'AA', 'Codéine + Paracétamol', 'Ce médicament est utilisé pour le traitement des douleurs lorsque des antalgiques simples ne sont pas assez efficaces.', 'Ce médicament est contre-indiqué en cas d''allergie à  l''un des constituants, chez l''enfant de moins de 15 Kg, en cas d''insuffisance hépatique ou respiratoire, d''asthme, de phénylcétonurie et chez la femme qui allaite.', NULL),
('PHYSOI8', 'PHYSICOR', 'PSA', 'Sulbutiamine', 'Ce médicament est utilisé pour traiter les baisses d''activité physique ou psychique, souvent dans un contexte de dépression.', 'Ce médicament est contre-indiqué en cas d''allergie à  l''un des constituants.', NULL),
('PIRIZ8', 'PIRIZAN', 'ABA', 'Pyrazinamide', 'Ce médicament est utilisé, en association à  d''autres antibiotiques, pour traiter la tuberculose.', 'Ce médicament est contre-indiqué en cas d''allergie à  l''un des constituants, d''insuffisance rénale ou hépatique, d''hyperuricémie ou de porphyrie.', NULL),
('POMDI20', 'POMADINE', 'AO', 'Bacitracine', 'Ce médicament est utilisé pour traiter les infections oculaires de la surface de l''oeil.', 'Ce médicament est contre-indiqué en cas d''allergie aux antibiotiques appliqués localement.', NULL),
('TROXT21', 'TROXADET', 'AIN', 'Paroxétine', 'Ce médicament est utilisé pour traiter la dépression et les troubles obsessionnels compulsifs. Il peut également être utilisé en prévention des crises de panique avec ou sans agoraphobie.', 'Ce médicament est contre-indiqué en cas d''allergie au produit.', NULL),
('TXISOL22', 'TOUXISOL Vitamine C', 'ALO', 'Tyrothricine + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d''allergie à  l''un des constituants et chez l''enfant de moins de 6 ans.', NULL),
('URIEG6', 'URIREGUL', 'AUM', 'Fosfomycine trométamol', 'Ce médicament est utilisé pour traiter les infections urinaires simples chez la femme de moins de 65 ans.', 'La prise de ce médicament est contre-indiquée en cas d''allergie à  l''un des constituants et d''insuffisance rénale.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `offrir`
--

CREATE TABLE IF NOT EXISTS `offrir` (
  `VIS_MATRICULE` varchar(10) NOT NULL,
  `RAP_NUM` int(11) NOT NULL,
  `MED_DEPOTLEGAL` varchar(10) NOT NULL,
  `OFF_QTE` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`VIS_MATRICULE`,`RAP_NUM`,`MED_DEPOTLEGAL`),
  KEY `MED_DEPOTLEGAL` (`MED_DEPOTLEGAL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `offrir`
--

INSERT INTO `offrir` (`VIS_MATRICULE`, `RAP_NUM`, `MED_DEPOTLEGAL`, `OFF_QTE`) VALUES
('a17', 4, '3MYC7', 3),
('a17', 4, 'AMOX45', 12);

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE IF NOT EXISTS `posseder` (
  `PRA_NUM` smallint(6) NOT NULL,
  `SPE_CODE` varchar(5) NOT NULL,
  `POS_DIPLOME` varchar(10) DEFAULT NULL,
  `POS_COEFPRESCRIPTION` float DEFAULT NULL,
  PRIMARY KEY (`PRA_NUM`,`SPE_CODE`),
  KEY `SPE_CODE` (`SPE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `praticien`
--

CREATE TABLE IF NOT EXISTS `praticien` (
  `PRA_NUM` smallint(6) NOT NULL AUTO_INCREMENT,
  `PRA_NOM` varchar(25) DEFAULT NULL,
  `PRA_PRENOM` varchar(30) DEFAULT NULL,
  `PRA_ADRESSE` varchar(50) DEFAULT NULL,
  `PRA_CP` varchar(5) DEFAULT NULL,
  `PRA_VILLE` varchar(25) DEFAULT NULL,
  `PRA_COEFNOTORIETE` float DEFAULT NULL,
  `TYP_CODE` varchar(3) NOT NULL,
  `rplc` int(1) NOT NULL,
  PRIMARY KEY (`PRA_NUM`),
  KEY `TYP_CODE` (`TYP_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Contenu de la table `praticien`
--

INSERT INTO `praticien` (`PRA_NUM`, `PRA_NOM`, `PRA_PRENOM`, `PRA_ADRESSE`, `PRA_CP`, `PRA_VILLE`, `PRA_COEFNOTORIETE`, `TYP_CODE`, `rplc`) VALUES
(1, 'Notini', 'Alain', '114 r Authie', '85000', 'LA ROCHE SUR YON', 290.03, 'MH', 0),
(2, 'Gosselin', 'Albert', '13 r Devon', '41000', 'BLOIS', 307.49, 'MV', 0),
(3, 'Delahaye', 'André', '36 av 6 Juin', '25000', 'BESANCON', 185.79, 'PS', 0),
(4, 'Leroux', 'André', '47 av Robert Schuman', '60000', 'BEAUVAIS', 172.04, 'PH', 0),
(5, 'Desmoulins', 'Anne', '31 r St Jean', '30000', 'NIMES', 94.75, 'PO', 0),
(6, 'Mouel', 'Anne', '27 r Auvergne', '80000', 'AMIENS', 45.2, 'MH', 0),
(7, 'Desgranges-Lentz', 'Antoine', '1 r Albert de Mun', '29000', 'MORLAIX', 20.07, 'MV', 0),
(8, 'Marcouiller', 'Arnaud', '31 r St Jean', '68000', 'MULHOUSE', 396.52, 'PS', 0),
(9, 'Dupuy', 'Benoit', '9 r Demolombe', '34000', 'MONTPELLIER', 395.66, 'PH', 0),
(10, 'Lerat', 'Bernard', '31 r St Jean', '59000', 'LILLE', 257.79, 'PO', 0),
(11, 'Marçais-Lefebvre', 'Bertrand', '86Bis r Basse', '67000', 'STRASBOURG', 450.96, 'MH', 0),
(12, 'Boscher', 'Bruno', '94 r Falaise', '10000', 'TROYES', 356.14, 'MV', 0),
(13, 'Morel', 'Catherine', '21 r Chateaubriand', '75000', 'PARIS', 379.57, 'PS', 0),
(14, 'Guivarch', 'Chantal', '4 av Gén Laperrine', '45000', 'ORLEANS', 114.56, 'PH', 0),
(15, 'Bessin-Grosdoit', 'Christophe', '92 r Falaise', '6000', 'NICE', 222.06, 'PO', 0),
(16, 'Rossa', 'Claire', '14 av Thiès', '6000', 'NICE', 529.78, 'MH', 0),
(17, 'Cauchy', 'Denis', '5 av Ste Thérèse', '11000', 'NARBONNE', 458.82, 'MV', 0),
(18, 'Gaffé', 'Dominique', '9 av 1ère Armée Française', '35000', 'RENNES', 213.4, 'PS', 0),
(19, 'Guenon', 'Dominique', '98 bd Mar Lyautey', '44000', 'NANTES', 175.89, 'PH', 0),
(20, 'Prévot', 'Dominique', '29 r Lucien Nelle', '87000', 'LIMOGES', 151.36, 'PO', 0),
(21, 'Houchard', 'Eliane', '9 r Demolombe', '49100', 'ANGERS', 436.96, 'MH', 0),
(22, 'Desmons', 'Elisabeth', '51 r Bernières', '29000', 'QUIMPER', 281.17, 'MV', 0),
(23, 'Flament', 'Elisabeth', '11 r Pasteur', '35000', 'RENNES', 315.6, 'PS', 0),
(24, 'Goussard', 'Emmanuel', '9 r Demolombe', '41000', 'BLOIS', 40.72, 'PH', 0),
(25, 'Desprez', 'Eric', '9 r Vaucelles', '33000', 'BORDEAUX', 406.85, 'PO', 0),
(26, 'Coste', 'Evelyne', '29 r Lucien Nelle', '19000', 'TULLE', 441.87, 'MH', 0),
(27, 'Lefebvre', 'Frédéric', '2 pl Wurzburg', '55000', 'VERDUN', 573.63, 'MV', 0),
(28, 'Lemée', 'Frédéric', '29 av 6 Juin', '56000', 'VANNES', 326.4, 'PS', 0),
(29, 'Martin', 'Frédéric', 'Bât A 90 r Bayeux', '70000', 'VESOUL', 506.06, 'PH', 0),
(30, 'Marie', 'Frédérique', '172 r Caponière', '70000', 'VESOUL', 313.31, 'PO', 0),
(31, 'Rosenstech', 'Geneviève', '27 r Auvergne', '75000', 'PARIS', 366.82, 'MH', 0),
(32, 'Pontavice', 'Ghislaine', '8 r Gaillon', '86000', 'POITIERS', 265.58, 'MV', 0),
(33, 'Leveneur-Mosquet', 'Guillaume', '47 av Robert Schuman', '64000', 'PAU', 184.97, 'PS', 0),
(34, 'Blanchais', 'Guy', '30 r Authie', '8000', 'SEDAN', 502.48, 'PH', 0),
(35, 'Leveneur', 'Hugues', '7 pl St Gilles', '62000', 'ARRAS', 7.39, 'PO', 0),
(36, 'Mosquet', 'Isabelle', '22 r Jules Verne', '76000', 'ROUEN', 77.1, 'MH', 0),
(37, 'Giraudon', 'Jean-Christophe', '1 r Albert de Mun', '38100', 'VIENNE', 92.62, 'MV', 0),
(38, 'Marie', 'Jean-Claude', '26 r Hérouville', '69000', 'LYON', 120.1, 'PS', 0),
(39, 'Maury', 'Jean-François', '5 r Pierre Girard', '71000', 'CHALON SUR SAONE', 13.73, 'PH', 0),
(40, 'Dennel', 'Jean-Louis', '7 pl St Gilles', '28000', 'CHARTRES', 550.69, 'PO', 0),
(41, 'Ain', 'Jean-Pierre', '4 résid Olympia', '2000', 'LAON', 5.59, 'MH', 0),
(42, 'Chemery', 'Jean-Pierre', '51 pl Ancienne Boucherie', '14000', 'CAEN', 396.58, 'MV', 0),
(43, 'Comoz', 'Jean-Pierre', '35 r Auguste Lechesne', '18000', 'BOURGES', 340.35, 'PS', 0),
(44, 'Desfaudais', 'Jean-Pierre', '7 pl St Gilles', '29000', 'BREST', 71.76, 'PH', 0),
(45, 'Phan', 'JérÃ´me', '9 r Clos Caillet', '79000', 'NIORT', 451.61, 'PO', 0),
(46, 'Riou', 'Line', '43 bd Gén Vanier', '77000', 'MARNE LA VALLEE', 193.25, 'MH', 0),
(47, 'Chubilleau', 'Louis', '46 r Eglise', '17000', 'SAINTES', 202.07, 'MV', 0),
(48, 'Lebrun', 'Lucette', '178 r Auge', '54000', 'NANCY', 410.41, 'PS', 0),
(49, 'Goessens', 'Marc', '6 av 6 Juin', '39000', 'DOLE', 548.57, 'PH', 0),
(50, 'Laforge', 'Marc', '5 résid Prairie', '50000', 'SAINT LO', 265.05, 'PO', 0),
(51, 'Millereau', 'Marc', '36 av 6 Juin', '72000', 'LA FERTE BERNARD', 430.42, 'MH', 0),
(52, 'Dauverne', 'Marie-Christine', '69 av Charlemagne', '21000', 'DIJON', 281.05, 'MV', 0),
(53, 'Vittorio', 'Myriam', '3 pl Champlain', '94000', 'BOISSY SAINT LEGER', 356.23, 'PS', 0),
(54, 'Lapasset', 'Nhieu', '31 av 6 Juin', '52000', 'CHAUMONT', 107, 'PH', 0),
(55, 'Plantet-Besnier', 'Nicole', '10 av 1ère Armée Française', '86000', 'CHATELLEREAULT', 369.94, 'PO', 0),
(56, 'Chubilleau', 'Pascal', '3 r Hastings', '15000', 'AURRILLAC', 290.75, 'MH', 0),
(57, 'Robert', 'Pascal', '31 r St Jean', '93000', 'BOBIGNY', 162.41, 'MV', 0),
(58, 'Jean', 'Pascale', '114 r Authie', '49100', 'SAUMUR', 375.52, 'PS', 0),
(59, 'Chanteloube', 'Patrice', '14 av Thiès', '13000', 'MARSEILLE', 478.01, 'PH', 0),
(60, 'Lecuirot', 'Patrice', 'résid St Pères 55 r Pigacière', '54000', 'NANCY', 239.66, 'PO', 0),
(61, 'Gandon', 'Patrick', '47 av Robert Schuman', '37000', 'TOURS', 599.06, 'MH', 0),
(62, 'Mirouf', 'Patrick', '22 r Puits Picard', '74000', 'ANNECY', 458.42, 'MV', 0),
(63, 'Boireaux', 'Philippe', '14 av Thiès', '10000', 'CHALON EN CHAMPAGNE', 454.48, 'PS', 0),
(64, 'Cendrier', 'Philippe', '7 pl St Gilles', '12000', 'RODEZ', 164.16, 'PH', 0),
(65, 'Duhamel', 'Philippe', '114 r Authie', '34000', 'MONTPELLIER', 98.62, 'PO', 0),
(66, 'Grigy', 'Philippe', '15 r Mélingue', '44000', 'CLISSON', 285.1, 'MH', 0),
(67, 'Linard', 'Philippe', '1 r Albert de Mun', '81000', 'ALBI', 486.3, 'MV', 0),
(68, 'Lozier', 'Philippe', '8 r Gaillon', '31000', 'TOULOUSE', 48.4, 'PS', 0),
(69, 'Dechâtre', 'Pierre', '63 av Thiès', '23000', 'MONTLUCON', 253.75, 'PH', 0),
(70, 'Goessens', 'Pierre', '22 r Jean Romain', '40000', 'MONT DE MARSAN', 426.19, 'PO', 0),
(71, 'Leménager', 'Pierre', '39 av 6 Juin', '57000', 'METZ', 118.7, 'MH', 0),
(72, 'Née', 'Pierre', '39 av 6 Juin', '82000', 'MONTAUBAN', 72.54, 'MV', 0),
(73, 'Guyot', 'Pierre-Laurent', '43 bd Gén Vanier', '48000', 'MENDE', 352.31, 'PS', 0),
(74, 'Chauchard', 'Roger', '9 r Vaucelles', '13000', 'MARSEILLE', 552.19, 'PH', 0),
(75, 'Mabire', 'Roland', '11 r Boutiques', '67000', 'STRASBOURG', 422.39, 'PO', 0),
(76, 'Leroy', 'Soazig', '45 r Boutiques', '61000', 'ALENCON', 570.67, 'MH', 0),
(77, 'Guyot', 'Stéphane', '26 r Hérouville', '46000', 'FIGEAC', 28.85, 'MV', 0),
(78, 'Delposen', 'Sylvain', '39 av 6 Juin', '27000', 'DREUX', 292.01, 'PS', 0),
(79, 'Rault', 'Sylvie', '15 bd Richemond', '2000', 'SOISSON', 526.6, 'PH', 0),
(80, 'Renouf', 'Sylvie', '98 bd Mar Lyautey', '88000', 'EPINAL', 425.24, 'PO', 0),
(81, 'Alliet-Grach', 'Thierry', '14 av Thiès', '7000', 'PRIVAS', 451.31, 'MH', 0),
(82, 'Bayard', 'Thierry', '92 r Falaise', '42000', 'SAINT ETIENNE', 271.71, 'MV', 0),
(83, 'Gauchet', 'Thierry', '7 r Desmoueux', '38100', 'GRENOBLE', 406.1, 'PS', 0),
(84, 'Bobichon', 'Tristan', '219 r Caponière', '9000', 'FOIX', 218.36, 'PH', 0),
(85, 'Duchemin-Laniel', 'Véronique', '130 r St Jean', '33000', 'LIBOURNE', 265.61, 'PO', 0),
(86, 'Laurent', 'Younès', '34 r Demolombe', '53000', 'MAYENNE', 496.1, 'MH', 0),
(87, 't', 't', NULL, NULL, NULL, NULL, 'MH', 1),
(88, 'foulley', 'thibault', NULL, NULL, NULL, NULL, 'MV', 1),
(89, 'foulley', 'thibault', NULL, NULL, NULL, NULL, 'MH', 1);

-- --------------------------------------------------------

--
-- Structure de la table `prescrire`
--

CREATE TABLE IF NOT EXISTS `prescrire` (
  `MED_DEPOTLEGAL` varchar(10) NOT NULL,
  `TIN_CODE` varchar(5) NOT NULL,
  `DOS_CODE` varchar(10) NOT NULL,
  `PRE_POSOLOGIE` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL`,`TIN_CODE`,`DOS_CODE`),
  KEY `TIN_CODE` (`TIN_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE IF NOT EXISTS `presentation` (
  `PRE_CODE` varchar(2) NOT NULL,
  `PRE_LIBELLE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PRE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rapport_visite`
--

CREATE TABLE IF NOT EXISTS `rapport_visite` (
  `VIS_MATRICULE` varchar(10) NOT NULL,
  `RAP_NUM` int(11) NOT NULL,
  `PRA_NUM` smallint(6) NOT NULL,
  `RAP_DATE` datetime DEFAULT NULL,
  `RAP_BILAN` varchar(255) DEFAULT NULL,
  `RAP_MOTIF` varchar(255) NOT NULL,
  `num_rplc` int(11) DEFAULT NULL,
  PRIMARY KEY (`VIS_MATRICULE`,`RAP_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rapport_visite`
--

INSERT INTO `rapport_visite` (`VIS_MATRICULE`, `RAP_NUM`, `PRA_NUM`, `RAP_DATE`, `RAP_BILAN`, `RAP_MOTIF`, `num_rplc`) VALUES
('a131', 3, 23, '2003-04-18 00:00:00', 'Médecin curieux, à recontacer en décembre pour réunion', 'Actualisation annuelle', NULL),
('a131', 7, 41, '2004-03-23 00:00:00', 'RAS\r\nChangement de tel : 05 89 89 89 89', 'Rapport Annuel', NULL),
('a131', 14, 94, '2019-01-26 00:00:00', 'test avec un remplacant créer', 'Rapport Annuel', 41),
('a131', 15, 91, '2019-01-26 00:00:00', 'test remplacant avec déjà existant', 'Rapport Annuel', 41),
('a131', 16, 41, '2019-01-29 00:00:00', 'test ajout cadeau', 'Rapport Annuel', 0),
('a131', 17, 41, '2019-01-29 00:00:00', 'sdf', 'Rapport Annuel', 0),
('a131', 18, 87, '2019-01-29 00:00:00', 'test remplacant aff', 'Rapport Annuel', 41),
('a131', 19, 87, '2019-01-31 00:00:00', 'test', 'Rapport Annuel', 41),
('a131', 20, 89, '2019-02-22 00:00:00', 'test d''apostrophe', 'lala', 41),
('a17', 4, 4, '2003-05-21 00:00:00', 'Changement de direction, redéfinition de la politique médicamenteuse, recours au générique', 'Baisse activité', NULL),
('a17', 10, 41, '2019-01-25 00:00:00', 'test', 'Rapport Annuel', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `realiser`
--

CREATE TABLE IF NOT EXISTS `realiser` (
  `AC_NUM` int(11) NOT NULL,
  `VIS_MATRICULE` varchar(10) NOT NULL,
  `REA_MTTFRAIS` float DEFAULT NULL,
  PRIMARY KEY (`AC_NUM`,`VIS_MATRICULE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `REG_CODE` varchar(2) NOT NULL,
  `SEC_CODE` varchar(1) NOT NULL,
  `REG_NOM` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`REG_CODE`),
  KEY `SEC_CODE` (`SEC_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `region`
--

INSERT INTO `region` (`REG_CODE`, `SEC_CODE`, `REG_NOM`) VALUES
('AL', 'E', 'Alsace Lorraine'),
('AQ', 'S', 'Aquitaine'),
('AU', 'P', 'Auvergne'),
('BG', 'O', 'Bretagne'),
('BN', 'O', 'Basse Normandie'),
('BO', 'E', 'Bourgogne'),
('CA', 'N', 'Champagne Ardennes'),
('CE', 'P', 'Centre'),
('FC', 'E', 'Franche Comté'),
('HN', 'N', 'Haute Normandie'),
('IF', 'P', 'Ile de France'),
('LG', 'S', 'Languedoc'),
('LI', 'P', 'Limousin'),
('MP', 'S', 'Midi Pyrénée'),
('NP', 'N', 'Nord Pas de Calais'),
('PA', 'S', 'Provence Alpes Cote d''Azur'),
('PC', 'O', 'Poitou Charente'),
('PI', 'N', 'Picardie'),
('PL', 'O', 'Pays de Loire'),
('RA', 'E', 'Rhone Alpes'),
('RO', 'S', 'Roussilon'),
('VD', 'O', 'Vendée');

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE IF NOT EXISTS `secteur` (
  `SEC_CODE` varchar(1) NOT NULL,
  `SEC_LIBELLE` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`SEC_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `secteur`
--

INSERT INTO `secteur` (`SEC_CODE`, `SEC_LIBELLE`) VALUES
('E', 'Est'),
('N', 'Nord'),
('O', 'Ouest'),
('P', 'Paris centre'),
('S', 'Sud');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE IF NOT EXISTS `specialite` (
  `SPE_CODE` varchar(5) NOT NULL,
  `SPE_LIBELLE` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`SPE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`SPE_CODE`, `SPE_LIBELLE`) VALUES
('ACP', 'anatomie et cytologie pathologiques'),
('AMV', 'angéiologie, médecine vasculaire'),
('ARC', 'anesthésiologie et réanimation chirurgicale'),
('BM', 'biologie médicale'),
('CAC', 'cardiologie et affections cardio-vasculaires'),
('CCT', 'chirurgie cardio-vasculaire et thoracique'),
('CG', 'chirurgie générale'),
('CMF', 'chirurgie maxillo-faciale'),
('COM', 'cancérologie, oncologie médicale'),
('COT', 'chirurgie orthopédique et traumatologie'),
('CPR', 'chirurgie plastique reconstructrice et esthétique'),
('CU', 'chirurgie urologique'),
('CV', 'chirurgie vasculaire'),
('DN', 'diabétologie-nutrition, nutrition'),
('DV', 'dermatologie et vénéréologie'),
('EM', 'endocrinologie et métabolismes'),
('ETD', 'évaluation et traitement de la douleur'),
('GEH', 'gastro-entérologie et hépatologie (appareil digestif)'),
('GMO', 'gynécologie médicale, obstétrique'),
('GO', 'gynécologie-obstétrique'),
('HEM', 'maladies du sang (hématologie)'),
('MBS', 'médecine et biologie du sport'),
('MDT', 'médecine du travail'),
('MMO', 'médecine manuelle - ostéopathie'),
('MN', 'médecine nucléaire'),
('MPR', 'médecine physique et de réadaptation'),
('MTR', 'médecine tropicale, pathologie infectieuse et tropicale'),
('NEP', 'néphrologie'),
('NRC', 'neurochirurgie'),
('NRL', 'neurologie'),
('ODM', 'orthopédie dento maxillo-faciale'),
('OPH', 'ophtalmologie'),
('ORL', 'oto-rhino-laryngologie'),
('PEA', 'psychiatrie de l''enfant et de l''adolescent'),
('PME', 'pédiatrie maladies des enfants'),
('PNM', 'pneumologie'),
('PSC', 'psychiatrie'),
('RAD', 'radiologie (radiodiagnostic et imagerie médicale)'),
('RDT', 'radiothérapie (oncologie option radiothérapie)'),
('RGM', 'reproduction et gynécologie médicale'),
('RHU', 'rhumatologie'),
('STO', 'stomatologie'),
('SXL', 'sexologie'),
('TXA', 'toxicomanie et alcoologie');

-- --------------------------------------------------------

--
-- Structure de la table `switchboard items`
--

CREATE TABLE IF NOT EXISTS `switchboard items` (
  `SwitchboardID` int(11) NOT NULL,
  `ItemNumber` smallint(6) NOT NULL,
  `ItemText` varchar(255) DEFAULT NULL,
  `Command` smallint(6) DEFAULT NULL,
  `Argument` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SwitchboardID`,`ItemNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `switchboard items`
--

INSERT INTO `switchboard items` (`SwitchboardID`, `ItemNumber`, `ItemText`, `Command`, `Argument`) VALUES
(1, 0, 'Gestion des comptes rendus', NULL, 'Par défaut'),
(1, 1, 'Comptes-Rendus', 3, 'RAPPORT_VISITE'),
(1, 2, 'Visiteurs', 3, 'F_VISITEUR'),
(1, 3, 'Praticiens', 3, 'F_PRATICIEN'),
(1, 4, 'Medicaments', 3, 'F_MEDICAMENT'),
(1, 5, 'Quitter', 8, 'quitter');

-- --------------------------------------------------------

--
-- Structure de la table `travailler`
--

CREATE TABLE IF NOT EXISTS `travailler` (
  `VIS_MATRICULE` varchar(10) NOT NULL,
  `JJMMAA` datetime NOT NULL,
  `REG_CODE` varchar(2) NOT NULL,
  `TRA_ROLE` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`JJMMAA`,`VIS_MATRICULE`,`REG_CODE`),
  KEY `REG_CODE` (`REG_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `travailler`
--

INSERT INTO `travailler` (`VIS_MATRICULE`, `JJMMAA`, `REG_CODE`, `TRA_ROLE`) VALUES
('p49', '1977-10-03 00:00:00', 'CE', 'Visiteur'),
('k53', '1983-03-23 00:00:00', 'CA', 'Visiteur'),
('r24', '1984-07-29 00:00:00', 'BN', 'Visiteur'),
('g53', '1985-10-02 00:00:00', 'BG', 'Visiteur'),
('a55', '1987-07-17 00:00:00', 'MP', 'Visiteur'),
('m35', '1987-10-06 00:00:00', 'MP', 'Visiteur'),
('e39', '1988-04-26 00:00:00', 'IF', 'Visiteur'),
('c14', '1989-02-01 00:00:00', 'PA', 'Visiteur'),
('e22', '1989-03-24 00:00:00', 'AL', 'Visiteur'),
('p7', '1990-03-01 00:00:00', 'RO', 'Visiteur'),
('r58', '1990-06-30 00:00:00', 'BG', 'Visiteur'),
('m45', '1990-10-13 00:00:00', 'AL', 'Visiteur'),
('e5', '1990-11-27 00:00:00', 'MP', 'Visiteur'),
('t60', '1991-03-29 00:00:00', 'CE', 'Visiteur'),
('c54', '1991-04-09 00:00:00', 'AL', 'Visiteur'),
('p8', '1991-06-23 00:00:00', 'BO', 'Visiteur'),
('a17', '1991-08-26 00:00:00', 'RA', 'Visiteur'),
('e52', '1991-10-31 00:00:00', 'HN', 'Visiteur'),
('d13', '1991-12-05 00:00:00', 'PL', 'Visiteur'),
('k53', '1992-04-03 00:00:00', 'AL', 'Délégué'),
('c3', '1992-05-05 00:00:00', 'CA', 'Visiteur'),
('n58', '1992-08-30 00:00:00', 'CE', 'Visiteur'),
('s21', '1992-09-25 00:00:00', 'LI', 'Visiteur'),
('h40', '1992-11-01 00:00:00', 'CA', 'Visiteur'),
('a131', '1992-12-11 00:00:00', 'BN', 'Visiteur'),
('p40', '1992-12-14 00:00:00', 'BN', 'Délégué'),
('j50', '1992-12-16 00:00:00', 'NP', 'Visiteur'),
('p32', '1992-12-24 00:00:00', 'IF', 'Visiteur'),
('h13', '1993-05-08 00:00:00', 'LI', 'Visiteur'),
('e24', '1993-05-17 00:00:00', 'AL', 'Délégué'),
('f21', '1993-06-08 00:00:00', 'RA', 'Visiteur'),
('h35', '1993-08-26 00:00:00', 'AU', 'Visiteur'),
('b34', '1993-12-06 00:00:00', 'CE', 'Délégué'),
('f4', '1994-05-03 00:00:00', 'MP', 'Visiteur'),
('b25', '1994-07-03 00:00:00', 'PL', 'Visiteur'),
('t55', '1994-11-29 00:00:00', 'MP', 'Visiteur'),
('p42', '1994-12-12 00:00:00', 'PI', 'Visiteur'),
('n59', '1994-12-19 00:00:00', 'PI', 'Visiteur'),
('o26', '1995-01-05 00:00:00', 'LG', 'Visiteur'),
('l14', '1995-02-02 00:00:00', 'PL', 'Visiteur'),
('t43', '1995-03-09 00:00:00', 'BO', 'Visiteur'),
('a55', '1995-05-19 00:00:00', 'RO', 'Visiteur'),
('l23', '1995-06-05 00:00:00', 'PC', 'Visiteur'),
('b59', '1995-10-21 00:00:00', 'RA', 'Visiteur'),
('s10', '1995-11-14 00:00:00', 'FC', 'Visiteur'),
('e5', '1995-11-27 00:00:00', 'MP', 'Délégué'),
('g7', '1996-01-13 00:00:00', 'LI', 'Visiteur'),
('g19', '1996-01-18 00:00:00', 'IF', 'Visiteur'),
('e49', '1996-02-19 00:00:00', 'MP', 'Visiteur'),
('l56', '1996-02-27 00:00:00', 'FC', 'Visiteur'),
('n42', '1996-03-06 00:00:00', 'HN', 'Visiteur'),
('b13', '1996-03-11 00:00:00', 'AL', 'Visiteur'),
('a131', '1996-05-27 00:00:00', 'BG', 'Visiteur'),
('k4', '1996-11-21 00:00:00', 'LG', 'Visiteur'),
('l46', '1997-01-24 00:00:00', 'PL', 'Visiteur'),
('c14', '1997-02-01 00:00:00', 'PA', 'Délégué'),
('f39', '1997-02-15 00:00:00', 'RA', 'Visiteur'),
('b16', '1997-03-21 00:00:00', 'BG', 'Visiteur'),
('p6', '1997-03-30 00:00:00', 'AQ', 'Visiteur'),
('t47', '1997-08-29 00:00:00', 'PI', 'Visiteur'),
('q17', '1997-09-06 00:00:00', 'BN', 'Visiteur'),
('a17', '1997-09-19 00:00:00', 'RA', 'Délégué'),
('b4', '1997-09-25 00:00:00', 'AQ', 'Visiteur'),
('d51', '1997-11-18 00:00:00', 'FC', 'Délégué'),
('b50', '1998-01-18 00:00:00', 'PA', 'Visiteur'),
('j45', '1998-02-25 00:00:00', 'CA', 'Responsable'),
('h30', '1998-04-26 00:00:00', 'IF', 'Visiteur'),
('r24', '1998-05-25 00:00:00', 'BN', 'Responsable'),
('j8', '1998-06-18 00:00:00', 'IF', 'Responsable'),
('p41', '1998-07-27 00:00:00', 'PC', 'Visiteur'),
('a93', '1999-01-02 00:00:00', 'PC', 'Visiteur'),
('b19', '1999-01-31 00:00:00', 'PL', 'Visiteur'),
('g30', '1999-03-27 00:00:00', 'PI', 'Délégué'),
('m45', '1999-04-08 00:00:00', 'AL', 'Délégué'),
('b34', '1999-06-18 00:00:00', 'CE', 'Responsable'),
('p40', '1999-07-17 00:00:00', 'BN', 'Responsable'),
('a55', '1999-08-21 00:00:00', 'RO', 'Délégué'),
('b25', '2000-01-01 00:00:00', 'PL', 'Délégué'),
('e24', '2000-02-29 00:00:00', 'AL', 'Responsable'),
('b28', '2000-08-02 00:00:00', 'LG', 'Visiteur'),
('g30', '2000-10-31 00:00:00', 'PI', 'Responsable'),
('e5', '2000-11-27 00:00:00', 'AQ', 'Responsable'),
('c14', '2001-03-03 00:00:00', 'PA', 'Responsable'),
('d51', '2002-03-20 00:00:00', 'FC', 'Responsable');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE IF NOT EXISTS `visiteur` (
  `VIS_MATRICULE` varchar(10) NOT NULL,
  `VIS_CODE` varchar(255) NOT NULL,
  `VIS_NOM` varchar(25) DEFAULT NULL,
  `Vis_PRENOM` varchar(50) DEFAULT NULL,
  `VIS_ADRESSE` varchar(50) DEFAULT NULL,
  `VIS_CP` varchar(5) DEFAULT NULL,
  `VIS_VILLE` varchar(30) DEFAULT NULL,
  `VIS_DATEEMBAUCHE` datetime DEFAULT NULL,
  `SEC_CODE` varchar(1) DEFAULT NULL,
  `LAB_CODE` varchar(2) NOT NULL,
  `mdpChange` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`VIS_MATRICULE`),
  KEY `LAB_CODE` (`LAB_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`VIS_MATRICULE`, `VIS_CODE`, `VIS_NOM`, `Vis_PRENOM`, `VIS_ADRESSE`, `VIS_CP`, `VIS_VILLE`, `VIS_DATEEMBAUCHE`, `SEC_CODE`, `LAB_CODE`, `mdpChange`) VALUES
('a131', 't', 't', 'Louis', '8 cours Lafontaine', '29000', 'BREST', '1992-12-11 00:00:00', NULL, 'SW', 1),
('a17', 'a', 'a', 'David', '1 r Aimon de Chissée', '38100', 'GRENOBLE', '1991-08-26 00:00:00', NULL, 'GY', 1),
('a55', 'z', 'Bedos', 'Christian', '1 r Bénédictins', '65000', 'TARBES', '1987-07-17 00:00:00', NULL, 'GY', 1),
('a93', 'a', 'Tusseau', 'Louis', '22 r Renou', '86000', 'POITIERS', '1999-01-02 00:00:00', NULL, 'SW', 0),
('b13', 'a', 'Bentot', 'Pascal', '11 av 6 Juin', '67000', 'STRASBOURG', '1996-03-11 00:00:00', NULL, 'GY', 0),
('b16', 'a', 'Bioret', 'Luc', '1 r Linne', '35000', 'RENNES', '1997-03-21 00:00:00', NULL, 'SW', 0),
('b19', 'a', 'Bunisset', 'Francis', '10 r Nicolas Chorier', '85000', 'LA ROCHE SUR YON', '1999-01-31 00:00:00', NULL, 'GY', 0),
('b25', 'a', 'Bunisset', 'Denise', '1 r Lionne', '49100', 'ANGERS', '1994-07-03 00:00:00', NULL, 'SW', 0),
('b28', 'a', 'Cacheux', 'Bernard', '114 r Authie', '34000', 'MONTPELLIER', '2000-08-02 00:00:00', NULL, 'GY', 0),
('b34', 'a', 'Cadic', 'Eric', '123 r Caponière', '41000', 'BLOIS', '1993-12-06 00:00:00', 'P', 'SW', 0),
('b4', 'a', 'Charoze', 'Catherine', '100 pl Géants', '33000', 'BORDEAUX', '1997-09-25 00:00:00', NULL, 'SW', 0),
('b50', 'a', 'Clepkens', 'Christophe', '12 r Fédérico Garcia Lorca', '13000', 'MARSEILLE', '1998-01-18 00:00:00', NULL, 'SW', 0),
('b59', 'a', 'Cottin', 'Vincenne', '36 sq Capucins', '5000', 'GAP', '1995-10-21 00:00:00', NULL, 'GY', 0),
('c14', 'a', 'Daburon', 'François', '13 r Champs Elysées', '6000', 'NICE', '1989-02-01 00:00:00', 'S', 'SW', 0),
('c3', 'a', 'De', 'Philippe', '13 r Charles Peguy', '10000', 'TROYES', '1992-05-05 00:00:00', NULL, 'SW', 0),
('c54', 'a', 'Debelle', 'Michel', '181 r Caponière', '88000', 'EPINAL', '1991-04-09 00:00:00', NULL, 'SW', 0),
('d13', 'a', 'Debelle', 'Jeanne', '134 r Stalingrad', '44000', 'NANTES', '1991-12-05 00:00:00', NULL, 'SW', 0),
('d51', 'a', 'Debroise', 'Michel', '2 av 6 Juin', '70000', 'VESOUL', '1997-11-18 00:00:00', 'E', 'GY', 0),
('e22', 'a', 'Desmarquest', 'Nathalie', '14 r Fédérico Garcia Lorca', '54000', 'NANCY', '1989-03-24 00:00:00', NULL, 'GY', 0),
('e24', 'a', 'Desnost', 'Pierre', '16 r Barral de Montferrat', '55000', 'VERDUN', '1993-05-17 00:00:00', 'E', 'SW', 0),
('e39', 'a', 'Dudouit', 'Frédéric', '18 quai Xavier Jouvin', '75000', 'PARIS', '1988-04-26 00:00:00', NULL, 'GY', 0),
('e49', 'a', 'Duncombe', 'Claude', '19 av Alsace Lorraine', '9000', 'FOIX', '1996-02-19 00:00:00', NULL, 'GY', 0),
('e5', 'a', 'Enault-Pascreau', 'Céline', '25B r Stalingrad', '40000', 'MONT DE MARSAN', '1990-11-27 00:00:00', 'S', 'GY', 0),
('e52', 'a', 'Eynde', 'Valérie', '3 r Henri Moissan', '76000', 'ROUEN', '1991-10-31 00:00:00', NULL, 'GY', 0),
('f21', 'a', 'Finck', 'Jacques', 'rte Montreuil Bellay', '74000', 'ANNECY', '1993-06-08 00:00:00', NULL, 'SW', 0),
('f39', 'a', 'Frémont', 'Fernande', '4 r Jean Giono', '69000', 'LYON', '1997-02-15 00:00:00', NULL, 'GY', 0),
('f4', 'a', 'Gest', 'Alain', '30 r Authie', '46000', 'FIGEAC', '1994-05-03 00:00:00', NULL, 'GY', 0),
('g19', 'a', 'Gheysen', 'Galassus', '32 bd Mar Foch', '75000', 'PARIS', '1996-01-18 00:00:00', NULL, 'SW', 0),
('g30', 'a', 'Girard', 'Yvon', '31 av 6 Juin', '80000', 'AMIENS', '1999-03-27 00:00:00', 'N', 'GY', 0),
('g53', 'a', 'Gombert', 'Luc', '32 r Emile Gueymard', '56000', 'VANNES', '1985-10-02 00:00:00', NULL, 'GY', 0),
('g7', 'a', 'Guindon', 'Caroline', '40 r Mar Montgomery', '87000', 'LIMOGES', '1996-01-13 00:00:00', NULL, 'GY', 0),
('h13', 'a', 'Guindon', 'François', '44 r Picotière', '19000', 'TULLE', '1993-05-08 00:00:00', NULL, 'SW', 0),
('h30', 'a', 'Igigabel', 'Guy', '33 gal Arlequin', '94000', 'CRETEIL', '1998-04-26 00:00:00', NULL, 'SW', 0),
('h35', 'a', 'Jourdren', 'Pierre', '34 av Jean Perrot', '15000', 'AURRILLAC', '1993-08-26 00:00:00', NULL, 'GY', 0),
('h40', 'a', 'Juttard', 'Pierre-Raoul', '34 cours Jean Jaurès', '8000', 'SEDAN', '1992-11-01 00:00:00', NULL, 'GY', 0),
('j45', 'a', 'Labouré-Morel', 'Saout', '38 cours Berriat', '52000', 'CHAUMONT', '1998-02-25 00:00:00', 'N', 'SW', 0),
('j50', 'a', 'Landré', 'Philippe', '4 av Gén Laperrine', '59000', 'LILLE', '1992-12-16 00:00:00', NULL, 'GY', 0),
('j8', 'a', 'Langeard', 'Hugues', '39 av Jean Perrot', '93000', 'BAGNOLET', '1998-06-18 00:00:00', 'P', 'GY', 0),
('k4', 'a', 'Lanne', 'Bernard', '4 r Bayeux', '30000', 'NIMES', '1996-11-21 00:00:00', NULL, 'SW', 0),
('k53', 'a', 'Le', 'Noël', '4 av Beauvert', '68000', 'MULHOUSE', '1983-03-23 00:00:00', NULL, 'SW', 0),
('l14', 'a', 'Le', 'Jean', '39 r Raspail', '53000', 'LAVAL', '1995-02-02 00:00:00', NULL, 'SW', 0),
('l23', 'a', 'Leclercq', 'Servane', '11 r Quinconce', '18000', 'BOURGES', '1995-06-05 00:00:00', NULL, 'SW', 0),
('l46', 'a', 'Lecornu', 'Jean-Bernard', '4 bd Mar Foch', '72000', 'LA FERTE BERNARD', '1997-01-24 00:00:00', NULL, 'GY', 0),
('l56', 'a', 'Lecornu', 'Ludovic', '4 r Abel Servien', '25000', 'BESANCON', '1996-02-27 00:00:00', NULL, 'SW', 0),
('m35', 'a', 'Lejard', 'Agnès', '4 r Anthoard', '82000', 'MONTAUBAN', '1987-10-06 00:00:00', NULL, 'SW', 0),
('m45', 'a', 'Lesaulnier', 'Pascal', '47 r Thiers', '57000', 'METZ', '1990-10-13 00:00:00', NULL, 'SW', 0),
('n42', 'a', 'Letessier', 'Stéphane', '5 chem Capuche', '27000', 'EVREUX', '1996-03-06 00:00:00', NULL, 'GY', 0),
('n58', 'a', 'Loirat', 'Didier', 'Les Pêchers cité Bourg la Croix', '45000', 'ORLEANS', '1992-08-30 00:00:00', NULL, 'GY', 0),
('n59', 'a', 'Maffezzoli', 'Thibaud', '5 r Chateaubriand', '2000', 'LAON', '1994-12-19 00:00:00', NULL, 'SW', 0),
('o26', 'a', 'Mancini', 'Anne', '5 r D''Agier', '48000', 'MENDE', '1995-01-05 00:00:00', NULL, 'GY', 0),
('p32', 'a', 'Marcouiller', 'Gérard', '7 pl St Gilles', '91000', 'ISSY LES MOULINEAUX', '1992-12-24 00:00:00', NULL, 'GY', 0),
('p40', 'a', 'Michel', 'Jean-Claude', '5 r Gabriel Péri', '61000', 'FLERS', '1992-12-14 00:00:00', 'O', 'SW', 0),
('p41', 'a', 'Montecot', 'Françoise', '6 r Paul Valéry', '17000', 'SAINTES', '1998-07-27 00:00:00', NULL, 'GY', 0),
('p42', 'a', 'Notini', 'Veronique', '5 r Lieut Chabal', '60000', 'BEAUVAIS', '1994-12-12 00:00:00', NULL, 'SW', 0),
('p49', 'a', 'Onfroy', 'Den', '5 r Sidonie Jacolin', '37000', 'TOURS', '1977-10-03 00:00:00', NULL, 'GY', 0),
('p6', 'a', 'Pascreau', 'Charles', '57 bd Mar Foch', '64000', 'PAU', '1997-03-30 00:00:00', NULL, 'SW', 0),
('p7', 'a', 'Pernot', 'Claude-Noël', '6 r Alexandre 1 de Yougoslavie', '11000', 'NARBONNE', '1990-03-01 00:00:00', NULL, 'SW', 0),
('p8', 'a', 'Perrier', 'Maître', '6 r Aubert Dubayet', '71000', 'CHALON SUR SAONE', '1991-06-23 00:00:00', NULL, 'GY', 0),
('q17', 'a', 'Petit', 'Jean-Louis', '7 r Ernest Renan', '50000', 'SAINT LO', '1997-09-06 00:00:00', NULL, 'GY', 0),
('r24', 'a', 'Piquery', 'Patrick', '9 r Vaucelles', '14000', 'CAEN', '1984-07-29 00:00:00', 'O', 'GY', 0),
('r58', 'a', 'Quiquandon', 'Joël', '7 r Ernest Renan', '29000', 'QUIMPER', '1990-06-30 00:00:00', NULL, 'GY', 0),
('s10', 'a', 'Retailleau', 'Josselin', '88Bis r Saumuroise', '39000', 'DOLE', '1995-11-14 00:00:00', NULL, 'SW', 0),
('s21', 'a', 'Retailleau', 'Pascal', '32 bd Ayrault', '23000', 'MONTLUCON', '1992-09-25 00:00:00', NULL, 'SW', 0),
('t43', 'a', 'Souron', 'Maryse', '7B r Gay Lussac', '21000', 'DIJON', '1995-03-09 00:00:00', NULL, 'SW', 0),
('t47', 'a', 'Tiphagne', 'Patrick', '7B r Gay Lussac', '62000', 'ARRAS', '1997-08-29 00:00:00', NULL, 'SW', 0),
('t55', 'a', 'Tréhet', 'Alain', '7D chem Barral', '12000', 'RODEZ', '1994-11-29 00:00:00', NULL, 'SW', 0),
('t60', 'a', 'Tusseau', 'Josselin', '63 r Bon Repos', '28000', 'CHARTRES', '1991-03-29 00:00:00', NULL, 'GY', 0),
('zzz', 'a', 'swiss', 'bourdin', NULL, NULL, NULL, '2003-06-18 00:00:00', NULL, 'BC', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `constituer`
--
ALTER TABLE `constituer`
  ADD CONSTRAINT `constituer_ibfk_1` FOREIGN KEY (`CMP_CODE`) REFERENCES `composant` (`CMP_CODE`);

--
-- Contraintes pour la table `formuler`
--
ALTER TABLE `formuler`
  ADD CONSTRAINT `formuler_ibfk_1` FOREIGN KEY (`PRE_CODE`) REFERENCES `presentation` (`PRE_CODE`),
  ADD CONSTRAINT `formuler_ibfk_2` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`);

--
-- Contraintes pour la table `inviter`
--
ALTER TABLE `inviter`
  ADD CONSTRAINT `inviter_ibfk_1` FOREIGN KEY (`AC_NUM`) REFERENCES `activite_compl` (`AC_NUM`);

--
-- Contraintes pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD CONSTRAINT `medicament_ibfk_1` FOREIGN KEY (`FAM_CODE`) REFERENCES `famille` (`FAM_CODE`);

--
-- Contraintes pour la table `offrir`
--
ALTER TABLE `offrir`
  ADD CONSTRAINT `offrir_ibfk_1` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `offrir_ibfk_2` FOREIGN KEY (`VIS_MATRICULE`, `RAP_NUM`) REFERENCES `rapport_visite` (`VIS_MATRICULE`, `RAP_NUM`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `posseder_ibfk_1` FOREIGN KEY (`SPE_CODE`) REFERENCES `specialite` (`SPE_CODE`);

--
-- Contraintes pour la table `praticien`
--
ALTER TABLE `praticien`
  ADD CONSTRAINT `praticien_ibfk_1` FOREIGN KEY (`TYP_CODE`) REFERENCES `engine_praticien` (`TYP_CODE`);

--
-- Contraintes pour la table `prescrire`
--
ALTER TABLE `prescrire`
  ADD CONSTRAINT `prescrire_ibfk_1` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `prescrire_ibfk_2` FOREIGN KEY (`TIN_CODE`) REFERENCES `engine_individu` (`TIN_CODE`);

--
-- Contraintes pour la table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`SEC_CODE`) REFERENCES `secteur` (`SEC_CODE`);

--
-- Contraintes pour la table `travailler`
--
ALTER TABLE `travailler`
  ADD CONSTRAINT `travailler_ibfk_1` FOREIGN KEY (`REG_CODE`) REFERENCES `region` (`REG_CODE`);

--
-- Contraintes pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD CONSTRAINT `visiteur_ibfk_1` FOREIGN KEY (`LAB_CODE`) REFERENCES `labo` (`LAB_CODE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
