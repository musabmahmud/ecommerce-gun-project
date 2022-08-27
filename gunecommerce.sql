-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 10:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gunecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(20) NOT NULL,
  `adminUser` varchar(20) NOT NULL,
  `adminPass` varchar(50) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminRegistered` datetime NOT NULL,
  `adminStatus` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`adminId`, `adminName`, `adminUser`, `adminPass`, `adminEmail`, `adminRegistered`, `adminStatus`) VALUES
(1, 'MD MUSAB MAHMUD', 'musab', 'md.musabmahmud100@gmail.com', 'md.musabmahmud100@gmail.com', '2022-08-04 13:01:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(100) NOT NULL,
  `brandStatus` int(11) NOT NULL DEFAULT 1,
  `brandRegistered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandId`, `brandName`, `brandStatus`, `brandRegistered`) VALUES
(1, 'Smith &amp; Wesson', 1, '2022-08-17 06:08:43'),
(2, 'Remington Outdoor', 1, '2022-08-17 06:08:43'),
(3, 'Sturm, Ruger &amp;Co', 1, '2022-08-17 06:08:43'),
(4, 'SIG Sauer', 1, '2022-08-17 06:08:43'),
(5, 'Heckler and Koch', 1, '2022-08-17 06:08:43'),
(6, 'Mossberg', 1, '2022-08-17 06:08:43'),
(7, 'Colt Defense', 1, '2022-08-17 06:08:43'),
(8, 'Beretta', 1, '2022-08-17 06:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cartRegistered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cartId`, `sId`, `productId`, `quantity`, `cartRegistered`) VALUES
(1, 'tms7g9mepsa2r9a9ustvi49a52', 5, 3, '2022-08-27 08:04:04'),
(2, 'tms7g9mepsa2r9a9ustvi49a52', 9, 3, '2022-08-27 08:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryStatus` int(11) NOT NULL DEFAULT 1,
  `categoryRegistered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`, `categoryStatus`, `categoryRegistered`) VALUES
