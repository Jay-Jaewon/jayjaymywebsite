<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        function getVote(int) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById("poll").innerHTML = this.responseText;
                }
            };
            // xmlhttp.open("GET","poll_vote.php?vote="+int, true);
            // xmlhttp.send();
            //post test
            xmlhttp.open("POST","poll_vote.php", true);
            xmlhttp.send("vote="+int);

        }
    </script>
</head>
<body>

<div id="poll">
    <h3>Do you like PHP ans AJAX so far?</h3>
    <form>
        Yes : <input type="radio" name="vote" value="0" onclick="getVote(this.value)"><br>
        No : <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
    </form>
</div>

</body>
</html>