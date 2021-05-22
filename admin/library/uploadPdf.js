function upload() {
  document.getElementById("submit-button").disabled = true;

  //get your select pdf
  var pdf = document.getElementById("r_file").files[0];
  //now get your pdf name
  var pdfName = pdf.name;
  //firebase  storage reference
  //it is the path where pdf will store
  var storageRef = firebase.storage().ref("file/" + pdfName);
  //upload pdf to selected storage reference

  var uploadTask = storageRef.put(pdf);


  uploadTask.on(
    "state_changed",
    function (snapshot) {
      //observe state change events such as progress , pause ,resume
      //get task progress by including the number of bytes uploaded and total
      //number of bytes
      var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
      console.log("upload is " + progress + " done");
      // document.querySelector("#progressBar").value = progress;
      document.getElementById("progressBar").value = progress;
    },
    function (error) {
      //handle error here
      console.log(error.message);
    },
    function () {
      //handle successful uploads on complete

      uploadTask.snapshot.ref.getDownloadURL().then(function (downlaodURL) {
        //get your upload pdf url here...
        console.log(downlaodURL);
        document.getElementById("r_file_url").value = downlaodURL;
        document.getElementById("submit-button").disabled = false;
      });
    }
  );
}
function showButton()
{
document.getElementById ("button2").style .visibility ="visible";
}