(9, 'Rifles and shotguns', 1, '2022-08-17 06:08:09'),
(10, 'Carbines', 1, '2022-08-17 06:08:09'),
(11, 'Machine guns', 1, '2022-08-17 06:08:09'),
(12, 'Sniper rifles', 1, '2022-08-17 06:08:09'),
(13, 'Submachine guns', 1, '2022-08-17 06:08:09'),
(14, 'Automatic rifles', 1, '2022-08-17 06:08:09'),
(15, 'Assault rifles', 1, '2022-08-18 21:09:36'),
(16, 'Personal defense weapons', 1, '2022-08-17 06:08:09'),
(18, 'musab', 0, '2022-08-17 06:08:09'),
(20, 'Handguns', 1, '2022-08-17 06:08:09'),
(21, 'Silencers', 1, '2022-08-17 06:08:09'),
(22, 'Gun Bullet', 1, '2022-08-18 21:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `productCode` varchar(50) NOT NULL,
  `productShortDes` text NOT NULL,
  `productLongDes` mediumtext NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `productStatus` int(11) NOT NULL DEFAULT 1,
  `productPrice` int(11) NOT NULL,
  `productOfferPrice` int(11) NOT NULL,
  `productInStock` int(11) NOT NULL,
  `productInfo` int(11) NOT NULL DEFAULT 0 COMMENT '0, 1= popular, 2= slider',
  `productRegistered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `slug`, `productCode`, `productShortDes`, `productLongDes`, `productImage`, `categoryId`, `brandId`, `productStatus`, `productPrice`, `productOfferPrice`, `productInStock`, `productInfo`, `productRegistered`) VALUES
(1, 'Machine guns', 'machine-guns', '2332', 'asdfsdf', 'This is Photoshop\'s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. aks Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nibh id elit. Duis sed odio sit amet.This is Photoshop\'s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. aks Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nibh id elit. Duis sed odio sit amet.This is Photoshop\'s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. aks Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nibh id elit. Duis sed odio sit amet.', '2332-18-08-22-d3d9446802.jpg', 22, 8, 1, 1500, 1000, 22, 0, '2022-08-18 07:28:59'),
(5, 'MC5 Carbine', 'mc5-carbine', '23423', 'Pariatur tempora ad assumenda at, ipsum, explicabo mollitia minus eveniet alias eius cumque a voluptate eligendi perferendis numquam! Distinctio, voluptas ullam? Nobis laudantium dicta soluta quae atque ut dolor, amet laboriosam veniam tempore id ratione molestiae libero eligendi repudiandae optio ad? Consectetur cupiditate, officiis aliquam deserunt ad atque asperiores illum ipsam ipsa saepe veniam placeat assumenda nisi neque explicabo vel dignissimos, rerum minus iste eum sit repellat porro! Voluptatum, ducimus maiores, fuga omnis asperiores eaque repellendus tempora esse', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas dolore quasi voluptatem est eligendi cumque totam optio! Repellat earum perspiciatis corporis fugit, qui veniam mollitia! Culpa reiciendis, modi possimus excepturi eveniet repudiandae! Voluptatibus laudantium fuga alias officiis similique! Deserunt eum vel soluta molestias, facere quos enim quam totam obcaecati sunt. Nam illum ratione nisi cupiditate laborum, aspernatur inventore dolor molestias obcaecati impedit esse sit nobis alias est similique necessitatibus repudiandae debitis quidem fugiat. Eius, itaque. Voluptatibus saepe exercitationem quaerat rerum provident velit porro non. Perferendis quae fugit, omnis non molestiae ex delectus id odit expedita nemo. Corporis expedita qui sunt impedit architecto laborum rerum error ad voluptatum dolorum ab, eum magni quibusdam vel voluptatem voluptas. Possimus, quisquam error facilis obcaecati distinctio tempora quia quaerat temporibus modi tenetur sunt eius illo quod consectetur similique. Tempore eligendi delectus voluptas cumque, repellat, architecto necessitatibus facere eum dignissimos a sed! Aspernatur ratione, laboriosam iusto perferendis expedita obcaecati, nihil corrupti, quidem ipsum reiciendis fuga dolorem possimus esse pariatur facere delectus? Blanditiis quo consectetur magni culpa maxime nesciunt ipsa, rerum, laudantium, incidunt corrupti odio accusamus aspernatur aut. Obcaecati quas eaque odit? Quas eum vitae, nesciunt possimus obcaecati natus. Id hic amet, alias ab ea iusto commodi. Earum quasi ratione quibusdam, expedita enim necessitatibus! Saepe rerum architecto molestiae qui vero fuga? Dolorem delectus perferendis cumque deserunt minima quis quod amet? Dicta laboriosam, quis itaque reprehenderit tempora quibusdam, vero, asperiores maiores facilis beatae harum minima labore. Earum repellat nulla repudiandae iusto aliquid eius esse provident nesciunt soluta quae. Tenetur asperiores perferendis, ex voluptas sunt rem quis, pariatur autem sapiente, quaerat molestias! Maiores, hic vero. Architecto asperiores consectetur debitis sunt, necessitatibus veniam voluptate saepe modi similique laborum ratione rem quia tempore maxime ipsam at odit quam vel! Quaerat, eum culpa voluptates asperiores error ad consequuntur laboriosam quod optio praesentium expedita quasi alias rerum deserunt velit tempora impedit illo quidem odit! Voluptatem temporibus blanditiis possimus harum dignissimos! Ratione veritatis quisquam enim aliquid sit nihil eum fugit cumque! Voluptates id pariatur reprehenderit laboriosam deleniti officia autem, quam sint doloremque laudantium rem ratione ex error nulla facere rerum quaerat nisi asperiores non est, quo optio modi ea. Fugiat, veniam enim dolorum repellat cupiditate eligendi quaerat porro hic maxime reiciendis deleniti, vel minus dicta itaque consequuntur aspernatur. Quia earum quisquam rem id minus cumque repudiandae incidunt delectus, natus ea quo voluptates culpa quam, ipsum excepturi distinctio quibusdam beatae deleniti aspernatur voluptas, harum sed. Voluptas numquam doloribus placeat, ad obcaecati consequuntur velit voluptatua optio voluptas exercitationem reiciendis? Quisquam odit adipisci et perferendis, sequi vero?', '23423-17-08-22-d3d9446802.jpg', 21, 5, 1, 2000, 2000, 23, 0, '2022-08-21 07:06:57'),
(7, 'AK-47', 'ak-47', 'Kalashnikov', 'Welcome to the Slangpedia entry on guns!  Here you’ll find a massive list of slang terms that can be used to refer to guns, and slang words that are related to guns.', 'Heat/heater: commonly used to describe a weapon of some kind, usually a pistol.\r\nUsage: “You packing heat?” \r\nOrigin: 1932 W. R. BURNETT Silver Eagle i. 7 ‘He don’t even pack a heater.’ ‘Don’t what?’ ‘He don’t carry a gun.’\r\nGat: Came from shortening Gattling gun to just gat.\r\nUsage:  “I had to shut up: the dealers had gats, my boys didn’t.”\r\nOrigin: Was used during the prohibition era to name any gun, but specifically the thompson submachine gun, aka The Tommy Gun.\r\nStrapped: You are considered “strapped” when you are in possession of a fire-arm.\r\nUsage: “Step off, ’cause I’m fully strapped.”\r\nOrigin: Started off as a term to describe when you have a Mac 10 or some other semi machine gun or uzi on a strap hanging from your shoulder under your clothes.\r\nLeng: Any type of weapon, i.e a knife or a gun. \r\nCan also be used in the word ‘lengman‘, i.e someone in possession of a weapon or someone who is dangerous.\r\nUsage: “I saw them Hackney boys, so I pulled out my leng and started shooting at them”\r\nOrigin: The term is used mostly among London criminal underground network.\r\nHammer:\r\nUsage: “i pulled the hammer on that guy and gave him a third eye”\r\nOrigin: The hammer is the part of the firearm that strikes the firing pin which in turn hits the primer and ignites the propellant that pushes the slug out of the barrel.\r\nBurner: Any type of firearm, that has either been previously used in a crime, or has been stolen. You buy them for a very low price, use them once, and then throw them away.\r\nUsage: “Take this burner for 85bucks. Nine bodies on it. Leave it or sell it quick.”\r\nOrigin: Likely has its roots in the fact that a firearm can get very hot when fired multiple times.\r\nCannon:\r\nUsage: “He took a hard blow to the face before he could draw his cannon.”\r\nOrigin: Comes from the good old classical cannon.\r\nPiece: A gun, firearm. (Licensed or unlicensed) Usually hidden under clothing for protection or criminal intentions.\r\nUsage: “This piece shoots nice, only cost $50.\r\nHandgun: a gun designed for use by one hand; a pistol.\r\nUsage: “They drew their handguns simultaneously, both ready to shoot”\r\nHardware: One or more guns.\r\nUsage: ” He’s carrying some serious hardware. “\r\nBlaster: An unspecified powerful hand weapon, usually one that fires an energy pulse or beam.\r\nUsage: “The blaster was loaded and ready, presumably aimed at the most unfortunate man in the room.”\r\nRevolver: A pistol with revolving chambers enabling several shots to be fired without reloading.\r\nUsage: “The revolver fired, ripping through the air into it’s target”\r\nRod: US slang name for pistol.\r\nUsage: “The rod resembled a sign of freedom, for it’s ability to kill innocents without discussion or discourse.”\r\nPersuader: A gun or other weapon used to compel submission or obedience.\r\nUsage: “Silence fell over the congregation, discussion was no longer an option, the persuader had persuaded them.”\r\nThat’s it for our list of slang words for “gun”. Did we miss any “gun” synonyms? Please let us know in the form below! 👍😊', 'Kalashnikov-17-08-22-d3d9446802.jpg', 21, 5, 1, 2000, 1000, 20, 0, '2022-08-21 07:16:21'),
(8, 'FNX-45', 'fnx-45', 'M2', 'Welcome to the Slangpedia entry on guns!  Here you’ll find a massive list of slang terms that can be used to refer to guns, and slang words that are related to guns.', 'Heat/heater: commonly used to describe a weapon of some kind, usually a pistol.\r\nUsage: “You packing heat?” \r\nOrigin: 1932 W. R. BURNETT Silver Eagle i. 7 ‘He don’t even pack a heater.’ ‘Don’t what?’ ‘He don’t carry a gun.’\r\nGat: Came from shortening Gattling gun to just gat.\r\nUsage:  “I had to shut up: the dealers had gats, my boys didn’t.”\r\nOrigin: Was used during the prohibition era to name any gun, but specifically the thompson submachine gun, aka The Tommy Gun.\r\nStrapped: You are considered “strapped” when you are in possession of a fire-arm.\r\nUsage: “Step off, ’cause I’m fully strapped.”\r\nOrigin: Started off as a term to describe when you have a Mac 10 or some other semi machine gun or uzi on a strap hanging from your shoulder under your clothes.\r\nLeng: Any type of weapon, i.e a knife or a gun. \r\nCan also be used in the word ‘lengman‘, i.e someone in possession of a weapon or someone who is dangerous.\r\nUsage: “I saw them Hackney boys, so I pulled out my leng and started shooting at them”\r\nOrigin: The term is used mostly among London criminal underground network.\r\nHammer:\r\nUsage: “i pulled the hammer on that guy and gave him a third eye”\r\nOrigin: The hammer is the part of the firearm that strikes the firing pin which in turn hits the primer and ignites the propellant that pushes the slug out of the barrel.\r\nBurner: Any type of firearm, that has either been previously used in a crime, or has been stolen. You buy them for a very low price, use them once, and then throw them away.\r\nUsage: “Take this burner for 85bucks. Nine bodies on it. Leave it or sell it quick.”\r\nOrigin: Likely has its roots in the fact that a firearm can get very hot when fired multiple times.\r\nCannon:\r\nUsage: “He took a hard blow to the face before he could draw his cannon.”\r\nOrigin: Comes from the good old classical cannon.\r\nPiece: A gun, firearm. (Licensed or unlicensed) Usually hidden under clothing for protection or criminal intentions.\r\nUsage: “This piece shoots nice, only cost $50.\r\nHandgun: a gun designed for use by one hand; a pistol.\r\nUsage: “They drew their handguns simultaneously, both ready to shoot”\r\nHardware: One or more guns.\r\nUsage: ” He’s carrying some serious hardware. “\r\nBlaster: An unspecified powerful hand weapon, usually one that fires an energy pulse or beam.\r\nUsage: “The blaster was loaded and ready, presumably aimed at the most unfortunate man in the room.”\r\nRevolver: A pistol with revolving chambers enabling several shots to be fired without reloading.\r\nUsage: “The revolver fired, ripping through the air into it’s target”\r\nRod: US slang name for pistol.\r\nUsage: “The rod resembled a sign of freedom, for it’s ability to kill innocents without discussion or discourse.”\r\nPersuader: A gun or other weapon used to compel submission or obedience.\r\nUsage: “Silence fell over the congregation, discussion was no longer an option, the persuader had persuaded them.”\r\nThat’s it for our list of slang words for “gun”. Did we miss any “gun” synonyms? Please let us know in the form below! 👍😊', 'M2-17-08-22-d3d9446802.jpg', 16, 6, 1, 3600, 3200, 55, 0, '2022-08-17 15:51:43'),
(9, 'Spring field XD MOD2', 'spring-field-xd-mod2', 'MOD2', 'Slang for Gun\r\nWelcome to the Slangpedia entry on guns!  Here you’ll find a massive list of slang terms that can be used to refer to guns, and slang words that are related to guns.', 'Heat/heater: commonly used to describe a weapon of some kind, usually a pistol.\r\nUsage: “You packing heat?” \r\nOrigin: 1932 W. R. BURNETT Silver Eagle i. 7 ‘He don’t even pack a heater.’ ‘Don’t what?’ ‘He don’t carry a gun.’\r\nGat: Came from shortening Gattling gun to just gat.\r\nUsage:  “I had to shut up: the dealers had gats, my boys didn’t.”\r\nOrigin: Was used during the prohibition era to name any gun, but specifically the thompson submachine gun, aka The Tommy Gun.\r\nStrapped: You are considered “strapped” when you are in possession of a fire-arm.\r\nUsage: “Step off, ’cause I’m fully strapped.”\r\nOrigin: Started off as a term to describe when you have a Mac 10 or some other semi machine gun or uzi on a strap hanging from your shoulder under your clothes.\r\nLeng: Any type of weapon, i.e a knife or a gun. \r\nCan also be used in the word ‘lengman‘, i.e someone in possession of a weapon or someone who is dangerous.\r\nUsage: “I saw them Hackney boys, so I pulled out my leng and started shooting at them”\r\nOrigin: The term is used mostly among London criminal underground network.\r\nHammer:\r\nUsage: “i pulled the hammer on that guy and gave him a third eye”\r\nOrigin: The hammer is the part of the firearm that strikes the firing pin which in turn hits the primer and ignites the propellant that pushes the slug out of the barrel.\r\nBurner: Any type of firearm, that has either been previously used in a crime, or has been stolen. You buy them for a very low price, use them once, and then throw them away.\r\nUsage: “Take this burner for 85bucks. Nine bodies on it. Leave it or sell it quick.”\r\nOrigin: Likely has its roots in the fact that a firearm can get very hot when fired multiple times.\r\nCannon:\r\nUsage: “He took a hard blow to the face before he could draw his cannon.”\r\nOrigin: Comes from the good old classical cannon.\r\nPiece: A gun, firearm. (Licensed or unlicensed) Usually hidden under clothing for protection or criminal intentions.\r\nUsage: “This piece shoots nice, only cost $50.\r\nHandgun: a gun designed for use by one hand; a pistol.\r\nUsage: “They drew their handguns simultaneously, both ready to shoot”\r\nHardware: One or more guns.\r\nUsage: ” He’s carrying some serious hardware. “\r\nBlaster: An unspecified powerful hand weapon, usually one that fires an energy pulse or beam.\r\nUsage: “The blaster was loaded and ready, presumably aimed at the most unfortunate man in the room.”\r\nRevolver: A pistol with revolving chambers enabling several shots to be fired without reloading.\r\nUsage: “The revolver fired, ripping through the air into it’s target”\r\nRod: US slang name for pistol.\r\nUsage: “The rod resembled a sign of freedom, for it’s ability to kill innocents without discussion or discourse.”\r\nPersuader: A gun or other weapon used to compel submission or obedience.\r\nUsage: “Silence fell over the congregation, discussion was no longer an option, the persuader had persuaded them.”\r\nThat’s it for our list of slang words for “gun”. Did we miss any “gun” synonyms? Please let us know in the form below! 👍😊', 'MOD2-17-08-22-d3d9446802.jpg', 10, 2, 1, 6660, 6000, 601, 0, '2022-08-18 20:14:44'),
(10, 'Ruger 1707 GP100', 'ruger-1707-gp100', '546456', 'Welcome to the Slangpedia entry on guns!  Here you’ll find a massive list of slang terms that can be used to refer to guns and slang words that are related to guns.', 'Heat/heater: commonly used to describe a weapon of some kind, usually a pistol.\r\nUsage: “You packing heat?” \r\nOrigin: 1932 W. R. BURNETT Silver Eagle i. 7 ‘He don’t even pack a heater.’ ‘Don’t what?’ ‘He don’t carry a gun.’\r\nGat: Came from shortening Gattling gun to just gat.\r\nUsage:  “I had to shut up: the dealers had gats, my boys didn’t.”\r\nOrigin: Was used during the prohibition era to name any gun, but specifically the thompson submachine gun, aka The Tommy Gun.\r\nStrapped: You are considered “strapped” when you are in possession of a fire-arm.\r\nUsage: “Step off, ’cause I’m fully strapped.”\r\nOrigin: Started off as a term to describe when you have a Mac 10 or some other semi machine gun or uzi on a strap hanging from your shoulder under your clothes.\r\nLeng: Any type of weapon, i.e a knife or a gun. \r\nCan also be used in the word ‘lengman‘, i.e someone in possession of a weapon or someone who is dangerous.\r\nUsage: “I saw them Hackney boys, so I pulled out my leng and started shooting at them”\r\nOrigin: The term is used mostly among London criminal underground network.\r\nHammer:\r\nUsage: “i pulled the hammer on that guy and gave him a third eye”\r\nOrigin: The hammer is the part of the firearm that strikes the firing pin which in turn hits the primer and ignites the propellant that pushes the slug out of the barrel.\r\nBurner: Any type of firearm, that has either been previously used in a crime, or has been stolen. You buy them for a very low price, use them once, and then throw them away.\r\nUsage: “Take this burner for 85bucks. Nine bodies on it. Leave it or sell it quick.”\r\nOrigin: Likely has its roots in the fact that a firearm can get very hot when fired multiple times.\r\nCannon:\r\nUsage: “He took a hard blow to the face before he could draw his cannon.”\r\nOrigin: Comes from the good old classical cannon.\r\nPiece: A gun, firearm. (Licensed or unlicensed) Usually hidden under clothing for protection or criminal intentions.\r\nUsage: “This piece shoots nice, only cost $50.\r\nHandgun: a gun designed for use by one hand; a pistol.\r\nUsage: “They drew their handguns simultaneously, both ready to shoot”\r\nHardware: One or more guns.\r\nUsage: ” He’s carrying some serious hardware. “\r\nBlaster: An unspecified powerful hand weapon, usually one that fires an energy pulse or beam.\r\nUsage: “The blaster was loaded and ready, presumably aimed at the most unfortunate man in the room.”\r\nRevolver: A pistol with revolving chambers enabling several shots to be fired without reloading.\r\nUsage: “The revolver fired, ripping through the air into it’s target”\r\nRod: US slang name for pistol.\r\nUsage: “The rod resembled a sign of freedom, for it’s ability to kill innocents without discussion or discourse.”\r\nPersuader: A gun or other weapon used to compel submission or obedience.\r\nUsage: “Silence fell over the congregation, discussion was no longer an option, the persuader had persuaded them.”\r\nThat’s it for our list of slang words for “gun”. Did we miss any “gun” synonyms? Please let us know in the form below! 👍😊', '546456-17-08-22-d3d9446802.jpg', 20, 5, 1, 4352, 3456, 34, 0, '2022-08-17 15:53:48'),
(29, 'Field XD MOD2', 'field-xd-mod2', 'a56SDF456', 'Eat/heater: commonly used to describe a weapon of some kind, usually a pistol. Usage: “You packing heat?” Origin: 1932 W. R. BURNETT Silver Eagle i. 7 ‘He don’t even pack a heater.’ ‘Don’t what?’ ‘He don’t carry a gun.’ Gat: Came from', 'Shortening Gattling gun to just gat. Usage: “I had to shut up: the dealers had gats, my boys didn’t.” Origin: Was used during the prohibition era to name any gun, but specifically the thompson submachine gun, aka The Tommy Gun. Strapped: You are considered “strapped” when you are in possession of a fire-arm. Usage: “Step off, ’cause I’m fully strapped.” Origin: Started off as a term to describe when you have a Mac 10 or some other semi machine gun or uzi on a strap hanging from your shoulder under your clothes. Leng: Any type of weapon, i.e a knife or a gun. Can also be used in the word ‘lengman‘, i.e someone in possession of a weapon or someone who is dangerous. Usage: “I saw them Hackney boys, so I pulled out my leng and started shooting at them” Origin: The term is used mostly among London criminal underground network. Hammer: Usage: “i pulled the hammer on that guy and gave him a third eye” Origin: The hammer is the part of the firearm that strikes the firing pin which in turn hits the primer and ignites the propellant that pushes the slug out of the barrel. Burner: Any type of firearm, that has either been previously used in a crime, or has been stolen. You buy them for a very low price, use them once, and then throw them away. Usage: “Take this burner for 85bucks. Nine bodies on it. Leave it or sell it quick.” Origin: Likely has its roots in the fact that a firearm can get very hot when fired multiple times. Cannon: Usage: “He took a hard blow to the face before he could draw his cannon.” Origin: Comes from the good old classical cannon. Piece: A gun, firearm. (Licensed or unlicensed) Usually hidden under clothing for protection or criminal intentions. Usage: “This piece shoots nice, only cost $50. Handgun: a gun designed for use by one hand; a pistol. Usage: “They drew their handguns simultaneously, both ready to shoot” Hardware: One or more guns. Usage: ” He’s carrying some serious hardware. “ Blaster: An unspecified powerful hand weapon, usually one that fires an en', 'a56SDF456-27-08-22-d3d9446802.jpg', 16, 2, 1, 4454, 2146, 54, 0, '2022-08-27 07:07:47'),
(30, 'Machine guns', 'machine-guns', '2323454', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto totam alias nostrum illum earum, molestiae dolorum inventore numquam maiores pariatur voluptate consequuntur enim, impedit officia ducimus, culpa dicta vitae neque fuga. Officiis optio culpa blanditiis consequuntur voluptatem sequi ut necessitatibus esse nulla?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto totam alias nostrum illum earum, molestiae dolorum inventore numquam maiores pariatur voluptate consequuntur enim, impedit officia ducimus, culpa dicta vitae neque fuga. Officiis optio culpa blanditiis consequuntur voluptatem sequi ut necessitatibus esse nulla? Sit porro autem officiis odit necessitatibus reiciendis corrupti! Dolores aliquid debitis suscipit recusandae officiis voluptatum atque sit aliquam reprehenderit voluptatibus quibusdam hic, odit, ipsum consequatur ad saepe? Accusamus soluta nemo sapiente reiciendis recusandae nesciunt numquam maxime sit commodi illo et, culpa, nulla consequatur provident mollitia laboriosam necessitatibus sunt ex! Neque laudantium error ut dolorem dolorum voluptatibus voluptatem ducimus quaerat accusantium cumque sunt inventore optio, architecto nobis eligendi, cupiditate obcaecati. Et non harum, consequatur neque officiis voluptas. Odit repellat excepturi earum nisi cupiditate quo accusamus, facere eos corrupti molestias voluptatibus ducimus enim officiis quia culpa, atque possimus recusandae, dolor officia incidunt quae! Eos error dicta eaque cum dolor, soluta harum iure ipsum repellendus ex similique doloribus iste cumque? Quisquam, ab quam dolore ipsa facere quod quis soluta laboriosam inventore voluptas dolor est, neque officiis magni et eum? Excepturi ducimus doloribus id, officia fuga, nam iure vel necessitatibus nemo exercitationem aut quisquam non hic, odio natus tempore explicabo facere adipisci?\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto totam alias nostrum illum earum, molestiae dolorum inventore numquam maiores pariatur voluptate consequuntur enim, impedit officia ducimus, culpa dicta vitae neque fuga. Officiis optio culpa blanditiis consequuntur voluptatem sequi ut necessitatibus esse nulla? Sit porro autem officiis odit necessitatibus reiciendis corrupti! Dolores aliquid debitis suscipit recusandae officiis voluptatum atque sit aliquam reprehenderit voluptatibus quibusdam hic, odit, ipsum consequatur ad saepe? Accusamus soluta nemo sapiente reiciendis recusandae nesciunt numquam maxime sit commodi illo et, culpa, nulla consequatur provident mollitia laboriosam necessitatibus sunt ex! Neque laudantium error ut dolorem dolorum voluptatibus voluptatem ducimus quaerat accusantium cumque sunt inventore optio, architecto nobis eligendi, cupiditate obcaecati. Et non harum, consequatur neque officiis voluptas. Odit repellat excepturi earum nisi cupiditate quo accusamus, facere eos corrupti molestias voluptatibus ducimus enim officiis quia culpa, atque possimus recusandae, dolor officia incidunt quae! Eos error dicta eaque cum dolor, soluta harum iure ipsum repellendus ex similique doloribus iste cumque? Quisquam, ab quam dolore ipsa facere quod quis soluta laboriosam inventore voluptas dolor est, neque officiis magni et eum? Excepturi ducimus doloribus id, officia fuga, nam iure vel necessitatibus nemo exercitationem aut quisquam non hic, odio natus tempore explicabo facere adipisci?', '2323454-27-08-22-d3d9446802.jpg', 13, 7, 1, 2630, 2630, 230, 2, '2022-08-27 06:31:47'),
(31, 'Short Guns', 'short-guns', 'asd546', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita doloremque distinctio at quaerat esse consequatur dolor quam, architecto accusamus aperiam vitae, optio reiciendis illo. Voluptates adipisci ab eligendi voluptatibus molestias!', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita doloremque distinctio at quaerat esse consequatur dolor quam, architecto accusamus aperiam vitae, optio reiciendis illo. Voluptates adipisci ab eligendi voluptatibus molestias!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita doloremque distinctio at quaerat esse consequatur dolor quam, architecto accusamus aperiam vitae, optio reiciendis illo. Voluptates adipisci ab eligendi voluptatibus molestias!', 'asd546-27-08-22-d3d9446802.jpg', 20, 5, 1, 5156, 5150, 65, 2, '2022-08-27 06:22:44'),
(32, 'Shooting Gun', 'shooting-gun', 'sad545', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita doloremque distinctio at quaerat esse consequatur dolor quam, architecto accusamus aperiam vitae, optio reiciendis illo. Voluptates adipisci ab eligendi voluptatibus molestias!', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita doloremque distinctio at quaerat esse consequatur dolor quam, architecto accusamus aperiam vitae, optio reiciendis illo. Voluptates adipisci ab eligendi voluptatibus molestias!\r\n  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita doloremque distinctio at quaerat esse consequatur dolor quam, architecto accusamus aperiam vitae, optio reiciendis illo. Voluptates adipisci ab eligendi voluptatibus molestias!', 'sad545-27-08-22-d3d9446802.jpg', 20, 6, 1, 5445, 5000, 54, 2, '2022-08-27 06:24:45'),
(33, 'Machiddne', 'machiddne', 'a2dea', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita doloremque distinctio at quaerat esse consequatur dolor quam, architecto accusamus aperiam vitae, optio reiciendis illo. Voluptates adipisci ab eligendi voluptatibus molestias!', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita doloremque distinctio at quaerat esse consequatur dolor quam, architecto accusamus aperiam vitae, optio reiciendis illo. Voluptates adipisci ab eligendi voluptatibus molestias!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita doloremque distinctio at quaerat esse consequatur dolor quam, architecto accusamus aperiam vitae, optio reiciendis illo. Voluptates adipisci ab eligendi voluptatibus molestias!', 'a2dea-27-08-22-d3d9446802.jpg', 16, 6, 1, 3005, 2900, 25, 2, '2022-08-27 06:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shippingId` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `shippingCost` int(11) NOT NULL,
  `shippingStatus` int(11) NOT NULL DEFAULT 1,
  `registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shippingId`, `city`, `shippingCost`, `shippingStatus`, `registered`) VALUES
(1, 'Dhaka City', 0, 1, '2022-08-23 08:55:45'),
(2, 'khulna', 100, 1, '2022-08-23 08:55:01'),
(3, 'Outside Dhaka', 80, 1, '2022-08-23 08:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `shippingId` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `password`, `name`, `shippingId`, `address`, `zipcode`, `phone`, `registered`, `active`) VALUES
(4, 'md.musabmahmud100@gmail.com', 'md.musabmahmud100@gmail.com', 'MD Musab Mahmud', 1, '103 agamasilane, Bangshal', 1000, 1630858100, '2022-08-27 07:39:26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shippingId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
