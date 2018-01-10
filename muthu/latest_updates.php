<!DOCTYPE html>
<title> Marque Test</title>
<head>
    <script type="text/javascript" src="js/countdown.js"></script>
</head>
<body>
    <div>
        <script type="application/javascript">

            var myCountdownTest = new Countdown({
            year	: 2013,
            month	: 7, 
            day		: 16,
            width	: 200, 
            height	: 40
            });



        </script>
    </div>
<marquee id="marqueetest" direction="up" onmouseout="this.start();" onmouseover="this.stop();" >
    <strong>
        <p><a href="#">Kurangani Premier League (KPL).</a></p><br>
        <p><a href="#"> Temple Festival - July-2013</a></p><br>
        <p><a href="#">Get Notifications from our site related recent notifications.</a></p>
    </strong>
</marquee>
</body>
</html>
