class CountryJs
{
    insertCountry()
    {
        var object=new FormData(document.querySelector('#insert_country'));
        
        fetch('CountryController/insertCountry',{
            method: 'POST',
            body: object
        })
        .then((resp) => resp.text())
        .then(function(data)
        {
            try 
            {
                object = JSON.parse(data);

                toastr.error(object.message);
            } 
            catch(error)
            {
                document.querySelector('#content').innerHTML=data;
                toastr.success('el registro fue guardado');
            }
        })
        .catch(function(error) {
          console.log(error);
        });
    }

    showCountry(id)
    { 
        var object=new FormData();

        object.append('id', id);
        
        $('#my_modal').modal('show');

        document.querySelector('#modal_title').innerHTML="Actualizar Pa&iacute;s";

        fetch('CountryController/showCountry',{
            method: 'POST',
            body: object
        })
        .then((resp) => resp.text())
        .then(function(data)
        {
            document.querySelector('#modal_content').innerHTML=data;
        })
        .catch(function(error) {
          console.log(error);
        });
    }

    updateCountry()
    {
        var object=new FormData(document.querySelector('#update_country'));
        
        fetch('CountryController/updateCountry',{
            method: 'POST',
            body: object
        })
        .then((resp) => resp.text())
        .then(function(data)
        {
            try 
            {
                object = JSON.parse(data);
                toastr.error(object.message);
            } 
            catch(error)
            {
                document.querySelector('#content').innerHTML=data;
                toastr.success('el registro fue guardado');
            }
        })
        .catch(function(error) {
          console.log(error);
        });
    }
}

var Country=new CountryJs();