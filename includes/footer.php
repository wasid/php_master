 <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script>
    
    $( document ).ready(function() {
       
       $('.search').keyup(function(){
  
        var search=$(this).val();
          
        if(search.length !== 0){
              $( ".remove_while_search" ).remove();
              $('.success_search').show();
          }
                // $( ".remove_while_search" ).hide();

                $.post($('form').attr('action'),
                {'search':search},
                function(data){
                        $('.success_search').html(data);
                    }

                )
                
          if(search.length === 0){
              $('.success_search').hide();
              $( ".remove_while_search" ).show();
               
          }

            $(document).on("submit", "form", function(e){
            e.preventDefault();
            return  false;
            
            });
    
       })
       


    });
    
    </script>

</body>

</html>
