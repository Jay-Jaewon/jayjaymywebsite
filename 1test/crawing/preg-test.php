<?php

preg_match_all("|<[^>]+>(.*)<[^>]+>|U",
"<b>exmaple: </b><div align=left>this is a test</div>",
$out, PREG_PATTERN_ORDER);
echo $out[0][0] . ", " . $out[0][1] . "\n";
echo $out[1][0] . ", " . $out[1][1] . "\n";

$html = "<b>bold text</b><a href=howdy.html>click me</a>";
preg_match_all("/(<([\w]+)[^>]*>)(.*?)(<\/\\2>)/",$html, $matches, PREG_PATTERN_ORDER);

foreach ($matches as $val){
    echo "matched : " .$val[0] . "\n";
    echo "part 1: " . $val[1] . "\n";
    echo "part 1: " . $val[2] . "\n";
    echo "part 1: " . $val[3] . "\n";
    echo "part 1: " . $val[4] . "\n\n";
}

$subject = '<ul>
	<li><a href="/#issuebar">메인기사</a></li>
	<li><a href="/#special-article-section">특집기사</a></li>
	<li><a class="toggle-recommand" href="/#shortcut-recommand">추천기사</a></li>
	<li><a href="/9_subscribe.php?from=mainNav">정기구독</a></li>
	<li><a href="/B_support.php?from=mainNav">후원</a></li>
</ul>';
$pattern = '/"\/#(.+)"/';
preg_match_all($pattern, $subject, $matches1, PREG_PATTERN_ORDER);
preg_match_all($pattern, $subject, $matches2, PREG_SET_ORDER);
preg_match_all($pattern, $subject, $matches3, PREG_OFFSET_CAPTURE);
echo '<pre>';
echo '<h1>$subject : </h1>';
print_r(htmlspecialchars($subject));
echo '<h1>PREG_PATTERN_ORDER : </h1>';
print_r($matches1);
echo $matches1[0][0];
echo '<h1>PREG_SET_ORDER : </h1>';
print_r($matches2);
echo '<h1>PREG_OFFSET_CAPTURE : </h1>';
print_r($matches3);
echo '</pre>';




?>