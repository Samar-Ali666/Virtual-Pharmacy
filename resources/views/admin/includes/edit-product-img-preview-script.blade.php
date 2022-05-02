<script>
  $("#prod_image").change(function(){
    readIMG(this);
});
  function readIMG(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product-img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
} 
</script>