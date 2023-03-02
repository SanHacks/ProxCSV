
<footer id="footer"  style="padding-top: 20px; padding-bottom: 20px; background-color: #f8f9fa; color: #6c757d; font-size: 14px; font-weight: 400; line-height: 1.5; text-align: center;">
<!-- MOve to top button -->
<button class="btn" onclick="topFunction()" id="myBtn" title="Go to top">Move to Top<i class="fas fa-arrow-up"></i></button>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
          <p>Made with ❤️</i> </p>
        </div>
        <div class="col-md-4">
          <p>2023</p>
        </div>
        <div class="col-md-4">
          <a href="http://gundo.ml" target="_blank" <p>SanHacks</p>
        </div>
        </div>
        </div>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iE
    jwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJo
    ft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1u
    Udj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</footer>