<div id="footer">
<div id="social">
<?php

$social=new Settings();
$social->name="fb";
echo "<a href=\"";
$social->show_social();
echo "\" target=\"new\"><i class=\"fa fa-facebook-square\"></i></a>";

$social=new Settings();
$social->name="tw";
echo "<a href=\"";
$social->show_social();
echo "\" target=\"new\"><i class=\"fa fa-twitter-square\"></i></a>";

$social=new Settings();
$social->name="in";
echo "<a href=\"";
$social->show_social();
echo "\" target=\"new\"><i class=\"fa fa-linkedin-square\"></i></a>";



?>

</div>
</div>