
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET PASSWORD FOR root@localhost = PASSWORD('your_root_password');


CREATE TABLE `customers` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 50000
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `customers` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Prodeep Kumar', 'prodeep@gmail.com', 50000),
(2, 'Pallab Kumar', 'pallab@gmail.com', 50000),
(3, 'Karim Ali', 'karim@gmail.com', 50000),
(4, 'George David', 'david@gmail.com', 50000),
(5, 'Thalapati Biswakarma', 'thalapati@gmail.com', 50000),
(6, 'Harry Watson', 'harry@gmail.com', 50000),
(7, 'Chanchal Chowdhury', 'chanchal@gmail.com', 50000),
(8, 'Riya Khatun', 'riya@gmail.com', 50000),
(9, 'Moumita Sarkar', 'moumita@gmail.com', 50000),
(10, 'Dinesh Kumar', 'Dinesh@gmail.com', 50000);




CREATE TABLE `transaction` (
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(10) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;
