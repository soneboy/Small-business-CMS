

<div id="edit_gallery">
<div id="edit_gallery_heading">
<h2>Edit gallery</h2>
</div><!--#edit_gallery_heading-->
 <div id="upload_photo">
   <div id="heading_upload">
   <h2>Upload photo</h2>
   </div><!--#heading_upload-->
 <form method="post" enctype="multipart/form-data">
 <input type="hidden" name="MAX_FILE_SIZE" value="5500000" />
 <input type="file" name="file_upload" />
 <input type="submit" name="upload" value="Upload" />
</form>

</div><!--#upload_photo-->
<div id="edit_main">
<?php
 $homepage_photo=new Photos();
if(isset($_POST['upload'])){
     $file=array();
     $file=isset($_FILES['file_upload'])?$_FILES['file_upload']:null;
   
    
     $homepage_photo->name=$file['name'];
     $homepage_photo->size=$file['size'];
     $homepage_photo->type=$file['type'];
     $homepage_photo->error=$file['error'];
     $homepage_photo->tmp_path=$file['tmp_name'];
     $homepage_photo->check_image();
     $length=strlen($homepage_photo->name);

     if($homepage_photo->count_homepage_photos()>=9){

        echo "Only 9 photos is allowed for upload!";
     }
     elseif($homepage_photo->error>0){

           $homepage_photo->dispaly_errors();
     }
     elseif($homepage_photo->check_image()){

        echo "Image ".$homepage_photo->name." already exists!";
     }
     elseif($length > 15){

        echo "Image name is to long!";
     }

     elseif($homepage_photo->type!="image/jpeg" &&
            $homepage_photo->type!="image/png"  &&
            $homepage_photo->type!="image/gif"){

        echo "File ".$homepage_photo->name." is not image file,please upload only images!";

     }
   
     else{
     $homepage_photo->upload_photo();
     }



}
  $homepage_photo->move_photo();
  $homepage=isset($_GET['id'])?$_GET['id']:null;
  $homepage_photo->display_gall_for_admin();
 ?>
</div><!--#edit_main-->

  
  </div><!--#edit_gallery-->