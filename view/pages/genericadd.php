<style>
    form
    {
        margin-top:40px;
        padding:20px;
        background:#f9f9f9;
        
    }
    form input
    {
        border:0px !important;
        border-radius: 0px !important;
        border-bottom: solid 1.5px !important;
    }
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
        <form action="<?php echo $action ?>" method='post' class='col-lg-8 '  >

          
            <div class='col-lg-8 col-lg-offset-2' style='padding:0px;'>
                <h2><?php echo $header ;  ?></h2>
                <?php foreach( $inputs as $key=>$input ):  ?>
                    <div class="form-group">
                        <label for="<?php  echo $input ?>"><?php  echo $input ?></label>
                        <input  class="form-control" id="email" placeholder="Enter <?php  echo $input ?>" name="<?php  echo $input ?>">
                    </div>
                <?php endforeach;  ?>
                <button type="submit" class="btn btn-success form-control">Submit</button>

            </div>
            <div class='clearfix'></div>
           

        </form>

    </div>  
</div>
