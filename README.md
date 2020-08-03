# Equidor
Equidor is a simple web application to monitor students while taking online tests. It uses 3 types of input  web-cam screen capture audio input Based on these 3 inputs, with the help of complex Machine Learning Algorithms, it flags students which the system thinks is cheating and notifies the teachers.<br><br>

**Log in**<br>
The log In starts of by asking whether it's a teacher or a student and respectively it redirects them to their respective login pages.
Different classes have different tables that store student's login credentials (For example: In my case, I have five different classes and there five different tables in my database for students log in and one single table common for all the teacher's login.<br>
**Face tracking AI and recording features**<br>
The Face tracking models were made and trained with the help of teachablemachine.com and it classifies the student as copying when the student is not present in front of the monitor or he's looking away from the monitor. There's a Mozilla Screen capture API(for screen recording), and Video.js webcam recorder. All of these files/features are now present in the folder named working.<br>
**File upload**<br>
The files being uploaded by students and being viewed by the teachers is still in works however, there's a small demo of video uploads is the folder named uploads.<br><br>

**Installation**<br>
simple add all these files to the public folder and open phpmyAdmin and exectude the MySQL commands in your database to creat tables. Then configure your server in all the config.php files to connect the website to your database. 

