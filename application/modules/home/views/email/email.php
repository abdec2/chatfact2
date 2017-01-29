<!DOCTYPE html>
<html lang="en">
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>

	.profile-card {
	border: 2px solid black;
	margin-top: 10px;
	margin-bottom: 5px;
}
.profile-card h3 {

	font-family: Arial;
	font-size: 20px; 
	font-weight: 700;
	text-align: justify;

}

.profile-card th {
	height: 93px;
}
.profile-card>thead>tr>th {
	background: #ddd;
	border-bottom: 2px solid black;
}
.profile-card>tbody>tr>td {
	border: none;
}
.profile-card>tbody>tr>td:last-child {
	border-right: 2px solid black;
}

.profile-pic {

	height: 150px;
	width: 100%;

}

.card-paragraph{

	width: 100%;
	text-align: justify;
	font-family: Arial;
	font-size: 13px;
	margin-bottom: 0;
	line-height: 20px;

}

.scarddiv {
	width: 300px;
	display: inline-block;
	margin-right: 10px;
}
</style>
	
</head>
<body>
	<div class="scarddiv">
			<table class="table profile-card ">
			  <thead>
			    <tr>
			      <th colspan="2"><h3><?= $profile->pname ?></h3></th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td colspan="2"><?php if(!$profile->pimg): ?><img src="<?php echo base_url('assets/imgs/no-image.jpg'); ?>" alt="No Image Found" class="profile-pic img-resposive"><?php else: ?><img src="<?php echo $profile->pimg; ?>" class="profile-pic img-resposive"><?php endif; ?></td>
			    </tr>
			    <tr>
			    	<td colspan="2"><p class="card-paragraph"><?= $profile->pintro ?></p></td>
			    </tr>
			    <tr>	
			    	<td><strong>Category</strong></td>
			    	<td><p class="card-paragraph" style="text-align: left; padding-left: 10px;"><?= $profile->pcategory ?></p></td>
			    </tr>
			    <tr>	
			    	<td><strong>Country</strong></td>
			    	<td><p class="card-paragraph" style="text-align: left; padding-left: 10px; "><?= $profile->pcountry ?></p></td>
			    </tr>
			  		
			  </tbody>
			</table> 
			
	</div>
	<p style="margin-top: 50px;"><?= $emailmsg ?></p>
	<p style="margin-top: 30px;">Chat Fact</p>
	<p>www.chatfact.com</p>
		
	</body>
</html>