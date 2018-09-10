<html>
    <head>
        <title>admin</title>
        <link href="<?php   echo ASSET; ?>/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php  echo ASSET; ?>/js/jquery-2.1.4.min.js"></script>
    </head>
    <body>
            <div class="container table-responsive">
                <h2><?php echo $header;   ?></h2>
                         
                <table class="table ">
                <thead>
                    <tr>
                        <?php foreach($columns as $var) :?>
                            
                            <th> <?php echo $var ?> </th>
                        <?php  endforeach;  ?>   
                        <th>edit</th>
                        <th>remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for( $i = 0 ; $i < count($rows['id']) ; $i++ ) :?>
                        <tr>
                            
                            <?php foreach($columns as $var) :?>                                            
                                <td> <?php echo $rows[$var][$i] ;?> </td>
                            <?php  endforeach;  ?>  
                            </td>
                            <td>
                                <a href="<?php echo WEBSITE_NAME . DS . 'user' . DS . 'edit' . DS . $rows['id'][$i]; ?>">
                                    <button class='btn btn-default'> edit </button>
                                </a>
                            </td>
                            <td>
                                    <button class='btn btn-danger remove'>remove </button>
                            </td>

                        </tr>
                    <?php  endfor;  ?>   

                    </tbody>
                </table>
        </div>
    </body>
</html>