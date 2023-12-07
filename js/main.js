
//  -------slider

var slideIndexx = 0;

// Gọi hàm lần đầu
showSlides(slideIndexx);

// Gọi hàm sau mỗi 3s
setInterval(showSlides,3000);

function showSlides(n) {
    var i, slides, dotss;
    slides = document.getElementsByClassName('mySlidess');
    dotss = document.getElementsByClassName('dot');
    for(i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    if (n > slides.length) { slideIndexx = 1 }

    if(slideIndexx == slides.length) {
        slideIndexx = 0;
    }
    slideIndexx++;
    slides[slideIndexx - 1].style.display = "block";
    for(i = 0; i < dotss.length; i++) {
        dotss[i].classList.remove("active");
    }
    dotss[slideIndexx - 1].classList.add("active");

}

// Hàm chuyển slide khi người dùng click vào nút chấm tròn
function currentSlide(n) {
    showSlides(slideIndexx = n);    
}

function plusSlides(n) {
    showSlides(slideIndexx += n);
}


//  ------snackbar

function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
}

// -----slider product

function currentDiv(n) {
    showDivs(slideIndex = n);
}
function showDivs(n) {
    var y;
    var a = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > a.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = a.length }
    for (y = 0; y < a.length; y++) {
        a[y].style.display = "none";
    }
    for (y = 0; y < dots.length; y++) {
        dots[y].className = dots[y].className.replace(" w3-opacity-off", "");
    }
    a[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " w3-opacity-off";
}