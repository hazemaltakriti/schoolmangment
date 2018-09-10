<style>
    form
    {
       
        border:solid 1px;
        padding:20px;
        
    }
    form input
    {
        border:0px !important;
        border-radius: 0px !important;
        border-bottom: solid 1.5px !important;
    }
    form input:focus
    {
        border-bottom:solid 3px blue !important;
        transition: border-bottom 2s;
        background:#eee;
        transition: background 0.5s;
    }
     button:hover
    {
    
        opacity:0.5 ;
        transition: opacity,font-size  0.3s,0.8s;
    }
    tr:hover
    {
       background:#eee;
    }
</style>
<?php
    if( isset($_SESSION['error'])  ):
?>
<script> alert("some thing occure error " + "<?php echo $_SESSION['error']   ?>"); </script>
<?php  unset( $_SESSION['error'] ) ;endif;   ?>
 <body>
    <div class="container">
        
   
        <div class="col-lg-1"></div>
        <div class='col-lg-8'>  
        <h2><?php echo $header;   ?></h2>

            <div class=" table-responsive ">
                         
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <?php foreach($columns as $var) :?>
                            <th> <?php echo $var ?> </th>
                        <?php  endforeach;  ?>   
                        <?php if( $editaction !=null ):   ?>
                            <th>edit</th>
                        <?php endif;  ?>
                       
                        <?php if( $removeaction != null ):   ?>
                            <th>remove</th>
                        <?php endif;  ?>
                    </tr>
                </thead>
                <tbody>
                    <?php   if( isset($rows[$pkname]) ) : ?>
                        <?php for( $i = 0 ; $i < count($rows[$pkname]) ; $i++ ) :?>
                            <tr>
                                
                                <?php foreach($columns as $var) :?>                                            
                                    <td> <?php echo $rows[$var][$i] ;?> </td>
                                <?php  endforeach;  ?>  
                                </td>
                                <?php if( $editaction != null ):  ?>
                                    <td>
                                        <a href="<?php echo WEBSITE_NAME . DS . $editaction . DS . $rows[$pkname][$i]; ?>">
                                            <button class='btn btn-primary'> edit </button>
                                        </a>
                                    </td>
                                <?php endif;  ?>
                                    <?php if( $removeaction != null ):  ?>
                                    <td>
                                        <a href="<?php echo WEBSITE_NAME . DS . $removeaction . DS . $rows[$pkname][$i]; ?>">
                                            <button class='btn btn-danger'> remove </button>
                                        </a>
                                    </td>
                                <?php endif;  ?>

                            </tr>
                        <?php  endfor;  ?>   
                    <?php  endif;  ?>    
                    </tbody>
                </table>
        </div>
        
    </div>  
</div>
    </body>
