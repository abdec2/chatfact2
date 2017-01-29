<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat Fact</title>

     <!-- Required CSS -->
     <?= link_tag('assets/css/bootstrap-multiselect.css') ?>

    <?php $this->load->view('common/css'); ?>
   
	

</head>
<body>

<!-- Code to Display the chat button -->
<!-- <a href="javascript:void(0)" id="menu-toggle" class="btn-chat btn btn-success">
   <i class="fa fa-comments-o fa-3x"></i>
    <span class="badge progress-bar-danger"></span>
</a> -->

       <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div class="topbar" >
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 logoContainer">
                            <a class="logo" href="<?php echo base_url();?>">Chat Fact</a>
                        </div>
    
                        <div class="col-md-6 searchContainer">
                                <?php echo form_open(base_url('home/search/searchitem'),['role'=>'search', 'id'=>'searchform']); ?>
                                   <div id="custom-search-input">
                                        <div class="input-group">
                                            <?php echo form_input(['name'=>'txtfieldsearch', 'class'=>'form-control', 'placeholder'=>'Enter Search Words Here', 'value'=>set_value('txtfieldsearch')]); ?>    
                                            <span class="input-group-btn">
                                                <button class="btn btn-info btn-lg" type="submit" value="submit">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </span>
                                         </div>
                                    </div>
                                    <div class="select-container">
                                        <div class="form-group index2-select ">
                                            <?php 

                                                $countryoptions = array(
                                                            'Worldwide'=> 'Worldwide',
                                                            'Afghanistan'=>'Afghanistan',
                                                            'Albania'=>'Albania',
                                                            'Algeria'=> 'Algeria',
                                                            'Andorra'=>'Andorra',
                                                            'Angola'=>'Angola',
                                                            'Antigua and Barbuda'=>'Antigua and Barbuda',
                                                            'Argentina'=>'Argentina',
                                                            'Armenia'=>'Armenia',
                                                            'Australia'=>'Australia',
                                                            'Austria'=>'Austria',
                                                            'Azerbaijan'=>'Azerbaijan',
                                                            'Bahamas'=>'Bahamas',
                                                            'Bahrain'=>'Bahrain',
                                                            'Bangladesh'=>'Bangladesh',
                                                            'Barbados'=>'Barbados',
                                                            'Belarus'=>'Belarus',
                                                            'Belgium'=>'Belgium',
                                                            'Belize'=>'Belize',
                                                            'Benin'=>'Benin',
                                                            'Bhutan'=>'Bhutan',
                                                            'Bolivia'=>'Bolivia',
                                                            'Bosnia and Herzegovina'=>'Bosnia and Herzegovina',
                                                            'Botswana'=>'Botswana',
                                                            'Brazil'=>'Brazil',
                                                            'Brunei'=>'Brunei',
                                                            'Bulgaria'=>'Bulgaria',
                                                            'Burkina Faso'=>'Burkina Faso',
                                                            'Burundi'=>'Burundi',
                                                            'Cabo Verde'=>'Cabo Verde',
                                                            'Cambodia'=>'Cambodia',
                                                            'Cameroon'=>'Cameroon',
                                                            'Canada'=>'Canada',
                                                            'Central African Republic'=> 'Central African Republic',
                                                            'Chad'=>'Chad',
                                                            'Chile'=>'Chile',
                                                            'China'=>'China',
                                                            'Colombia'=> 'Colombia',
                                                            'Comoros'=>  'Comoros',
                                                            'Congo, D. R.'=>'Congo, D. R.',
                                                            'Congo, R.'=>'Congo, R.',
                                                            'Costa Rica'=> 'Costa Rica',
                                                            "Cote d'Ivoire"=> "Cote d'Ivoire",
                                                            'Croatia'=> 'Croatia',
                                                            'Cuba'=> 'Cuba',
                                                            'Cyprus'=>'Cyprus',
                                                            'Czech Republic'=> 'Czech Republic',
                                                            'Denmark'=>       'Denmark',
                                                            'Djibouti'=>  'Djibouti',
                                                            'Dominica'=>'Dominica',
                                                            'Dominican Republic'=> 'Dominican Republic',
                                                            'Ecuador'=>    'Ecuador',
                                                            'Egypt'=> 'Egypt',
                                                            'El Salvador'=>  'El Salvador',
                                                            'Equatorial Guinea'=>  'Equatorial Guinea',
                                                            'Eritrea'=> 'Eritrea',
                                                            'Estonia'=>  'Estonia',
                                                            'Ethiopia'=>  'Ethiopia',
                                                            'Fiji'=>  'Fiji',
                                                            'Finland'=>  'Finland',
                                                            'France'=>   'France',
                                                            'Gabon'=>     'Gabon',
                                                            'Gambia'=>'Gambia',
                                                            'Georgia'=> 'Georgia',
                                                            'Germany'=>      'Germany',
                                                            'Ghana'=> 'Ghana',
                                                            'Greece'=>'Greece',
                                                            'Grenada'=>  'Grenada',
                                                            'Guatemala'=>   'Guatemala',
                                                            'Guinea'=>'Guinea',
                                                            'Guinea-Bissau'=> 'Guinea-Bissau',
                                                            'Guyana'=>  'Guyana',
                                                            'Haiti'=>    'Haiti',
                                                            'Honduras'=> 'Honduras',
                                                            'Hungary'=>  'Hungary',
                                                            'Iceland'=>   'Iceland',
                                                            'India'=>    'India',
                                                            'Indonesia'=>  'Indonesia',
                                                            'Iran'=>  'Iran',
                                                            'Iraq'=>         'Iraq',
                                                            'Ireland'=>  'Ireland',
                                                            'Israel'=> 'Israel',
                                                            'Italy'=>  'Italy',
                                                            'Jamaica'=>    'Jamaica',
                                                            'Japan'=>   'Japan',
                                                            'Jordan'=>    'Jordan',
                                                            'Kazakhstan'=>      'Kazakhstan',
                                                            'Kenya'=> 'Kenya',
                                                            'Kiribati'=>      'Kiribati',
                                                            'Kosovo'=>    'Kosovo',
                                                            'Kuwait'=>  'Kuwait',
                                                            'Kyrgyzstan'=>   'Kyrgyzstan',
                                                            'Laos'=>'Laos',
                                                            'Latvia'=>      'Latvia',
                                                            'Lebanon'=>'Lebanon',
                                                            'Lesotho'=> 'Lesotho',
                                                            'Liberia'=> 'Liberia',
                                                            'Libya'=> 'Libya',
                                                            'Liechtenstein'=>   'Liechtenstein',
                                                            'Lithuania'=>     'Lithuania',
                                                            'Luxembourg'=>  'Luxembourg',
                                                            'Macedonia'=>   'Macedonia',
                                                            'Madagascar'=>   'Madagascar',
                                                            'Malawi'=>  'Malawi',
                                                            'Malaysia'=>    'Malaysia',
                                                            'Maldives'=> 'Maldives',
                                                            'Mali'=>   'Mali',
                                                            'Malta'=>        'Malta',
                                                            'Marshall Islands'=>  'Marshall Islands',
                                                            'Mauritania'=>  'Mauritania',
                                                            'Mauritius'=>  'Mauritius',
                                                            'Mexico'=>   'Mexico',
                                                            'Micronesia'=>  'Micronesia',
                                                            'Moldova'=>  'Moldova',
                                                            'Monaco'=>    'Monaco',
                                                            'Mongolia'=>   'Mongolia',
                                                            'Montenegro'=>   'Montenegro',
                                                            'Morocco'=>  'Morocco',
                                                            'Mozambique'=>  'Mozambique',
                                                            'Myanmar (Burma)'=>   'Myanmar (Burma)',
                                                            'Namibia'=>  'Namibia',
                                                            'Nauru'=>    'Nauru',
                                                            'Nepal'=> 'Nepal',
                                                            'Netherlands'=> 'Netherlands',
                                                            'New Zealand'=>  'New Zealand',
                                                            'Nicaragua'=> 'Nicaragua',
                                                            'Niger'=>   'Niger',
                                                            'Nigeria'=>   'Nigeria',
                                                            'North Korea'=>    'North Korea',
                                                            'Norway'=>   'Norway',
                                                            'Oman'=>   'Oman',
                                                            'Pakistan'=> 'Pakistan',
                                                            'Palau'=> 'Palau',
                                                            'Palestine'=>'Palestine',
                                                            'Panama'=>   'Panama',
                                                            'Papua New Guinea'=> 'Papua New Guinea',
                                                            'Paraguay'=>'Paraguay',
                                                            'Peru'=>  'Peru',
                                                            'Philippines'=>   'Philippines',
                                                            'Poland'=> 'Poland',
                                                            'Portugal'=>  'Portugal',
                                                            'Qatar'=>  'Qatar',
                                                            'Romania'=>'Romania',
                                                            'Russia'=> 'Russia',
                                                            'Rwanda'=>  'Rwanda',
                                                            'Samoa'=>  'Samoa',
                                                            'San Marino'=> 'San Marino',
                                                            'Sao Tome and Principe'=>'Sao Tome and Principe',
                                                            'Saudi Arabia'=> 'Saudi Arabia',
                                                            'Senegal'=>'Senegal',
                                                            'Serbia'=>'Serbia',
                                                            'Seychelles'=>  'Seychelles',
                                                            'Sierra Leone'=>'Sierra Leone',
                                                            'Singapore'=>'Singapore',
                                                            'Slovakia'=> 'Slovakia',
                                                            'Slovenia'=> 'Slovenia',
                                                            'Solomon Islands'=> 'Solomon Islands',
                                                            'Somalia'=>    'Somalia',
                                                            'South Africa'=>'South Africa',
                                                            'South Korea'=>'South Korea',
                                                            'South Sudan'=>'South Sudan',
                                                            'Spain'=>  'Spain',
                                                            'SriLanka'=> 'SriLanka',
                                                            'St. Kitts and Nevis'=>'St. Kitts and Nevis',
                                                            'St. Lucia'=>  'St. Lucia',
                                                            'St. Vincent & Grenadines'=> 'St. Vincent & Grenadines',
                                                            'Sudan'=>   'Sudan',
                                                            'Suriname'=> 'Suriname',
                                                            'Swaziland'=> 'Swaziland',
                                                            'Sweden'=>    'Sweden',
                                                            'Switzerland'=>'Switzerland',
                                                            'Syria'=>    'Syria',
                                                            'Taiwan'=> 'Taiwan',
                                                            'Tajikistan'=> 'Tajikistan',
                                                            'Tanzania'=> 'Tanzania',
                                                            'Thailand'=>  'Thailand',
                                                            'Timor-Leste'=> 'Timor-Leste',
                                                            'Togo'=> 'Togo',
                                                            'Tonga'=>  'Tonga',
                                                            'Trinidad and Tobago'=>'Trinidad and Tobago',
                                                            'Tunisia'=> 'Tunisia',
                                                            'Turkey'=>   'Turkey',
                                                            'Turkmenistan'=>  'Turkmenistan',
                                                            'Tuvalu'=>'Tuvalu',
                                                            'Uganda'=> 'Uganda',
                                                            'Ukraine'=> 'Ukraine',
                                                            'United Arab Emirates'=>'United Arab Emirates',
                                                            'United Kingdom'=> 'United Kingdom',
                                                            'Uruguay'=>'Uruguay',
                                                            'United States of America'=> 'United States of America',
                                                            'Uzbekistan'=> 'Uzbekistan',
                                                            'Vanuatu'=>    'Vanuatu',
                                                            'Vatican City' => 'Vatican City',
                                                            'Venezuela'=>  'Venezuela',
                                                            'Vietnam'=>    'Vietnam',
                                                            'Yemen'=>'Yemen',
                                                            'Zambia'=> 'Zambia',
                                                            'Zimbabwe'=> 'Zimbabwe'
                                                    );

                                                echo form_multiselect('countrysch[]',$countryoptions,'','class="form-control country" id="countrysch"'); ?>
                                           
                                        </div>
                                        <div class="form-group index2-select fr">
                                            <select id="categorysch" name="categorysch[]" multiple="multiple" class="form-control category">
                                                  <option value="Agriculture">Agriculture</option>
                                                  <option value="Automotive">Automotive</option>
                                                  <option value="Computers & Internet">Computers & Internet</option>
                                                  <option value="Consumer & Retail">Consumer & Retail</option>
                                                  <option value="Education">Education</option>
                                                  <option value="Financial">Financial</option>
                                                  <option value="Governmental">Governmental</option>
                                                  <option value="Industrial & Manufacturing">Industrial & Manufacturing</option>
                                                  <option value="Leisure & Entertainment">Leisure & Entertainment</option>
                                                  <option value="Media & News">Media & News</option>
                                                  <option value="Medicine">Medicine</option>
                                                  <option value="Professional Service">Professional Service</option>
                                                  <option value="Real Estate & Construction">Real Estate & Construction</option>
                                                  <option value="Transportation & Logistics">Transportation & Logistics</option>
                                                  <option value="Telecom">Telecom</option>
                                            </select>
                                         </div>
                                     </div>
                                <?php echo form_close(); ?>
                        </div>

                        <div class="col-md-3 loginContainer">
                            <?php if(isset($this->session->userdata['user_id'])) : ?>
                                <div class="userinfo fr">
                                    <p>Logged In As</p>
                                    <p><?php echo $this->session->userdata['username']; ?></p>
                                    <?= anchor('home/logout', 'Log Out');?>
                                    
                                </div>


                            <?php else: ?>   
                            <?php echo form_open(base_url('home/userlogin'),['role'=>'form']); ?>
                                <div class="login-align">
                                    <div class="form-group">
                                         <?php echo form_input(['name'=>'txtfieldlid', 'type'=>'email','placeholder'=>'Username (Email)','class'=>'form-control']); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo form_password(['name'=>'lipwd','placeholder'=>'Password','class'=>'form-control']); ?>

                                        <!-- <input type="password" placeholder="Password" class="form-control"> -->
                                    </div>
                                     <div class="signin"><button value="submit">Log In</button></div>
                                     <div class="signin fr"><a href="<?php echo base_url('home/reset_password'); ?>">Need Help?</a></div>

                                </div>
                            <?php echo form_close(); ?>
                        <?php endif; ?>
                        </div>
                    </div>  <!-- row close -->  
            </div> <!-- container-fluid close -->
        </div> <!-- topbar close -->






<!--CHAT CONTAINER STARTS HERE-->
<div id="chat-container" class="fixed"></div>

<!-- Header -->
<header id="top" class="header">
    <div class="text-vertical-center"></div>
</header>

<!-- Custom JavaScript Files Included Here -->
<?php $this->load->view('common/javascript'); ?>
 <script src="<?= base_url('assets/js/vendor/bootstrap-multiselect.js');?>" type="text/javascript"></script> 

 <script>

             $(document).ready(function () {
                    $('.country').multiselect({
                        maxHeight: 400,
                        buttonWidth: '100%',
                        includeSelectAllOption: true,
                        enableCaseInsensitiveFiltering: true,
                        nonSelectedText: 'Select The Country'
                    });
                    $('.category').multiselect({
                        maxHeight: 400,
                        buttonWidth: '100%',
                        includeSelectAllOption: true,
                        enableCaseInsensitiveFiltering: true,
                        nonSelectedText: 'Select The Category'
                        
                    });
                    

            });


        </script>  

        
</body>
</html>