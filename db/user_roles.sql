CREATE TABLE users (
  user_id int(11) NOT NULL,
  user_name VARCHAR(255) NOT NULL,
  password varchar(255) NOT NULL
);

ALTER TABLE `users`
ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;