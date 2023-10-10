<?php
class CountryView
{
    function paginateCountries($array_countries)
    { 
        ?>
        <div class="card">
            <div class="card-header">
                Registar pa&iacute;s
            </div>
            <div class="card-body">
                <form id="insert_country">
                    <div class="form-group">
                        <label>Nombre del pais</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <button type="button" class="btn btn-primary float-right" onclick="Country.insertCountry()">
                    <i class="fas fa-save"></i> Guardar
                    </button>

                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header bg-info">
                Listar pa&iacute;s
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th style="text-align:center;">Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($array_countries as $object_country)
                        {
                            $coun_id=$object_country->coun_id;
                            $coun_name=$object_country->coun_name;
                            ?>
                            <tr>
                                <td><?php echo $coun_id;?></td>
                                <td><?php echo $coun_name;?></td>
                                <td style="text-align:center;">
                                <i class="fas fa-edit" onclick="Country.showCountry('<?php echo $coun_id;?>');"></i>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <?php
    }

    function showCountry($array_country)
    {
        $coun_id=$array_country[0]->coun_id;
        $coun_name=$array_country[0]->coun_name;
        ?>
        <div class="card">
            <div class="card-body">
                <form id="update_country">
                    <div class="form-group">
                        <label>Nombre del pais</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $coun_name;?>">
                    </div>

                    <input type="hidden" id="id" name="id" value="<?php echo $coun_id;?>">

                    <button type="button" class="btn btn-primary float-right" onclick="Country.updateCountry()">
                    <i class="fas fa-save"></i> Guardar
                    </button>

                </form>
            </div>
        </div>
        <?php
    }
}
?>