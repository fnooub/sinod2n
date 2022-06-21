<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>upload</title>

<button id="upload_widget" class="cloudinary-button">Upload files</button>

<input type="text" value="Hello World" id="myInput">
<button onclick="myFunction()">Copy text</button>

<p><a id="myAnchor" href="">SCAN NGAY</a></p>
<p><a id="mySplit" href="">SPLIT NGAY</a></p>

<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>  

<script type="text/javascript">  
var myWidget = cloudinary.createUploadWidget({
  cloudName: 'fivegins', 
  uploadPreset: 'luufile'}, (error, result) => { 
    if (!error && result && result.event === "success") { 
      console.log('Done! Here is the image info: ', result.info.url); 
      document.getElementById("myInput").value = result.info.url;
      document.getElementById("myAnchor").href = 'vietphrase.php?link='+location.href+'scan.php?link=' + result.info.url;
      document.getElementById("mySplit").href = 'split.php?link='+location.href+'scan.php?link=' + result.info.url;
    }
  }
)

document.getElementById("upload_widget").addEventListener("click", function(){
    myWidget.open();
  }, false);
</script>

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  //alert("Copied the text: " + copyText.value);
}
</script>