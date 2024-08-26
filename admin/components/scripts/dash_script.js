let global;
const colors = {
    colorPrimary: "#a37424",
    colorSecondary: '#e4c590',
    colorDanger: "#da0a1c",
    colorSuccess: "#04a447",
    colorWarning: "#ffbb55",
    colorWhite: "#fff",
    colorInfoDark: "#7d8da1",
    colorInfoLight: "#dce1eb",
    colorDark: "#363949",
    colorLight: "#848bc82e",
    colorPrimaryVariant: "#111e88",
    colorDarkVariant: "#677483",
    colorBackground: "#f6f6f9",
    colorCancelled: "#969696",
    colorDining: "#0786b0"
};


        fetch('../apis/general_data.php')
            .then(response => {
                // Check if the response is successful
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                // Parse the JSON data from the response
                return response.json();
            })
            .then(data => {
                // Assign the fetched JSON data to a variable
                global = data;
            })
            .catch(error => {
                console.error('There was a problem fetching the data:', error);
            });



// Actual JS Script

//utils
function toggle_active(e, activated) {
    parent = e.parentElement;
    parent.querySelector('.active').classList.remove('active');
    e.classList.add('active');
    activated(e);
}

 function close_popup(e){
    console.log(e);
    e.parentElement.parentElement.parentElement.close();
 }

 let animated_inputs = document.querySelectorAll('.animated_inputs');
 animated_inputs.forEach((animated_input)=>{
   animated_input.addEventListener('focusin',(e)=>{
     e.target.nextElementSibling.classList.add('input_has_value')
   })
   animated_input.addEventListener('focusout',(e)=>{
     if(e.target.value==='')
     {
       e.target.nextElementSibling.classList.remove('input_has_value')
     }
   })
 })

