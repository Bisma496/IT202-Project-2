<?php
session_start();require_once 'db_connect.php';
if($_SERVER['REQUEST_METHOD']!=='POST'){header('Location: index.html');exit;}
$first=trim($_POST['first_name']??'');$last=trim($_POST['last_name']??'');$id=trim($_POST['representative_id']??'');$phone=trim($_POST['phone']??'');$pass=$_POST['password']??'';$email=trim($_POST['email']??'');$confirm=isset($_POST['email_confirmation']);
$allowed=['search_account.php','book_move.php','cancel_move.php','special_instructions.php','update_instructions.php','add_client.php'];$destination=$_POST['transaction']??'';
if(!$first||!$last||!preg_match('/^\d{4}$/',$id)||!$phone||!$pass||!in_array($destination,$allowed,true)||($confirm&&!filter_var($email,FILTER_VALIDATE_EMAIL))){http_response_code(400);exit('Invalid form data. <a href="index.html">Try again</a>');}
$stmt=$pdo->prepare('SELECT * FROM representatives WHERE representative_id=? AND first_name=? AND last_name=? AND phone=?');$stmt->execute([$id,$first,$last,$phone]);$rep=$stmt->fetch();
if(!$rep||!password_verify($pass,$rep['password'])||($confirm&&strcasecmp($email,$rep['email'])!==0)){http_response_code(401);exit('Invalid representative credentials. <a href="index.html">Try again</a>');}
session_regenerate_id(true);$_SESSION['representative_id']=(int)$rep['representative_id'];$_SESSION['representative_name']=$rep['first_name'].' '.$rep['last_name'];header('Location: '.$destination);exit;
