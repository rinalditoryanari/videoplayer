function upVideo(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        document.getElementById("preview-video").setAttribute("src", e.target.result); 
        document.getElementById("label-video").innerHTML = input.files[0].name
      };

      reader.readAsDataURL(input.files[0]);
  }
}

function upImage(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        document.getElementById("preview-image").setAttribute("src", e.target.result); 
        document.getElementById("label-image").innerHTML = input.files[0].name
      };

      reader.readAsDataURL(input.files[0]);
  }
}