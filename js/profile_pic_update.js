var // where files are dropped + file selector is opened
	dropRegion = document.getElementById("drop-region"),
	// where images are previewed
	imagePreviewRegion = document.getElementById("image-preview");


// open file selector when clicked on the drop region
var fakeInput = document.createElement("input");
fakeInput.type = "file";
fakeInput.accept = "image/*";
fakeInput.multiple = true;
dropRegion.addEventListener('click', function() {
	fakeInput.click();
});

fakeInput.addEventListener("change", function(e) {
  var file = e.dataTransfer.files[0];

  var valid_ext = ['image/jpeg', 'image/png', 'image/jpg'];
  if(valid_ext.indexOf( file.type ) === -1) {
    alert("please use jpeg, png or jpg! 🦆")
  }

  var max_byte_size = 10e6; //10 MB
  if (file.size > max_byte_size){
    alert("please use somethin less den 10 MB ┌(。Д。)┐")
  }

  ajax_file_upload(file);
});


function preventDefault(e) {
	e.preventDefault();
  e.stopPropagation();
}

dropRegion.addEventListener('dragenter', preventDefault, false)
dropRegion.addEventListener('dragleave', preventDefault, false)
dropRegion.addEventListener('dragover', preventDefault, false)
dropRegion.addEventListener('drop', preventDefault, false)

function ajax_file_upload(file){
  if(file != undefined){
    var form_data = new FormData();
    form_data.append('file', file);
    $.ajax({
      type: 'POST',
      url: '../yeqius_website/includes/upload.inc.php',
      contentType: false,
      processData: false,
      data: form_data
    })
  }
}
