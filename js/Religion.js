class ReligionJs
{
    insertReligion()
    {
        var object=new FormData(document.querySelector('#insert_religion'));
        
        fetch('ReligionController/insertReligion',{
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

    showReligion(id)
    { 
        var object=new FormData();

        object.append('id', id);
        
        $('#my_modal').modal('show');

        document.querySelector('#modal_title').innerHTML="Actualizar religi&oacute;n";

        fetch('ReligionController/showReligion',{
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

    updateReligion()
    {
        var object=new FormData(document.querySelector('#update_religion'));
        
        fetch('ReligionController/updateReligion',{
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

var Religion=new ReligionJs();