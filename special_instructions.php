<?php
require_once 'common.php';$msg='';if($_SERVER['REQUEST_METHOD']==='POST'){
 $id=filter_var($_POST['moving_id']??'',FILTER_VALIDATE_INT);$instructions=trim($_POST['instructions']??'');if(!$id||!$instructions||strlen($instructions)>5000)$msg='Select an event and enter instructions (up to 5000 characters).';else{
 $st=$pdo->prepare('INSERT INTO special_instructions (moving_id,instructions) SELECT moving_id,? FROM moving_events WHERE moving_id=? AND representative_id=? ON DUPLICATE KEY UPDATE instructions=VALUES(instructions)');$st->execute([$instructions,$id,$repId]);$msg=$st->rowCount()?'Special instructions saved.':'No matching moving event.';
 }}pageStart('Special Instructions for Move');if($msg)message($msg);echo '<form method="post">';eventSelect($pdo,$repId);echo '<label class="portal-field">Packing specifications and special requests<textarea name="instructions" rows="6" maxlength="5000" required></textarea></label>';submit('Save Instructions');pageEnd();
