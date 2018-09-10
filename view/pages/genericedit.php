<style>
    form
    {
        margin-top:40px;
        padding:20px;
        background:#f9f9f9;
        
    }
    /* form input
    {
        border:0px !important;
        border-radius: 0px !important;
        border-bottom: solid 1.5px !important;
    }*/
    form input:focus
    {
 
        background:#eee;
        transition: background 0.5s;
    } 
</style>
<?php
    if( isset($_SESSION['error'])  ):
?>
<script> alert("some thing occure error " + "<?php echo $_SESSION['error']   ?>"); </script>
<?php  unset( $_SESSION['error'] ) ;endif;   ?>
<div class="">
<div class='col-lg-8'>
    <div class='col-lg-3'></div>          
    <form action="<?php echo  WEBSITE_NAME . DS . $action ?>" method='post' class='col-lg-8 '  >

      
        
        <div class='clearfix'></div>
        <div class='col-lg-8 col-lg-offset-2' style='padding:0px;'>
                <h2> <?php echo $header ;  ?> </h2>
                <?php foreach( $fields as $key=>$field ):  ?>
                    <div class="form-group">
                        <label for="<?php  echo $key ?>"><?php  echo $key ?></label>
                        <input value="<?php echo $field;  ?>" class="form-control" id="email" placeholder="Enter <?php  echo $field;?>" name="<?php  echo $key ?>">
                    </div> 
                <?php endforeach;  ?>
                <input type="submit" name = <?php echo $postname; ?> class="btn btn-success form-control" value='Submit'>

        </div>

    </form>

</div>  
</div>

