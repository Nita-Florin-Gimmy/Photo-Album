  var input = document.getElementById("file");

document.querySelector('input').addEventListener('click',function(){
input.click();
});

input.addEventListener('change', edit);



 
 
 
 function edit(){

 var fileObject = this.files[0];
 var fileReader = new FileReader();
 fileReader.readAsDataURL(fileObject);
 fileReader.onload = function(){
     var result = fileReader.result;
     var img = document.querySelector('#logo_img');
     img.setAttribute('src',result);

     var form = document.getElementById("edit_logo_form");
     form.submit();
  }
}
