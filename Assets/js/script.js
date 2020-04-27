//Add class .active to buttons in order to make the button active onclick and idle on refresh of the page.
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", " ");
    }
    this.className += " active";
  });
}
//Toggle .active class between buttons
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].classList.toggle('active');
    this.classList.toggle('active');
    
    var target = this.dataset.target;
    filterSelection(target);
  });
}
//Filter cards and corresponding <div> tags
function filterSelection(target) {
  document.querySelectorAll('.filterDiv').forEach((div) => {
    if (target === '' || div.classList.contains(target)) {
      div.classList.remove('hide2');
    } else {
      div.classList.add('hide2');
    }
  });
}
