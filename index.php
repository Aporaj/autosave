<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <title>Autosave</title>
</head>
<body>
    <div class="container">
        <div class="form-group">
            <label>Enter Post Title:</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Enter Post Title:</label>
            <textarea name="description" id="description" class="form-control" style="height:300px; resize:none;"></textarea>
        </div>
  

        <div class="form-group">
            <input type="button" name="save" id="save" value="Save" class="btn btn-success btn-xs form-control"/>
            <div id="autoSave"></div>
        </div>

        <div class="form-group">
            <input type="hidden" name="post_id" id="post_id"/>
            <div id="autoSave"></div>
        </div>


    </div>
    



    <script src="jquery/jquery.js"></script>
    <script src="boot/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        
        function autosave(){
            var title = $("#title").val();
            var description = $("#description").val();
            var post_id = $("#post_id").val();
            if(title != '' && description != ""){
                $.ajax({
                    url:"process.php",
                    method:"POST",
                    data:{title:title,description:description,postId:post_id},
                    success:function(data){
                        if(data != ''){
                           $("#post_id").val(data);
                        }
                        $("#autoSave").html("<span class='text-success'>Post is saved as draft</span>");
                        setInterval(function(){
                            $("#autoSave").text("");
                        }, 2000);
                    }
                });
            }
        }
        setInterval(function(){
            autosave();
    },10000);
    });
    
    
    
    </script>
</body>
</html>