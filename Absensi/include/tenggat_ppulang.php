<script type="text/javascript">
	function showTime() {
		var a_p = "";
		var today = new Date();
		var curr_hour = today.getHours();
		var curr_minute = today.getMinutes();
		var curr_second = today.getSeconds();
		curr_hour = checkTime(curr_hour);
		curr_minute = checkTime(curr_minute);
		curr_second = checkTime(curr_second);
        if(curr_hour=='12' && curr_minute=='00') window.location.href = "pulang";

		}

		function checkTime(i) {
		    if (i < 10) {
		        i = "0" + i;
		    }
		    return i;
		}
        
        
        // else if(curr_hour=='22' && curr_minute=='29') window.location.href = 'masuk';

		setInterval(showTime, 500);
</script>