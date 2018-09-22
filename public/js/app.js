
    var tagsString = "";
    var tagsInput = document.getElementById('tags');

    window.onload = function(){

        $('#tags').tagsInput();

        var tagsContainer = document.getElementById('tags_tagsinput');
        
        
        var observer = new MutationObserver(mutationCallback);
         
        observer.observe(tagsContainer, {
           childList: true,
         });
        
        
    }           
        
        function sendForm(formId){
        
                // this.preventDefault();
                document.getElementById(formId).submit();
                
        }

       
        function mutationCallback(mutations) {
                
                mutations.forEach(function(mutation) {
    
                    if(mutation.removedNodes.length !== 0)
                    {
                        tagsString = "";
                    } else {
    
                    tagsString += mutation.addedNodes[0].textContent + ',';
                    
                    }
               });
            addStringToElementValue(removeTrailingComma(tagsString), tagsInput);
        }
        
        function addStringToElementValue(str, input)
        {
            input.value = str;
        }

        function removeTrailingComma(str)
        {
            return str.slice(0, str.length - 1);
        }
  



