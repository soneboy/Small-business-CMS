 
<div id="pages_wrapper">
 <div id="navigation_pages">
<?php
$navigation_page=new Pages();
$page_id=isset($_GET['page_id'])?$_GET['page_id']:null;
$navigation_page->find_page($page_id);
echo $navigation_page->content;


?>
</div><!--#navigation_pages-->
</div><!--#pages_wrapper-->