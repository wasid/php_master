tinymce.init({ selector:'textarea' });

$(document).ready(function(){
    
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