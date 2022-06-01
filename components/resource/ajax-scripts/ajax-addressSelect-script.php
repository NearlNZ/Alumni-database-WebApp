<script type="text/javascript">
  $('#province').change(function() {
    var provinceID = $(this).find(':selected').data('id');
    $.ajax({
      type: "POST",
      url: "ajax-addressSelect.php",
      data: {id:provinceID, query:'district'},
      success: function(data){
        $('#district').html(data);
        $('#subdistrict').html('<option value="" selected disabled>--กรุณาเลือก--</option>');
        $('#zipcode').val("");
      }
    });
  });
  $('#district').change(function() {
    var districtID = $(this).find(':selected').data('id');
    $.ajax({
      type: "POST",
      url: "ajax-addressSelect.php",
      data: {id:districtID, query:'subdistrict'},
      success: function(data){
        $('#subdistrict').html(data);
        $('#zipcode').val("");
      }
    });
  });
  $('#subdistrict').change(function() {
    var subdistrictID = $(this).find(':selected').data('id');
    $.ajax({
      type: "POST",
      url: "ajax-addressSelect.php",
      data: {id:subdistrictID, query:'zipcode'},
      success: function(data){
        $('#zipcode').val(data);
      }
    });
  });

  //Second address picker

  $('#province2').change(function() {
    var provinceID = $(this).find(':selected').data('id');
    $.ajax({
      type: "POST",
      url: "ajax-addressSelect.php",
      data: {id:provinceID, query:'district'},
      success: function(data){
        $('#district2').html(data);
        $('#subdistrict2').html('<option value="" selected disabled>--กรุณาเลือก--</option>');
        $('#zipcode2').val("");
      }
    });
  });
  $('#district2').change(function() {
    var districtID = $(this).find(':selected').data('id');
    $.ajax({
      type: "POST",
      url: "ajax-addressSelect.php",
      data: {id:districtID, query:'subdistrict'},
      success: function(data){
        $('#subdistrict2').html(data);
        $('#zipcode2').val("");
      }
    });
  });
  $('#subdistrict2').change(function() {
    var subdistrictID = $(this).find(':selected').data('id');
    $.ajax({
      type: "POST",
      url: "ajax-addressSelect.php",
      data: {id:subdistrictID, query:'zipcode'},
      success: function(data){
        $('#zipcode2').val(data);
      }
    });
  });
</script>