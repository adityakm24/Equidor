# Equidor
Equidor is a simple web application to monitor students while taking online tests. It uses 3 types of inputs: 
1) web-cam video and mic audio
2) screen capture video and audio 

Based on these inputs, with the help of complex Machine Learning Algorithms, it flags students which the system thinks is cheating and notifies the teachers.

# INSTALLATION

*WAMP SERVER*
Install WAMP SERVER with the latest verion of php and mysqli. Execute the following MySQL commands to set up the database and tables: 
-- Database: `user-registration`

-- Table structure for table `tbl_member`

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Indexes for table `tbl_member`
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);
  
-- AUTO_INCREMENT for table `tbl_member`

ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
  # Face Recognition
  
  The web-cam recording and screen capture files are incuded in the 'over' folder.
