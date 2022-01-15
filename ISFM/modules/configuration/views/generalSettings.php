<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo lang('con_gene_setti'); ?> <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <?php echo lang('home'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_configu'); ?>
                    </li>
                    <li>
                        <?php echo lang('con_gene_setti'); ?> 
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i> <?php echo lang('con_sch_inf_set'); ?>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open_multipart('configuration/generalSetting', $form_attributs);
                        ?>
                        <div class="form-body">
                            <?php
                            if (!empty($message)) {
                                echo '<div class="alert alert-success">
								<strong>Success!</strong> ' . $message .
                                ' </div>';
                            }
                            ?>
                            <?php if (!empty($error)) { echo $error . ' Try again.'; }
                            $schoolName = ""; $startingYear = ""; $headMaster = ""; $address = ""; $phone = ""; $email = ""; $value2 = ""; $currenct = ""; $country = ""; $value = ""; $answer = ""; $answer2 = "";
                            foreach ($info as $row) {
                                $schoolName = $row['school_name']; $startingYear = $row['starting_year']; $headMaster = $row['headmaster_name']; $address = $row['address']; $phone = $row['phone']; $email = $row['email']; $value2 = $row['currenct']; $currenct = $row['currenct']; $country = $row['country']; $value = $row['time_zone'];
                                } ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('con_sch_name'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="School Name" name="schoolName" value="<?php echo $schoolName; ?>" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo lang('con_estub_year'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-4">
                                    <input class="form-control" name="startingDate" id="mask_date2" type="text" value="<?php echo $startingYear; ?>" required>
                                    <span class="help-block"> Date Type  DD/MM/YYYY </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('con_hdm_name'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Headmaster Name" name="headmasterName" value="<?php echo $headMaster; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('con_school_add'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="address" rows="3" required><?php echo $address; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('con_phone_code'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="phoneNumberCode" placeholder="" value="<?php echo $phone; ?>" required>
                                    <span class="help-block">Number 1</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('con_off_phone'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="phone" placeholder="" value="<?php echo $phone; ?>" required>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang('email'); ?></label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="" name="email" value="<?php echo $email; ?>" required>
                                    <span class="help-block"><?php echo lang('email_exam'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('con_currency'); ?> <span class="requiredStar"> * </span></label>
                                <?php
                                if ($value2 == 'fa fa-bitcoin') {
                                    $answer = '&#xf15a; &nbsp; Bitcoin, BTC';
                                } elseif ($value2 == 'fa fa-eur') {
                                    $answer = '&#xf153; &nbsp; EUR';
                                } elseif ($value2 == 'fa fa-jpy') {
                                    $answer = '&#xf157; &nbsp; JPY, YEN, CNY, RMB';
                                } elseif ($value2 == 'fa fa-rouble') {
                                    $answer = '&#xf158; &nbsp; Rouble';
                                } elseif ($value2 == 'fa fa-try') {
                                    $answer = '&#xf195; &nbsp; TRY, Turkish-lira';
                                } elseif ($value2 == 'fa fa-krw') {
                                    $answer = '&#xf159; &nbsp; KRW, WON';
                                } elseif ($value2 == 'fa fa-gbp') {
                                    $answer = '&#xf154; &nbsp; GBP';
                                } elseif ($value2 == 'fa fa-money') {
                                    $answer = '&#xf0d6; &nbsp; Money';
                                } elseif ($value2 == 'fa fa-usd') {
                                    $answer = '&#xf155; &nbsp; Dollar';
                                } elseif ($value2 == 'fa fa-inr') {
                                    $answer = '&#xf156; &nbsp; INR, Rupee';
                                }
                                ?>
                                <div class="col-md-6">
                                    <select name="currency" class="form-control currencyConfig" required>
                                        <option value="<?php echo $currenct; ?>"><?php echo $answer; ?></option>
                                        <option value="fa fa-bitcoin"> &#xf15a; &nbsp; Bitcoin, BTC</option>
                                        <option value="fa fa-eur"> &#xf153; &nbsp; EUR</option>
                                        <option value="fa fa-jpy"> &#xf157; &nbsp; JPY, YEN, CNY, RMB </option>
                                        <option value="fa fa-rouble"> &#xf158; &nbsp; Rouble </option>
                                        <option value="fa fa-try"> &#xf195; &nbsp; TRY, Turkish-lira </option>
                                        <option value="fa fa-krw"> &#xf159; &nbsp; KRW, WON </option>
                                        <option value="fa fa-gbp"> &#xf154; &nbsp; GBP</option>
                                        <option value="fa fa-money"> &#xf0d6; &nbsp; Money </option>
                                        <option value="fa fa-usd"> &#xf155; &nbsp; Dollar </option>
                                        <option value="fa fa-inr"> &#xf156; &nbsp; INR, Rupee </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> <?php echo lang('con_country'); ?> </label>
                                <div class="col-md-6">
                                    <select name="country" id="select2_sample4" class="form-control select2">
                                        <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="Hungary">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint LUCIA">Saint LUCIA</option>
                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <?php
                            if ($value == 'UM12') {
                                $answer2 = ' (UTC - 12:00) Enitwetok, Kwajalien ';
                            } elseif ($value == 'UM11') {
                                $answer2 = ' (UTC - 11:00) Nome, Midway Island, Samoa ';
                            } elseif ($value == 'UM10') {
                                $answer2 = ' (UTC - 10:00) Hawaii';
                            } elseif ($value == 'UM9') {
                                $answer2 = ' (UTC - 9:00) Alaska';
                            } elseif ($value == 'UM8') {
                                $answer2 = ' (UTC - 8:00) Pacific Time';
                            } elseif ($value == 'UM7') {
                                $answer2 = ' (UTC - 7:00) Mountain Time';
                            } elseif ($value == 'UM6') {
                                $answer2 = ' (UTC - 6:00) Central Time, Mexico City';
                            } elseif ($value == 'UM5') {
                                $answer2 = ' (UTC - 5:00) Eastern Time, Bogota, Lima, Quito';
                            } elseif ($value == 'UM4') {
                                $answer2 = ' (UTC - 4:00) Atlantic Time, Caracas, La Paz';
                            } elseif ($value == 'UM25') {
                                $answer2 = ' (UTC - 3:30) Newfoundland';
                            } elseif ($value == 'UM3') {
                                $answer2 = ' (UTC - 3:00) Brazil, Buenos Aires, Georgetown, Falkland Is.';
                            } elseif ($value == 'UM2') {
                                $answer2 = ' (UTC - 2:00) Mid-Atlantic, Ascention Is., St Helena';
                            } elseif ($value == 'UM1') {
                                $answer2 = ' (UTC - 1:00) Azores, Cape Verde Islands';
                            } elseif ($value == 'UTC') {
                                $answer2 = ' (UTC) Casablanca, Dublin, Edinburgh, London, Lisbon, Monrovia';
                            } elseif ($value == 'UP1') {
                                $answer2 = ' (UTC + 1:00) Berlin, Brussels, Copenhagen, Madrid, Paris, Rome';
                            } elseif ($value == 'UP2') {
                                $answer2 = ' (UTC + 2:00) Kaliningrad, South Africa, Warsaw';
                            } elseif ($value == 'UP3') {
                                $answer2 = ' (UTC + 3:00) Baghdad, Riyadh, Moscow, Nairobi';
                            } elseif ($value == 'UP25') {
                                $answer2 = ' (UTC + 3:30) Tehran';
                            } elseif ($value == 'UP4') {
                                $answer2 = ' (UTC + 4:00) Adu Dhabi, Baku, Muscat, Tbilisi';
                            } elseif ($value == 'UP35') {
                                $answer2 = ' (UTC + 4:30) Kabul';
                            } elseif ($value == 'UP5') {
                                $answer2 = ' (UTC + 5:00) Islamabad, Karachi, Tashkent';
                            } elseif ($value == 'UP45') {
                                $answer2 = ' (UTC + 5:30) Bombay, Calcutta, Madras, New Delhi';
                            } elseif ($value == 'UP6') {
                                $answer2 = ' (UTC + 6:00) Almaty, Colomba, Dhaka';
                            } elseif ($value == 'UP7') {
                                $answer2 = ' (UTC + 7:00) Bangkok, Hanoi, Jakarta';
                            } elseif ($value == 'UP8') {
                                $answer2 = ' (UTC + 8:00) Beijing, Hong Kong, Perth, Singapore, Taipei';
                            } elseif ($value == 'UP9') {
                                $answer2 = ' (UTC + 9:00) Osaka, Sapporo, Seoul, Tokyo, Yakutsk';
                            } elseif ($value == 'UP85') {
                                $answer2 = ' (UTC + 9:30) Adelaide, Darwin';
                            } elseif ($value == 'UP10') {
                                $answer2 = ' (UTC + 10:00) Melbourne, Papua New Guinea, Sydney, Vladivostok';
                            } elseif ($value == 'UP11') {
                                $answer2 = ' (UTC + 11:00) Magadan, New Caledonia, Solomon Islands';
                            } elseif ($value == 'UP12') {
                                $answer2 = ' (UTC + 12:00) Auckland, Wellington, Fiji, Marshall Island';
                            }
                            ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo lang('con_time_zone'); ?> <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <select name="timeZone" class="form-control" required>
                                        <option value="<?php echo $value; ?>"> <?php echo $answer2; ?></option>
                                        <option value="UM12"> (UTC - 12:00) Enitwetok, Kwajalien </option>
                                        <option value="UM11"> (UTC - 11:00) Nome, Midway Island, Samoa</option>
                                        <option value="UM10"> (UTC - 10:00) Hawaii</option>
                                        <option value="UM9"> (UTC - 9:00) Alaska</option>
                                        <option value="UM8"> (UTC - 8:00) Pacific Time</option>
                                        <option value="UM7"> (UTC - 7:00) Mountain Time</option>
                                        <option value="UM6"> (UTC - 6:00) Central Time, Mexico City</option>
                                        <option value="UM5"> (UTC - 5:00) Eastern Time, Bogota, Lima, Quito</option>
                                        <option value="UM4"> (UTC - 4:00) Atlantic Time, Caracas, La Paz</option>
                                        <option value="UM25"> (UTC - 3:30) Newfoundland</option>
                                        <option value="UM3"> (UTC - 3:00) Brazil, Buenos Aires, Georgetown, Falkland Is.</option>
                                        <option value="UM2"> (UTC - 2:00) Mid-Atlantic, Ascention Is., St Helena</option>
                                        <option value="UM1"> (UTC - 1:00) Azores, Cape Verde Islands</option>
                                        <option value="UTC"> (UTC) Casablanca, Dublin, Edinburgh, London, Lisbon, Monrovia</option>
                                        <option value="UP1"> (UTC + 1:00) Berlin, Brussels, Copenhagen, Madrid, Paris, Rome</option>
                                        <option value="UP2"> (UTC + 2:00) Kaliningrad, South Africa, Warsaw</option>
                                        <option value="UP3"> (UTC + 3:00) Baghdad, Riyadh, Moscow, Nairobi</option>
                                        <option value="UP25"> (UTC + 3:30) Tehran</option>
                                        <option value="UP4"> (UTC + 4:00) Adu Dhabi, Baku, Muscat, Tbilisi</option>
                                        <option value="UP35"> (UTC + 4:30) Kabul</option>
                                        <option value="UP5"> (UTC + 5:00) Islamabad, Karachi, Tashkent</option>
                                        <option value="UP45"> (UTC + 5:30) Bombay, Calcutta, Madras, New Delhi</option>
                                        <option value="UP6"> (UTC + 6:00) Almaty, Colomba, Dhaka</option>
                                        <option value="UP7"> (UTC + 7:00) Bangkok, Hanoi, Jakarta</option>
                                        <option value="UP8"> (UTC + 8:00) Beijing, Hong Kong, Perth, Singapore, Taipei</option>
                                        <option value="UP9"> (UTC + 9:00) Osaka, Sapporo, Seoul, Tokyo, Yakutsk</option>
                                        <option value="UP85"> (UTC + 9:30) Adelaide, Darwin</option>
                                        <option value="UP10"> (UTC + 10:00) Melbourne, Papua New Guinea, Sydney, Vladivostok</option>
                                        <option value="UP11"> (UTC + 11:00) Magadan, New Caledonia, Solomon Islands</option>
                                        <option value="UP12"> (UTC + 12:00) Auckland, Wellington, Fiji, Marshall Island</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green" name="submit" value="Save"><?php echo lang('save'); ?></button>
                                <button type="reset" class="btn default"><?php echo lang('refresh'); ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/admin/pages/scripts/components-form-tools.js"></script>
<script type="text/javascript" >
    jQuery(document).ready(function () {
        ComponentsFormTools.init();
    });

    var RecaptchaOptions = {
        theme: 'custom',
        custom_theme_widget: 'recaptcha_widget'
    };
</script>

<script>
    function classInfo(str) {
        var xmlhttp;
        if (str.length === 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/users/student_info?q=" + str, true);
        xmlhttp.send();
    }

    jQuery(document).ready(function () {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function () {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>