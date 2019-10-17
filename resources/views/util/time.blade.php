<div id="time" style="
    color: white;
    background: rgba(52, 144, 220, 0.9) !important;
    padding: 10px;
    text-align: center;
" ></div>

<script type="text/javascript">
    function showTime(){
        var date = new Date(),
            utc = new Date(Date.UTC(
                date.getFullYear(),
                date.getMonth(),
                date.getDate(),
                date.getHours(),
                date.getMinutes(),
                date.getSeconds()
            ));
        document.getElementById('time').innerHTML = utc.toLocaleDateString() + " " + utc.toLocaleTimeString();
    }
    setInterval(showTime, 1000);
</script>