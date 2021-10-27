<?php
// require_once('App/Http/Controllers/HomeController.php');
require_once('vendor/autoload.php');
$home = new \App\Http\Controllers\HomeController();
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000");

if($_SERVER['REQUEST_METHOD']==='POST'){
 
    $Name = $_POST['Name'];
    $Phone=$_POST['Phone'];
    $Email=$_POST['Email'];
    $Age=$_POST['Age'];
    $Des=$_POST['Des'];
    $result = $home->insert_user($Name,$Phone,$Email,$Age,$Des);
  
  }
$_POST = array();

$x = $home->index();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <div class="row">
  <h2>Thông tin người dùng  </h2>       
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Age</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($x as $key => $value) {
    $x = isset($value['id']);
    if($x) { 
      echo '<tr>
        <td>'. $value['Name'].'</td>
        <td>'.$value['Phone'].'</td>
        <td>'.$value['Email'].'</td>
        <td>'.$value['Age'].'</td>
        <td>'.$value['Des'].'</td>
      </tr>' ;
   
         }

        } ?>
    </tbody>
  </table>
    </div>
    <h2>Nhập thông tin người dùng</h2>
  <form class="was-validated" action=index.php method="post">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control"  required name="Name">
    </div>
    <div class="form-group">
      <label for="pwd">Phone:</label>
      <input type="text" class="form-control" required  name="Phone">
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="text" class="form-control" id="email" required    name="Email">
      <div class="valid-feedback" id="feedback">
      
      </div>
    </div>
    <div class="form-group">
    
      <label for="pwd">Age:</label>
      <div class="row">
      <select id="age" name="Age" style="margin-left: 10px;" class="form-control col-4">
      <option ></option>
      <option value="10-20">10-20</option>
      <option selected value="20-30">20-30</option>
      <option value="30-50">30-50</option>
     
      </select>
      <div class="col-4" id="showdetail">
      
      </div>
    </div>
    </div>
    <div class="form-group">
      <label for="pwd">Description:</label>
      <input type="text" class="form-control"  name="Des">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" >
    $(document).ready(function(){

        $('#email').keyup(function(){
            var x = $(this).val();
            const y = document.querySelector('#feedback')
            if(isEmail(x)){
                y.innerHTML =``;
            }else{
                y.innerHTML =`email in the form *@kyanon.digital`;
            }
        });
        $('#age').change(function(){
            var x = $(this).val();
            const y = document.querySelector('#showdetail')
            if(x == "10-20")
            {
                y.innerHTML =`  <input type="text" placeholder="Enter your age" class="form-control" id="agedetail">`;
            }else{
                y.innerHTML =``;
            }
        });

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@kyanon.digital/;
            return regex.test(email);
        }
        $('.btn').click(function(event) {
            var x = $('#email').val();
            var y = $('#agedetail').val();
            var z = $('#age').val();
            if(!isEmail(x)){
                event.preventDefault();
                alert('Email not match ! ');
               
            }if(y < 18){
                event.preventDefault();
                alert('Must be 18 years old !');
            }if(z==null ){
                event.preventDefault();
                alert('Select Your age ');
            }
        })
    });

</script>

</body>
</html>