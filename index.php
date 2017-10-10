<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Fun Tour</title>
        <meta name="description" content="">
        <meta name="description" content="Fun Tour - Your tour! your convenience!">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Hind|Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- Icons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" media="all" rel="stylesheet" type="text/css">

        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/materialize.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <!--?include("values_receiver.php"); ?-->
        <!--?include("functions.php"); ?-->     
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div class="container"> 
            <form id="tourForm" class="container" action="values_receiver.php" method="post">
                <div id="summary-container">
                    <div id="cover-summary">
                        <!-- TOOLBAR COVER -->
                        <div id="toolbar-cover">
                            <div class="open-left" data-activates="left-sidebar-slide-out">
                              <i class="ion-android-menu"></i>
                            </div>
                            <h1 class="title">{Fun Tour}</h1>
                            <div class="open-right" data-activates="right-sidebar-slide-out">
                              <i class="ion-information-circled"></i>
                            </div>
                        </div>
                        <!-- END OF TOOLBAR COVER -->

                        <div id="cover-flexes" class="cover-flexes">
                            <div class="flex3">
                                <div class="city-booking-overlay"></div>
                                <div class="city-booking-container">
                                    <div class="vertical-line z-depth-1"></div>
                                    <div class="col s12">
                                        <label>Choose a city</label>
                                        <select name="city" class="browser-default">
                                            <option value="0" selected>Cebu</option>
                                        </select>
                                    </div>
                                    <div class="col s12">
                                        <label>Hire a Van</label>
                                        <select id="vanCount" name="vanCount" class="browser-default">
                                            <option value="0">0</option>
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="col s12">
                                        <label>Hire a Car</label>
                                        <select id="sedanCount" name="sedanCount" class="browser-default">
                                            <option value="0" selected>0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>       
                                    <div class="col s12">
                                        <label class="active">Tour Type</label>
                                        <select id="tourType" name="tourType"  class="browser-default">
                                            <option value="1">Round trip</option>
                                            <option value="2" selected>One way</option>
                                        </select>
                                    </div>
                                    <div class="book-button">
                                        <button  type="button" class="waves-effect waves-light btn primary-bg-color primary-color block animated bouncein delay-6"> 
                                            BOOK NOW<i class="material-icons right">location_on</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex2">
                                <div class="cover-info-overlay"></div>
                                <div class="city-booking-container">
                                    <h2>Easiest and most convenient way to book your next van rental!</h2>
                                    <p></p>
                                    <p class="paragraph">
                                        We provide you hassle-free booking for your private car and/or van. You are just a click away to book your city tour, one-way trip or a round-trip with affordable fixed prices. No more haggling with your driver. 
                                    </p>
                                    <p class="paragraph">
                                        We have fixed and affordable rates for different destinations. You only pay a small admin fee and the rest is payable upon arriving at your destination or after the service. We will email and text your confirmation. 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div id="form-container">
                    <!-- toolbar -->
                    <div id="toolbar" class="primary-bg-color z-depth-1">
                        <div class="open-left" data-activates="left-sidebar-slide-out">
                            <i class="ion-android-menu"></i>
                        </div>
                        <h1 class="title">{Fun Tour}</h1>
                        <div class="summary-slide-down" onclick="smoothScrollToTop()">
                            <i class="ion-chevron-down"></i>
                        </div>
                    </div>
                    <!-- end of toolbar -->
                    <div class="booking-container">
                        <h2 class="toppest-title">Booking Information</h2>

                        <div class="flexes">
                            <div class="flex1">
                                <div class="input-field animated fadeInUp">
                                  <input id="firstName" name="firstName" type="text" class="validate">
                                  <label for="firstName">First Name*</label>
                                </div>
                            </div>
                            <div class="flex1"> 
                                <div class="input-field animated fadeInUp">
                                    <input id="lastName" name="lastName" type="text" class="validate">
                                    <label for="lastName">Last Name*</label>
                                </div>
                            </div>
                        </div>
                        <div class="flexes">
                            <div class="flex1">
                                <div class="input-field animated fadeInUp delay-2">
                                    <input id="contact" name="contact" type="text" class="validate">
                                    <label for="contact">Contact Number*</label>
                                </div>
                            </div>
                            <div class="flex1">
                                <div class="input-field animated fadeInUp delay-2">
                                    <input id="email" name="email" type="email">
                                    <label for="email">Email*</label>
                                </div>
                            </div>
                        </div>
                        <div class="flexes">
                            <div class="flex1">
                                <div class="input-field input-td col s12">
                                    <select name="ageRange">
                                        <option value="0" selected>25+</option>
                                        <option value="1">18-20</option>
                                        <option value="2">21-24</option>
                                    </select>
                                    <label class="active">Age*</label>
                                </div>
                            </div>
                            <div class="flex1">
                                <div class="input-field input-td col s12">
                                    <select>
                                        <option value="" selected>- select one -</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>   
                                    <label class="active">Nationality*</label>                            
                              </div>
                            </div>    
                        </div>

                        <div class="flexes">
                            <div class="flex1 padding-top-8">
                                <div class="input-field input-td animated fadeInUp delay-4">
                                    <input id="pickupDate" name="pickupDate" type="date" class="validate">
                                    <label for="pickupDate" class="active">Pickup Date*</label>
                                </div>
                            </div>
                            <div class="flex1 padding-top-8">
                                <div class="input-field input-td animated fadeInUp delay-4">
                                    <input id="pickupTime" name="pickupTime" type="time" class="validate">
                                    <label for="pickupTime" class="active">Pickup Time*</label>
                                </div>  
                            </div>
                        </div>

                        <div class="flexes">
                            <div class="flex1">
                                <div class="input-td animated fadeInUp delay-4">
                                    <label>Pickup Location*</label>
                                    <input id="pickupLocation" name="pickupLocation" class="controls" type="text" placeholder="Type location here"/>
                                    <div id="pickup_map"></div>
                                </div>
                                <div class="input-field input-td animated fadeInUp delay-5">
                                    <textarea class="materialize-textarea" id="pickupInstruction" name="pickupInstruction" form="tourForm"></textarea> 
                                    <label for="instruct1">Additional instructions</label>
                                </div>
                            </div>
                            <div class="flex1">
                                <div class="input-td animated fadeInUp delay-4">
                                    <label>Main Destination*</label>
                                    <input id="destination" name="destination" class="controls" type="text" placeholder="Type location here"/>
                                    <div id="destination_map"></div>
                                </div>
                                <div class="input-field input-td animated fadeInUp delay-5">
                                    <textarea class="materialize-textarea" id="destinationInstruction" name="destinationInstruction" form="tourForm"></textarea> 
                                    <label for="instruct1">Additional instructions</label>
                                </div>
                            </div>
                        </div>

                        <div class="flexes padding-vertical-10">
                            <div class="breakdown z-depth-1">
                                <div class="flex1">
                                    <label id="bd-city"><b>Cebu City</b></label>
                                    <label id="bd-tourType">One-way</label>
                                    <label id="bd-price">Php 0.00 (Select pick up and destination)</label>
                                </div>
                                <div class="flex1">
                                    <img id="bd-van-img" src="img/innova.png">Van</img>
                                    <button id="bdVanCount" type="button" class="btn-flat grey lighten-2">1</button>
                                </div>
                                <div class="flex1 padding-top-12">
                                    <img id="bd-car-img" src="img/almera.png">Car</img>
                                    <button id="bdSedanCount" type="button" class="btn-flat grey lighten-2">0</button>
                                </div>
                            </div>
                        </div>

                        <div class="next-button">
                            <input class="waves-effect waves-light btn-large light-blue darken-3 primary-color block animated bouncein delay-6" type="submit" value="GO">
                        </div>

                        <!-- footer -->
                        <div class="footer z-depth-1">
                            <div class="footer-icons">
                                <i class="ion-social-facebook"></i>
                                <i class="ion-social-pinterest"></i>
                                <i class="ion-social-instagram"></i>
                                <i class="ion-social-linkedin"></i>
                                <i class="ion-social-googleplus"></i>
                                <i class="ion-social-twitter"></i>
                                <i class="ion-social-github"></i>
                            </div>
                            <div class="copyrights">
                                <p>Copyrights &copy 2017. All rights reserved.</p> &nbsp;| <a href="terms.php">Terms and Conditions</a>
                            </div>
                        </div>
                        <!-- end of footer -->
                    </div>
                </div>
            </form>

            <!-- Sidebars -->
              <!-- Left Sidebar -->
              <ul id="left-sidebar-slide-out" class="side-nav collapsible">
                <div class="sidebar-toppest"></div>
                <li>
                  <a href="#" class="navi waves-effect"><i class="ion-android-home"></i> Booking</a>
                </li>
                <li>
                  <a href="#" class="navi waves-effect"><i class="ion-bookmark"></i> Contact Us</a>
                </li>
              </ul>
              <!-- End of Left Sidebar -->  

              <!--Start of Right Sidebar -->
              <div id="right-sidebar-slide-out" class="side-nav collapsible">
                <div class="close-right">
                    <a id="close-right-sidebar" href="#" data-activates="right-sidebar-slide-out" class="button-collapse">
                        <i class="ion-ios-close"></i>
                    </a>
                </div>
                <div class="info-content">
                    <h5>Information
                        <i class="ion-information-circled"></i>
                    </h5>

                    <p>Bacon ipsum dolor amet leberkas salami cupim shankle pork loin sausage sirloin. Chicken spare ribs picanha swine chuck, leberkas cupim. Biltong kevin pork belly cupim short loin, doner spare ribs meatloaf filet mignon. Flank shankle ground round, boudin rump pork chop cow pig strip steak landjaeger.
                    </p>

                    <p>Ribeye chuck jowl, frankfurter strip steak prosciutto pancetta andouille swine short loin turducken. T-bone chuck cow tail hamburger ham hock filet mignon, cupim porchetta meatball ribeye jowl. Shoulder sirloin chicken, jerky picanha turducken pig kevin porchetta pork frankfurter sausage. Burgdoggen ribeye rump ham strip steak, chicken swine. Pig pork loin corned beef, biltong bresaola beef beef ribs pastrami ball tip prosciutto meatloaf shank tongue cupim. Kielbasa sirloin doner tail filet mignon jowl spare ribs beef ribs cupim.
                    </p>

                    <p>Ribeye porchetta meatloaf, tongue alcatra beef spare ribs turducken pork fatback cow ball tip pork chop cupim. Landjaeger tongue tri-tip pork loin, tail sausage pancetta hamburger andouille. Tongue t-bone kevin swine biltong ham hock fatback tail pork loin alcatra sausage turkey meatball flank. Bresaola tenderloin short loin biltong picanha pork beef ribs.
                    </p>

                    <p>Biltong kevin porchetta, ball tip alcatra pork chop swine frankfurter pork belly pancetta brisket meatloaf ground round. Brisket turkey fatback shank alcatra meatball biltong ham pastrami tenderloin. Meatloaf strip steak chuck doner boudin capicola ground round pig jowl bacon ham hock andouille. Pork loin shank leberkas pancetta jerky.
                    </p>

                    <p>Jerky hamburger shankle picanha jowl meatball, tail short loin beef. Pork belly tail chuck doner. Shankle tail shank ribeye pork chop drumstick venison pancetta flank. Bresaola turducken jerky t-bone pork salami. Alcatra cupim meatball, tongue beef ribs jerky pastrami filet mignon pancetta flank frankfurter ham hock burgdoggen fatback. Doner sausage kielbasa jerky.
                    </p>
                </div>
              </div>
              <!-- End of Right Sidebar -->    
            </div>
            <!-- End of Main Container -->

        </div>

        <script src="js/plugins.js"></script>
        <script src="js/vendor/materialize.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&amp;key=AIzaSyCrjyb-LnK_jeqCM5-G8LWxvZ7IMiwoz1I"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
