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

<!--
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
-->


        <h2>Add New Posts HERE</h2>
        <form id="postForm">
        <br>
        <label >Post Name/Title: </label>
        <input type="text" id="name" name="name" title="Enter posts title/name" >
        <br>
        <br>
        <label > Post Description/Content:  </label>
        <input type="text"  id="description" name="description" title="Enter Post Description/Content">
        <br>
        <br>
         <label for="somePost">Posts Button </label>
        <button type="submit" id="somePost" >Click Me </button>
<br>
        </form>

        <p id="responseMessage"></p>

        <div id="data-container"></div>
    
    </div>

    <script>
        
$(document).ready(function() {
    $('#postForm').submit(function(e) {
        e.preventDefault();

        var name = $('#name').val();
        var description = $('#description').val();

        $.ajax({
            url: 'http://localhost/posts',
            type: "POST",
            data: {
                name: name,
                description: description
            },
            dataType: "json",
            success: function(data) {
                $('#responseMessage').text(data.message).css('font-size', '40px');

                $('#data-container').append('<div class="post"><h3>' + name + '</h3><p>' + description + '</p></div>');
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'An error has occurred.';
                $('#responseMessage').text(errorMessage).css('color', 'red').css('font-size','40px');
            }
        });
    });
});

    </script>


<!--
<script>

        $(document).ready(function() {


            /*
            $("#getme").submit(function () {
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

     



            $('#postForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission
              var name = $('#name').val();
              var description = $('#description').val();
              console.log('Name:', name, 'Description:', description);

              if (name.trim() === '' || description.trim() === '') {
        $('#data-container').html('<p>Please fill in all fields.</p>');
        return; 
    }


              const data ={
                    name: name,
                    description : description,
              }
              
                $.ajax({
                    url: 'http://localhost/posts',
                    type: "POST",
                    data: data,
                    dataType: "json",
                    success: function(data){
                       // console.log(data);
                        console.log('Success:', data);
                        $('#name').val('')
                        $('#description').val('')
                        $('#data-container').html(
                        `<div>
                           
                     success: 
                                    <p>${data.name}</p>
                                    <p>${data.description}</p>
                                
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

            -->
</body>
</html>