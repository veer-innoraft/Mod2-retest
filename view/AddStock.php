add stock
<script>
    $(document).ready(function () {
  // To initially set all counts of links.
  $(".addStock").click(function (e) {
    e.preventDefault();
    $('body').css('background-color','red');
    $data=$_POST
    $.post("../Model/Services/addPost.php",$data)
      });

});
</script>
<head>
    <link rel="stylesheet" href="../src/stylesheet/style.css">
</head>
<form class="form-div" method="POST">
    <h3>Add Stocks</h3>
    <label for="name">Name:</label>
    <input name="name" id="name" type="text">
    <label for="name">price:</label>
    <input name="price" id="price" type="text">
    <button class="btn addStock">Add</button>
</form>