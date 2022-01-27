var hw=document.querySelector(".show-homework");
var btn_sh=document.querySelector(".btn-show-hw");
var btn_hi=document.querySelector(".btn-hide-hw");
hw.style.display="none";

btn_sh.addEventListener("click",function(){
hw.style.display="block";
})
btn_hi.addEventListener("click",function(){
hw.style.display="none";
})


  $(".links").hide();
  $(".btn-links").click(function(){
  $(".links").show();
  $("#add-newStu").hide();
$("#table-email").hide();
$("#table-stu").hide();
$(".form_message").hide();
$(".form-homework").hide();

  })







$(".form-homework").hide();
$(".btn-homework").click(function(){
$(".form-homework").show();
$("#add-newStu").hide();
$("#table-email").hide();
$("#table-stu").hide();
$(".form_message").hide();
$(".links").hide();

})





$(".form_message").hide();
$(".btn-message").click(function(){
$(".form_message").show();
$("#add-newStu").hide();
$("#table-email").hide();
$("#table-stu").hide();
$(".form-homework").hide();
$(".links").hide();

})



$("#add-newStu").hide();
$(".btn-add").click(function(){
  $("#add-newStu").show();
$("#table-stu").hide();
$("#table-email").hide();
$(".form_message").hide();
$(".form-homework").hide();
$(".links").hide();

})

// show emails
$("#table-email").hide();
$(".btn-email").click(function(){
  $("#table-email").show();
$("#table-stu").hide();
$("#add-newStu").hide();
$(".form_message").hide();
$(".form-homework").hide();
$(".links").hide();

  $.ajax({
    url:"all.php",
    dataType:"JSON",
    type:"get",
    success:function(data){
      var email="";
      for (const item of data) {
        email+=`  
        <tr>
          <td> ${item.id}  </td>
          <td> ${item.email}  </td>
          <td> ${item.password}  </td>
        </tr>
        `
      }
      $(".tbody-email").html(email);
    }
  })
})
// end show emails




// SHOW STUDENTS
$("#table-stu").hide();
$("#btn-show").click(function(){
$("#table-stu").show();
$("#table-email").hide();
$("#add-newStu").hide();
$(".form_message").hide();
$(".form-homework").hide();
$(".links").hide();


// ajax for students
  $.ajax({
    url:"all.php",
    type:"get",
    dataType:"JSON",
    success:function(data){
      var txt="";
      for (const item of data) {
        txt+=`   
        <tr>   
          <td> ${item.id}  </td>
          <td> ${item.name}  </td>
          <td> ${item.row}  </td>
          <td> ${item.groupStu}  </td>
        </tr>
        `
      }
      $(".tbody").html(txt);

    }

  })
//end of ajax for students





})
// End SHOW STUDENTS