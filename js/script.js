if (document.cookie.match(/polled1=([^;]*)/) == null ) {
  document.cookie = 'polled1=0';
}
if (document.cookie.match(/polled2=([^;]*)/) == null ) {
  document.cookie = 'polled2=0';
}
if (document.cookie.match(/polled3=([^;]*)/) == null ) {
  document.cookie = 'polled3=0';
}
var cookie1 = document.cookie.match(/polled1=([^;]*)/)[1];
var cookie2 = document.cookie.match(/polled2=([^;]*)/)[1];
var cookie3 = document.cookie.match(/polled3=([^;]*)/)[1];
var candidates1 = document.getElementsByClassName('candidate1');
var candidates2 = document.getElementsByClassName('candidate2');
var candidates3 = document.getElementsByClassName('candidate3');
for (i=0, l=candidates1.length; i<l; i+=1) {
  var el = candidates1[i];
  var id = el.dataset.id;
  var vote_button = el.getElementsByClassName('vote')[0];
  var voted_element = el.getElementsByClassName('voted')[0];

  vote_button.addEventListener('click', function(e) {
    e.source.removeEventListener('click', arguments.callee);
    var that = this;
    var id = that.dataset.id;
    var point_element = that.nextSibling.nextSibling;
    var point = parseInt(point_element.innerHTML);
    var voted_element = that.previousSibling.previousSibling;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
        point_element.innerHTML = point + 1;
        document.cookie = 'polled1=' + cookie1 + ',' + id;
        cookie1 = document.cookie.match(/polled1=([^;]*)/)[1];
        that.style.display = 'none';
        voted_element.style.display = 'block';
      }
    };
    xhttp.open("POST", "api.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("nomination_id=1&id=" + id);
  });

  if (cookie1.match(new RegExp("(?:^|,)" + id + "(?:,|$)"))) {
    vote_button.style.display = 'none';
    voted_element.style.display = 'block';
  }
}

for (i=0, l=candidates2.length; i<l; i+=1) {
  var el = candidates2[i];
  var id = el.dataset.id;
  var vote_button = el.getElementsByClassName('vote')[0];
  var voted_element = el.getElementsByClassName('voted')[0];

  vote_button.addEventListener('click', function() {
    var that = this;
    var id = that.dataset.id;
    var point_element = that.nextSibling.nextSibling;
    var point = parseInt(point_element.innerHTML);
    var voted_element = that.previousSibling.previousSibling;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
        point_element.innerHTML = point + 1;
        document.cookie = 'polled2=' + cookie2 + ',' + id;
        cookie2 = document.cookie.match(/polled2=([^;]*)/)[1];
        that.style.display = 'none';
        voted_element.style.display = 'block';
      }
    };
    xhttp.open("POST", "api.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("nomination_id=2&id=" + id);
  });

  if (cookie2.match(new RegExp("(?:^|,)" + id + "(?:,|$)"))) {
    voted_element.style.display = 'block';
    vote_button.style.display = 'none';
  }
}

for (i=0, l=candidates3.length; i<l; i+=1) {
  var el = candidates3[i];
  var id = el.dataset.id;
  var vote_button = el.getElementsByClassName('vote')[0];
  var voted_element = el.getElementsByClassName('voted')[0];

  vote_button.addEventListener('click', function() {
    var that = this;
    var id = that.dataset.id;
    var point_element = that.nextSibling.nextSibling;
    var point = parseInt(point_element.innerHTML);
    var voted_element = that.previousSibling.previousSibling;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
        point_element.innerHTML = point + 1;
        document.cookie = 'polled3=' + cookie3 + ',' + id;
        cookie3 = document.cookie.match(/polled3=([^;]*)/)[1];
        that.style.display = 'none';
        voted_element.style.display = 'block';
      }
    };
    xhttp.open("POST", "api.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("nomination_id=3&id=" + id);
  });

  if (cookie3.match(new RegExp("(?:^|,)" + id + "(?:,|$)"))) {
    voted_element.style.display = 'block';
    vote_button.style.display = 'none';
  }
}

function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the link that opened the tab
  document.getElementById(cityName).style.display = "flex";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
