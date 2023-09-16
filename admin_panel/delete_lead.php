<?php
    
    require_once("connection.php");
    
    $id = $_GET["Id"];
    $delete = "DELETE FROM `Lead` WHERE id = '$id'";
    $query = mysqli_query($conn,$delete);
    
    if($query)
    {
        ?>
        <script>alert("Lead record has been deleted");window.location.href="view_lead.php"</script>
        <?php
    }
    else
    {
        ?>
        <script>alert("there was a some error")</script>
        <?php
    }

?>