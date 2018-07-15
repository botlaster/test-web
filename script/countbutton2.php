<script>
$('#submit').click(function(){
//validate form
 $.get('countbutton1.php',$('#sample-form').serialize(),function(response){
  $('#result').html(response);
 });
});
</script>