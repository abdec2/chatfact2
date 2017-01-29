<?php if($success = $this->session->flashdata('success')) : ?>
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo $success; ?></strong>
        </div>
      <?php endif; ?>


<div class="container">
	<?php if ($this->session->userdata('user_id')): ?>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4  my_menu">
				<ul class="list-inline ">
					<li><?= anchor('home/profile', 'My Profile');?></li>
					<li><?= anchor('chat', 'My Quick Chats'); ?></li>
				</ul>
			</div>
		</div>
	<?php endif ?>

	<div class="col-md-12">
          <h3 class="profile-heading">Create, Edit and Display Your Profile Here</h3>
    </div>

	<div class="row">
		<?php echo form_open_multipart('home/profile/create_user_profile', ['id'=>'insertprofile']); ?>

		<div class="col-md-4 col-md-offset-4">
				<table class="table profile-card ">
				  <thead>
				    <tr>
				      <th align="center"><h3 style="margin-top: 10px;"><input type="text" class="form-control profile-txt-field" name="inputprofilename" placeholder="Your Profile Name" maxlength="40"></h3>
                          <?= form_error('inputprofilename', '<p class="text-danger">','</p>');?></th>
                              
				    </tr>  
				  </thead>
				  <tbody>
				    <tr>
				      <td align="center">
				      	<div class="imgload">
				      		<p>Would You Like To Upload a Logo or Image?</p>
				      		<div class="radio display-inline imgload-radio-margin">
					          <label>
					          	<?php echo form_radio(['name'=>'optionsRadios', 'id'=>'optionsRadios1', 'value'=>'1'], FALSE); ?>
					            Yes
					          </label>
						    </div>
						    <div class="radio display-inline">
					          <label>
					          	<?php echo form_radio(['name'=>'optionsRadios', 'id'=>'optionsRadios2', 'value'=>'0'], FALSE); ?>
					            No
					          </label>
						    </div>
                                  <?php if($upload_error = $this->session->flashdata('upload_error')): ?>
                                   <p class="text-danger"><?= $upload_error ?></p>
                              <?php endif; ?>
				      	</div>
				      </td>
				    </tr>
				    <tr>
				    	<td><?php echo form_textarea(['class'=>'form-control justifiedtext', 'rows'=>'10', 'name'=>'profiletextArea','placeholder'=>'Introduce Yourself Here Along With Your Product or Services.']); ?>
                         <?= form_error('profiletextArea', '<p class="text-danger">','</p>');?>
				    	</td>
                         
				    </tr>
				  	
				  </tbody>
				</table> 				
            </div>
            <div class="col-md-6 col-md-offset-3">
            		<div class="keywords">
					<?php echo form_textarea(['class'=>'form-control justifiedtext', 'rows'=>'3', 'name'=>'inputkeywords', 'placeholder'=>'Enter Keywords To Search For Your Profile Here. These Are Unlimited and Not Displayed. Enter One Keyword Phrase per Line.']);?>
                         <?= form_error('inputkeywords', '<p class="text-danger">','</p>');?>
					</div>
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

                            echo form_multiselect('inputcountry[]',$countryoptions,'','class="form-control country" id="inputcountry"'); 
                        ?>
                        <?= form_error('inputcountry', '<p class="text-danger">','</p>');?>
                                           
                    </div>

                    <div class="form-group index2-select fr">
	                        <select id="inputcategory" name="inputcategory[]" multiple="multiple" class="form-control category" >
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
                             <?= form_error('inputcategory', '<p class="text-danger">','</p>');?>
	                </div>
                     <div>
                    <?php echo form_submit('createcard', 'Create Your Profile', "class='cfbutton'"); ?>
                    </div>
	        </div>
             
			<?php echo form_close(); ?>
		</div>



          <script>
               $("[name='optionsRadios']").change(function () {
               var radio_value = $("[name='optionsRadios']:checked").val();
               var file_upload_html = "<input type='file' name='userfile' class='form-control' />";
               if (radio_value == 1) {
                    $('.imgload').append(file_upload_html);
               }  else{
                    $("input[type = 'file']").detach();
               }  
          });
          </script>

          
</div>
	    

