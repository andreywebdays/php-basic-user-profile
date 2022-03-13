SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `profilemgmt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `profilemgmt`;

CREATE TABLE `profile_imgs` (
  `profile_img_id` int(11) NOT NULL,
  `profile_img_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `profile_imgs` (`profile_img_id`, `profile_img_status`, `user_id`) VALUES
(1, 0, 1);

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fn` varchar(256) NOT NULL,
  `user_ln` varchar(256) NOT NULL,
  `user_un` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`user_id`, `user_fn`, `user_ln`, `user_un`, `user_pwd`) VALUES
(1, 'Andrey', 'WebDays', 'awd', '12345');


ALTER TABLE `profile_imgs`
  ADD PRIMARY KEY (`profile_img_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `profile_imgs`
  MODIFY `profile_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
