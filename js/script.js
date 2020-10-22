
$(document).ready(function(){
  
  $.validator.addMethod("passwordcheck",function(value,element)
  {return this.optional(element) || /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])[a-zA-Z0-9]{8}$/.test(value);},
  "Passwords must contain atleast one upper case,one lower case and one digit");

  $.validator.addMethod("cniccheck",function(value,element)
  {return this.optional(element) || /^[0-9]{5}-[0-9]{7}-[0-9]$/.test(value);},
  "CNIC No must follow the XXXXX-XXXXXXX-X format!");
$( "#RegForm" ).validate({
  rules: {
    firstname:{
      required:true,
      lettersonly:true
    },
    lastname: {
      required:true,
      lettersonly:true
    },
    username:{
      required:true
    },
    password:{
      required:true,
      passwordcheck:true
    },
    cnic:{
      required:true,
      cniccheck:true
    },
    Email: {
      required:true
      // email:true
    },
    phone: {
      required: true,
      phoneUS: true
    },
    option:{
      required:true,
      alphanumeric:true
    },
    radio:"required"
  },
  messages: {
    firstname: {
      required:"Please specify your firstname"
      
    },
    lastname: {
      required:"Please specify your lastname"
    },
    username:{
      required:"please enter your username"
    },
    password:{
      required:"please enter a strong password"
    },
    cnic:{
      required:"Please enter your cnic no"
    },
    phone:"please enter a valid phone no",
    Email: {
      required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@gmail.com"
    },
    option:{
      required:"please select an option",
      alphanumeric:"only alphanumerics are allowed"
    },
    radio:"Please select any of the option"
  }
 });
  
 $('#RegForm').on('submit', function(e){
  //Stop the form from submitting itself to the server.
  e.preventDefault();
  // Checks whether the selected form is valid or whether all selected elements are valid.
  if($('#RegForm').valid()){
      var username = $('#username').val();
      var password = $('#password').val();
      var firstname = $('#firstname').val();
      var lastname = $('#lastname').val();
      var email = $('#Email').val();
      var phoneNumber = $('#phone').val();
      var cnic = $('#cnic').val();
      var option = $('#option').val();
      var gender = $(".gender:checked").val();
     
      

     
    $.ajax({
      type: "POST",
      url: 'hotel.php',
      data: {usname: username,
            pass:password,
            fname:firstname,
            lname:lastname,
            email:email,
            phone:phoneNumber,
            cnic:cnic,
            option:option,
            Gender:gender},
      success: function(data){
          alert(data);
      }
  });
  $.ajax({
    type: "POST",
    url: 'customesinfodatabase.php',
    
    success: function(result){
      var dataa=JSON.parse(result);
        // alert(dataa);
        
        Highcharts.chart('container', {

          chart: {
              type: 'lollipop'
          },
      
          accessibility: {
              point: {
                  valueDescriptionFormat: '{index}. {xDescription}, {point.y}.'
              }
          },
      
          legend: {
              enabled: false
          },
      
          subtitle: {
              text: '2020'
          },
      
          title: {
              text: 'Total Members in each room'
          },
      
          tooltip: {
              shared: true
          },
      
          xAxis: {
          title: {
            text: 'Rooms'

          },
              type: 'category'
          },
      
          yAxis: {
              title: {
            text: 'No of Customers'
          }
               
          },
      
          series: [{
              name: 'Members',
              data:dataa
            
        }]               
      });
    }
})
    // $('#customerstable').bootgrid({
    //     ajax:true,
    //     rowSelect:true,
    //     post:function(){
    //       return{
    //         id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
    //       };
    //     },
    //     url:'customersinfo.php'
        
        
    // })
  }
  
})
 
 })
  

