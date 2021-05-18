<!DOCTYPE html>
<html>

<head>
  <title>
    JavaScript
  | Set the value of an input field.
  </title>
</head>

<body style="text-align:center;" id="body">
  <h1 style="color:green;">
      GeeksForGeeks
    </h1>
  <input type='text' id='id1' />
  <br>
  <br>
  <button onclick="gfg_Run()">
    click to set
  </button>
  <p id="GFG_DOWN" style="color:green;
              font-size: 20px;
              font-weight: bold;">
  </p>
  <script>
    function showPosition() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                document.getElementById("result").innerHTML = positionInfo;
            });
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }
    var el_down = document.getElementById("GFG_DOWN");
    var inputF = document.getElementById("id1");

    function gfg_Run() {
      inputF.value = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
      el_down.innerHTML =
        "Value = " + "'" + inputF.value + "'";
    }
  </script>
  <div id="result">
        <!--Position information will be inserted here-->
    </div>
    <button type="button" onclick="showPosition();">Show Position</button>
    <form method="POST">
    <P>
        <input type="text" name="address" placeholder="Enter address">
    </P>
    <input type="submit" name="submit_address">
</form>
</body>

</html>
