<?php
$password = "12341234a";
$password_hash = hash("sha256", $password);
$password_hash1 = base64_encode(hash('sha256',"$password",true));
$password_hash2 = hash('sha256',"$password",true);
echo "해싱 전 : ".$password."<br/>";

echo "해싱 후 : ".$password_hash."<br/>";
$length = strlen($password_hash);
echo "길이 : ".$length."<br/>";

echo "다른방법 해싱 후 : ".$password_hash1."<br/>";

echo "다른방법 해싱 후 2 : ".$password_hash2."<br/>";

?>