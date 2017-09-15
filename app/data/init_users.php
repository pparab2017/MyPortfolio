<?php
/**semester*/

// setup the autoloading
require_once '../../vendor/autoload.php';

// setup Propel
require_once '../generated-conf/config.php';

use Utils\Utils;

echo "\nRunning Initial SQL !\n";



//
$schoolType = new EventType();

$schoolType->setTypename("SCHOOL");
$schoolType->setDsc("I am Studying!");
$schoolType->save();


$workType = new EventType();
$workType = new EventType();
$workType->setTypename("WORK");
$workType->setDsc("I am Working!");
$workType->save();


$timeLine =  new Timeline();

$timeLine->setFromDate("2007-08-01 00:00:00");
$timeLine->setToDate("2011-08-28 00:00:00");
$timeLine->save();

$event = new Event();
$event->setTimelineid($timeLine->getId());
$event->setTitle("Bachelor of Engineering in Information Technology - India");
$event->setCompany("Padre Conceição College Of Engineering");
$event->setDsc("Final year project
<ul><li>
Implementing Mobile Peer to Peer Data Transfer (Final Year Project (B.E)): Hybrid Peer to Peer Mobile app, where users can log in, chat and play games. 
</li><li>
Implemented using J2ME and JXME and a dedicated peer maintaining server.</li>

");
$event->setTypeid($schoolType->getId());
$event->save();



$timeLine =  new Timeline();
$timeLine->setFromDate("2011-08-08 00:00:00");
$timeLine->setToDate("2016-08-02 00:00:00");
$timeLine->save();

$event = new Event();
$event->setTimelineid($timeLine->getId());
$event->setTitle("Analyst, Web Developer (.Net full stack) - India, Chicago");
$event->setCompany("COMMSCOPE Inc, Verna - Goa, India");
$event->setDsc("Worked on:
 <ul>
 <li>RFDS product configuration: A complex web system which interacts with SAP MDM. Used Infor product configuration to build business logic. Based on user inputs a complex SVG diagram and a bill of material is generated.
 </li><li>Redesign for commscope.com(River): Was part of the core team and worked on redesigning the COMMSCOPE website.
 </li><li>Web application deployed: Led a team of three for this project in 2014-2015. This system is used to deploy web, DB and console jobs and follows an approval cycle.
 </li><li>Paint inspection Records: Web based testing System for Painted parts. Generates
weekly report.
 </li><li>Patent Inventions: Role based web System developed to maintain company’s
patents at one place.
 </li><li>Web based attendance system: Led a team of seven for this project in 2011-
2012. System supports more the 3000 employees and gives them access to check their attendance, leaves and generates payroll report.
</li></ul>
");
$event->setTypeid($workType->getId());
$event->save();


$timeLine =  new Timeline();
$timeLine->setFromDate("2016-08-22 00:00:00");
$timeLine->setToDate("2016-12-20 00:00:00");
$timeLine->save();

$event = new Event();
$event->setTimelineid($timeLine->getId());
$event->setTitle("MS in Information Technology (HCI) - Fall 2016");
$event->setCompany("University of North Carolina at Charlotte");
$event->setDsc("12 Credits <br> Subjects for this semester:
<ul><li>Mobile application Development</li>
<li>Applied data bases</li>
<li>Human computer Interaction</li>
<li>Software development and system Integration </li></ul>");
$event->setTypeid($schoolType->getId());
$event->save();

$timeLine =  new Timeline();
$timeLine->setFromDate("2017-02-22 00:00:00");
$timeLine->setToDate("2017-05-12 00:00:00");
$timeLine->save();

$event = new Event();
$event->setTimelineid($timeLine->getId());
$event->setTitle("MS in Information Technology (HCI) - Spring 2016");
$event->setCompany("University of North Carolina at Charlotte");
$event->setDsc("12 Credits <br> Subjects for this semester:
<ul><li>Algorithms and data structures</li>
<li>Information visualization</li>
<li>Illustrative Visualization</li>
<li> Information security</li></ul>");
$event->setTypeid($schoolType->getId());
$event->save();

$event = new Event();
$event->setTimelineid($timeLine->getId());
$event->setTitle("Research Assistant (Dr. Mohamad Shehab)");
$event->setCompany("University of North Carolina at Charlotte");
$event->setDsc("Worked under Dr. Mohamad Shehab. <br>
<b>Worked on the below projects:</b>
<ul><li>Web Crawler: Used phantom.js to scrap data from charlotte back page for data analysis.</li></ul>

");
$event->setTypeid($workType->getId());
$event->save();

$timeLine =  new Timeline();
$timeLine->setFromDate("2017-05-18 00:00:00");
$timeLine->setToDate("2017-08-15 00:00:00");
$timeLine->save();

$event = new Event();
$event->setTimelineid($timeLine->getId());
$event->setTitle("Research Assistant (php full stack)");
$event->setCompany("University of North Carolina at Charlotte");
$event->setDsc("Worked under Dr. Mohamad Shehab. <br>
<b>Worked on the below projects:</b>
<ul><li>Women's Health (Status - Development)</li>
<li>HSCALE (Status - Development)</li>
</ul>");
$event->setTypeid($workType->getId());
$event->save();

$event = new Event();
$event->setTimelineid($timeLine->getId());
$event->setTitle("Research Assistant (Data Visualization)");
$event->setCompany("University of North Carolina at Charlotte");
$event->setDsc("Worked under Dr. Aidong Lu. <br>
<b>Currently working on finalising the design for the below project</b>
<ul><li>Visualization of vandal and benign users based on VIEWS</li>

</ul>");
$event->setTypeid($workType->getId());
$event->save();



$timeLine =  new Timeline();
$timeLine->setFromDate("2017-08-21 00:00:00");
$timeLine->save();

$event = new Event();
$event->setTimelineid($timeLine->getId());
$event->setTitle("MS in Information Technology (HCI) - Fall 2017");
$event->setCompany("University of North Carolina at Charlotte");
$event->setDsc("Took nine credits <br> Subjects for this semester:
<ul><li>Advanced Mobile application Development (Android, IOS and Hybrid): Will be working on complete mobile apps where we will be creating 
API's and consuming them from the mobile app. Will work with beacons, fitbit, IOS development 
and hybrid apps.</li>
<li>Rapid prototyping: Will work to create prototype and prototyping tools.</li></ul>");
$event->setTypeid($schoolType->getId());
$event->save();

$event = new Event();
$event->setTimelineid($timeLine->getId());
$event->setTitle("Research Assistant (php full stack)");
$event->setCompany("University of North Carolina at Charlotte");
$event->setDsc("Working under Dr. Mohamad Shehab. <br>
<b>Currently working on the below projects:</b>
<ul><li>Women's Health (Status - Testing phase)</li>
<li>HSCALE (Status - Testing phase)</li>
<li>Attack Trees (Status -  In progress) </li></ul>");
$event->setTypeid($workType->getId());
$event->save();


$language = new Language();
$language->setName(".NET");
$language->setLogoImgUrl("/imgs/langlogo/net.png");
$language->setDes("Full Stack Development");
$language->setColor("#CE93D8");
$language->save();


$project = new Project();
$project->setName("Interpreter Locator");
$project->setLangId($language->getId());
$project->setDes("
<b>Problem:</b> <br>
At medical facilities a common way of communication is through pagers. Doctors and
 other medical staff will page each other when needed for a certain room number
  and at times they will call if no one arrives in a certain amount 
  of time or an emergency. Hospitals are now incorporating higher level
   technology such as the IPad in order to fill out documents for
    the patients and to look at the hospital database of who is in, 
    what they are in for, and the nurse who is in charge of that patient. 
    What will happen is employees such as the interpreters will be in a room 
    or in the office and will get a page, unable to answer the phone call that
     they’ll receive in 10 min all they can do is hang up because they are usually working with a patient at the moment.
     <br>
     <b>Solution:</b> <br>
     Developed a web app, in which the doctors can login to the system, select available interpreters and make a 
     request. The interpreter will then pick the request and send an ETA to the doctor.
     
     <br>
     Technologies used:
     <ul>
     
     <li>
     ASP.NET
    
</li><li>SQL SERVER</li>
<li>Javascript and Jquery.</li>
<li> SVG images generated using inkscape and then manipulated using Javascript. </li>
</ul>
");
$project->setNotes("Notes: Below screen shots are prototypes. Feel free to go through the code <a target='_blank' href='https://github.com/pparab2017/InterpreterLocator'>here<a/>.");
$project->setGitlink("https://github.com/pparab2017/InterpreterLocator");
$project->setImgUrl("/imgs/projects/net/il.png");
$project->save();

$project = new Project();
$project->setName("Web attendance management system");
$project->setLangId($language->getId());
$project->setDes("
System made to handel over 3000 employees attendance data.I lead a team of 5 and
finished phase one in 6 months.
<br>
It had two major parts. Refer the figure below.
<ul><li>Console job: Pulls data from database, cleans and refreshes the database.</li>
<li>Web system: Role based web system, employees can use this system to check their attendance, apply leaves and manage any attendance discrepancies. Managers can login 
  and approve based on their roles. System admins can define custom roles, give custom rights to each roll.</li></ul>


Every month end this data is used to generate the payroll.
<br>
Technologies used:
<ul>
<li>APS.NET 3.5</li>
<li>SQL Sever 2008</li>
<li>Javascript, jQuery</li>
</ul>
");

$project->setNotes("Note: No Code file's as it is not open source.");
$project->setImgUrl("/imgs/projects/net/wams.png");
$project->save();

$project = new Project();
$project->setName("Product listing page");
$project->setLangId($language->getId());
$project->setDes("
Worked with team to redesign company website. Worked on the product listing page.


<br>
Technologies used:
<ul>
<li>ASP.NET 4</li>
<li>SQL Sever 2008</li>
<li>SAP MDM</li>
<li>Javascript, jQuery</li>
</ul>
");
$project->setNotes("Note: Below screen shot is taken from the live system. No Code file's as it is not open source. ");
$project->setImgUrl("/imgs/projects/net/lp.png");
$project->save();


$project = new Project();
$project->setName("Web App Deployer");
$project->setLangId($language->getId());
$project->setDes("Lead a team of 4. App to deploy Web, DB and Console jobs. When a application is ready and tested,
  developers can select files from the testing server (folders which are mapped to the IIS),
 select the production server for deployment. There can be 3 types of deployments:
 <ul>
 <li>Web: Developer has to select file from test server and select production server.</li>
  <li>Console: Developer has to select file from test server and select production server, also select the executable and scheduling details.</li>
   <li>DB: Developer has upload DB scripts, and select production DB.</li>
</ul>
<br>Once the deployment is submitted for approval, project manager can check for uploaded files and approve it. Once approved 
  the Schedule task runs the deployment and deploys it to the production server.
  <br>
  
  Technologies used:
<ul>
<li>ASP.NET 4</li>
<li>SQL Sever 2008</li>
<li>SAP MDM</li>
<li>Javascript, jQuery</li>
</ul>");


$project->setNotes("Note: No Code file's as it is not open source.");
$project->setImgUrl("/imgs/projects/net/deployer.png");
$project->save();

$project = new Project();
$project->setName("Paint Inspection Records");
$project->setLangId($language->getId());
$project->setDes("A testing system, where admin can define different components and parts. Testers can use this system 
to test the painted parts and enter it into the system.
  <br>
  
  Technologies used:
<ul>
<li>ASP.NET 4</li>
<li>SQL Sever 2008</li>
<li>SAP MDM</li>
<li>Javascript, jQuery</li>
</ul>");
$project->setNotes("Note: No Code file's as it is not open source.");
$project->setImgUrl("/imgs/projects/net/pir.png");
$project->save();


$project = new Project();
$project->setName("Patent Inventions");
$project->setLangId($language->getId());
$project->setDes("System used to maintain patents. Users will fill a form for their 
invention and submit it for approval. Approvals start from co-inventor till the patent liaison approvals and 
initiating filling and issuance awards.");
$project->setNotes("Note: No Code file's as it is not open source. ");
$project->setImgUrl("");
$project->save();



$language = new Language();
$language->setName("Android");
$language->setDes("Android Studio, UI");
$language->setColor("#81C784");
$language->setLogoImgUrl("/imgs/langlogo/android.png");
$language->save();

$project = new Project();
$project->setName("Complete Mobile app");
$project->setLangId($language->getId());
$project->setDes("This is a complete app, unlike previous app which used firebase. Here i created a back-end APIs which are hosted on the AWS.
This APIs are consumed my the mobile app. Below is the basic flow of the app:
<ul>
<li>User logs in or signs up from the mobile app.</li>
<li>After successful signing in. Mobile user gets a JWT token which is stored in the shared preferences  </li>
<li>This token is then used to make call to get user information and update user information.</li>
<li>Read more about the API <a target='_blank' href='https://github.com/pparab2017/inclass01/wiki/Assignment-01-(Group-Members:-Nidhi-Gupta,-Pushparaj-Parab-Vikrant-Dabas)'>here</a>. </li>
</ul>");
$project->setNotes("Note: The screen shots are from the working system. Please feel free to go through the 
github for <a href='https://github.com/pparab2017/inclass01' target='_blank'>web-api</a> and the mobile app <a target='_blank' href='https://github.com/pparab2017/AInclass01'>here</a>. Here is the web <a href='http://ec2-13-59-39-123.us-east-2.compute.amazonaws.com/' target='_blank'>link</a> for the system.");
$project->setImgUrl("/imgs/projects/android/smapp.png");
$project->setGitlink("https://github.com/pparab2017/AInclass01");
$project->save();


$project = new Project();
$project->setName("Social Messaging App - Connect");
$project->setLangId($language->getId());
$project->setDes("This is a messaging app. I have listed the functionality below:
<ul>
<li> Sign up with email, Google account or facebook. </li>
<li> Update your profile information, upload pictures.</li>
<li> Find other users who are registered on the app.</li>
<li> Check other users profile and  photos.</li>
<li> Compose new message where you can include image.</li>
<li> Check your inbox and reply to messages.</li>
</ul>

<br> All the data is stored in firebase.");
$project->setNotes("Note: Screen shots are form working system. ");
$project->setImgUrl("/imgs/projects/android/connect.png");
$project->setGitlink("https://github.com/pparab2017/Connect");
$project->save();



$project = new Project();
$project->setName("Weather App II");
$project->setLangId($language->getId());
$project->setDes("Used the <a href='https://openweathermap.org/api' target='_blank'> Open Weather Map API</a> for getting the weather information. The
API of interest is the Current Weather Data API which is based on the city name and
Country initials. In this app we can do the following things:
<ul><li>
Enter the location to get the weather information.
</li>
<li>This shows a 5days/3 hour forecast.</li>
<li>Can change the Temperature unit</li>
<li>Can Save cities to saved list, and set them as favorite</li></ul>");
$project->setNotes("Note: Screen shots are form working system. ");
$project->setGitlink("https://github.com/pparab2017/WeatherForecast");
$project->setImgUrl("/imgs/projects/android/w2.png");

$project->save();

$project = new Project();
$project->setName("Weather App");
$project->setLangId($language->getId());
$project->setDes("Used the <a href='http://www.wunderground.com/weather/api/d/login.html' target='_blank'> Weather Underground API</a> for getting the weather information. The
API of interest is the Current Weather Data API which is based on the city name and
state initials. Basically i call the API based on the city and state and display the information.
Favorite city is saved in the shared preferences.");
$project->setNotes("Note: Screen shots are form working system.");
$project->setImgUrl("/imgs/projects/android/w1.png");
$project->setGitlink("https://github.com/pparab2017/WeatherApp");
$project->save();






$language = new Language();
$language->setName("php");
$language->setDes("(Proper, Slim, vagrant, MYSQL)");
$language->setColor("#4FC3F7");
$language->setLogoImgUrl("/imgs/langlogo/php.png");
$language->save();

$project = new Project();
$project->setName("Women's Health App");
$project->setLangId($language->getId());
$project->setImgUrl("/imgs/projects/php/wh.png");
$project->setNotes("Note: No Code file's as it is not open source.");
$project->setDes("This is a back end application for a Mobile app, i worked under Dr. Mohamad Sheahab for this project.
Basically the app has 2 role. 
<ul>
<li>Admin: Who creates participants and Supporters and assigns participants to supporters</li>
<li>Supporters: Who manages the participants and then can check their states as shows in the screen shot.</li>
</ul>
<br>
Technologies used:
<ul>
<li>php</li>
<li>vagrant</li>
<li>slim framework</li>
<li>propel</li>
<li>MYSQL</li>

</ul>");
$project->save();

$project = new Project();
$project->setName("HSCALE");
$project->setLangId($language->getId());
$project->setDes("This is a back end application for a Mobile app, i worked under Dr. Mohamad Sheahab for this project.
Basically the app has 3 role. And the mobil app or the tablet will be used by the patients to answer the questioner.
<ul>
<li>System Admin: Who creates Doctors, Admins and Patients and assigns Patients to Doctors (n:m)</li>
<li>Doctor: Will be able to see the answered questions. System will give messages based on the score.</li>
<li>Admin: Who can create new patients and makes the device ready for the them. They can use the web app to generate a QR code 
for the crated user which will have the user login information. Then use the mobile app to scan QR code for login.</li>
</ul>

<br>
Technologies used:
<ul>
<li>php</li>
<li>vagrant</li>
<li>slim framework</li>
<li>propel</li>
<li>MYSQL</li></ul>");
$project->setNotes("Note: No Code file's as it is not open source. ");
$project->setImgUrl("/imgs/projects/php/hscale.png");
$project->save();



$project = new Project();
$project->setName("Simple app");
$project->setLangId($language->getId());
$project->setDes("Here i created a back-end APIs and a web app which are hosted on the AWS.
This APIs are consumed my the mobile app. Below is the basic flow of the app:
<ul>
<li>User logs in or signs up from the mobile app.</li>
<li>After successful signing in. Mobile user gets a JWT token which is stored in the shared preferences  </li>
<li>This token is then used to make call to get user information and update user information.</li>
<li>Read more about the API <a target='_blank' href='https://github.com/pparab2017/inclass01/wiki/Assignment-01-(Group-Members:-Nidhi-Gupta,-Pushparaj-Parab-Vikrant-Dabas)'>here</a>. </li>
</ul>
<br>
Technologies used:
<ul>
<li>php</li>
<li>vagrant</li>
<li>slim framework</li>
<li>propel</li>
<li>MYSQL</li>
</ul> 
<br>
The Web app is straight forward, i used slim framework and propel. It has a login page where the system admin can login 
and monitor the system for created users.
<ul> 
<li>User name: admin@test.com</li>
<li>Password: test</li>
</ul>");
$project->setNotes("Note: The screen shots are from the working system. Please feel free to go through the 
github for <a href='https://github.com/pparab2017/inclass01' target='_blank'>web-app</a>. This system is hosted on AWS, here is the Web <a href='http://ec2-13-59-39-123.us-east-2.compute.amazonaws.com/' target='_blank'>link</a> for the system.");
$project->setImgUrl("/imgs/projects/php/a1.png");
$project->setGitlink("https://github.com/pparab2017/inclass01");
$project->save();



$project = new Project();
$project->setName("Chicago Crimes");
$project->setLangId($language->getId());
$project->setDes("This was a in class database project for applied databases. Used PHP and MYSQL, also used my own <a href=''>visualisation Library</a> and Google maps API to show location data.
Learn more about the project from the video and the documentation.");
$project->setNotes("Note: Find complete documentation <a target='_blank' href='/Documents/CR_Report.pdf'>here</a>, and code <a target='_blank' href='https://github.com/pparab2017/ChicagoCrimes'>here</a> ");
$project->setImgUrl("");
$project->setVideolink("t6gBIj6o2qg");
$project->setGitlink("https://github.com/pparab2017/ChicagoCrimes");
$project->save();



//$project = new Project();
//$project->setName("My Portfolio");
//$project->setLangId($language->getId());
//$project->setDes("");
//$project->setNotes("No Code file's as it is not open source. ");
//$project->setImgUrl("");
//$project->save();


$language = new Language();
$language->setName("Javascript");
$language->setDes("Visualization library using SVG graphics");
$language->setColor("#FFC400");
$language->setLogoImgUrl("/imgs/langlogo/js.png");
$language->save();


$project = new Project();
$project->setName("My visualisation library");
$project->setLangId($language->getId());
$project->setDes("Started writing this js files in my free time, wanted to learn SVG and VML DOM
. All the files are written from scratch and its good source for some one to learn how to include SVG dom in 
HTML.");
$project->setNotes("Below i have some screen shots.");
$project->setImgUrl("/imgs/projects/js/all.png");
$project->setGitlink("https://github.com/pparab2017/javascript");
$project->save();


$language = new Language();
$language->setName("Visualization");
$language->setLogoImgUrl("/imgs/langlogo/dv.png");
$language->setDes("Data Visualization");
$language->setColor("#E57373");
$language->save();

$project = new Project();
$project->setName("Hospital Data (Using SPARK SQL and python)");
$project->setLangId($language->getId());
$project->setDes("

 Worked with Apache Spark, and visualization techniques to compare hospital dataset provided by <a target='_blank' href='https://data.medicare.gov/data/hospital-compare'>https://data.medicare.gov/data/hospital-compare</a> 

These data allow us to compare the quality of care at over 4,000 Medicare-certified hospitals across the country. This data also can be used by the hospital is visualized properly to improve their quality of care.
Using the above mentioned dataset we compared hospitals based on the below mentioned use cases: 
<ul><li>
Complications: Patients admitted to the hospital for treatment of one medical problem sometimes get other serious injuries or complications, and may even die. Hospitals can often prevent these events by following best practices for treating patients.
</li><li>
Readmission and death: These quality measures show how often patients who are hospitalized for certain conditions experience serious problems soon after they are discharged. Some patients may need to be admitted to the hospital again, and some patients may even die. Also we plan to see and compare the Readmission reduction. 
</li><li>
	Survey of patients' experiences: Hospital CAHPS®, is a standardized survey instrument and data collection methodology that has been in use since 2006 to measure patients' perspectives of hospital care. We will get this data and will try to compare with the overall star ratings for the hospital. 
</li><li>
	Payment & value of care: With value of care combines measures of payment and quality-of-care for heart attack patients, heart failure patients and pneumonia patients.
</li>
</ul>
<br>
<b>Technologies Used:
</b>
<ul>
<li>
Apache Spark with Jupyter notebooks.
</li><li>Coding: Used python for coding and data manipulation.
</li><li>Visualization: We have used 2 libraries:
</li><li>Matplotlib: is a Python 2D plotting library which produces publication quality figures in a variety of hardcopy formats and interactive environments across platforms.
</li><li>Plotly: Modern platform for agile business intelligence and data science. 
</li></ul>
");
$project->setNotes("Below i have a screen shot of the poster which we presented at the end of the semester.<br>");
$project->setImgUrl("/imgs/projects/viz/spark.png");
$project->setGitlink("https://github.com/pparab2017/JupyterNotebook_codeFiles");
$project->save();


$project = new Project();
$project->setName("Vandal and benign users Visualization - In class");
$project->setLangId($language->getId());
$project->setDes("Used visualization techniques to find the Benign and vandal wikipedia.
Data set: used the VEWS data set, which provides data from 2005 – 2014.
<ul><li>
Back end: Used PHP to query the required data from the SQL data.
</li><li>Front end: Used d3, jQuery, HTML and CSS.</li></ul>");
$project->setImgUrl("/imgs/projects/viz/wiki.png");
$project->setNotes("Below i have a screen shot and a video which we made at the end of the semester. ");

$project->setGitlink("https://github.com/pparab2017/Wiki");
$project->setVideolink("bsS6j8DSoIg");
$project->save();

$project = new Project();
$project->setName("Attack Trees");
$project->setLangId($language->getId());
$project->setDes("Visualization tool to visualise XML files generated from <a href='http://satoss.uni.lu/members/piotr/adtool/' target='_blank'>ADTool</a>
Users can browse and select xml file from, this will visualize the xml file.
Users can right click and add probability for each node. This project is still under development.");
$project->setNotes("Below i have a screen shot. No code file as it is not open source. ");
$project->setImgUrl("/imgs/projects/viz/attacktree.png");
$project->save();


$project = new Project();
$project->setName("Vehicle Collisions in NYC, 2015-Present");
$project->setLangId($language->getId());
$project->setGitlink("https://github.com/pparab2017/VehicleCollisions");
$project->setDes("
Data Source:  <a href='https://www.kaggle.com/nypd/vehicle-collisions ' target='_blank'>https://www.kaggle.com/nypd/vehicle-collisions </a>
Data Source:  <a href='https://www.kaggle.com/nypd/vehicle-collisions ' target='_blank'>https://www.kaggle.com/nypd/vehicle-collisions </a>
<br>
<ul>

<li>
Used data from csv and this data is used to project points on the
map.</li><li>
Map coordinates: Used nyc.json file to plot the map.</li>
<li>
D3 version: Used the version 3 (v3) and can be found under the folder d3.</li>
</ul>
");
$project->setNotes("Below i have a screen shot. ");
$project->setImgUrl("/imgs/projects/viz/nyc.png");
$project->save();

//https://www.kaggle.com/nypd/vehicle-collisions

$language = new Language();
$language->setName("UX/UI");
$language->setDes("User research and usability");
$language->setColor("#BCAAA4");
$language->setLogoImgUrl("/imgs/langlogo/ux.png");
$language->save();

$project = new Project();
$project->setName("UNCC Next Ride");
$project->setLangId($language->getId());
$project->setDes("
<ul>
<li>UNCC NextRide is a revamp of UNCC’s existing bus tracking application for students to commute to classes. Students use this app to know the exact location of the bus and the time it takes to reach the boarding point. </li>
<li>UNCC NextRide is a GPS feed that provides Campus Shuttle and SafeRide tracking on a map with arrival predictions, schedules and service alerts. Routes, schedules, arrivals and bus movement can be seen in real time, in one place.</li>
</ul>

<br>
<b>Issues with the current app:
</b>
<ul>
<li>The first screen shows all the available buses. New students who are unaware of all the bus routes will have a hard time figuring out which bus to board.
</li><li>Choosing 'Details' of a specific bus shows a table of bus stops and time remaining. It is inappropriate to show all the bus stops and time remaining.
</li><li>It's confusing to see 2 occurances of the same stops, because the bus keeps going to and fro.
</li><li>The Map on the Home screen does not convey a user's basic expectations:
</li><li>The user's current location
</li><li>The time that the bus takes to reach the user's boarding point.</li>
</ul>

<br>
<b>Solutions:
</b>
<ul>
<li> Allows users to their boarding and destination points. Locations services are not mandatory because the users are allowed to choose their boarding points. 
</li><li> Shows only the relavant search results. Show the number of buses available and their respective times to arrive 
</li><li>Shows the location of the bus at that time as well as the user's current location on a top-down 2D map with the time remaining for the bus to arrive at the boarding point. 
Enabling Alert helps students to notify 1 minute before the bus arrives.</li>

</ul>
");
$project->setNotes("Worked with Sriram PK on this project.Most of the work is done by Sriram, as he worked on the final mock-ups and the design. I helped 
in initial mock-ups and brain storming. Please have a look at the complete documentation on <a target='_blank' href='http://srirampk.com/portfolio-single-1.html'>Sriram's Portfolio</a>");
$project->setImgUrl("/imgs/projects/ux/nr.png");
$project->save();







/*
echo \Propel\Runtime\Util\PropelDateTime::createHighPrecision()->format('Y-m-d H:i:s') . PHP_EOL;
echo \Propel\Runtime\Util\PropelDateTime::createHighPrecision()->getTimezone()->getName() . PHP_EOL;

var_dump(\Propel\Runtime\Util\PropelDateTime::createHighPrecision()->getTimezone()->getLocation());

var_dump(\Propel\Runtime\Util\PropelDateTime::createHighPrecision()->getTimezone());
*/

echo "" . date_default_timezone_get() . PHP_EOL;

echo "\nDone Creating Adming and Test Users\n";