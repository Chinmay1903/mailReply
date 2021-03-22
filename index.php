<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <section>
        <div class="container">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Senders Name</label>
                        <input type="text" class="form-control" id="sendersname" placeholder="Name" value="<?php
                                                                                                            if (isset($_GET["name"])) {
                                                                                                                echo $_GET["name"];
                                                                                                            }
                                                                                                            ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Senders Mail Address</label>
                        <input type="email" class="form-control" id="sendersmail" placeholder="" value="<?php
                                                                                                        if (isset($_GET["mail"])) {
                                                                                                            echo $_GET["mail"];
                                                                                                        }
                                                                                                        ?>">>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="selectDomain">Domains</label>
                        <select id="selectDomain" class="form-control">
                            <option selected value="">Choose...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="selectTemplate">Templates</label>
                        <select id="selectTemplate" class="form-control">
                            <option selected value="">Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Send Mail</button>
            </form>
        </div>
    </section>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
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
                console.log(data.length);
                console.log(data);
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
            domainValue = $("#selectDomain").val()
            if (domainValue == "") {} else {
                console.log(domainValue);
            }
        });

        $("#selectTemplate").change(function() {
            
        });
    });
</script>

</html>