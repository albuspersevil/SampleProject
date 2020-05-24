
$('#permission_role_select').on("change", function (e) {
    let role_id = $(this).val();
    window.location = app_url+"/permission/role/"+role_id;
});

function changeDashboardUser(value){
    window.location = app_url+"/home/"+value;
}

function editUser(id){
  alert(id)

}

function deleteUser(id){
  var result = confirm("Are you sure you want to delete?");
  if (result) {
    
  }

    alert(id)

}
