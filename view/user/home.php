<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<style>
* {    box-sizing: border-box;
}

body {    margin: 0;    font-family: Courier;    font-size:16px;
	background-color: #f0f0f0;
}

/* The grid: Four equal columns that floats next to each other */
.column {    float: left;    width: 25%;    padding: 10px;
}

/* Style the images inside the grid */
.column img {    opacity: 0.8;     cursor: pointer; }

.column img:hover {    opacity: 1;
}

/* Clear floats after the columns */
.row:after {    content: "";    display: table;    clear: both;
}

/* The expanding image container */
.container {    position: relative;    display: none;
}

/* Expanding image text */
#imgtext {    position: absolute;    bottom: 15px;    left: 15px;    color: white;    font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {    position: absolute;    top: 10px;    right: 15px;    color: white;    font-size: 35px;    cursor: pointer;
}
</style>
</head>
<body>
<br />
<div style="margin-left: 300px;">
<i class="fa fa-paw" style="font-size: 100px"></i>
<i style="font-size: 30px; font-family: desire;" >Mire se vini ne 4 Paw Friends</i>
<i class="fa fa-paw" style="font-size: 100px"></i>
</div>
<br />
<br />
<br />
<br />
<br />
<!-- The four columns -->
<div class="row">  <div class="column">    <img src="view/foto/kafsh8.jpg" alt="Nature" style="width:100%" onclick="myFunction(this);">  </div>  <div class="column">    <img src="view/foto/kafsh3.jpg" alt="Snow" style="width:100%" onclick="myFunction(this);">  </div>  <div class="column">    <img src="view/foto/kafsh5.jpg" alt="Mountains" style="width:100%" onclick="myFunction(this);">  </div>  <div class="column">    <img src="view/foto/kafsh9.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">  </div>
</div>

<div class="container">  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>  <img id="expandedImg" style="width:100%">  <div id="imgtext"></div>
</div>

<script>
function myFunction(imgs) {    var expandImg = document.getElementById("expandedImg");    var imgText = document.getElementById("imgtext");    expandImg.src = imgs.src;    imgText.innerHTML = imgs.alt;    expandImg.parentElement.style.display = "block";
}
</script>

</body>
</html>