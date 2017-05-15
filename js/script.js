// TinyMCE config

tinymce.init({ selector:'textarea' });


$(document).ready(function(){

    // ajax search script
    
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
    
       });

// Bulk Option for Posts
    $('#selectAllBox').click(function(event){
        if(this.checked){
             $('.selectBox').each(function(){
                this.checked = true; 
             });
        }
        else{
            $('.selectBox').each(function(){
                this.checked = false; 
             });
        }
    });

});


    
