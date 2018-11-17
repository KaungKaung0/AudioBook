function readURL(input) {

  if (input.files && input.files[0]) {

    var reader = new FileReader();



    reader.onload = function (e) {

      $('#book-cover-design').attr('src', e.target.result);

    }

    reader.readAsDataURL(input.files[0]);

  }

}

$("#book-cover").change(function(){

  readURL(this);

});
//Streaming Audio File
function playPause(){ 
  var song = document.getElementById("song");
  if(song ==null){
    console.log("No song request");
  }
  else{   
    if(song.paused== true){
      $("#fa-pp").attr('class' , 'fas fa-pause');
      song.play();
      
    }
    else{
      $("#fa-pp").attr('class' , 'fas fa-play');
      song.pause();
    }
  }
}
function showRoleForm(){
    var form = document.getElementById("RoleForm");
    form.style.display = 'block';
  }
  
$(document).ready(function() {
  
  playPause();


});