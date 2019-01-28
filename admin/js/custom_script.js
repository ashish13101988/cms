$(document).ready(function(){
    
    
   
    
    
   //select all check boxes jquery. 
    
    $('#selectAllBoxes').click(function(event){
        
        if(this.checked){
            
            $('.checkBoxes').each(function(){
                
                this.checked = true;
            });
        }
        else{
            
            $('.checkBoxes').each(function(){
                
                this.checked = false;
            });
        }
        
    });
    
      /*    var abody = document.body;
      
      // Make a new div
      var loadscreen = document.createElement('div');
      loadscreen.setAttribute("id", "load-screen");
      
      // Give the new div some content
      loadscreen.innerHTML = '<div id="loading"></div>';
      abody.appendChild(loadscreen);
      
      $('#load-screen').delay(1000).fadeOut(600, function() {
         $(this).remove(); 
      });
    */
 
    
});
