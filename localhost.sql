-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2021 年 11 月 17 日 01:11
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- テーブルの構造 `book`
--

CREATE TABLE `book` (
  `cinema_id` int(11) NOT NULL COMMENT '映画番号',
  `cinema_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '映画タイトル',
  `author_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '評価',
  `cinema_publisher_id` int(11) NOT NULL COMMENT '映画ジャンル'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `book`
--

INSERT INTO `cinema` (`cinema_id`, `cinema_title`, `author_name`, `cinema_publisher_id`) VALUES
(1111, 'ホラー', '4.2', 1111),
(2222, 'アクション映画', '2,4', 2222),
(3333, 'ディズニー', '3.1', 3333),
(4444, 'ファミリー', '4.7', 4444),
(5555, 'ファンタジー', '4.8', 5555),
(5556, 'サッカー', '3.2', 1111),
(5557, 'ヒューマリクス', '4.2', 2222),
(5558, 'サッカー', '4.1', 4444),
(5559, 'ホラー', '3.2', 1111);

-- --------------------------------------------------------

--
-- テーブルの構造 `buy`
--

CREATE TABLE `buy` (
  `buy_id` int(11) NOT NULL COMMENT '購入番号',
  `buy_member_id` int(11) NOT NULL COMMENT '購入者の会員番号',
  `buy_cinema_id` int(11) NOT NULL COMMENT '購入映画の映画番号\r\n',
  `status` int(11) NOT NULL COMMENT '0はカート、１は購入完了'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `buy`
--

INSERT INTO `buy` (`cinema_id`, `buy_member_id`, `buy_cinema_id`, `status`) VALUES
(1111, 1111, 1111, 1),
(1112, 1013, 1111, 1),
(1113, 1013, 1111, 1),
(2222, 1013, 2222, 1),
(2223, 1013, 2222, 1),
(2225, 2222, 1111, 1),
(2226, 2222, 2222, 1),
(2227, 2222, 3333, 1),
(2228, 2222, 1111, 0),
(2229, 2222, 2222, 0),
(2230, 2222, 3333, 0),
(2231, 1111, 4444, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL COMMENT '会員番号',
  `member_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '会員名',
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'パスワード',
  `birth_year` int(4) NOT NULL COMMENT '生年月日',
  `address` int(4) NOT NULL COMMENT '電話番号',
  `span` int(4) NOT NULL COMMENT 'レンタル購入期間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `password`, `birth_year`, `address`, `span`) VALUES
(1, 'admin', 'aa', 2000, 1000, 6),
(1111, '佐藤隆登', 'SR1013', 2000, 1000, 6),
(2222, '神奈川太郎', 'SR1014', 2000, 2000, 6);

-- --------------------------------------------------------

--
-- テーブルの構造 `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL COMMENT '出版社番号',
  `publisher_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '出版社名',
  `cinema production` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '出版地域'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `cinema production`) VALUES
(1111, '光文', '神奈川'),
(2222, '東宝', '東京'),
(3333, 'ディズニー', '千葉'),
(4444, '東映', '東京'),
(5555, '東映', '東京');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `book`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`book_id`);

--
-- テーブルのインデックス `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`buy_id`);

--
-- テーブルのインデックス `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- テーブルのインデックス `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `book`
--
ALTER TABLE `cinema`
  MODIFY `cinema_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '映画番号', AUTO_INCREMENT=5560;

--
-- テーブルの AUTO_INCREMENT `buy`
--
ALTER TABLE `buy`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '購入番号', AUTO_INCREMENT=2232;

--
-- テーブルの AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会員番号', AUTO_INCREMENT=2223;

--
-- テーブルの AUTO_INCREMENT `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '出版社番号', AUTO_INCREMENT=5556;
--
-- データベース: `thenema`
--
CREATE DATABASE IF NOT EXISTS `thenema` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `thenema`;

-- --------------------------------------------------------

--
-- テーブルの構造 `Detail theater`
--

CREATE TABLE `Detail theater` (
  `Buy number` int(11) NOT NULL COMMENT '購入番号',
  `Member ID` int(11) NOT NULL COMMENT '会員ID',
  `Buy day ID` int(8) NOT NULL COMMENT '購入日',
  `Buy situation` int(2) NOT NULL COMMENT '購入状態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `member_id`
--

CREATE TABLE `member_id` (
  `member_id` int(11) NOT NULL COMMENT '会員ID',
  `member_name` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL COMMENT '氏名',
  `number_id` int(11) NOT NULL COMMENT '連絡先（電話番号）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会員';

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `member_id`
--
ALTER TABLE `member_id`
  ADD PRIMARY KEY (`member_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `member_id`
--
ALTER TABLE `member_id`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会員ID';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
