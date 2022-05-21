-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 5 月 21 日 05:24
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `text`, `indate`) VALUES
(2, '伊藤', 'test2@test2', NULL, '2020-06-03 00:00:00'),
(3, 'まつもと', 'testtest3@mail.com', NULL, '2022-05-15 22:30:55'),
(4, '中村', 'test4@test4', NULL, '2022-05-15 22:31:44'),
(5, '橋本', 'hashimoto@test', NULL, '2022-05-16 03:02:03'),
(9, '高橋', 'takahashi@test', NULL, '2022-05-16 03:15:22'),
(10, 'ito', 'ito@test', 'aaa', '2022-05-19 03:54:01');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `bookName` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bookUrl` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `bookName`, `bookUrl`, `comment`, `indate`) VALUES
(1, 'ビジョナリーカンパニー', 'http/amazon/test1', '', '2022-05-15 22:34:54'),
(2, '戦略サファリ', 'http/amazon/test2', '', '2022-05-15 22:35:22'),
(4, '地球の歩き方（インド）', 'india@mmm', 'インドの旅行書', '2022-05-16 03:19:59'),
(5, '地球の歩き方（インド）', 'india@mmm', 'aaaa', '2022-05-16 03:20:06'),
(6, '人を動かす', 'aaa@mmm', '啓発本', '2022-05-16 03:20:43'),
(7, 'M&A事務入門', 'manda@tttt', 'M&Aの実務', '2022-05-16 03:21:34'),
(8, '地球の歩き方（北欧）', 'tttmti', 'aaaa', '2022-05-16 03:49:24');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_questionaire_table`
--

CREATE TABLE `gs_questionaire_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `pref` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `carrer` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_questionaire_table`
--

INSERT INTO `gs_questionaire_table` (`id`, `name`, `email`, `age`, `pref`, `lang`, `carrer`, `text`, `indate`) VALUES
(1, '伊藤', 'ito@test', '40~50歳', '高知県', 'Python', '新規事業', 'aaaa', '2022-05-19 04:39:39'),
(3, '大谷', 'otani@test', '40~50歳', '埼玉県', 'その他', '起業', 'aaaa', '2022-05-20 01:02:18'),
(4, '太田', 'ota@test2', '20~30歳', '長野県', 'Swift', '転職', 'あああああ', '2022-05-20 04:25:31'),
(5, '児玉', 'kodama@test101', '20~30歳', '茨城県', 'その他', '起業', 'あああ', '2022-05-21 03:52:40'),
(6, '谷川', 'tanikawa@test3', '20~30歳', '東京都', 'Java', '起業', 'ああああ', '2022-05-21 03:53:04'),
(8, '遠藤', 'endo@temp1', '50~60歳', '千葉県', 'その他', '起業', 'ああああ', '2022-05-21 03:54:26'),
(9, '中井', 'nakai@temp30', '40~50歳', '北海道', 'Python', '転職', 'ああああ', '2022-05-21 03:54:54'),
(10, '藤原', 'fujiwara@temp135', '20~30歳', '東京都', 'Javascript', '転職', 'aaa', '2022-05-21 03:55:22'),
(11, '広瀬', 'hirose@test111', '30~40歳', '東京都', 'React', '起業', 'ああああ', '2022-05-21 03:55:55'),
(12, '飯島', 'iijima@test168', '20~30歳', '千葉県', 'Javascript', '転職', 'aaaa', '2022-05-21 05:28:21'),
(13, '鈴木', 'suzuki@sample1', '40~50歳', '埼玉県', 'React', '新規事業', 'あああああ', '2022-05-21 05:29:14'),
(14, '野本', 'nomoto@test112', '50~60歳', '埼玉県', 'React', '転職', '', '2022-05-21 05:30:31'),
(15, '安藤', 'ando@sample141', '20~30歳', '大阪府', 'React', '転職', 'aaaa', '2022-05-21 05:31:13'),
(16, '寺田', 'terada@sample121', '30~40歳', '埼玉県', 'Python', '転職', 'ああああ', '2022-05-21 05:31:50'),
(17, '伊藤', 'ito@test', '40~50歳', '東京都', 'PHP', '転職', '', '2022-05-21 13:10:58'),
(18, '伊藤', 'ito@test', '40~50歳', '青森県', 'Python', '起業', '', '2022-05-21 14:03:58');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `userpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `username`, `userid`, `userpw`, `indate`) VALUES
(1, 'ito', 'ito_test', 'itoito', '2022-05-18 02:15:56'),
(2, 'kato', 'kato_test', 'katokato', '2022-05-18 02:16:47'),
(3, 'sato', 'sato_test', 'satosato', '2022-05-18 02:17:22'),
(4, 'gs', 'gs', 'dev23', '2022-05-18 02:18:08');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_questionaire_table`
--
ALTER TABLE `gs_questionaire_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `gs_questionaire_table`
--
ALTER TABLE `gs_questionaire_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
