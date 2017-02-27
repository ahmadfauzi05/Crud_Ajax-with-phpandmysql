<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD MYSQL ---AJAX---</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body onload="viewData()">
        <div class="container">
            <div class="panel panel-heading">
                <h1 >Crud Mysql With Ajax</h1>
            </div>
            <p></p>
            <button class="btn btn-primary" data-toggle="modal" data-target="#addData">Insert Data</button>
            <!-- Modal -->
            <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="addLabel">Insert Data</h4>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nm">Full Name</label>
                                    <input type="text" class="form-control" id="nm" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="em">Email</label>
                                    <input type="email" class="form-control" id="em" placeholder="Surel">
                                </div>
                                <div class="form-group">
                                    <label for="em">Phone Number</label>
                                    <input type="int" class="form-control" id="hp" placeholder="Nomor Telp/Hp">
                                </div>
                                <div class="form-group">
                                    <label for="al">Address</label>
                                    <textarea class="form-control" id="al" placeholder="Alamat"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" onclick="saveData()">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <p></p>
            <table class="table table-bordered table-striped">
              
                <thead>
                 <tr>
                    <th width="40">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th width="160">Action</th>
                </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script>
     function saveData() {
     var name = $('#nm').val();
     var email = $('#em').val();
     var phone = $('#hp').val();
     var address = $('#al').val();
     $.ajax({
             type: "POST",
             url: "server.php?p=add",
             data: "nm=" + name + "&em=" + email + "&hp=" + phone + "&al=" + address,
             success : function(data){
                 viewData();
             }
      });
    }
    
    function viewData(){
            $.ajax({
               type : "GET",
               url : "server.php",
               success : function(data){
                   $('tbody').html(data);
               }
            });
        }
    function updateData(str){
     var id = str;
     var name = $('#nm-'+str).val();
     var email = $('#em-'+str).val();
     var phone = $('#hp-'+str).val();
     var address = $('#al-'+str).val();
     
     $.ajax({
        type :'POST',
        url : "server.php?p=edit",
        data : "nm="+name+"&em="+email+"&hp="+phone+"&al="+ address+"&id="+id,
        success: function (data){
            viewData();
        }
     });
    }
        </script>
        
        
    </body>
</html>