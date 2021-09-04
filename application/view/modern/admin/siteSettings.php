<?php
//Run function if a post variable is set - using an empty check (Because if POST is somehow set but an empty request - it could screw up the page)
if(!empty($_POST['siteTitle'])){
	//we only need to check one input as the form is pre validated - makes life easier - ensure to validate all inputs
	
	//Quick and dirty check to ensure that E_ALL errors doesn't throw an error to say filePath is NULL
	if(empty($_POST['filePath'])){
		$filePath = 'null';
	}else{
		$filePath = $_POST['filePath'];
	}
	
	$run = editSiteSettings($_POST['siteTitle'], $_POST['contactEmail'], $_POST['topBarTheme'], $_POST['sideBarTheme'], $_POST['version'], $filePath);
	if($run = 0){
		Session::add('feedback_negative', Text::get('FEEDBACK_SITE_UPDATE_ERROR'));
	}else{
		Session::add('feedback_positive', Text::get('FEEDBACK_SITE_UPDATE_SUCCESSFUL'));
	}
	unset ($_POST['siteTitle']);
	unset ($_POST['contactEmail']);
	unset ($_POST['topBarTheme']);
	unset ($_POST['sideBarTheme']);
	unset ($_POST['version']);
	header("location: admin/siteSettings");
}
?>
<!-- The following script stops the page asking for form data to be resent (We've already destroyed the data - won't affect the form) -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<!-- Looking to implement a more robust option here -->
<main>
	<div class="page-header page-header-dark bg-gradient-primary-to-secondary">
		<div class="container-fluid">
			<div class="page-header-content py-5">
				<h1 class="page-header-title">
					<div class="page-header-icon"><i data-feather="file"></i>
					</div>
					<span>AdminController/SiteSettings</span>
				</h1>
				<div class="page-header-subtitle">Change the basic settings for the system <i>Theme, Name, Email</i> as you populate the settings table you can add new text edits in here - then edit <i>public -> vendor -> core.php (function editSiteSettings(vars)</i>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid mt-4">
		<div class="card">
			<div class="card-header">What happens here?</div>
			<div class="card-body">
				This form is a basic site settings modifier - You can build upon the function based in <code>public/vendor/core.php (function editSiteSettings(vars))</code> - Where vars are the names of the inputs - More information is available in the <i>Extending documentation</i>
			</div>
		</div>
		<div class="card mt-4">
			<div class="card-header">Edit Site Settings Form - <code>&nbsp;When a POST variable is set page will run editSiteSettings() function</code>
			</div>
			<div class="card-body">
				<p>The form below is automatically populated using <code>getSiteDetails(fieldName)</code> eg Site Title is: <code>getSiteDetails('siteTtile');</code>
				</p>
					<form method = 'post' action = '<?= Config::get("URL"); ?>admin/siteSettings'>
						<div class="form-group">
							<label for="formGroupExampleInput">Site title (Displayed in the tab header, footer copyright and top nav bar)</label>
							<input type="text" class="form-control" id="formGroupExampleInput" placeholder="e.g. My Website" name = 'siteTitle' value = '<?= getSiteDetails('siteTitle'); ?>'>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput">Site Logo filename (Upload to <code>public > uploads</code>) Optional</label>
							<input type="text" class="form-control" id="formGroupExampleInput" placeholder="e.g. logo.png" name = 'filePath' value = '<?= getSiteDetails('filePath'); ?>'>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Contact email (Displayed in the footer)</label>
							<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="e.g. email@mywebsite.com" name = 'contactEmail' value='<?= getSiteDetails('contactEmail'); ?>'>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput3">Top navbar theme (Default: Light)</label>
							<select class = 'form-control' name = 'topBarTheme'>
								<option value = '<?= getSiteDetails('topBarTheme'); ?>'>Current Theme</option>
								<option value = 'bg-white navbar-light'>Light Theme</option>
								<option value = 'bg-dark navbar-dark'>Dark Theme</option>
								<option value = 'bg-primary navbar-dark'>Primary Theme</option>
								<option value = 'bg-info navbar-light'>Info Theme</option>
								<option value = 'bg-success navbar-dark'>Success Theme</option>
								<option value = 'bg-warning navbar-dark'>Warning Theme</option>
								<option value = 'bg-danger navbar-dark'>Danger Theme</option>
							</select>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput4">Side navbar theme (Default: Dark)</label>
							<select class = 'form-control' name = 'sideBarTheme'>
								<option value = '<?= getSiteDetails('sideBarTheme'); ?>'>Current Theme</option>
								<option value = 'sidenav-light'>Light Theme</option>
								<option value = 'sidenav-dark'>Dark Theme</option>
							</select>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Software version (Displayed in the footer)</label>
							<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="e.g. 1.0.0 build 13" name = 'version' value='<?= getSiteDetails('VERSION'); ?>'>
						</div>
						<div class="form-group">
							<input type = 'submit' value = 'Update settings' class = 'btn btn-success btn-block'>
						</div>
					</form>
			</div>
		</div>
	</div>
</main>