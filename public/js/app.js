
    var tagsString = "";
    var tagsInputField;

    $(document).ready(function(){
        console.log('fired app.js ');
        
        projectTag();
        
        
                setConfirmationModalInfo();
    });

        
             
        
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

               
            addStringToElementValue(removeTrailingComma(tagsString), tagsInputField);
        }
        
        function addStringToElementValue(str, input)
        {
            input.value = str;
        }

        function removeTrailingComma(str)
        {
            return str.slice(0, str.length - 1);
        }
  

        function projectTag(projectId = ""){
            tagsString = "";
            tagsInputField = document.getElementById('tags' + projectId);

            $('#tags' + projectId).tagsInput();

            var tagsContainer = document.getElementById('tags' + projectId +'_tagsinput');

            var observer = new MutationObserver(mutationCallback);

            observer.observe(tagsContainer, {
                childList: true,
              });
        }



        function setConfirmationModalInfo()
        {
            var triggers = document.getElementsByClassName("project-dd");
            var resetFormAction = document.getElementById('deleteProjectForm').action;

            Array.from(triggers).forEach(function(element) {

                element.addEventListener('click', function(e){

                    document.getElementById('deleteProjectForm').action = resetFormAction;                    
                    e.preventDefault();
                    var target = e.target.getAttribute('data-target');
                    var targetName = e.target.getAttribute('data-target-name');

                    document.getElementById('confirmed-project-title').textContent = targetName;
                    document.getElementById('deleteProjectForm').action += '/' + target;


                });
              });


        }