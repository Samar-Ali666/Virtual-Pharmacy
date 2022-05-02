<script>
    $("#prod_desc").change(function(){
    readPDF(this);
});
  function readPDF(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product-description').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}      
</script>