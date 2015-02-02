<div id="pages-header">
</div><!--End of pages header-->
<?php
$page=isset($_GET['page_id'])?$_GET['page_id']:1;
if($page==4){include('blog_page.php');
}
elseif($page!==1 && $page!==4 && $page!==null){
	include('navigation_pages.php');

}


?>
