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
                        <input type="email" class="form-control" id="selectDomain" list="domains" placeholder="" value=<?php
                                                                                                                if (isset($_GET["domain"])) {
                                                                                                                    echo '"' . $_GET["domain"] . '" disabled';
                                                                                                                }
                                                                                                                ?>>
                        <datalist id="domains">
                            <option selected value="">Choose...</option>
                        </datalist>
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
    <section>
    <div id="preview" class="container"></div>
    </section>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="custom.js"></script>

</html>