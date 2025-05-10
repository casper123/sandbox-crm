<!DOCTYPE html>
<html lang="en" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Apply for Sand Box</title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url()?>/admin_assets/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>/admin_assets/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>/admin_assets/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url()?>/admin_assets/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>/admin_assets/img/logo-big.jpg">
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>/admin_assets/img/logo-big.jpg">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pace/0.7.8/themes/blue/pace-theme-center-radar.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
   
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/0.7.8/pace.min.js"></script>
    <script type="text/javascript">
        window.addEventListener('load', function() {

            window.paceOptions = {
                ajax: { trackMethods: ['GET', 'POST'] }
            };
            
            var video = document.getElementById('video');
            var canvas = document.getElementById('canvas');
            var takePhoto = document.getElementById('takePhoto');
            var videoSelect = document.querySelector('select#videoSource');
            videoSelect.onchange = getStream;
            
            var type = "picture";
            var width = 400;
            var height = 400;
            var streaming = false;
            
            function getDevices() {
                // AFAICT in Safari this only gets default devices until gUM is called :/
                return navigator.mediaDevices.enumerateDevices();
            }
            
            function gotDevices(deviceInfos) {
                window.deviceInfos = deviceInfos; // make available to console
                console.log('Available input and output devices:', deviceInfos);
                for (const deviceInfo of deviceInfos) {
                    const option = document.createElement('option');
                    if (deviceInfo.kind === 'videoinput') {
                        option.value = deviceInfo.deviceId;
                        option.text = deviceInfo.label || `Camera ${videoSelect.length + 1}`;
                        videoSelect.appendChild(option);
                    }
                }
            }
            
            function getStream() {
                if (window.stream) {
                    window.stream.getTracks().forEach(track => {
                        track.stop();
                    });
                }
                const videoSource = videoSelect.value;
                const constraints = {
                    audio: false,
                    video: {deviceId: videoSource ? {exact: videoSource} : undefined}
                };
                return navigator.mediaDevices.getUserMedia(constraints).
                then(gotStream).catch(handleError);
            }
            
            function gotStream(stream) {
                window.stream = stream; // make stream available to console
                videoSelect.selectedIndex = [...videoSelect.options].
                findIndex(option => option.text === stream.getVideoTracks()[0].label);
                video.srcObject = stream;
                video.play();
            }
            
            function handleError(error) {
                console.error('Error: ', error);
            }
            
            $('#imageModal').on('show.bs.modal', function (event) {
                
                var button = $(event.relatedTarget);
                type = button.data('whatever');
                
                const videoSource = videoSelect.value;
                getStream().then(getDevices).then(gotDevices);
                video.setAttribute('width', width);
                video.setAttribute('height', height);
                canvas.setAttribute('width', width);
                canvas.setAttribute('height', height);
            });
            
            takePhoto.addEventListener('click', function(ev){
                ev.preventDefault();
                var context = canvas.getContext('2d');
                if (width && height) 
                {
                    canvas.width = width;
                    canvas.height = height;
                    context.drawImage(video, 0, 0, width, height);
                    
                    var data = canvas.toDataURL('image/png');
                    switch (type) {
                        case "photo":
                        $("#pictureImage").attr("src", data);
                        $("#picture").val(data);
                        break;
                        
                        case "cnicFront":
                        $("#cnicFrontImage").attr("src", data);
                        $("#cnicFront").val(data);
                        break;
                        
                        case "cnicBack":
                        $("#cnicBackImage").attr("src", data);
                        $("#cnicBack").val(data);
                        break;
                        
                        default:
                        break;
                    }
                }
                var stream = video.srcObject;
                var tracks = stream.getTracks();
                
                tracks.forEach(function(track) {
                    track.stop();
                });
                
                video.srcObject = null;
                $('#imageModal').modal('hide');
            }, false);
        }, false);

        function validateForm(e) {

            var pic = $("#picture").val();
            var back = $("#cnicBack").val();
            var front = $("#cnicFront").val();

            if (pic == undefined || pic == "") {
                alert("Please provide your picture");
                return false;
            }

            if (front == undefined || front == "") {
                alert("Please provide picture of front side of your CNIC");
                return false;
            }

            if (back == undefined || back == "") {
                alert("Please provide picture of back side of your CNIC");
                return false;
            }
            
            $("#submitButton").hide();
            $("#loadingP").show();
            return true;
        };

        function uploadFile(type) {

            var file = "";
            switch (type) {
                case "photo":
                file = document.querySelector('#pictureFile').files[0];
                    break;

                case "cnicFront":
                file = document.querySelector('#frontFile').files[0];
                    break;

                case "cnicBack":
                file = document.querySelector('#backFile').files[0];
                    break;
            
                default:
                    break;
            }

            if (file != "") {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => {
                    var data = reader.result;

                    switch (type) {
                        case "photo":
                        $("#pictureImage").attr("src", data);
                        $("#picture").val(data);
                        break;
                        
                        case "cnicFront":
                        $("#cnicFrontImage").attr("src", data);
                        $("#cnicFront").val(data);
                        break;
                        
                        case "cnicBack":
                        $("#cnicBackImage").attr("src", data);
                        $("#cnicBack").val(data);
                        break;
                        
                        default:
                        break;
                    }

                };

                reader.onerror = error => alert(error);
            } else {
                alert("Please upload file first");
            }
        }
    </script>
