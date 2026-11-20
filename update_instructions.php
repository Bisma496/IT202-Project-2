<?php
require_once 'common.php';$msg='';if($_SERVER['REQUEST_METHOD']==='POST'){
 $id=filter_var($_POST['moving_id']??'',FILTER_VALIDATE_INT);$instructions=trim($_POST['instructions']??'');if(!$id||!$instructions||strlen($instructions)>5000)$msg='Select an event and enter valid instructions.';else{
 $st=$pdo->prepare('UPDATE special_instructions s JOIN moving_events m ON m.moving_id=s.moving_id SET s.instructions=? WHERE s.moving_id=? AND m.representative_id=?');$st->execute([$instructions,$id,$repId]);$msg=$st->rowCount()?'Special instructions updated.':'No changes made. Make sure the event has existing instructions.';
 }}pageStart('Update Special Instructions');if($msg)message($msg);echo '<form method="post">';eventSelect($pdo,$repId);echo '<label class="portal-field">Revised special instructions<textarea name="instructions" rows="6" maxlength="5000" required></textarea></label>';submit('Update Instructions');pageEnd();
