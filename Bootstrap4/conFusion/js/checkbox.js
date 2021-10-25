/*$('.progress_check').click(function() {
    var form = document.getElementById('progress');
var inputs = form.getElementsByTagName('input');
var is_checked = false;
for(var x = 0; x < inputs.length; x++) {
    if(inputs[x].type == 'checkbox' && inputs[x].name == 'us') {
        is_checked = inputs[x].checked;
        if(is_checked) break;
    }
}
})*/

var checkboxValues = JSON.parse(localStorage.getItem('checkboxValues')) || {};
var $checkboxes = $("#progress :checkbox");

$checkboxes.on("change", function(){
  $checkboxes.each(function(){
    checkboxValues[this.id] = this.checked;
  });
  localStorage.setItem("checkboxValues", JSON.stringify(checkboxValues));
});

$.each(checkboxValues, function(key, value) {
    $("#" + key).prop('checked', value);
  });