<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie Counter</title>
    <link rel="stylesheet" href="CCSS.css"> <!-- link css for calorie counter idea -->
</head>
<body>

    <div class="container">
        <h2>Calorie Counter</h2>
        <form method="POST">
            <label>Breakfast:</label>
            <input type="number" name="breakfast" placeholder="Enter calories" required>

            <label>Lunch:</label>
            <input type="number" name="lunch" placeholder="Enter calories" required>

            <label>Dinner:</label>
            <input type="number" name="dinner" placeholder="Enter calories" required>

            <label>Snacks:</label>
            <input type="number" name="snacks" placeholder="Enter calories" required>

            <label>Daily Calorie Goal:</label>
            <input type="number" name="goal" placeholder="Enter goal" required>

            <button type="submit" name="submit">Submit</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $breakfast = isset($_POST['breakfast']) ? intval($_POST['breakfast']) : 0;
            $lunch = isset($_POST['lunch']) ? intval($_POST['lunch']) : 0;
            $dinner = isset($_POST['dinner']) ? intval($_POST['dinner']) : 0;
            $snacks = isset($_POST['snacks']) ? intval($_POST['snacks']) : 0;
            $goal = isset($_POST['goal']) ? intval($_POST['goal']) : 0;

            // Calculate total calories
            $total = $breakfast + $lunch + $dinner + $snacks;
            echo "<div class='result'>Total for today: $total calories</div>";

            // Compare with goal
            if ($goal > 0) {
                $difference = $total - $goal;
                if ($difference > 0) {
                    echo "<div class='result' style='color: red;'>Over by $difference calories</div>";
                } else {
                    echo "<div class='result' style='color: green;'>Under by " . abs($difference) . " calories</div>";
                }
            }
        }
        ?>
    </div>

<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
