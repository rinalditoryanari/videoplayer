$("#table").on('click', '#deleteBtn', function() {
    var email = $(this).closest("tr").find("td:eq(3)").text();
    var url = $(this).attr('url')
    console.log(url);
    console.log(email);

    var formdata = new FormData
    formdata.append('email', email) 

    
    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
      };
    
      fetch(url, requestOptions)
        .then(response => response.text())
        .then(result => {
          if(result != null) {
            console.log(result);
            var coba = JSON.parse(result)
            console.log(coba['data']);
            if (coba['data']) {
                location.reload();
            }else{
                alert('Data does not exist!! Please refresh your page');
            }     
          }
          else {
            alert('Error!')              
          }
        }
          )
        .catch(error => {
          alert(error)
        });
})

$("#table").on('click', '#editBtn', function() {
    var url = $(this).attr('url')
    location.replace(url);
})