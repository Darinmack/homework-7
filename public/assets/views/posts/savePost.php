<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    

<div id="posts-container"></div>


    <div>
    <h2>Posts</h2>
   
           <h3>Id: 1 </h3>    
                <br>
               <h3>Title: First Title</h3>  
                <br>
               <h3>Content/Description: Content for first one </h3>  
                <br>
                <br>
           
            <br>
            <br>
            <br>
    </div>
    <div>

        <h2>Send posts to  save through here</h2>
        <form id="postForm">
        <br>
        <label >Post Name/Title: </label>
        <input type="text" id="name" name="name" title="Enter posts title/name" >
        <br>
        <br>
        <label > Post Description/Content:  </label>
        <input type="text"  id="des" name="des" title="Enter Post Description/Content">
        <br>
        <br>
        <label for="go">Posts Button </label>
        <button type="submit" id="somePost" >Click Me </button>

        </form>
         <div id="data-container"></div>
         <br>
         <br>
        <p id="responseMessage"></p>
    </div>

<script>
        $(document).ready(function() {


            /*
            $("#somePost").click(function () {
                    $.ajax({
                        url: 'localhost/posts',
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data)
                            $('#posts-container').html('')
                            $.each( data, function( key, value ) {
                                console.log(value)
                                $('#posts-container').append(`
                                   <p>${value['id']} ${value['name']}</p> `)
                            });
                        }
                    });
            })
            */


            $('#somePost').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission
              var name = $('#name').val();
              var des = $('#des').val();

              const data ={
                    name: name,
                    des : des,
              }
              
                $.ajax({
                    url: 'localhost/posts',
                    type: "POST",
                    data: data,
                    dataType: "json",
                    sucess: function(data){
                        console.log(data);
                        $('#name').val('')
                        $('#des').val('')
                        $('#data-container').html(
                        `<div>
                           
                     success: 
                                    <p>${data.name}</p>
                                    <p>${data.des}</p>
                                
                                 </div>`
                            )
                        }, 
                        error: function (data){

                    $('#data-container').html('')
                     $.each( data.responseJSON, function( key, value ) {
                    $('#data-container').append(`
                    <p>${value}</p> `)
                    });
                }
                    });

                    });
                })
                
    </script>


</body>
</html>