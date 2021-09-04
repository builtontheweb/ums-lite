<main>
   <div class="page-header page-header-dark">
      <div class="container">
         <div class="page-header-content py-5">
            <h1 class="page-header-title">
               <div class="page-header-icon"><i data-feather="file"></i></div>
               <span>You need to install this software</span>
            </h1>
            <div class="page-header-subtitle">Please read the instructions below</div>
         </div>
      </div>
   </div>
	
   <div class="container mt-4">
      <div class="card">
         <div class="card-header">What do I need to do?</div>
         <div class="card-body">
			 <?php if(checkInstallation() == 1) { ?>
			 	<p>System status: <span class = 'text-success'>Working & Installed</span></p>
			 	<a href = 'dashboard' class = 'btn btn-success'>Return to dashboard</a>
			 
			 <?php } ?>
<!--
            To use this system there is a few bits you need to do!
			<ol>
				<li>
					Firstly create a new database and user and ensure that you have this database active (for CLI / Script): <code>use db_name;</code> for phpMyAdmin / GUI ensure you are on the structure page for the database (click on it on the left hand column <i>for phpMyAdmin</i>)
				</li>
				<li>
					In the <code>application/_installation</code> folder you will see a file called <code>install_user_management_lite.sql</code> - import this file into your new database - This will create the required tables to use <strong>User Management LITE</strong>
				</li>
				<li>
					Now edit <code>application > config > config.development.php</code> You will see multiple sections of commented code - firstly we want to edit the Database details with your new details (HOST: <code>localhost (usually)</code> USER: <code>your_db_username</code> PASS:<code>your_db_password</code> NAME: <code>your_db_name</code>) - Don't worry about the other parts (Like PORT / PROVIDER).
				</li>
				<li>
					In order for registrations to work, you need to setup an email server - We recommend and smtp service (Gmail is free) - Ensure that <code>allow less secure apps</code> is enabled for more info <a href = 'https://support.google.com/accounts/answer/6010255?hl=en' target = '_blank'>Read this</a>.<br>And for more info on SMTP with GMAIL: <a href = 'https://support.google.com/mail/answer/7126229?hl=en' target = '_blank'>Read this</a>.
				</li>
				<li>
					Finally you can alter the <i>From Name & From Email</i> for registration and password reset emails.
				</li>
				<li>
					Once you have completed this: refresh this page - if all is correct you should have the login page
				</li>
			</ol>
			 <div class = 'mt-3'>
			 	
				 
			 </div>
			 <h3 class = 'text-center'>
			 Demo account details
			 </h3>
			 <table class = 'table'>
			 	<thead>
				 	<th>Username</th>
					<th>Email address</th>
					<th>Password</th>
					<th>User role</th>
				</thead>
				<tbody>
					<tr>
						<td>demo</td>
						<td>demo@demo.com</td>
						<td>12345678</td>
						<td>Admin (7)</td>
					</tr>
					<tr>
						<td>demo2</td>
						<td>demo2@demo.com</td>
						<td>12345678</td>
						<td>Basic (1)</td>
					</tr>
				</tbody>
			 </table>
-->
         </div>
      </div>
   </div>
</main>