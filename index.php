<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
</head>

<body>
    <section>
        <div class="container">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="sendersname">Senders Name</label>
                        <input type="text" class="form-control " id="sendersname" placeholder="Name" value=<?php
                                                                                                                    if (isset($_GET["name"])) {
                                                                                                                        echo '"' . $_GET["name"] . '" disabled';
                                                                                                                    }
                                                                                                                    ?>>
                        <div id="msg1" class="">
                            
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sendersmail">Senders Mail Address</label>
                        <input type="email" class="form-control " id="sendersmail" placeholder="" value=<?php
                                                                                                                if (isset($_GET["mail"])) {
                                                                                                                    echo '"' . $_GET["mail"] . '" disabled';
                                                                                                                }
                                                                                                                ?>>
                        <div id="msg2" class="">
                            
                        </div>
                    </div>
                </div>
                <div class=" form-row">
                    <div class="form-group col-md-6">
                        <label for="selectDomain">Domains</label>
                        <select id="selectDomain" class="form-control ">
                            <option selected value="">Choose...</option>
                        </select>
                        <div id="msg3" class="">
                            
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="selectTemplate">Templates</label>
                        <select id="selectTemplate" class="form-control ">
                            <option selected value="">Choose...</option>
                        </select>
                        <div id="msg4" class="">
                            
                        </div>
                    </div>
                </div>
                <button id="sendmail" type="button" class="btn btn-primary">Send Mail</button>
            </form>
            <div id="alert" class="alert alert-success alert-dismissible fade my-2" role="alert">
                Mail Sent Successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </section>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        var tempData;
        $.ajax({
            type: "POST",
            url: 'getdomaindata.php', //the script to call to get data     
            dataType: 'json',
            success: function(data) //on recieve of reply
            {
                // console.log(data.length);
                // console.log(data);
                // console.log(data[0].domains);
                for (let index = 0; index < data.length; index++) {
                    $("#selectDomain").append("<option value='" + data[index].domains + "'>" + data[index].domains + "</option>");
                }
            },
            error: function(er) {
                console.log(er);
                console.log(er.responseText);

            }
        });

        $.ajax({
            type: "POST",
            url: 'gettemplatedata.php', //the script to call to get data     
            dataType: 'json',
            success: function(data) //on recieve of reply   
            {
                // console.log(data.length);
                // console.log(data);
                tempData = data;
                for (let index = 0; index < data.length; index++) {
                    $("#selectTemplate").append("<option value='" + data[index].template_name + "'>" + data[index].template_name + "</option>");
                }
            },
            error: function(er) {
                console.log(er);
                console.log(er.responseText);
            }
        });

        $("#selectDomain").change(function() {
            domainValue = $("#selectDomain").val();
            if (domainValue == "") {
                $("#selectDomain").removeClass("is-valid");
                $("#msg3").removeClass("valid-feedback");
                $("#selectDomain").addClass("is-invalid");
                $("#msg3").addClass("invalid-feedback");
                $("#msg3").html('Select any domomain');
            } else {
                $("#selectDomain").removeClass("is-invalid");
                $("#msg3").removeClass("invalid-feedback");
                $("#selectDomain").addClass("is-valid");
                $("#msg3").addClass("valid-feedback");
                $("#msg3").html('Looks Good !');
            }
        });

        $("#selectTemplate").change(function() {
            template_name = $("#selectTemplate").val();
            if (template_name == "") {
                $("#selectTemplate").removeClass("is-valid");
                $("#msg4").removeClass("valid-feedback");
                $("#selectTemplate").addClass("is-invalid");
                $("#msg4").addClass("invalid-feedback");
                $("#msg4").html('Select any domomain');
            } else {
                $("#selectTemplate").removeClass("is-invalid");
                $("#msg4").removeClass("invalid-feedback");
                $("#selectTemplate").addClass("is-valid");
                $("#msg4").addClass("valid-feedback");
                $("#msg4").html('Looks Good !');
            }
        });

        $("#sendmail").click(function() {
            if ($("#sendersname").val() == "") {
                $("#sendersname").removeClass("is-valid");
                $("#msg1").removeClass("valid-feedback");
                $("#sendersname").addClass("is-invalid");
                $("#msg1").addClass("invalid-feedback");
                $("#msg1").html('Enter Name !');
                return false;
            } else {
                $("#sendersname").removeClass("is-invalid");
                $("#msg1").removeClass("invalid-feedback");
                $("#sendersname").addClass("is-valid");
                $("#msg1").addClass("valid-feedback");
                $("#msg1").html('Looks Good !');
                sname = $("#sendersname").val();
            }
            if ($("#sendersmail").val() == "") {
                $("#sendersmail").removeClass("is-valid");
                $("#msg2").removeClass("valid-feedback");
                $("#sendersmail").addClass("is-invalid");
                $("#msg2").addClass("invalid-feedback");
                $("#msg2").html('Select any domomain');
                return false;
            } else {
                $("#sendersmail").removeClass("is-invalid");
                $("#msg2").removeClass("invalid-feedback");
                $("#sendersmail").addClass("is-valid");
                $("#msg2").addClass("valid-feedback");
                $("#msg2").html('Looks Good !');
                mail = $("#sendersmail").val();
            }
            if ($("#selectDomain").val() == "") {
                $("#selectDomain").removeClass("is-valid");
                $("#msg3").removeClass("valid-feedback");
                $("#selectDomain").addClass("is-invalid");
                $("#msg3").addClass("invalid-feedback");
                $("#msg3").html('Select any domomain');
                return false;
            } else {
                $("#selectDomain").removeClass("is-invalid");
                $("#msg3").removeClass("invalid-feedback");
                $("#selectDomain").addClass("is-valid");
                $("#msg3").addClass("valid-feedback");
                $("#msg3").html('Looks Good !');
                dname = $("#selectDomain").val();
            }
            if ($("#selectTemplate").val() == "") {
                $("#selectTemplate").removeClass("is-valid");
                $("#msg4").removeClass("valid-feedback");
                $("#selectTemplate").addClass("is-invalid");
                $("#msg4").addClass("invalid-feedback");
                $("#msg4").html('Select any domomain');
                return false;
            } else {
                $("#selectTemplate").removeClass("is-invalid");
                $("#msg4").removeClass("invalid-feedback");
                $("#selectTemplate").addClass("is-valid");
                $("#msg4").addClass("valid-feedback");
                $("#msg4").html('Looks Good !');
                tname = $("#selectTemplate").val();
            }

            console.log(sname, mail, dname, tname);
            $("#alert").removeClass("show");
            $("#sendmail").html('Sending Mail...<div id="loader" class="spinner-border spinner-border-sm text-light ml-2"  role="status"><span class="sr-only">Loading...</span></div>');

            $.ajax({
                type: "POST",
                url: 'sendmail.php', //the script to call to get data  
                data: {
                    name: sname,
                    mail: mail,
                    domain: dname,
                    template: tname,
                },
                dataType: 'json',
                success: function(data) //on recieve of reply
                {
                    // console.log(data.length);
                    console.log(data);
                    if(data==1){
                        $("#sendmail").html('Send Mail');
                        $("#alert").addClass("show");
                        $("#selectTemplate").removeClass("is-valid");
                        $("#msg4").removeClass("valid-feedback");
                        $("#selectDomain").removeClass("is-valid");
                        $("#msg3").removeClass("valid-feedback");
                        $("#sendersmail").removeClass("is-valid");
                        $("#msg2").removeClass("valid-feedback");
                        $("#sendersname").removeClass("is-valid");
                        $("#msg1").removeClass("valid-feedback");
                        $("#msg1").html('');
                        $("#msg2").html('');
                        $("#msg3").html('');
                        $("#msg4").html('');
                    }
                },
                error: function(er) {
                    console.log(er);
                    console.log(er.responseText);
                }
            });
        });

        $("#alertclose").click(function(){
            $("#alert").removeClass("show");
            
        })
    });
</script>

</html>