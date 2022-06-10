<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Testes - ROWs - COLs</title>
<!-- Meu arquivo CSS de testes para BOOTSTRAP-->
<link rel="stylesheet" type="text/css" href="css/bootstrap-test.css" />
<!-- CSS only - jsDelivrGenericName BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- <link rel="stylsheet" type="text/css" href="css/"> -->
</head>
<body style="margin-top:100px">
<!-- O CONTAINER pode ser: container-fluid ou container 
PADING de 1 a 5(p-5) pading Top(pt-5) py-5 px-5 
MARGIN de 1 a 5(m-5) mesmas variações do pading acho eu -->
<!-- a classe COL pode ser -SM -MD -LG -XL -XXL  -->
<?php 
 include_once 'navbar_top.php';
 ?>
<!-- DIV ROW: BackgroundColor(bg): .bg-primary, .bg-success, .bg-info, .bg-warning, .bg-danger, .bg-secondarye .bg-dark .bg-light  -->
<!-- <div class="row" style="width:320px; height:400px"> -->
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
                <img src="imgs/anime/83acdee6b9dee866354d9a3c5fd04140.jpg" style="width:100%">
            <div class="text">Caption Text</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
                <img src="imgs/anime/b3df29d5e8cc8ed3e2dc5cc0359d1b8d.jpg" style="width:100%">
            <div class="text">Caption Two</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
                <img src="imgs/anime/5c0a9a08f0ed869eadb272e72711d1d1.jpg" style="width:100%">
            <div class="text">Caption Three</div>
        </div>
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
<!-- </div> -->

<!-- CONTAINER-FLUID MAIN: ColorText: text-white, text-dark (mesmas variações do bg- acho eu) -->
<main class="container-fluid bg-primary border border-white text-center">
<div class="row border border-primary">
    <div class="col-10 container border border-dark">
        <div class="col border border-white">
            Compo de Busca<hr>
        </div>
        <div class="row border border-white">
            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white<hr>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                     JPG  2
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                    JPG  3
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                    JPG 4
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white<hr>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                     JPG  6
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                    JPG  7
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                    JPG 8
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                    JPG  9
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                     JPG  10
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                    JPG  11
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white">
                col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-2 border border-white<hr>
                </div>
        </div>
    </div>
<!-- SIDEBAR -->
    <div class="col-2 container border border-dark">
        <div class="row">
            <div class="col">
                SIDEBAR<hr>
                col-2<hr>
                col-2<hr>
                col-2<hr>
                col-2<hr>
                col-2<hr>
                col-2<hr>
                col-2<hr>
                col-2<hr>
            </div>
        </div>    
    </div>
</div>
</main>
<footer class="container border border-primary">
    <div class="col border border-primary">
        FOOTER 
    </div>
</footer>   
<!-- JavaScript Bundle with Popper BOOTSTRAP - sempre no final do corpo da pagina -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

</script>
</body>
</html>