</head>
<style type="text/css">
    .main-panel .main-content {
        padding-left: 0px !important; 
    }
    .pace {
        -webkit-pointer-events: none;
        pointer-events: none;

        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;

        z-index: 2000;
        position: fixed;
        height: 90px;
        width: 90px;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        }

        .pace.pace-inactive .pace-activity {
        display: none;
        }

        .pace .pace-activity {
        position: fixed;
        z-index: 2000;
        display: block;
        position: absolute;
        left: -30px;
        top: -30px;
        height: 90px;
        width: 90px;
        display: block;
        border-width: 30px;
        border-style: double;
        border-color: #dd2226 transparent transparent;
        border-radius: 50%;

        -webkit-animation: spin 1s linear infinite;
        -moz-animation: spin 1s linear infinite;
        -o-animation: spin 1s linear infinite;
        animation: spin 1s linear infinite;
        }

        .pace .pace-activity:before {
        content: ' ';
        position: absolute;
        top: 10px;
        left: 10px;
        height: 50px;
        width: 50px;
        display: block;
        border-width: 10px;
        border-style: solid;
        border-color: #dd2226 transparent transparent;
        border-radius: 50%;
        }

        @-webkit-keyframes spin {
        100% { -webkit-transform: rotate(359deg); }
        }

        @-moz-keyframes spin {
        100% { -moz-transform: rotate(359deg); }
        }

        @-o-keyframes spin {
        100% { -moz-transform: rotate(359deg); }
        }

        @keyframes spin {
        100% {  transform: rotate(359deg); }
        }

