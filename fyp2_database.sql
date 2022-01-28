-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2022 at 06:26 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(20, 'History'),
(24, 'dsfasdfa'),
(25, 'sdfad'),
(27, 'Nuclear Energy');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `author_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(19, 12, 'askjdh', 'akdh@gmail.com', 'nice', 'approved', '2022-01-02'),
(20, 12, 'asd', 'asdsd@gmail.com', 'asdadasd', 'approved', '2022-01-07'),
(21, 12, 'asd', 'asdsd@gmail.com', 'asdadasd', 'Unapproved', '2022-01-07'),
(22, 16, 'asd', 'asdh@gmail.com', 'asdsd', 'Unapproved', '2022-01-07'),
(23, 32, 'shishir', 'asd@gmail.com', 'ulga bulga bu', 'approved', '2022-01-28'),
(24, 32, 'shishir', 'asd@gmail.com', 'ulga bulga bu', 'Unapproved', '2022-01-28'),
(25, 32, 'shishir', 'asd@gmail.com', 'ulga bulga bu', 'Unapproved', '2022-01-28'),
(26, 32, 'shishir', 'asd@gmail.com', 'ulga bulga bu', 'Unapproved', '2022-01-28'),
(27, 32, 'shishir', 'asd@gmail.com', 'ulga bulga bu', 'Unapproved', '2022-01-28'),
(28, 32, 'shishir', 'asd@gmail.com', 'ulga bulga bu', 'Unapproved', '2022-01-28'),
(29, 32, 'shishir', 'asd@gmail.com', 'ulga bulga bu', 'Unapproved', '2022-01-28'),
(30, 32, 'shishir', 'asd@gmail.com', 'ulga bulga bu', 'Unapproved', '2022-01-28'),
(31, 32, 'shishir', 'asd@gmail.com', 'ulga bulga bu', 'Unapproved', '2022-01-28'),
(32, 32, 'tanvir', 'kashjgd@gmail.com', 'tui kita koire? bujhram na', 'approved', '2022-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `post_title` varchar(191) DEFAULT '',
  `post_author` varchar(191) DEFAULT '',
  `post_date` date DEFAULT NULL,
  `post_image` text DEFAULT NULL,
  `post_content` text DEFAULT NULL,
  `post_tags` varchar(191) DEFAULT '',
  `post_comment_count` int(11) DEFAULT 0,
  `post_status` varchar(191) DEFAULT 'draft',
  `born` varchar(191) DEFAULT NULL,
  `post_summary` text DEFAULT NULL,
  `achievement` text DEFAULT NULL,
  `birth_place` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `born`, `post_summary`, `achievement`, `birth_place`) VALUES
(12, 20, 'Fakhreddin Mousavi', 'Iran', '2022-01-27', '', '<p>Ayatollah Fakhraddin Mousavi Naneh Karani (Persian: ‌فخرالدین موسوی ننه‌کرانی; 1930 – 18 September 2021) was an Iranian judge and politician.</p>', 'asdsdasd', 3, 'published', '1930', 'Ayatollah Fakhraddin Mousavi Naneh Karani (Persian: ‌فخرالدین موسوی ننه‌کرانی; 1930 – 18 September 2021) was an Iranian judge and politician.\r\n\r\nMousavi was born in Ardabil. He was a member of the first, third and fifth Islamic Consultative Assembly from the electorate of Ardabil, Nir, Namin and Sareyn. He was a member of 5th Assembly of Experts from Ardabil Province electorate. He was supported by the People\'s Experts in the election.', NULL, 'Iran'),
(15, 25, 'Hassan Hassanzadeh Amoli', 'Iran', '2022-01-25', 'amoli.jpg', '', 'adasdad', 0, 'published', '12 February 1929', 'Hassan Hasanzadeh Amoli (Persian: حسن حسن‌زاده آملی, 12 February 1929 – 25 September 2021) was an Iranian Shi\'ite theologian known for his mystical tendencies and Islamic philosophy. He was among clerics who have overcome the traditional opposing to teaching philosophy courses at Shi\'ite seminaries. He wrote many books in philosophy, mysticism, mathematics, astronomy, Persian and Arabic literature.He interpreted the Islamic philosophical tradition in a similar way to Mulla Sadra, which is a reconciliation of religion, reason and mysticism.His books include Sharh fusus al-hikam, Tashih nahj al-balagha, Insan dar \'urf-i \'irfan, Tashih kalila wa dimna.\r\n\r\nHe died on Saturday, 25 September 2021, at the age of 92.Iran\'s Supreme Leader Ayatollah Khamenei offered prayers on his body. Hassanzadeh Amoli was elected as a \"Immortal figures of Iran\" in 2003.\r\n\r\nHasanzadeh-Amoli was father-in-law of Iranian conservative politician Baqer Larijani.', NULL, 'sud'),
(16, 20, 'Ali Gomaa', 'Egypt', '2022-01-25', 'goma.jpeg', '<p>asdassssssssssssssss</p>', 'asdddddddddddddddd', 1, 'published', '3 March 1952', 'Ali Gomaa (Arabic: علي جمعة, Egyptian Arabic: [ˈʕæli ˈɡomʕæ]) is an Egyptian Islamic scholar, Jurist, and public figure who has taken a number of controversial political stances. He specializes in Islamic Legal Theory. He follows the Shafi`i school of Islamic jurisprudence and the Ash\'ari school of tenets of faith. Gomaa is a Sufi. Gomaa is also a supporter of the 2013 Military Coup.', NULL, 'Iran'),
(19, 25, 'asdsd', 'adsd', '2022-01-19', 'DSC_0844.jpg', '<p>asdsd</p>', 'asdsd', 0, 'published', NULL, NULL, NULL, 'Ned'),
(21, 25, 'asssssssssss', 'dddddddddddddd', '2022-01-19', 'DSC_0708.jpg', '<p>asdddddddd</p>', 'aaaaaaaaaaa', 0, 'published', NULL, NULL, NULL, 'Iran'),
(22, 20, 'aaaaaaaaaaaaa', 'wwwwwwwwwwwwww', '2022-01-19', 'DSC_1410.jpg', '<p>sassssssssss</p>', 'aaaaaaaaaaaaaaaa', 0, 'published', NULL, NULL, NULL, 'India'),
(23, 20, 'aaaaaaaaaaaaa', 'ssssssssssss', '2022-01-27', '', '<p>aaaaaaaaaaaaa</p>', 'assssssssssssss', 0, 'draft', 'Iran', '       dsadf     ', '      sdfad    ', '  sdfasd sdfadsfa '),
(24, 24, 'Ali', 'Iran', '2022-01-25', 'ali.jpg', '<p>Khamenei is married to Mansoureh Khojasteh Bagherzadeh, with whom he has six children; four sons (Mostafa, Mojtaba, Masoud, and Meysam) and two daughters (Boshra and Hoda).</p>', '', 1, 'published', '19 April 1939', 'Sayyid Ali Hosseini Khamenei(Persian: سید علی حسینی خامنه‌ای, pronounced [ʔæˈliː hosejˈniː xɒːmeneˈʔiː] (audio speaker iconlisten); born 19 April 1939) is a Twelver Shia Marja\' and the second and current supreme leader of Iran, in office since 1989.  He was previously the third president of Iran from 1981 to 1989. Khamenei is the longest serving head of state in the Middle East, as well as the second-longest serving Iranian leader of the last century, after Shah Mohammad Reza Pahlavi.', NULL, 'Iran'),
(25, 24, 'sdfasd', 'dsfa', '2022-01-26', 'cky5i61dv0008zx3vhfh303ry.jpeg', '<p>Pagination mean fetching and displaying your data into multiple pages rather than single page. You have already seen this on various blogs, even on my blog homepage, you can see that I am only displaying 4 to 5 blog posts and older posts are accessible via pagination.</p><h2><strong>How to&nbsp;Create Simple Pagination Using PHP and MySQLi</strong></h2><p>Basically we need to fetch limited records on each page, this mean we need to limit the number of records to be fetched. For this purpose,&nbsp;MySQL provides a LIMIT&nbsp;clause, it simply fetch the limited number of records. I have created a sample table named `pagination_table`&nbsp;which you can download from the download button and import into your database. Lets see how&nbsp;LIMIT&nbsp;clause works, just run the following query</p>', 'xvdfg', 0, 'published', '19 April 1939', 'new', NULL, 'Bangladesh'),
(26, 20, 'my title ', 'kamran', '2022-01-26', 'ckxr163n9009qimxuaqxhazpp.jpeg', '', 'Tags', 0, 'published', '2012', 'Summery', NULL, 'Iran'),
(28, 20, '2022-01-28', '2022-01-28', '2022-01-27', '', '<h3>Biography</h3><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut voluptatem incidunt nostrum ullam, suscipit culpa expedita fugiat, possimus architecto necessitatibus, debitis non accusantium itaque odio unde. Eveniet beatae corporis fugiat, voluptate tempora culpa impedit accusamus consequatur reprehenderit iusto voluptates neque. Veniam suscipit delectus quis voluptatibus doloremque, tempora nisi quia. Velit!</p><h3>Education</h3><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut voluptatem incidunt nostrum ullam, suscipit culpa expedita fugiat, possimus architecto necessitatibus, debitis non accusantium itaque odio unde. Eveniet beatae corporis fugiat, voluptate tempora culpa impedit accusamus consequatur reprehenderit iusto voluptates neque. Veniam suscipit delectus quis voluptatibus doloremque, tempora nisi quia. Velit!</p><h3>Lifestyle</h3><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut voluptatem incidunt nostrum ullam, suscipit culpa expedita fugiat, possimus architecto necessitatibus, debitis non accusantium itaque odio unde. Eveniet beatae corporis fugiat, voluptate tempora culpa impedit accusamus consequatur reprehenderit iusto voluptates neque. Veniam suscipit delectus quis voluptatibus doloremque, tempora nisi quia. Velit!</p>', '2022-01-27', 0, 'published', '          1991          ', '    from Bangaldesh         ', '          1993          ', '          Bangladesh         '),
(29, 20, 'Abdallah bin Bayyah', '', '2022-01-28', 'BinBayyah.jpg', '<p><strong>Abdallah bin Mahfudh ibn Bayyah</strong> (born 1935<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-John_Gallagher_p_51-1\">[1]</a>), is an Islamic scholar and professor of <a href=\"https://en.wikipedia.org/wiki/Islamic_studies\">Islamic studies</a> at the <a href=\"https://en.wikipedia.org/wiki/King_Abdul_Aziz_University\">King Abdul Aziz University</a> in <a href=\"https://en.wikipedia.org/wiki/Jeddah\">Jeddah</a>, <a href=\"https://en.wikipedia.org/wiki/Saudi_Arabia\">Saudi Arabia</a>.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-ReferenceA-5\">[5]</a><a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-:0-6\">[6]</a></p><p>He is a specialist in all four traditional <a href=\"https://en.wikipedia.org/wiki/Sunni\">Sunni</a> schools, with an emphasis on the <a href=\"https://en.wikipedia.org/wiki/Maliki\">Maliki</a> <a href=\"https://en.wikipedia.org/wiki/Madh%27hab\">Madh\'hab</a>. Currently he is the President of the Forum for Promoting Peace in Muslim Societies.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-Forum_for_Promoting_Peace_in_Muslim_Societies-7\">[7]</a> Bin Bayyah is involved in a number of scholarly councils including <a href=\"http://ar.themwl.org/\">the Islamic Fiqh Council</a>, a Saudi-based Institute. He was also the Vice-President of the <a href=\"https://en.wikipedia.org/wiki/International_Union_of_Muslim_Scholars\">International Union of Muslim Scholars</a>.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-8\">[8]</a> from which he resigned in 2014.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-9\">[9]</a><a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-10\">[10]</a> He was also a member of the Dublin-based <a href=\"https://en.wikipedia.org/wiki/European_Council_for_Fatwa_and_Research\">European Council for Fatwa and Research</a>, a council of Muslim clerics that aims to explain <a href=\"https://en.wikipedia.org/wiki/Islamic_law\">Islamic law</a> in a way that is sensitive to the realities of European Muslims.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-11\">[11]</a> For over two decades, in relation to the latter two institutions, he worked closely with the <a href=\"https://en.wikipedia.org/wiki/Egypt\">Egyptian</a> scholar <a href=\"https://en.wikipedia.org/wiki/Yusuf_al-Qaradawi\">Yusuf al-Qaradawi</a>.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-:0-6\">[6]</a> However post <a href=\"https://en.wikipedia.org/wiki/Arab_Spring\">Arab Springs</a>, Bin Bayyah distanced himself from Qardawi and the International Union of Muslim scholors, instead founding the UAE based Forum for Promoting Peace in Muslim Societies.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-12\">[12]</a></p>', 'Modern Era', 0, 'published', '1935', 'Bin Bayyah was born in Timbédra in a household with an Islamic environment in which he studied all of the Islamic sciences. He began his formal studies with his father, Mahfoudh; meanwhile, he studied Arabic with Mohammed Salem bin al-Sheen, Quran with Bayyah bin al-Salik al-Misumi.[13]  In his youth, he was appointed to study legal judgments in Tunis. On returning to Mauritania, he became Minister of Education and later Minister of Justice. He was also appointed a Vice President of the first president of Mauritania.[5] He resides in Jeddah, Saudi Arabia and teaches Islamic Legal Methodology, Qur\'an and Arabic at the King Abdulaziz University. He is fluent in Arabic and French.[14] Hamza Yusuf serves as his translator.[14]', 'Jordan Medal', 'Mauritania'),
(30, 20, 'Abdallah bin Bayyah 2', '', NULL, 'BinBayyah.jpg', '<p><strong>Abdallah bin Mahfudh ibn Bayyah</strong> (born 1935<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-John_Gallagher_p_51-1\">[1]</a>), is an Islamic scholar and professor of <a href=\"https://en.wikipedia.org/wiki/Islamic_studies\">Islamic studies</a> at the <a href=\"https://en.wikipedia.org/wiki/King_Abdul_Aziz_University\">King Abdul Aziz University</a> in <a href=\"https://en.wikipedia.org/wiki/Jeddah\">Jeddah</a>, <a href=\"https://en.wikipedia.org/wiki/Saudi_Arabia\">Saudi Arabia</a>.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-ReferenceA-5\">[5]</a><a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-:0-6\">[6]</a></p><p>He is a specialist in all four traditional <a href=\"https://en.wikipedia.org/wiki/Sunni\">Sunni</a> schools, with an emphasis on the <a href=\"https://en.wikipedia.org/wiki/Maliki\">Maliki</a> <a href=\"https://en.wikipedia.org/wiki/Madh%27hab\">Madh\'hab</a>. Currently he is the President of the Forum for Promoting Peace in Muslim Societies.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-Forum_for_Promoting_Peace_in_Muslim_Societies-7\">[7]</a> Bin Bayyah is involved in a number of scholarly councils including <a href=\"http://ar.themwl.org/\">the Islamic Fiqh Council</a>, a Saudi-based Institute. He was also the Vice-President of the <a href=\"https://en.wikipedia.org/wiki/International_Union_of_Muslim_Scholars\">International Union of Muslim Scholars</a>.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-8\">[8]</a> from which he resigned in 2014.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-9\">[9]</a><a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-10\">[10]</a> He was also a member of the Dublin-based <a href=\"https://en.wikipedia.org/wiki/European_Council_for_Fatwa_and_Research\">European Council for Fatwa and Research</a>, a council of Muslim clerics that aims to explain <a href=\"https://en.wikipedia.org/wiki/Islamic_law\">Islamic law</a> in a way that is sensitive to the realities of European Muslims.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-11\">[11]</a> For over two decades, in relation to the latter two institutions, he worked closely with the <a href=\"https://en.wikipedia.org/wiki/Egypt\">Egyptian</a> scholar <a href=\"https://en.wikipedia.org/wiki/Yusuf_al-Qaradawi\">Yusuf al-Qaradawi</a>.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-:0-6\">[6]</a> However post <a href=\"https://en.wikipedia.org/wiki/Arab_Spring\">Arab Springs</a>, Bin Bayyah distanced himself from Qardawi and the International Union of Muslim scholors, instead founding the UAE based Forum for Promoting Peace in Muslim Societies.<a href=\"https://en.wikipedia.org/wiki/Abdallah_bin_Bayyah#cite_note-12\">[12]</a></p>', 'Modern Era', 0, 'published', '1935', 'Bin Bayyah was born in Timbédra in a household with an Islamic environment in which he studied all of the Islamic sciences. He began his formal studies with his father, Mahfoudh; meanwhile, he studied Arabic with Mohammed Salem bin al-Sheen, Quran with Bayyah bin al-Salik al-Misumi. In his youth, he was appointed to study legal judgments in Tunis. On returning to Mauritania, he became Minister of Education and later Minister of Justice. He was also appointed a Vice President of the first president of Mauritania.', 'Jordan Medal', 'Mauritania'),
(31, 20, 'asd test', '', NULL, 'BinBayyah.jpg', '<p>this is a test</p>', 'Modern Era', 0, 'published', '1935', 'Bin Bayyah was born in Timbédra in a household with an Islamic environment in which he studied all of the Islamic sciences. He began his formal studies with his father, Mahfoudh; meanwhile, he studied Arabic with Mohammed Salem bin al-Sheen, Quran with Bayyah bin al-Salik al-Misumi. In his youth, he was appointed to study legal judgments in Tunis. On returning to Mauritania, he became Minister of Education and later Minister of Justice. He was also appointed a Vice President of the first president of Mauritania.', 'Jordan Medal', 'Mauritania'),
(32, 20, 'Ismail ibn Musa Menk', '', '2022-01-28', '', '<p><strong>Ismail ibn Musa Menk</strong> (<a href=\"https://en.wikipedia.org/wiki/Arabic_language\">Arabic</a>: إسماعيل إبن موسى منك, <a href=\"https://en.wikipedia.org/wiki/Romanization_of_Arabic\">romanized</a>:&nbsp;<i>esma\'eyl ebn mwsa mnk</i>, IPA:&nbsp;<a href=\"https://en.wikipedia.org/wiki/Help:IPA/Arabic\">[ɪsmel ɪbən mjusə mɛŋk]</a> (<a href=\"https://en.wikipedia.org/wiki/File:Ismail_ibn_Musa_Menk.ogg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Loudspeaker.svg/11px-Loudspeaker.svg.png\" alt=\"audio speaker icon\" srcset=\"//upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Loudspeaker.svg/17px-Loudspeaker.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Loudspeaker.svg/22px-Loudspeaker.svg.png 2x\" sizes=\"100vw\" width=\"11\"></a><a href=\"https://upload.wikimedia.org/wikipedia/commons/8/8b/Ismail_ibn_Musa_Menk.ogg\">listen</a>)), also known as <strong>Mufti Menk</strong> (born 27 June 1975), is a <a href=\"https://en.wikipedia.org/wiki/Zimbabwean_diaspora\">Zimbabwean</a> <a href=\"https://en.wikipedia.org/wiki/Islamic_Scholar\">Islamic Scholar</a>.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-6\">[6]</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-Cochin_Herald-7\">[7]</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-8\">[8]</a> Head of the country\'s <a href=\"https://en.wikipedia.org/wiki/Fatwa\">fatwa</a> department,<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-9\">[9]</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-10\">[10]</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-11\">[11]</a> he is known especially in <a href=\"https://en.wikipedia.org/wiki/East_Africa\">Eastern Africa</a> and teaches internationally.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-menk-12\">[12]</a></p><p>Menk has been named one of <a href=\"https://en.wikipedia.org/wiki/The_500_Most_Influential_Muslims\">The 500 Most Influential Muslims</a> in the world by the <a href=\"https://en.wikipedia.org/wiki/Royal_Aal_al-Bayt_Institute_for_Islamic_Thought\">Royal Aal al-Bayt Institute for Islamic Thought</a> in <a href=\"https://en.wikipedia.org/wiki/Jordan\">Jordan</a> in 2013, 2014 and 2017.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-rfp-13\">[13]</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-usislam-14\">[14]</a></p><h2>Early life</h2><p>Menk was born in June 27, 1975 in Harare, where he undertook his initial studies with his father, Moulana Musa, memorizing the <a href=\"https://en.wikipedia.org/wiki/Quran\">Quran</a> and learning <a href=\"https://en.wikipedia.org/wiki/Arabic_languages\">Arabic</a>.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-15\">[15]</a> He went to <a href=\"https://en.wikipedia.org/wiki/St._John%27s_College_(Harare)\">St. John\'s College (Harare)</a> for senior school.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-Cochin_Herald-7\">[7]</a> He later specialized in <a href=\"https://en.wikipedia.org/wiki/Hanbali\">Hanbali</a> fiqh at the <a href=\"https://en.wikipedia.org/wiki/Islamic_University_of_Madinah\">Islamic University of Madinah</a>.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-Studies-4\">[4]</a> Menk has been identified as a <a href=\"https://en.wikipedia.org/wiki/Deobandi\">Deobandi</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-Cochin_Herald-7\">[7]</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-Deobandi-16\">[16]</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-17\">[17]</a> as well as a <a href=\"https://en.wikipedia.org/wiki/Salafi_movement\">Salafi</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-18\">[18]</a> by different sources, though he has not publicly acknowledged his involvement in either movement.</p><h2>Views</h2><p>Menk opposes terrorism and has pledged his aid in curbing religious extremism in the Maldives.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-Menk_pledges_aid_in_curbing_islam_in_Maldives-19\">[19]</a> On 31 March 2018, he urged Liberian Muslims to avoid Muslim—Christian violence, arguing that <a href=\"https://en.wikipedia.org/wiki/Muslim\">Muslims</a> and <a href=\"https://en.wikipedia.org/wiki/Christians\">Christians</a> are brothers and sisters from one father, the prophet <a href=\"https://en.wikipedia.org/wiki/Adam_in_Islam\">Adam</a>.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-20\">[20]</a> He blames western media for misleading the world that Muslims are generally terrorists.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-21\">[21]</a> According to <a href=\"https://en.wikipedia.org/wiki/Gulf_News\">Gulf News</a>, Menk said that everyone on this earth is a part of a family and has one maker, therefore, no one has the right to force any belief or faith on another.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-22\">[22]</a></p><h2>Works</h2><p>In 2018 he published a collection of his sayings as a book titled <i>Motivational Moments</i><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-23\">[23]</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-24\">[24]</a> and in 2019 published the second edition, titled <i>Motivational Moments 2.</i><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-25\">[25]</a></p><h2>Controversies</h2><p><a href=\"https://en.wikipedia.org/wiki/The_Huffington_Post\"><i>The Huffington Post</i></a> has described Menk as an \"openly homophobic Islamic preacher\" who has denounced the act of homosexuality as \"filthy\".<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-independent-29\">[29]</a> In 2013, he was due to visit six British universities – <a href=\"https://en.wikipedia.org/wiki/University_of_Oxford\">Oxford</a>, <a href=\"https://en.wikipedia.org/wiki/University_of_Leeds\">Leeds</a>, <a href=\"https://en.wikipedia.org/wiki/University_of_Leicester\">Leicester</a>, <a href=\"https://en.wikipedia.org/wiki/University_of_Liverpool\">Liverpool</a>, <a href=\"https://en.wikipedia.org/wiki/University_of_Cardiff\">Cardiff</a> and <a href=\"https://en.wikipedia.org/wiki/University_of_Glasgow\">Glasgow</a> – but the speaking tour was cancelled after <a href=\"https://en.wikipedia.org/wiki/Students%27_union\">student unions</a> and university officials expressed concern about his views.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-indep-30\">[30]</a> Menk\'s controversial statement included these words: \"How can you engage in acts of immorality with the same sex?... The <a href=\"https://en.wikipedia.org/wiki/Qur%27an\">Qur\'an</a> clearly says it is wrong what you are doing... <a href=\"https://en.wikipedia.org/wiki/Allah\">Allah</a> speaks about how filthy this is... With all due respect to the animals, homosexuals are worse than animals.\"<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-31\">[31]</a></p><h3><strong>Travel bans</strong></h3><p>On 31 October 2017, Singapore banned Menk from its borders because it believes he expresses views incompatible with its multicultural laws and policies. According to the <a href=\"https://en.wikipedia.org/wiki/Straits_Times\"><i>Straits Times</i></a>, he has asserted that \"it is blasphemous for Muslims to greet believers of other faiths during festivals such as Christmas or Deepavali\". Singapore\'s Ministry of Home Affairs said in a statement that its decision to reject Menk\'s application for a short-term work pass stemmed from his \"segregationist and divisive teachings\".<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-32\">[32]</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-33\">[33]</a> The Majlisul Ulama Zimbabwe, Menk\'s own institution, released a statement to express \"regret and dismay\" regarding the ban. It said that Menk was an \"asset to multi‐cultural, multi‐religious Zimbabwe\" and that viewers should \"listen to his sermons in full\" and not \"edited clips of a few minutes\" to see the moderate path he has chosen.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-34\">[34]</a></p><p>In November 2018, the Danish government banned Menk from entering its borders.<a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-35\">[35]</a><a href=\"https://en.wikipedia.org/wiki/Ismail_ibn_Musa_Menk#cite_note-36\">[36]</a></p>', 'Estern Africa', 10, 'published', '  27 June 1975  ', '  Menk opposes terrorism and has pledged his aid in curbing religious extremism in the Maldives.[19] On 31 March 2018, he urged Liberian Muslims to avoid Muslim—Christian violence, arguing that Muslims and Christians are brothers and sisters from one father, the prophet Adam.[20] He blames western media for misleading the world that Muslims are generally terrorists.[21] According to Gulf News, Menk said that everyone on this earth is a part of a family and has one maker, therefore, no one has the right to force any belief or faith on another  ', '  Menk was honoured with an Honorary Doctorate of Social Guidance by Aldersgate College, Philippines and its collaborative partner Aldersgate College – Dublin, Ireland on 16 April 2016  ', '  Zimbabwe  ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iuyhgvcfrtyhgbvfukoinv'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(44, 'alu', '$2y$10$qwertyasdfmnbvikmnjuyepJxifyL7ClUpPZ5nXNRUwlIMWQqQpYK', 'alu khan', 'asd', 'a@gmail.com', '', 'Admin', '$2y$10$iuyhgvcfrtyhgbvfukoinv'),
(45, 'somrat', '$2y$10$qwertyasdfmnbvikmnjuyepJxifyL7ClUpPZ5nXNRUwlIMWQqQpYK', 'danda', 'mujib', 'dandamujib@gmail.com', '', 'Admin', '$2y$10$iuyhgvcfrtyhgbvfukoinv'),
(46, 'sami', '$2y$10$qwertyasdfmnbvikmnjuyepJxifyL7ClUpPZ5nXNRUwlIMWQqQpYK', 'Agrogami', 'Laa', 'a@gmail.com', '', 'Admin', '$2y$10$iuyhgvcfrtyhgbvfukoinv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
