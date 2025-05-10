<!DOCTYPE html>
<html lang="en" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Profile - Sand Box</title>
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
    <header class="py-5 bg-image-full" style="background-image: url('http://sandbox.com.pk/photo-gallery/13.jpg');">
        <img class="img-fluid d-block mx-auto" src="<?=base_url()?>admin_assets/img/logo-big.jpg" alt="">
    </header>
    
    <!-- Content section -->
    <section class="py-5">
        <div class="container">
            <h1>Update Your Sand Box Profile</h1>
            <br/><Br/>
            <form id="signupForm" method="post" action="<?=base_url()?>home/signup/<?=base64_encode(intval($invitation_id))?>" onsubmit="return validateForm(event)">
                <legend>Business Details</legend>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Name</label>
                            <input type="text" disabled required name="team_name" class="form-control" aria-describedby="companyHelp" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nature Of Business</label>
                            <input type="text" disabled name="bussiness" required class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name of Designated Person</label>
                            <input type="text" disabled value="<?=$full_name?>" required name="team_owner" class="form-control" aria-describedby="desgneeHelp" placeholder="">
                        </div>
                    </div>  
                </div>  
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" disabled value="<?=$email_adress?>" required name="owner_email" class="form-control" aria-describedby="emailHelp" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Number</label>
                            <input type="number" disabled value="<?=$contact_number?>" required name="owner_contact" aria-describedby="contactHelp" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
                <br/><br/>
                <legend>Verification Details</legend>
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Photo</label>
                        </div>
                    </div>
                    <div class="col-md-offset-6 col-md-2 col-xs-6">
                        <img src="" class="img-fluid" id="pictureImage" alt="The screen capture will appear in this box.">
                    </div>
                </div>
                <div class="row">    
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">CNIC Front</label>
                        </div>
                    </div>
                    <div class="col-md-offset-6 col-md-2 col-xs-6">
                        <img src="" class="img-fluid" id="pictureImage" alt="The screen capture will appear in this box.">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">CNIC Back</label>
                        </div>
                    </div>
                    <div class="col-md-offset-6 col-md-2 col-xs-6">
                        <img src="" class="img-fluid" id="pictureImage" alt="The screen capture will appear in this box.">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Legal Contract</label>
                        </div>
                    </div>
                    <div class="col-md-offset-6 col-md-2 col-xs-6">
                        <a>Download Contract</a>
                    </div>
                </div>
                <br/><br/>
                <legend>In Case of Emergency</legend>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="companyHelp">Name of Person</label>
                            <input disabled type="text" required name="emergencyPerson" class="form-control" aria-describedby="emergencyHelp" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Conact Number</label>
                            <input disabled type="text" required class="form-control" name="emergencyContact" placeholder="">
                        </div>
                    </div>
                </div>
                
                <br/><br/>
                <legend>Introduction</legend>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">About</label>
                            <textarea></textarea>
                            <small id="companyHelp" class="form-text text-muted">Give us a short intro about yourself / your company</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Website</label>
                            <input type="text" name="bussiness" required class="form-control" placeholder="">
                            <small id="companyHelp" class="form-text text-muted">Link of your personal portfolio, blog or company website</small>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Upwork</label>
                            <input type="text" name="bussiness" required class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">LinkedIn</label>
                            <input type="text" name="bussiness" required class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="1" required class="form-check-input" name="terms_accept">
                    <label class="form-check-label" for="exampleCheck1">Display my profile information on SandBox website</label>
                </div>
                <br/>
                <legend>Team Members</legend>
                
                <input type="hidden" name="team_id" value="<?=intval($invitation_id)?>" />
                <button id="submitButton" type="submit" class="btn btn-primary">Submit</button>
                <p style="display:none;color:red;" id="loadingP"><br/>Please wait.. uploading pictures.. it will take a while..</p>
            </form>
        </div>
    </section>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; 2020 Sand Box</p>
        </div>
        <!-- /.container -->
    </footer>
</body>

</html>