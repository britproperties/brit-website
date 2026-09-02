<?php
$page_title = 'Book a Free Site Inspection | Brit Properties';
$page_description = 'See the land before you buy. Book a free, guided site inspection with Brit Properties and verify your investment in person.';
include "./components/head.php";
include "./components/navbar.php";

// Managed from brit-backoffice/settings.php
$branches = $pdo->query("SELECT name FROM branches ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
$estates  = $pdo->query("SELECT name FROM estates ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

$min_date = date('Y-m-d', strtotime('+1 day'));
?>
<link rel="stylesheet" href="./assets/css/flatpickr.min.css">

    <div class="page-header bg-section parallaxie" style="background-image: url('./assets/images/properties-bg.jpg');background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Site Inspection</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Site Inspection</a></li>
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
                <div class="col-xl-7 mx-auto">
                    <div class="contact-form">
                        <form id="inspectionForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.4s">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <label>Client's First Name:</label>
                                    <input type="text" name="fname" class="form-control" id="i-fname" placeholder="Enter First Name *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Client's Last Name:</label>
                                    <input type="text" name="lname" class="form-control" id="i-lname" placeholder="Enter Last Name *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Email Address:</label>
                                    <input type="email" name="email" class="form-control" id="i-email" placeholder="Enter Email Address *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Phone Number:</label>
                                    <input type="text" name="phone" class="form-control" id="i-phone" placeholder="Enter Phone Number *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Branch:</label>
                                    <select name="branch" class="form-control" id="i-branch" required>
                                        <option value="">Choose</option>
                                        <?php foreach ($branches as $branch): ?>
                                        <option value="<?php echo htmlspecialchars($branch['name']); ?>"><?php echo htmlspecialchars($branch['name']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Property to Inspect:</label>
                                    <select name="property_interest" class="form-control" id="i-property">
                                        <option value="">General / Not sure yet</option>
                                        <?php foreach ($estates as $estate): ?>
                                        <option value="<?php echo htmlspecialchars($estate['name']); ?>"><?php echo htmlspecialchars($estate['name']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Referral Name:</label>
                                    <input type="text" name="referral_name" class="form-control" id="i-referral" placeholder="Who referred you? *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Referral Phone:</label>
                                    <input type="text" name="referral_phone" class="form-control" id="i-referral-phone" placeholder="Referral's Phone Number *" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <label>Preferred Inspection Date:</label>
                                    <input type="text" name="preferred_date" class="form-control" id="i-date" placeholder="Select a date *" autocomplete="off" required>
                                    <small>Inspections hold Wednesdays, Thursdays &amp; Sundays. Only those days are selectable on the calendar.</small>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn-default">Book Inspection</button>
                                    <div id="inspectionMsgSubmit" class="h3 hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="contact-form text-center" id="inspectionSuccess" style="display: none;">
                        <img src="./assets/images/email.svg" alt="">
                        <h4 class="mt-3">Request Sent</h4>
                        <p>Thank you for booking a site inspection. Our team will reach out shortly to confirm your visit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="./assets/js/flatpickr.min.js"></script>
<script>
    flatpickr("#i-date", {
        dateFormat: "Y-m-d",
        minDate: "<?php echo $min_date; ?>",
        disable: [
            function(date) {
                var day = date.getDay();
                return day !== 0 && day !== 3 && day !== 4; // only Sun, Wed, Thu selectable
            }
        ]
    });
</script>

<?php include "./components/footer.php"; ?>
