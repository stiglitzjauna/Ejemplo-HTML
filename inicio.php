
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Inicio JS14 JQUERY COMPLETO </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="js/bootstrap.min.css">
  <link href="css/inicio-style.css" rel="stylesheet">
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  

    <style>
  /* Make the image fully responsive */


</style>

  </head>

  <body>
  
 <div class="container">
    <div class="row">
      <div class="col-12">

      <?php

      include("php/navbar.php");

      ?>

    
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators" id="indicadorS">
  
  </ol>
  <div class="carousel-inner" id="sliderjson">
    
     <!--SLIDER JASON-->
    </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>

<div class="col fluid">
<main class="row" id="tarjetas">

</main>
<br>
<main class="row" id="tarjetas2">

</main>
<br>
<a href="producto.php" class="btn btn-outline-dark my-2 my-sm-0" type="">Ver mas productos</a>
</div>


    </div>
  </div>
</div>
<br>
<hr>
    
<?php



 include("php/footer.php");

?>



<script>

$(document).ready(function() {
  console.log('ready');
      



          $.ajax({
                url:"js/fruits.json",
                method:"get",
                dataType:"json",
                data:{},
                      success: function(data){
                        console.log(data);

                        var sliderj ="";
                        var indicadors="";
                            $.each(data.fruits, function(i,v){

                              
                              if (i==0) {
                                        
                                        indicadors ='<li data-target="#carouselExampleIndicators" data-slide-to="'+i+'" class="active">'+'</li>';

                                        sliderj ='<div class="carousel-item active">'+
                                                '<img class="d-block w-100 img-fluid" src="'+v.image+'">'+
                                                '<div class="carousel-caption d-none d-md-block">'+
                                                '<h5>'+v.name+'</h5>'+
                                                '</div>';
                                         } 
                                         else
                                         {

                                          indicadors ='<li data-target="#carouselExampleIndicators" data-slide-to="'+i+'" class="">'+'</li>';

                                          sliderj ='<div class="carousel-item">'+
                                                '<img class="d-block w-100 img-fluid" src="'+v.image+'">'+
                                                '<div class="carousel-caption d-none d-md-block">'+
                                                '<h5>'+v.name+'</h5>'+
                                                '</div>';
                                         }
                              $("#indicadorS").append(indicadors);
                              $("#sliderjson").append(sliderj);
                             
                              });

                      },

                      error: function(error){
                      console.log(error); 
                      },

          });


          $.ajax({
               url:'php/destacadosphp.php',
               method:'POST',
               dataType:'json',
               data:{
                 
               },        // envia las variables al servidor

               success: function(data){ // lo que tenga como parametro data es al respuesta que me dara el servidor
                 console.log(data);
                 //data = JSON.parse(data); // lo convertimos en un objeto JSON
                 var caard = '';

                  $.each(data,function(i, v){
                                  

                       caard += '<div class="col-4 mt-2">';
                
                         caard += '<div class="card h-100 mt-2">';
                        
                         caard +='<img src="img/'+v.filename+'" class="card-img-top" alt="">'; 
                         caard +='<div class="card-body">';
                         caard +='<h5 class="card-title">'+v.title+'</h5><hr>';
                         caard +='<span class="badge badge-info prices">'+v.price+'€</span>';
                         caard +='<span class="badge badge-info">'+v.type+'</span><hr>';
                         caard += '<p class="card-text descrip">'+v.description+'</p>';
                      
                         caard +='<a href="detallesproducto.php?id='+v.id+'" class="btn btn-warning botondetails">Detalle del Producto</a>'
                         caard +='</div>';
                         caard +='</div>';
                         caard +='</div>';
                         
                         



                       });
                  $("#tarjetas").append(caard);

               },

               error: function(error){
                 console.log(error);
               }
        
          })

 $.ajax({
               url:'php/topcuatrophp.php',
               method:'POST',
               dataType:'json',
               data:{
                 
               },        // envia las variables al servidor

               success: function(data){ // lo que tenga como parametro data es al respuesta que me dara el servidor
                 console.log(data);
                 //data = JSON.parse(data); // lo convertimos en un objeto JSON
                 var caard = '';

                  $.each(data,function(i, v){
                                  

                       caard += '<div class="col-3 mt-2">';
                
                         caard += '<div class="card h-100 mt-2">';
                        
                         caard +='<img src="img/'+v.filename+'" class="card-img-top" alt="">'; 
                         caard +='<div class="card-body">';
                         caard +='<h5 class="card-title">'+v.title+'</h5><hr>';
                         caard +='<span class="badge badge-info prices">'+v.price+'€</span>';
                         caard +='<span class="badge badge-info">'+v.type+'</span><hr>';
                         caard += '<p class="card-text descrip">'+v.description+'</p>';
                      
                         caard +='<a href="detallesproducto.php?id='+v.id+'" class="btn btn-warning botondetails">Detalle del Producto</a>'
                         caard +='</div>';
                         caard +='</div>';
                         caard +='</div>';
                         
                         



                       });
                  $("#tarjetas2").append(caard);

               },

               error: function(error){
                 console.log(error);
               }
        
          })



        
         

         
        
});




</script>

  </body>
  </form>
  </body>
  </html>