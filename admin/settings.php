<div id="settings">
<i class="fa fa-code" style="color:black;font-size:300%;margin-bottom:20px;"> Settings</i><br/>
<div id="settings_board">
<h1>Title tag</h1>
<div class="settings_table">
 <table>
 <form method="post">
  <tr>
    <td>Site name: </td>
    <td><input type="text" name="site_title"></td>
    <td><button type="submit" name="change_site_title">Change</button></td>
   </tr>
  </form>
  </table>
  </div>
  <?php
        $title=new Settings();
        if(isset($_POST['change_site_title'])){
        $title->value=isset($_POST['site_title'])?$_POST['site_title']:null;
        $title->change_title();
      }
        ?>
  

  <h1>Loogo image</h1>
  <?php
  if(isset($_POST['change_logo'])){
    $file=array();
    $file=isset($_FILES['logo'])?$_FILES['logo']:null;
    $value=$file['name'];
    $path=$file['tmp_name'];
    $type=$file['type'];
    if($type !== 'image/jpeg' && $type !== 'image/png' && $type !== 'image/gif'){
      echo "Please upload only image file!";
    }
    else{
    Photos::change_logo($value,$path);
    Database::redirect_to('panel.php?id=settings');
  }
  }


  ?>
  <div class="settings_table">
 <table>
 <form method="post" enctype="multipart/form-data">
    <td>Logo: </td>
    <td><input type="file"    name="logo"></td>
    <td><button type="submit" name="change_logo">Change</button></td>
   </tr>
  </form>
  </table>
  <?php echo "<img src=\"../img/";
        Photos::show_logo();
        echo "\" />";
  ?>
  </div>
<h1>Favicon icons</h1>
 <div class="settings_table">
 <table>
 <form method="post">
  <tr>
    <td>Service one: </td>
   <td><input type="text" name="service_one"  placeholder="Enter fa-fa icon"></td>
    <td><button type="submit" name="change_service1">Change</button></td>
   </tr>
  </form>
  </table>
  </div>
<?php
      $service=new Settings();
      if(isset($_POST['change_service1'])){
        $service->value=isset($_POST['service_one'])?$_POST['service_one']:null;
        $service->name="service1";
        $service->change_service();
      }

?>
  <div class="settings_table">
  <table>
 <form method="post">
  <tr>
    <td>Service two: </td>
    <td><input type="text" name="service_two"  placeholder="Enter fa-fa icon"></td>
    <td><button type="submit" name="change_service2">Change</button></td>
   </tr>
  </form>
  </table>
  </div>
  <?php
      
      if(isset($_POST['change_service2'])){
        $service->value=isset($_POST['service_two'])?$_POST['service_two']:null;
        $service->name="service2";
        $service->change_service();
      }

?>
<div class="settings_table">
  <table>
 <form method="post">
  <tr>
    <td>Service three: </td>
    <td><input type="text" name="service_three" placeholder="Enter fa-fa icon"></td>
    <td><button type="submit" name="change_service3">Change</button></td>
   </tr>
  </form>
  </table>
  </div>
  <?php
      
      if(isset($_POST['change_service3'])){
        $service->value=isset($_POST['service_three'])?$_POST['service_three']:null;
        $service->name="service3";
        $service->change_service();
      }

?>
<h1>Social media</h1>
 <div class="settings_table">
 <table>
 <form method="post">
  <tr>
    <td><i class="fa fa-facebook-square"></i></td>
   <td><input type="text" name="fb"  placeholder="Enter your Facebook URL"></td>
    <td><button type="submit" name="change_fb">Change</button></td>
   </tr>
  </form>
  </table>
  </div>
<?php
$social=new Settings();
if(isset($_POST['change_fb'])){
  $social->value=isset($_POST['fb'])?$_POST['fb']:null;
  $social->name="fb";
  $social->change_social();

}
?>

<div class="settings_table">
 <table>
 <form method="post">
  <tr>
    <td><i class="fa fa-twitter-square"></i></td>
   <td><input type="text" name="tw"  placeholder="Enter your Twitter URL"></td>
    <td><button type="submit" name="change_tw">Change</button></td>
   </tr>
  </form>
  </table>
  </div>
<?php

if(isset($_POST['change_tw'])){
  $social->value=isset($_POST['tw'])?$_POST['tw']:null;
  $social->name="tw";
  $social->change_social();
  
}
?>
  <div class="settings_table">
 <table>
 <form method="post">
  <tr>
    <td><i class="fa fa-linkedin-square"></i></td>
   <td><input type="text" name="in"  placeholder="Enter your Linkedin URL"></td>
    <td><button type="submit" name="change_in">Change</button></td>
   </tr>
  </form>
  </table>
  </div>
<?php

if(isset($_POST['change_in'])){
  $social->value=isset($_POST['in'])?$_POST['in']:null;
  $social->name="in";
  $social->change_social();
  
}
?>

</div>


</div><!--#settings