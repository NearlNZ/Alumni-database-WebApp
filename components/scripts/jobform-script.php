<script type="text/javascript">
  function jobform() {
    var status = $('#jobstatus').val();
    
    if(status == "ประกอบอาชีพในบริษัท/องค์กร"){
      $('#jobnameCol').show();  $('#jobnameInput').prop('required',true);
      $('#companyCol').show();  $('#companyInput').prop('required',true);
      $('#c_telCol').show();
      $('#c_webCol').show();
      $('#c_addressCol').show();  $('#address2').prop('required',true);
      $('#c_provinceCol').show();  $('#province2').prop('required',true);
      $('#c_districtCol').show();  $('#district2').prop('required',true);
      $('#c_subdistrictCol').show();  $('#subdistrict2').prop('required',true);
      $('#c_zipcodeCol').show();
    }
    else if(status != ""){
      if(status == "ประกอบอาชีพส่วนตัว"){
        $('#jobnameCol').show();  $('#jobnameInput').prop('required',true);
      }else{
        $('#jobnameCol').hide();  $('#jobnameInput').prop('required',false);  
        $('#jobnameInput').val("");
      }
      $('#companyInput').val("");
      $('#c_telInput').val("");
      $('#c_webInput').val("");
      $('#address2').val("");
      $('#province2').prop('selectedIndex', 0);
      $('#district2').html('<option value="" selected disabled>--กรุณาเลือก--</option>');
      $('#subdistrict2').html('<option value="" selected disabled>--กรุณาเลือก--</option>');
      $('#zipcode2').val("");

      $('#companyCol').hide();  $('#companyInput').prop('required',false);  
      $('#c_telCol').hide();  
      $('#c_webCol').hide();  
      $('#c_addressCol').hide();  $('#address2').prop('required',false);  
      $('#c_provinceCol').hide();  $('#province2').prop('required',false);
      $('#c_districtCol').hide();  $('#district2').prop('required',false);
      $('#c_subdistrictCol').hide();  $('#subdistrict2').prop('required',false);
      $('#c_zipcodeCol').hide(); 
    }
  }

  $('#jobstatus').change(jobform);
  $(document).ready(jobform);
</script>