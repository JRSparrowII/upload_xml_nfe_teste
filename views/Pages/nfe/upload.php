<?php require_once './views/Pages/header.php'; ?>

    
    <body style="background-color: #6610f2">
    <div class="container" >
      <div class="row">        
        <div class="col-md-9" style="margin:0 auto; float:none;margin-top: 30px;
          background: #fff;
          border-radius: 20px;">
          <div style="
            display: flex;
            justify-content: space-between;
            padding: 42px 0px;">
            <h1>Upload XML NFe</h1>  
            <a style=" width: 100px;" class="button btn-back" href="index.php">Voltar</a>
          </div>
          
          <span id="message"></span>
          <form method="post" id="import_form" enctype="multipart/form-data">
            <div class="form-group">
              <label>Selecione um arquivo XML</label>
              <input type="file" name="file" id="file" />
            </div>
            <br />
            <div class="form-group">
              <input type="submit" name="submit" id="submit" class="btn btn-info" value="Enviar" />
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#import_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "./index.php?a=new",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
            $('#submit').attr('disabled', 'disabled'),
                $('#submit').val('Enviando...');
            },
            success: function(data) {
                $('#message').html(data);
                $('#import_form')[0].reset();
                $('#submit').attr('disabled', false);
                $('#submit').val('Enviar');
            },
            complete: function() {
            // setInterval(function(){
            //     $('#message').html('');
            // }, 5000);
            },
        })
        });
    });
    </script>
</body>
</html>