<script type="text/javascript">
  $('#stdYear').change(function() {
    var startYear = $(this).val();
 
      $.ajax({
      type: "POST",
      url: "ajax-yearSelect.php",
      data: {startYear:startYear},
      success: function(data){
          $('#stdEndyear').html(data);
      }
    });
  });
</script>