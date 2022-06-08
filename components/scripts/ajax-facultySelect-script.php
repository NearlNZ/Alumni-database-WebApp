<script type="text/javascript">
  $('#faculty').change(function() {
    var facultyID = $(this).val();
 
      $.ajax({
      type: "POST",
      url: "ajax-facultySelect.php",
      data: {id:facultyID},
      success: function(data){
          $('#brance').html(data);
      }
    });
  });
</script>