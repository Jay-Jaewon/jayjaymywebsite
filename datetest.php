<?php
date_default_timezone_set('Asia/Seoul');

echo mb_strlen('안녕');

$timestamp = strtotime("-72 hours");
echo "현재로부터 3일 전 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

echo "현재 일시시시:".date("Y-m-d H:i:s");
$timestamp = strtotime("Now");
echo "현재 일시 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$ttimestamp = strtotime("+1 seconds");
echo "현재로부터 1초 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$tttimestamp = strtotime("-1 seconds");
echo "현재로부터 1초 앞 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("+1 minutes");
echo "현재로부터 1분 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("+1 hours");
echo "현재로부터 1시간 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("+1 days");
echo "현재로부터 1일 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("+1 week");
echo "현재로부터 1주 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("+1 months");
echo "현재로부터 1달 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("+1 years");
echo "현재로부터 1년 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("+4 years +3 months +2 days +1 hours");
echo "현재로부터 4년 3개월 2일 1시간 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("2001-01-01");
echo "2001년 1월 1일 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("2001-01-01 +1 months");
echo "2001년 1월 1일을 기준으로 1달 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("2001/01/01 +2 months");
echo "2001년 1월 1일을 기준으로 2달 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("20010101 +3 months");
echo "2001년 1월 1일을 기준으로 3달 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("2001/01/01 000000 +4 months");
echo "2001년 1월 1일을 기준으로 4달 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("+5 months", strtotime("2001/01/01 000000"));
echo "2001년 1월 1일을 기준으로 5달 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

$timestamp = strtotime("+6 months", strtotime("2001-01-01 00:00:00"));
echo "2001년 1월 1일을 기준으로 6달 뒤 : ".date("Y-m-d H:i:s", $timestamp)."<br/>";

?>