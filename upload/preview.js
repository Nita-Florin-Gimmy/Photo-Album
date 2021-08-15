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
     var img = document.querySelector('#preview');
     img.setAttribute('src',result);
  }
}
