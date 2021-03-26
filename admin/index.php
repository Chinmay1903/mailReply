<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="custom.css">
</head>

<body>
  <div class="container-flex">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Admin Panel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i> Logout <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
    <section>
      <div class="container-flex mt-2">
        <div class="row w-100 d-flex justify-content-around">
          <div class="col-7 table-responsive">
            <table id="templatetable" class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Sl No.</th>
                  <th scope="col">Template Name</th>
                  <th scope="col">Template</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4" class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#addtemplateModal"><i class="fa fa-plus"></i> Add Template</button></td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="col-3 table-responsive-md">
            <table id="domaintable" class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Sl No.</th>
                  <th scope="col">Domain</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3" class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#adddomainModal"><i class="fa fa-plus"></i> Add Domain</button></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section>

    <!-- Add Template Modal -->
    <div class="modal fade" id="addtemplateModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Enter Template</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="domain">Enter New Template Name</label>
                <input id="templatename" type="email" class="form-control" id="domain" aria-describedby="domainlHelp" placeholder="Enter Domain">
                <div id="msgt1" class="">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Enter Template</label>
                <textarea id="templatebody" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <div id="msgt2" class="">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button id="addtemplate" type="button" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
  </div>

    <!-- Add Domain Modal -->
    <div class="modal fade" id="adddomainModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Modal Header</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="domain">Enter New Domain</label>
                <input type="email" class="form-control" id="domain" aria-describedby="domainlHelp" placeholder="Enter Domain">
                <div id="msgd" class="">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button id="adddomain" type="button" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="custom.js"></script>
</html>