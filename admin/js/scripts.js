
$(document).ready(function(){
    $('#selectbox').click(function(event){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
            $('.checkbox').each(function(){
                this.checked = false;
            });
        }


    });

});