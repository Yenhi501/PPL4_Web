

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL, -- School
  `birth` DATETIME NOT NULL,          -- Birthday
  `gender` bit NOT NULL,          -- gender
  `intro` varchar(1000) NOT NULL          -- intro about yourself
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--
CREATE TABLE `friend` (
  `frn_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `frn_user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `sendBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Food`
--
CREATE TABLE `food` (
  `food_id` int(255) NOT NULL,
  `food_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food_user`
--
CREATE TABLE `food_user` (
  `food_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
   `time` int(5) NOT NULL, -- time choose food
   `date` DATE NOT NULL -- date choose food
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `friend`
-- 1: gender 2: school 
CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

-- Indexes for table `option`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);


--
-- Indexes for table `food_user`
--
ALTER TABLE `food_user`
  ADD PRIMARY KEY (`food_user_id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`frn_id`);

--
-- Indexes for table `food_user`
--
ALTER TABLE `food_user`
  ADD FOREIGN KEY (`user_id`) REFERENCES users(`user_id`),
  ADD FOREIGN KEY (`food_id`) REFERENCES food(`food_id`);


--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD FOREIGN KEY (`user_id`) REFERENCES users(`user_id`),
  ADD FOREIGN KEY (`frn_user_id`) REFERENCES users(`user_id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `food_user`
  MODIFY `food_user_id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `friend`
  MODIFY `frn_id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;




