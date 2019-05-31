<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Generate coordinates</button>

<form action="/test/output">
    @csrf
    Title <input type="text" name="title" > <br>
    photo id <input type="text" name="photo_id" > <br>
    cat id <input type="text" name="category_id" > <br>
    <input type="hidden" id="lat" name="lat"> <br>
    <input type="hidden" id="lng" name="lng" > <br>
    <input type="submit" value="Report" >
</form>

<p id="demo"></p>

<script>
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setLat);
            navigator.geolocation.getCurrentPosition(setLng);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function setLat(position) {
        document.getElementById('lat').value = position.coords.latitude;
    }

    function setLng(position) {
        document.getElementById('lng').value = position.coords.longitude;
    }
</script>

</body>
</html>