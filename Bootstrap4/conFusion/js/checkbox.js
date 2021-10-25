//Progress Check
$('.progress_check').click(function() {
    var form = document.getElementById('progress');
    var inputs = form.getElementsByTagName('input');
    var is_checked = false;
    
    var flag=1;
    for(var x = 0; x < inputs.length; x++) {
        if(inputs[x].type == 'checkbox' ) {
            is_checked = inputs[x].checked;
            
            if(!is_checked)
            {
                flag=0;
                break;
            }
        }
    }
    
    if(flag==1)
        var status = confirm("Wooohoo!! You mastered the course. Are you sure you want to deregister?");
        console.log(course);
        if(status){
            //Connecting to the database
            var dbConnection = SQL.connect( { Driver: "MySQL",
            Host: "localhost",
            Port: 80,
            Database: "learning_platform",
            UserName: "root",
            Password: "" } );
            var sql = "UPDATE user SET "
        }
    })

console.log(course);
//Persistent checkboxes
console.log(email);
var checkboxValues = JSON.parse(localStorage.getItem(email)) || {};
var $checkboxes = $("#progress :checkbox");

$checkboxes.on("change", function(){
  $checkboxes.each(function(){
    checkboxValues[this.id] = this.checked;
  });
  localStorage.setItem(email, JSON.stringify(checkboxValues));
});

$.each(checkboxValues, function(key, value) {
    $("#" + key).prop('checked', value);
  });