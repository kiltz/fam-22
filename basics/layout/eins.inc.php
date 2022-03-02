<h2>Eins</h2>
<div id="ausgabe"></div>

<script type="application/javascript">
    $( document ).ready( startInterval );

    var zaehler = 10;
    var intervalHandler = null;
    function startInterval() {
        zaehler = 10;
        intervalHandler = window.setInterval("countDown()", 1000);
    }

    function countDown() {
        $("#ausgabe").html(zaehler+"...");
        --zaehler;
        if (zaehler == -1) {
            $("#ausgabe").html("Boom");
            window.clearInterval(intervalHandler);

            window.setTimeout("startInterval()", 5000);
        }
    }
</script>

