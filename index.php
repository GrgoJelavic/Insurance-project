<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/data.css">
    <script defer src="script.js"></script>



     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>  



</head>



<body>
    <header>
        <div class="header-inner">
            <div class="logo">
                <img src="images/logo.png" alt="logo">
            </div>
            <nav>
                <a href="#" class="link">HOME</a>
                <a href="./policies/policiesData.php" class="link">POLICIES</a>
                <a href="./customers/customersData.php" class="link">CUSTOMERS</a>
            </nav>
            </div>
        <div class="heading">
            <h2>
                Welcome to the Insurance System
            </h2>
        </div>
        </header>

        <main>
            <section>

              <br /><br />
                <div class="container">
                <h1>Live Search</h1>
                <br/><br/>
                <label>Search Customers</label>
                <div id="search_area">
                    <input type="text" name="customer_search" id="customer_search" class="form-control input-lg" autocomplete="off" placeholder="Search by any attribute"/>
                </div>
                <br />
                <br />
                <div id="search_Data"></div>
                </div>

                 
            </section>
        </main>


    <script>
$(document).ready(function(){
 
 load_data('');
 
 function load_data(query, typehead_search = 'yes')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query, typehead_search:typehead_search},
   success:function(data)
   {
    $('#search_Data').html(data);
   }
  });
 }
 
 $('#customer_search').typeahead({
  source: function(query, result){
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data){
     result($.map(data, function(item){
      return item;
     }));
     load_data(query, 'yes');
    }
   });
  }
 });
 
 $(document).on('click', 'li', function(){
  var query = $(this).text();
  load_data(query);
 });
 
});
</script>


    <footer id="index-footer">
         <div>
            <img src="images/logo.png" alt="logo">
        </div>
        <div>Project Insurance System</div>
        <div>@2021 by Grgo Jelavic</div> 
    </footer>
</body>

</html>