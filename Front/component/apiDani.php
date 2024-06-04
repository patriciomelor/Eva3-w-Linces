<script>
    //Pegarle al Endpoint nosotros - Dani 

        fetch('http://localhost/Eva3-w-Linces/backend/api/v2/nosotros/get.php', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer get',
                'Content-Type': 'application/json'
            }
        })
            .then(response => {
                if (!response.ok) {
                    // Lanza un error si la respuesta no es OK (cualquier código diferente a 2xx)
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Esto es un error:', error);
            });
</script>