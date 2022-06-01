<script type="text/javascript">
  $('#jobstatus').change(function() {
    var status = $(this).val();
    
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
    else{
      $('#jobnameInput').val("");
      $('#province2').prop('selectedIndex', 0);
      $('#district2').html('<option value="" selected disabled>--กรุณาเลือก--</option>');
      $('#subdistrict2').html('<option value="" selected disabled>--กรุณาเลือก--</option>');
      $('#zipcode2').val("");

      $('#jobnameCol').hide();  $('#jobnameInput').prop('required',false);
      $('#companyCol').hide();  $('#companyInput').prop('required',false);
      $('#c_telCol').hide();
      $('#c_webCol').hide();
      $('#c_addressCol').hide();  $('#address2').prop('required',false);
      $('#c_provinceCol').hide();  $('#province2').prop('required',false);
      $('#c_districtCol').hide();  $('#district2').prop('required',false);
      $('#c_subdistrictCol').hide();  $('#subdistrict2').prop('required',false);
      $('#c_zipcodeCol').hide();
      if(status == "ประกอบอาชีพส่วนตัว"){
        $('#jobnameCol').show();  $('#jobnameInput').prop('required',true);
      }
    }
  });
</script>