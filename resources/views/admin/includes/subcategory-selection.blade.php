<script>
     $("#select1").change(function() {
  if ($(this).data('options') === undefined) {
    // Taking an array of all options-2 and kind of embedding it on the select1
    $(this).data('options', $('#select2 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[name=' + id + ']');
  $('#select2').html(options);
});
</script>