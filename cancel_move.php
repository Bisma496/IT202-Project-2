<?php
require_once 'common.php';$msg='';if($_SERVER['REQUEST_METHOD']==='POST'){
 $id=filter_var($_POST['moving_id']??'',FILTER_VALIDATE_INT);if($id){$st=$pdo->prepare('DELETE FROM moving_events WHERE moving_id=? AND representative_id=?');$st->execute([$id,$repId]);$msg=$st->rowCount()?'Moving event cancelled successfully.':'Event not found for your account.';}else $msg='Select a valid moving event.';
}pageStart('Cancel Client Moving Event');if($msg)message($msg);echo '<form method="post">';eventSelect($pdo,$repId);submit('Cancel Moving Event');pageEnd();
