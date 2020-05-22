<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST" onsubmit="return checksku('1')">
  <label for="fname">First name:</label><br>
  <div id="nameerror"></div>
  <input type="text" id="fname" name="fname" value="John"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br><br>
  <input type="submit" value="Submit">
</form> 

<script>
    function callAjaxFunc(skuid,sku,callback)
    {  
            var xhttp = new XMLHttpRequest();
            alert('t1');
            xhttp.open("POST", "skus.php", false); 
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.onload = function (e) {
                if (xhttp.readyState === 4) {
                    if (xhttp.status === 200) {
                        alert('t4');
                    console.log(xhttp.responseText);
                    callback(xhttp.responseText)
                    } else {
                    console.error(xhttp.statusText);
                    callback(xhttp.statusText)
                    }
                }
            }.bind(this); 
            alert('t2'); 
            xhttp.onerror = function (e) {
            console.error(xhttp.statusText);
            };
            xhttp.send('skuid=' + skuid + '&sku=' + encodeURIComponent(sku)); 
            alert('t3'); 
    }
    function checksku(skuid) { 
    let fname = document.getElementById('fname').value.trim(); 
    if(fname == ""){
        document.getElementById('nameerror').innerHTML = 'Error';
        return false;
    } 
    alert('before call');
    callAjaxFunc("1","2",function(d){
        alert(d);
    });
    alert('after call');
}
</script> 
    
</body>
</html> 