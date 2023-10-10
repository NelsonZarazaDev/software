<?php
class PersonView
{
    function paginatePeople($array_people,$array_religions,$array_sexes,$array_countries)
    { 
        ?>
        <div class="card">
            <div class="card-header">
                Registar una persona
            </div> 
            
            <div class="card-body">
                <form id="insert_person">

                    <div class="form-group">
                        <label>Documento</label>
                        <input type="text" class="form-control" id="documento" name="documento">
                    </div>
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres">
                    </div>
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                    </div>
                    <div class="form-group">
                        <label>Sexo</label>
                        <select class="form-control" id="sexo_id" name="sexo_id">
                            <option value=""></option>
                            <?php
                            if($array_sexes)
                            {
                                foreach($array_sexes as $object_sex)
                                {
                                    $sex_id=$object_sex->sex_id;
                                    $sex_name=$object_sex->sex_name;
                                    ?>
                                    <option value="<?php echo $sex_id;?>"><?php echo $sex_name;?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" class="form-control" id="celular" name="celular">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Fecha De Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>
                    <div class="form-group">
                        <label>Religiones</label>
                        <select class="form-control" id="religion_id" name="religion_id">
                            <option value=""></option>
                            <?php
                            if($array_religions)
                            {
                                foreach($array_religions as $object_religion)
                                {
                                    $reli_id=$object_religion->reli_id;
                                    $reli_name=$object_religion->reli_name;
                                    ?>
                                    <option value="<?php echo $reli_id;?>"><?php echo $reli_name;?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nacionalidad</label>
                        <select class="form-control" id="pais_nacionalidad_id" name="pais_nacionalidad_id">
                            <option value=""></option>
                            <?php
                            if($array_countries)
                            {
                                foreach($array_countries as $object_country)
                                {
                                    $coun_id=$object_country->coun_id;
                                    $coun_name=$object_country->coun_name;
                                    ?>
                                    <option value="<?php echo $coun_id;?>"><?php echo $coun_name;?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pais de residencia</label>
                        <select class="form-control" id="pais_donde_vive_id" name="pais_donde_vive_id">
                            <option value=""></option>
                            <?php
                            if($array_countries)
                            {
                                foreach($array_countries as $object_country)
                                {
                                    $coun_id=$object_country->coun_id;
                                    $coun_name=$object_country->coun_name;
                                    ?>
                                    <option value="<?php echo $coun_id;?>"><?php echo $coun_name;?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <button type="button" class="btn btn-primary float-right" onclick="Person.insertPerson()">
                    <i class="fas fa-save"></i> Guardar
                    </button>

                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header bg-info">
                Listar personas
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
                        foreach($array_people as $object_person)
                        {
                            $pers_id=$object_person->pers_id;
                            $pers_names=$object_person->pers_names;
                            ?>
                            <tr>
                                <td><?php echo $pers_id;?></td>
                                <td><?php echo $pers_names;?></td>
                                <td style="text-align:center;">
                                <i class="fas fa-edit" onclick="Person.showPerson('<?php echo $pers_id;?>');"></i>
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

    function showReligion($array_religion)
    {
        $reli_id=$array_religion[0]->reli_id;
        $reli_name=$array_religion[0]->reli_name;
        ?>
        <div class="card">
            <div class="card-body">
                <form id="update_religion">
                    <div class="form-group">
                        <label>Nombre de la Religi&oacute;n</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $reli_name;?>">
                    </div>

                    <input type="hidden" id="id" name="id" value="<?php echo $reli_id;?>">

                    <button type="button" class="btn btn-primary float-right" onclick="Religion.updateReligion()">
                    <i class="fas fa-save"></i> Guardar
                    </button>

                </form>
            </div>
        </div>
        <?php
    }
}
?>