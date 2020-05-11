$("html").on("click", ".ripple", function(evt) {
  var btn = $(evt.currentTarget);
  var x = evt.pageX - btn.offset().left;
  var y = evt.pageY - btn.offset().top;
  
  var duration = 400;
  var animationFrame, animationStart;
  
  var animationStep = function(timestamp) {
    if (!animationStart) {
      animationStart = timestamp;
    }
   
    var frame = timestamp - animationStart;
    if (frame < duration) {
      var easing = (frame/duration) * (2 - (frame/duration));
      
      var circle = "circle at " + x + "px " + y + "px";
      var color = "rgba(0, 0, 0, " + (0.3 * (1 - easing)) + ")";
      var stop = 90 * easing + "%";

      btn.css({
        "background-image": "radial-gradient(" + circle + ", " + color + " " + stop + ", transparent " + stop + ")"
      });

      animationFrame = window.requestAnimationFrame(animationStep);
    } else {
      $(btn).css({
        "background-image": "none"
      });
      window.cancelAnimationFrame(animationFrame);
    }
    
  };
  
  animationFrame = window.requestAnimationFrame(animationStep);

});

$("html").on("click", ".test_click", function(e) {
    document.location.href = "test_container.html?id="+this.id;
});

$("html").on("click", ".course_click", function(e) {
    document.location.href = "test_list.html?id="+this.id;
});

//Test submit
$(document).on ("click", "#check", function() {
    if (confirm("Вы уверены, что хотите завершить тест?")){
        var data = "";
        $('.form').each(function(i, obj) {
            data += ($(this).serialize()+"&");
        });
        //include test id
        data += "id=2";
        //ajax request 
        $.ajax({
            type: 'post',
            url: 'test_checker.php',
            dataType: 'html',
            data:data,
                success: function (html) {
                    var result = jQuery.parseJSON(html);
                    if (result.success){
                        $("input").prop('disabled', true);
                        alert("Your test result: " + result.result + "%");
                    }
                }
        });
          
      }
});


