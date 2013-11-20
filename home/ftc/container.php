<?php require_once '../../includes/setup-session.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Match Entry</title>
        <?php include '../../includes/headers.php'; ?>
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <!-- this will be reloaded with the pages when the submit button is clicked and stuff -->



                <div class="container">
    <div class="rosdfgw">
        <div class="span4 offset4">
            <h3 class="text-center">Autonomous: 7462</h3>
            <h4 class="text-center">Record points for each goal</h4>
            <p><button class="btn btn-large fullButton btn-primary" data-toggle="button">Can delay start?</button></p>
            <div class="btn-group">
                <button class="btn buttonGroupLeft btn-primary" id="addIrBeacon">IR Beacon<br>+40</button>
                <button class="btn buttonGroupRight btn-warning" id="removeIrBeacon"><i class="icon-minus-sign icon-white"></i></button>
            </div>
            <p class="totalSize" id="irBeaconTotal">0</p>
            <div class="btn-group">
                <button class="btn buttonGroupLeft btn-primary" id="addPendulum">Non-Beacon Pendulum Goal<br>+20</button>
                <button class="btn buttonGroupRight btn-warning"id="removePendulum">-</button>
            </div>
            <p class="totalSize" id="pendulumTotal">0</p>
            <div class="btn-group">
                <button class="btn buttonGroupLeft btn-primary"id="addFloor">Floor Goal<br>+5</button>
                <button class="btn buttonGroupRight btn-warning"id="removeFloor">-</button>
            </div>
            <p class="totalSize" id="floorTotal">0</p>
            <p>Robot On Bridge</p>
            <div class="btn-group" data-toggle="buttons" id="robotOnBridge">
                <label class="btn btn-primary">
                    <input type="radio" name="options" id="no">No
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="options" id="partially">Partially
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="options" id="completely">Completely
                </label>
            </div>
            <p class="textToButton">Total Points:</p>
            <p class="totalSize" id="totalPoints">0</p>
            <p></p>
            <div class="btn-group" data-toggle="buttons">
                <button type="checkbox" class="btn buttonGroup2Full btn-primary">Block Score Assist</button>
                <button type="checkbox" class="btn buttonGroup2Full btn-primary">Ramp Assist</button>
            </div>
            <p></p>
            <p><button class="btn btn-large fullButton btn-success">Continue to Driver Controlled</button>
        </div>fdg
    </div>
</div>
<script type="text/javascript">
    var irBeaconGoal = 0;
    var pendulumGoal = 0;
    var floorGoal = 0;
    var robotOnBridge = "No";

    $(function() {
        $("#addIrBeacon").click(function() {
            irBeaconGoal++;
            $("#irBeaconTotal").text(irBeaconGoal);
            updateTotals();
        });
    });

    $(function() {
        $("#removeIrBeacon").click(function() {
            if (irBeaconGoal > 0) {
                irBeaconGoal--;
                $("#irBeaconTotal").text(irBeaconGoal);
                updateTotals();
            }
        });
    });

    $(function() {
        $("#addPendulum").click(function() {
            pendulumGoal++;
            $("#pendulumTotal").text(pendulumGoal);
            updateTotals();
        });
    });

    $(function() {
        $("#removePendulum").click(function() {
            if (pendulumGoal > 0) {
                pendulumGoal--;
                $("#pendulumTotal").text(pendulumGoal);
                updateTotals();
            }
        });
    });

    $(function() {
        $("#addFloor").click(function() {
            floorGoal++;
            $("#floorTotal").text(floorGoal);
            updateTotals();
        });
    });

    $(function() {
        $("#removeFloor").click(function() {
            if (floorGoal > 0) {
                floorGoal--;
                $("#floorTotal").text(floorGoal);
                updateTotals();
            }sdfgds
        });
    });

    function updateTotals() {
        $("#totalPoints").text(irBeaconGoal * 40 + pendulumGoal * 20 + floorGoal * 5);
    }

    function submit() {
        $.ajax({
            url: 'ajax-submit.php',
            type: 'POST',
            data: {
                'irBeaconGoal': irBeaconGoal,
                'pendulumGoal': pendulumGoal,
                'floorGoal': floorGoal,
                'robotOnBridge': $('#floorTotal[type="options"]:checked').val()
            },
            success: function() {

            }
        });             }

</script>
            </div>
        </div>
    </body>
</html>
