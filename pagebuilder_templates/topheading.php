<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
<!-- ------------------------ Modal Starts ------------------------>
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Name Your Page</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="email">Enter Your Page Name:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <input type="hidden" name="template_id" id="template_id">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- ------------------------ Modal Ends -------------------------->
<style>
    #menu{
        margin-top: 15px;
    }
</style>
<table style="width: 100%; position: fixed; z-index: 9999; border-bottom: solid 2px #333; background-color: #bfc2c4;">
    <tr>
        <td style="width: 60%; text-align: left; color: #fff; padding: 5px;">
            <a style="text-decoration: none; color: #5ca6fb; float: left;" href="<?php echo Mage::getBaseUrl(); ?>templates">
                <b>BACK TO TEMPLATE</b>
            </a>

        </td>
        <td style="width: 30%; text-align: left; color: #fff; padding: 5px;">
            <a href="#" style="text-decoration: none; font-weight: bold; float: left; width: 20%;"><</a>
            <label style="width: 60%; text-align: center; font-weight: bold;"><b>1 / 50</b></label>
            <a href="#" style="text-decoration: none; font-weight: bold; float: right; width: 20%;">></a>
        </td>
        <td style="width: 10%; text-align: center; color: #fff; padding: 5px; background-color: #5ca6fb; border: solid 1px #6279fe;">
            <a href="javascript:setTemplateValue();" style="text-decoration: none; color: #fff;">
                EDIT PAGE
            </a>
            <input type="button" id="btnModalTemplateEdit" style="display: none;" data-toggle="modal" data-target="#myModal">
        </td>
    </tr>
</table>
<br>
<script>
function setTemplateValue(){
    var templateId = document.getElementById("templateId").value;
    document.getElementById("template_id").value = templateId;
    document.getElementById("btnModalTemplateEdit").click();
}
</script>