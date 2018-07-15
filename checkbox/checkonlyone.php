<!doctype html>
<html>
  <head>
    <title>Test</title>
  </head>
<body>
<script type="text/javascript">
  function KeepCount()  { 
    var elements = document.getElementsByName("model_selection[]");
    var total = 0;
    for(var i in elements) {
        var element = elements[i];
        if(element.checked) total++;
        if(total>=2) {
            alert("pick one please");
            element.checked = false;
            return false;    
        }
    }
  } 
  </script>
  <form action="car_model.php" method="post" name="car_form" id="car_form">
  <p class="normal_text"><input type="checkbox" name="model_selection[]" value="id1" onclick="return KeepCount()"></p>
  <p class="normal_text"><input type="checkbox" name="model_selection[]" value="id2" onclick="return KeepCount()"></p>
  <p class="normal_text"><input type="checkbox" name="model_selection[]" value="id3" onclick="return KeepCount()"></p>
  <p class="normal_text"><input type="checkbox" name="model_selection[]" value="id4" onclick="return KeepCount()"></p>
  <p class="normal_text"><input type="checkbox" name="model_selection[]" value="id5" onclick="return KeepCount()"></p>
  <p class="normal_text"><input type="checkbox" name="model_selection[]" value="id6" onclick="return KeepCount()"></p>
  </form>
</body>
</html>