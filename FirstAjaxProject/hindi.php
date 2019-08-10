<?php
include('db.php');
$sql="select id,name from stream";
$stmt=$con->prepare($sql);
$stmt->execute();
$arrStream=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Ajax Country State City Dropdown.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1>PHP Ajax Country State City Dropdown</h1>
    <form>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" id="stream">
                        <option value="-1">Select Country</option>
                        <?php
                        foreach($arrStream as $stream){
                            ?>
                            <option value="<?php echo $stream['id']?>"><?php echo $stream['name']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="state">State</label>
                    <select class="form-control" id="specific">
                        <option>Select State</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="city">City</label>
                    <select class="form-control" id="m_specific">
                        <option>Select City</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>
<div id="divLoading"></div>
<script>
    $(document).ready(function(){
        jQuery('#stream').change(function(){
            var id=jQuery(this).val();
            if(id=='-1'){
                jQuery('#specific').html('<option value="-1">Select State</option>');
            }else{
                $("#divLoading").addClass('show');
                jQuery('#specific').html('<option value="-1">Select State</option>');
                jQuery('#m_specific').html('<option value="-1">Select City</option>');
                jQuery.ajax({
                    type:'post',
                    url:'get_data.php',
                    data:'id='+id+'&type=specific',
                    success:function(result){
                        $("#divLoading").removeClass('show');
                        jQuery('#specific').append(result);
                    }
                });
            }
        });
        jQuery('#specific').change(function(){
            var id=jQuery(this).val();
            if(id=='-1'){
                jQuery('#m_specific').html('<option value="-1">Select City</option>');
            }else{
                $("#divLoading").addClass('show');
                jQuery('#m_specific').html('<option value="-1">Select City</option>');
                jQuery.ajax({
                    type:'post',
                    url:'get_data.php',
                    data:'id='+id+'&type=m_specific',
                    success:function(result){
                        $("#divLoading").removeClass('show');
                        jQuery('#m_specific').append(result);
                    }
                });
            }
        });
    });
</script>
</body>
</html>