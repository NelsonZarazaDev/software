<?php
class ReligionView
{
    function paginateReligions($array_religions)
    { 
        ?>
        <div class="card">
            <div class="card-header">
                Registar Religi&oacute;n
            </div>
            <div class="card-body">
                <form id="insert_religion">
                    <div class="form-group">
                        <label>Nombre de la Religi&oacute;n</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <button type="button" class="btn btn-primary float-right" onclick="Religion.insertReligion()">
                    <i class="fas fa-save"></i> Guardar
                    </button>

                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header bg-info">
                Listar Religiones
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
                        foreach($array_religions as $object_religion)
                        {
                            $reli_id=$object_religion->reli_id;
                            $reli_name=$object_religion->reli_name;
                            $token=$object_religion->token;
                            ?>
                            <tr>
                                <td><?php echo $reli_id;?></td>
                                <td><?php echo $reli_name;?></td>
                                <td style="text-align:center;">
                                <i class="fas fa-edit" onclick="Religion.showReligion('<?php echo $token;?>');"></i>
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