</style>
<body>
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-text="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Camera Capture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-text="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="videoSource">Video Source</label>
                        <select class="form-control" id="videoSource"></select>
                    </div>
                    <video id="video">Video stream not available.</video>
                </div>
                <canvas style="display:none;" id="canvas"></canvas>
                <div class="modal-footer">
                    <button type="button" id="takePhoto" class="btn btn-primary">Confirm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Header - set the background image for the header in the line below -->
    <header class="py-5 bg-image-full" style="background-image: url('http://sandbox.com.pk/photo-gallery/0.jpg'); background-size:cover;">
        <img class="img-fluid d-block mx-auto" src="<?=base_url()?>admin_assets/img/logo-big.jpg" alt="">
    </header>
    
    <!-- Content section -->
    <section class="py-5">
        <div class="container">
            <h1>Sand Box Membership Application</h1>
            <p class="lead">Thank you for your interest in joining Sand Box as a member</p>
            <p>We understand that while working for yourself can be liberating and satisfying, without the right facility, it can also be unproductive and lonely. We know from experience that it’s hard to keep a professional profile while working from your couch. The couch is no place to build an empire. Enter Sand Box!</p>
            <br/><Br/>
            <form id="signupForm" method="post" action="<?=base_url()?>home/signup/<?=base64_encode(intval($invitation_id))?>" onsubmit="return validateForm(event)">
                <legend>Business Details</legend>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Name</label>
                            <input type="text" required name="team_name" class="form-control" aria-describedby="companyHelp" placeholder="">
                            <small id="companyHelp" class="form-text text-muted">Please enter your name if you're a freelancer</small>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nature Of Business</label>
                            <input type="text" name="bussiness" required class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name of Designated Person</label>
                            <input type="text" value="<?=$full_name?>" required name="team_owner" class="form-control" aria-describedby="desgneeHelp" placeholder="">
                            <small id="desgneeHelp" class="form-text text-muted">Please enter your name if you're a freelancer</small>
                        </div>
                    </div>  
                </div>  
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" value="<?=$email_adress?>" required name="owner_email" class="form-control" aria-describedby="emailHelp" placeholder="">
                            <small id="emailHelp" class="form-text text-muted">We'll be sending all communciation emails, invoices and receipts etc at this address</small>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Number</label>
                            <input type="number" value="<?=$contact_number?>" required name="owner_contact" aria-describedby="contactHelp" class="form-control" placeholder="">
                            <small id="contactHelp" class="form-text text-muted">03XXXXXXXXX</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">How did you hear about is?</label>
                            <select required="required" name="how_hear" id="how_hear" class="form-control">
                                <option value="Facebook">Facebook</option>
                                <option value="Google">Google</option>
                                <option value="OLX">Classified Ads (OLX)</option>
                                <option value="Friend">Friend</option>
                                <option value="Fellow SandBox Member">Fellow SandBox Member</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>  
                </div>  
                <br/><br/>
                <legend>Verification Details</legend>
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Photo</label>
                            <input type="text" style="display:none;" onkeydown="event.preventDefault()" name="form_page_2" class="form-control" id="picture" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal" data-whatever="photo">Take Picture</button>
                        <label class="btn btn-secondary" for="pictureFile" style="margin-top:8px;">
                            <input name="pictureFile" id="pictureFile" type="file" onchange="uploadFile('photo')" class="d-none">
                            Upload
                        </label>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <img class="img-fluid" id="pictureImage" alt="The screen capture will appear in this box.">
                    </div>
                </div>
                <div class="row">    
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">CNIC Image Front</label>
                            <input type="text" style="display:none;" onkeydown="event.preventDefault()" name="owner_cnic_front" class="form-control" id="cnicFront"  aria-describedby="cnicHelp" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal" data-whatever="cnicFront">Take Picture</button>
                        <label class="btn btn-secondary" for="frontFile" style="margin-top:8px;">
                            <input name="frontFile" id="frontFile" type="file" class="d-none" onchange="uploadFile('cnicFront')">
                            Upload
                        </label>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <img class="img-fluid" id="cnicFrontImage" alt="The screen capture will appear in this box.">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">CNIC Image Back</label>
                            <input type="text" style="display:none;" onkeydown="event.preventDefault()" name="owner_cnic_back" class="form-control" id="cnicBack"  aria-describedby="cnicHelp" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal" data-whatever="cnicBack">Take Picture</button>
                        <label class="btn btn-secondary" for="backFile" style="margin-top:8px;">
                            <input name="backFile" id="backFile" type="file" class="d-none" onchange="uploadFile('cnicBack')">
                            Upload
                        </label>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <img class="img-fluid" id="cnicBackImage" alt="The screen capture will appear in this box.">
                    </div>
                </div>
                <br/><br/>
                <legend>In Case of Emergency</legend>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="companyHelp">Name of Person</label>
                            <input type="text" required name="emergencyPerson" class="form-control" aria-describedby="emergencyHelp" placeholder="">
                            <small id="companyHelp" class="form-text text-muted">Whom should we contact in case of emergency?</small>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Conact Number</label>
                            <input type="text" required class="form-control" name="emergencyContact" placeholder="">
                        </div>
                    </div>
                </div>
                
                <br/><br/>
                <legend>Terms & Conditions</legend>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="scroll-box">
                            <p>
                                Whether you’re at the Sand Box every day, once a month, or strictly remote, whatever level of experience, background, or industry you come from, this is YOUR clubhouse.<br/><Br/>
                                In order to make sure this community can be home to everyone, we’ve put together a few guidelines.<br/><Br/>
                                <b>We expect members…</b><br/><Br/>
                                To take care of themselves, each other, and this place.<br/><Br/>
                                Be kind to each other, and to yourself. Create opportunities to collaborate with one another, and invite others to do so. Take care of our clubhouse as if it’s your home (or better). Leave spaces better than you found them. Encourage others in their endeavors, and respect each other’s privacy. Treat others with the professionalism, warmth, and respect with which you would like to be treated.<br/><Br/>
                                To ensure all our members feel safe and comfortable…
                                Sand Box cares about creating an open and welcoming community, and we are committed to making membership a respectful and harassment-free experience for everyone, regardless of gender, gender identity and expression, sex, sexual orientation, disability, neuro(a)typicality, physical appearance, body size, race, ethnicity, national origin, immigration status, age, political affiliation, or religion.<br/><Br/>
                                This Code of Conduct applies to our physical space at 904 Park Avenue, outside of Sand Box at community-related social activities, and online in both public and private channels.<br/><Br/>
                                <b>Acceptable User Policy</b><br/><br/>
                                Acceptance of Terms: Completion of this application form acknowledges the acceptance of the Use of Service and/or the Acceptable Use Policy by the applicant.<br/><br/>
                                Quiet Enjoyment: All members and guests have the right to quiet enjoyment and any behavior that breaches this will not be condoned.<br/><br/>
                                Open Environment: This is an open office shared by many different persons and organizations. Anything said should be expected to be heard by others whether you like it or not.<br/><br/>
                                Internet / Network Usage: No spamming, posting or downloading files that you know or should know are illegal or that you have no rights to, or accessing any other device connected to the Sand Box network or the Internet you do not have permission to access. Usage of Internet for heavy downloading / uploading is not condoned and as such any acts which may affect the quality / usage of the service for other users would not be tolerated.<br/><br/>
                                Liability: All members and guests are responsible for their own belongings and actions. Should any action or inaction cause damage or cost to Sand Box then that cost will be levied to that member or members.<br/><br/>
                                Items / acts not allowed: Sand Box is a completely non-smoking zone. Any form of drugs, alcohol, and firearms are not allowed. Pets are not allowed. Any act that may damage anything in Sand Box, or create a disturbance for other users would also not be tolerated.<br/><br/>
                                Guests & Employee Policy: Any guests must be accompanied by a member at all times. A guest must be listed in the Guest Register before using any of the amenities. The inviting member will be responsible for their guest’s and/or employee's actions / expenses at all times. Sand Box does not hold any responsibility of any discussion(s), commitment(s), term(s), payment(s), or any other action(s) between member(s) and their guest(s) and employee(s).<br/><br/>
                                Renewal and Termination: Renewal is a privilege, not a right. Gross misconduct can result in immediate termination. In case of termination of membership from either side, advance notice of at least 15 days would be expected. All payments are nonrefundable except security deposit. All Sand Box management decisions are final.<br/><br/>
                                Changes to the AUP or Use of Service: Sand Box can make Changes with 30 days notice to the members. These will be emailed to all members and placed on the website along with written notices being provided to the resident members.<Br/><br>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="form-check">
                    <input type="checkbox" value="1" required class="form-check-input" name="terms_accept">
                    <label class="form-check-label" for="exampleCheck1">I have read and accecpt the AUP of Sand Box</label>
                </div>
                <br/>
                <input type="hidden" name="invitation_id" value="<?=intval($invitation_id)?>" />
                <button id="submitButton" type="submit" class="btn btn-primary">Submit</button>
                <p style="display:none;color:red;" id="loadingP"><br/>Please wait.. uploading pictures.. it will take a while..</p>
            </form>
        </div>
    </section>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; 2021 Sand Box</p>
        </div>
        <!-- /.container -->
    </footer>
</body>

</html>