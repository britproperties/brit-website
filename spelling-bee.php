<?php
$page_title = 'Brit Spelling Bee Competition — Register Your Child | Brit Properties';
$page_description = 'Register your child (ages 8–12) for the Brit Spelling Bee Competition. Free entry, exciting prizes, and a celebration of young spelling talent across Nigeria.';
$page_keywords = 'Brit Spelling Bee, spelling bee Nigeria, children spelling competition, Brit Properties spelling bee, kids competition Nigeria, spelling bee registration';
$og_image = 'https://www.britproperties.ng/assets/images/spelling-bee/62.jpeg';
include "./components/head.php";
include "./components/navbar.php";
?>

    <style>
        #spellingBeeForm .form-check-input {
            border: 1px solid #333333;
        }
    </style>

    <div class="page-header bg-section parallaxie" style="background-image: url('./assets/images/spelling-bee/62.jpeg');background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Spelling Bee Registration</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Spelling Bee</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-contact-us">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto" style="display: none;">
                    <div class="contact-form">
                        <form id="spellingBeeForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.4s">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <label>First Name:</label>
                                    <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter First Name *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Last Name:</label>
                                    <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Last Name *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Gender:</label>
                                    <select name="gender" class="form-control" id="gender" required>
                                        <option value="" disabled selected>Select Gender *</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Age:</label>
                                    <select name="age" class="form-control" id="age" required>
                                        <option value="" disabled selected>Select Age *</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>School Name:</label>
                                    <input type="text" name="school" class="form-control" id="school" placeholder="Enter School Name *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Class / Grade Level:</label>
                                    <select name="grade" class="form-control" id="grade" required>
                                        <option value="" disabled selected>Select Grade *</option>
                                        <option value="Grade 1">Grade 1</option>
                                        <option value="Grade 2">Grade 2</option>
                                        <option value="Grade 3">Grade 3</option>
                                        <option value="Grade 4">Grade 4</option>
                                        <option value="Grade 5">Grade 5</option>
                                        <option value="Grade 6">Grade 6</option>
                                        <option value="Grade 7">Grade 7</option>
                                        <option value="Grade 8">Grade 8</option>
                                        <option value="Grade 9">Grade 9</option>
                                        <option value="Grade 10">Grade 10</option>
                                        <option value="Grade 11">Grade 11</option>
                                        <option value="Grade 12">Grade 12</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Parent / Guardian Name:</label>
                                    <input type="text" name="guardian" class="form-control" id="guardian" placeholder="Enter Parent / Guardian Name *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Phone Number:</label>
                                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Email Address:</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Home Address:</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Home Address *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <!-- Participation Consent -->
                                <div class="form-group col-md-12 mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" name="consent" class="form-check-input" id="consent" value="yes" required>
                                        <label class="form-check-label" for="consent" style="font-weight: 400;line-height: 23px;">
                                            I confirm that I am the parent/guardian and I consent to my child participating in the Brit Spelling Bee Competition.
                                        </label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <!-- Media Consent -->
                                <div class="form-group col-md-12">
                                    <label class="mb-3 d-block" style="font-weight: 600;">Media Consent:</label>

                                    <div class="form-check mb-3">
                                        <input type="checkbox" name="consent_media_capture" class="form-check-input" required id="consent_media_capture" value="yes">
                                        <label class="form-check-label" for="consent_media_capture" style="font-weight: 400;line-height: 23px;">
                                            I hereby grant permission to Brit Properties Nigeria Limited and its authorized media team to take photographs, video record, and/or interview my child during the Spelling Bee Competition.
                                        </label>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input type="checkbox" name="consent_media_usage" class="form-check-input" required id="consent_media_usage" value="yes">
                                        <label class="form-check-label" for="consent_media_usage" style="font-weight: 400;line-height: 23px;">
                                            I understand that these images/videos may be used in promotional materials, press releases, event recaps, social media posts, or other related public content.
                                        </label>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input type="checkbox" name="consent_media_details" class="form-check-input" required id="consent_media_details" value="yes">
                                        <label class="form-check-label" for="consent_media_details" style="font-weight: 400;line-height: 23px;">
                                            I give consent for my child’s first name, age, and school to be mentioned in media publications when necessary.
                                        </label>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input type="checkbox" name="consent_media_no_compensation" class="form-check-input" required id="consent_media_no_compensation" value="yes">
                                        <label class="form-check-label" for="consent_media_no_compensation" style="font-weight: 400;line-height: 23px;">
                                            I understand that no monetary compensation will be provided for the use of these media materials.
                                        </label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn-default">Submit Registration</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-8 mx-auto" id="registrationSuccess" style="display: none;">
                    <div class="contact-form">
                        <div class="text-center">
                            <img src="./assets/images/email.svg" alt="">

                            <h4 class="mt-3">Registration Successful</h4>
                            <p>Check your email <span id="regSuccessEmail"></span> for your registration no.</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 mx-auto">
                    <div class="contact-form">
                        <div class="text-center">
                            <img src="./assets/images/do-not-enter.png" width="150" alt="">

                            <h4 class="mt-3">Registration Closed</h4>
                            <p>Stay tuned and anticipate the next edition of the Brit Spelling Bee Competition!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

<?php include "./components/footer.php"; ?>