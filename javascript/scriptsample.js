var sample = "nice";// vaar " name of variable" = "value of variable";

sample = "updated sample"; // this is how to update the value of the variable. me refer past variables as their names with no symnol
       


        // this is how to specigy an aelement to be modified by javascript
        


        // this is how to change the color of the element
       



    

       /*
       
 2. Always use const if the value should not be changed

3. Always use const if the type should not be changed (Arrays and Objects)

4. Only use let if you can't use const

5. Only use var if you MUST support old browsers.
       
       
       */

var modalContainer = document.getElementById("modal-container");




document.getElementById("button-modal").onclick = function(){
    modalContainer.style.display="block";
}


document.getElementById("close-modal").onclick = function(){
    modalContainer.style.display="none";
}

document.getElementById('postForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Stop default form submission

    var formData = new FormData(this);

    fetch('innerpage.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Append new post without reloading
            let postHTML = `<div class='post'>
                <p><strong>${data.username}</strong></p>
                <p>${data.content}</p>
                ${data.image ? `<img src="${data.image}" alt="Post Image">` : ""}
            </div>`;
            document.getElementById('postsContainer').innerHTML += postHTML;
        }
    })
    .catch(error => console.error('Error:', error));
});




