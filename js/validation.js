


$(document).ready(function(){

    $('#form_info').submit(function(e){
      e.preventDefault();

      let position = $('#position').val();
      let company =  $('#company').val();
      let industry = $('#industry').val();
      let location = $('#location').val();
      let start_date = $('#start_date').val();
      let end_date = $('#end_date').val();
      let first_name = $('#first_name').val();
      let middle_name = $('#middle_name').val();
      let last_name = $('#last_name').val();
      let dob = $('#dob').val();
      let civil_status = $('#civil_status').val();
      let height = $('#height').val();
      let weight = $('#weight').val();
      let phone = $('#phone').val();
      let country = $('#country').val();
      let province = $('#province').val();
      let street = $('#street').val();
      let nationality = $('#nationality').val();

      
      if(first_name.length < 1){
        $('#first_name').css({"border-color": "red"});
      }

      if(middle_name.length < 1){
        $('#middle_name').css({"border-color": "red"});
      }
      
      if(last_name.length < 1){
        $('#last_name').css({"border-color": "red"});
      }

      if(dob.length < 1){
        $('#dob').css({"border-color": "red"});
      }
      
      if(civil_status.length < 1){
        $('#civil_status').css({"border-color": "red"});
      }

      if(height.length < 1){
        $('#height').css({"border-color": "red"});
      }
      
      if(weight.length < 1){
        $('#weight').css({"border-color": "red"});
      }

      if(nationality.length < 1){
        $('#nationality').css({"border-color": "red"});
      }

      if(phone.length < 1){
        $('#phone').css({"border-color": "red"});
      }
      
      if(country.length < 1){
        $('#country').css({"border-color": "red"});
      }
      
      if(province.length < 1){
        $('#province').css({"border-color": "red"});
      }
      
      if(company.length < 1){
        $('#company').css({"border-color": "red"});
      }

      if(position.length < 1){
        $('#position').css({"border-color": "red"});
      }

      if(industry.length < 1){
        $('#industry').css({"border-color": "red"});
      }

      if(location.length < 1){
        $('#location').css({"border-color": "red"});
      }

      if(start_date.length < 1){
        $('#start_date').css({"border-color": "red"});
      }

      if(end_date.length < 1){
        $('#end_date').css({"border-color": "red"});
      }


    });
  });
