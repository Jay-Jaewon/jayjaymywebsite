<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        function showHint(str) {
            //first check inf the input field is empty. If it is, clear the content of txtHint placeHolder and exit the function
            if (str.length == 0){
                document.getElementById("txtHint").innerText = "";
                return;
            } else {
                //however if it is not

                //Create an XMLHttpRequest object.
                var xmlhttp = new XMLHttpRequest();

                //Create the function to be executed when the server response is ready
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerText = this.responseText;
                    }
                };
                //Send the request off to a PHP file (gethtin.php) on the server
                //Notice that q parameter is added to the url (gethint.php?q="+str)
                xmlhttp.open("GET", "gethint.php?q=" + str, true);
                xmlhttp.send();

                //And ther str varialbe holds the content of the input field;
            }
        }
    </script>
</head>
<body>

<p><b>Start typing a name in the input field below: </b></p>
<form action="">
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
</form>
<p>Suggestions : <span id="txtHint"></span></p>
<p style="font-size: 20px; ">테스트</p>
<?php
echo stristr("Hello world!", "WORLD");
?>
</body>
</html>